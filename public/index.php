<?php
	/**
	 * Jotform API to FDF Generator.
	 * 
	 * Purpose: This will generate a PDF with data prefilled in the form elements using data from the JotForm API.
	 * */


	require_once('../vendor/autoload.php');

	session_cache_limiter(false);
	session_start();

	use League\Fractal\Manager as FractalManager;
	use League\Fractal\Resource\Collection as FractalCollection;
	use mikehaertl\pdftk\Pdf;

	$config = include('../config.php');
	$app = new \Slim\Slim($config);

	$app->config('view', new \TJC\View\Layout());
	$app->view->setLayout('layout/layout.php');

	$app->add(new \TJC\User\UserMiddleware());

	$app->config('tjc.middleware.login.redirect', '/admin');

	\ORM::configure('sqlite:../data/forms.db');

	$app->container->singleton('jotform', function() use($app) {
		return new JotForm($app->config('jotform_api'));
	});

	$app->get('/render/:subid/:formname', function($subid, $formname) use($app) {
		// First we see if the form is there, and then we load in the appopriate data.
		if(!is_file('../data/forms/' . $formname)) {
			// Throw error
			$app->halt(404, 'PDF File Does Not Exist');
		} else {
			$form_file = '../data/forms/' . $formname;

			/* $form_array = $app->config('pdf_forms');
			$form_transform = $form_array[$formname]; */
			$form_data = \ORM::for_table('form_pdf')->where('pdf_file', $formname)->find_one();
			$form_transform = $form_data->data_transform;
		}

		// Grab Submission Data.
		$sub_data = $app->jotform->getSubmission($subid);

		$process = array(
			array(
				'answers' => $sub_data['answers'],
				'sub_id' => $subid
			)
		);

		$fractalManager = new FractalManager();
		$collection = new FractalCollection($process, new $form_transform);

		$pdf_data = $fractalManager->createData($collection)->toArray();

		$pdf = new Pdf($form_file);

		// Fill Form Data.
		$pdf->fillForm($pdf_data['data'][0]);
		
		if($app->request->get('flatten')) {
			$pdf->flatten();
		}

		// Send?
		if($app->request->get('filename')) {
			$filename = $app->request->get('filename');
		} else {
			$filename = $subid . '-' . $formname;
		}

		$pdf->send($filename);
	});

	$app->get('/jotform/submission/:subid', function($subid) use($app) {
		$sub_data = $app->jotform->getSubmission($subid);
		if($app->request->get('framed')) {
			$sub_data['framed'] = true;
		}

		$form_details = \ORM::for_table('form_html')->join('form', array('form.id', '=', 'form_html.form_id'))->where('form.jotformid', $sub_data['form_id'])->find_one();

		// Set the Title for the form.
		$app->view->appendTitle($form_details->name);

		// Get the form, based on the id, and then input the answers.
		$app->render($form_details->html_file, $sub_data);
	});

	$app->get('/jotform/form/:formid', function($formid) use($app) {
		$form_details = \ORM::for_table('form_html')->join('form', array('form.id', '=', 'form_html.form_id'))->where('form.jotformid', $formid)->find_one();
		$data = array();

		if($app->request->get('framed')) {
			$data['framed'] = true;
		}

		// Set the Title for the form.
		$app->view->appendTitle($form_details->name);

		$app->render($form_details->html_file, $data);
	});

	$app->group('/retrieve', function() use($app) {
		$app->map('/', function() use($app) {
			if($app->request->isPost()) {
				$q = '?' . http_build_query(array(
					'flatten' => $app->request->post('flat')
				));
				$app->redirect($app->urlFor('retrieve', array('rid' => $app->request->post('subid'))) . $q);
			}
			$app->render('retrieve.php');
		})->via('GET', 'POST');

		$app->get('/:rid', function($rid) use($app) {
			// Get Submission details:
			$sub_data = $app->jotform->getSubmission($rid);

			$form_details = \ORM::for_table('form_pdf')->join('form', array('form.id', '=', 'form_pdf.form_id'))->where('form.jotformid', $sub_data['form_id'])->find_one();

			$app->view->appendTitle('Retrieve');

			$append = '';
			if($app->request->get('flatten') == 1) {
				$append = '?flatten=1';
			}

			$app->redirect(sprintf('/render/%s/%s%s', $rid, $form_details->pdf_file, $append));
		})->name('retrieve');
	});
	
	$app->group('/admin', function() use($app) {
		$app->get('/render/all/:formid', function($formid) use($app) {
			// First we see if the form is there, and then we load in the appopriate data.
			$form_data = \ORM::for_table('form_pdf')->join('form', array('form.id', '=', 'form_pdf.form_id'))->where('form.jotformid', $formid)->find_one();
			$form_file = '../data/forms/' . $form_data->pdf_file;
			$form_transform = $form_data->data_transform;

			// Grab All Submission Data.
			$sub_data = $app->jotform->getSubmission($subid);

			$process = array(
				array(
					'answers' => $sub_data['answers'],
					'sub_id' => $subid
				)
			);

			$fractalManager = new FractalManager();
			$collection = new FractalCollection($process, new $form_transform);

			$pdf_data = $fractalManager->createData($collection)->toArray();

			$pdf = new Pdf($form_file);

			// Fill Form Data.
			$pdf->fillForm($pdf_data['data'][0]);
			
			if($app->request->get('flatten')) {
				$pdf->flatten();
			}

			// Send?
			if($app->request->get('filename')) {
				$filename = $app->request->get('filename');
			} else {
				$filename = $subid . '-' . $formname;
			}

			$pdf->send($filename);
		});
		
		$app->group('/list', 'userLoggedIn', function() use($app) {
			$app->get('/', function() use($app) {
				// Get all forms that the user can use.
				$forms = \ORM::for_table('form')->select(array('jotformid', 'name'))
												->join('user_forms', array('form.id', '=', 'user_forms.form_id'))
												->where('user_forms.user_id', $_SESSION['user']->id)
												->find_array();

				$app->render('admin/list.php', array('forms' => $forms));
			});

			$app->get('/:formid', function($formid) use($app) {
				// Grab all the submissions from jotform.
				$form_data = \ORM::for_table('form')->join('form_pdf', array('form.id', '=', 'form_pdf.form_id'))->where('jotformid', $formid)->find_one();

				$submissions = $app->jotform->getFormSubmissions($formid);

				$fractalManager = new FractalManager();
				$collection = new FractalCollection($submissions, new AdminTransform());

				$submission_data = $fractalManager->createData($collection)->toArray();

				$app->render('admin/list_submissions.php', array('form' => $form_data, 'submissions' => $submission_data));
			});
		});

		$app->post('/submission/delete', 'userLoggedIn', function() use($app) {

		});

		$app->post('/login', function() use($app) {
			// Check to see if user is in the system.
			$user = \ORM::for_table('user')->where('username', $app->request->post('username'))->find_one();

			if(password_verify($app->request->post('password'), $user->password)) {
				$_SESSION['user'] = $user;
				$app->redirect('/admin/list');
			} else {
				$app->flash('error', 'Invalid Login Credentials.');
			}
		});

		$app->get('/logout', function() use($app) {
			unset($_SESSION['user']);
			$app->flash('info', 'User Logged Out.');
			$app->redirect('/admin');
		});

		$app->get('/', function() use($app) {
			$app->render('admin/index.php', array());
		});
	});

	$app->run();