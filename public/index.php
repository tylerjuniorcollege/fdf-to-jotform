<?php
	/**
	 * Jotform API to FDF Generator.
	 * 
	 * Purpose: This will generate a PDF with data prefilled in the form elements using data from the JotForm API.
	 * */


	require_once('../vendor/autoload.php');

	use League\Fractal\Manager as FractalManager;
	use League\Fractal\Resource\Collection as FractalCollection;

	$config = include('../config.php');
	$app = new \Slim\Slim($config);

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

			$form_array = $app->config('forms');
			$form_transform = $form_array[$formname];
		}

		// Grab Submission Data.
		$sub_data = $app->jotform->getSubmission($subid);

		$fractalManager = new FractalManager();
		$collection = new FractalCollection(array($sub_data['answers']), new $form_transform);

		$pdf_data = $fractalManager->createData($collection)->toArray();

		//var_dump($pdf_data);

		$pdf = Zend_Pdf::load($form_file);

		// Fill Form Data.
		foreach($pdf_data['data'][0] as $key => $val) {
			$pdf->setTextField($key, $val);
		}

		// Temporary file name
		$tmp_name = tempnam('../data/tmp');
		$pdf->save($tmp_name);

		$app->response->headers->set('Content-Type', "application/pdf");
		$app->response->headers->set('Pragma', "public");
		$app->response->headers->set('Content-disposition:', 'attachment; filename=' . $subid . '-' . $formname);
		$app->response->headers->set('Content-Transfer-Encoding', 'binary');
		readfile($tmp_name);
		$app->stop();
	});

	$app->run();