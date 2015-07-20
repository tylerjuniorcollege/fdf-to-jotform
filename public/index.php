<?php
	/**
	 * Jotform API to FDF Generator.
	 * 
	 * Purpose: This will generate a PDF with data prefilled in the form elements using data from the JotForm API.
	 * */


	require_once('../vendor/autoload.php');

	use League\Fractal\Manager as FractalManager;
	use League\Fractal\Resource\Collection as FractalCollection;
	use mikehaertl\pdftk\Pdf;

	$config = include('../config.php');
	$app = new \Slim\Slim($config);

	\ORM::configure('sqlite:../data/forms.db');

	$app->container->singleton('jotform', function() use($app) {
		return new JotForm($app->config('jotform_api'));
	});

	$app->get('/render/:subid/:formname', function($subid, $formname) use($app) {
		// First we see if the form is there, and then we load in the appopriate data.
		//var_dump($formname); die();
		if(!is_file('../data/forms/' . $formname)) {
			// Throw error
			$app->halt(404, 'PDF File Does Not Exist');
		} else {
			$form_file = '../data/forms/' . $formname;

			$form_array = $app->config('pdf_forms');
			$form_transform = $form_array[$formname];
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

		$form_details = \ORM::for_table('form_html')->join('form', array('form.id', '=', 'form_html.form_id'))->where('form.jotformid', $sub_data['form_id'])->find_one();

		//var_dump($sub_data);

		// Get the form, based on the id, and then input the answers.
		$app->render($form_details->html_file, $sub_data);
	});

	$app->get('/jotform/form/:formid', function($formid) use($app) {
		$form_details = \ORM::for_table('form_html')->join('form', array('form.id', '=', 'form_html.form_id'))->where('form.jotformid', $formid)->find_one();

		$app->render($form_details->html_file, array());
	});

	$app->group('/a', function() use($app) {

	});

	$app->run();