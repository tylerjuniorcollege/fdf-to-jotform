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

	$app->run();