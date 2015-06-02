<?php
// This is the first transform written, but it is also meant to be an example.
// Clone/Mimic this and use it in the config.php file for the appropriate pdf.

use League\Fractal\TransformerAbstract;

class ExternalFundingRequestTransform
	extends TransformerAbstract
	{

		public function transform($data) {
			// Checkboxes:
			$checkboxes = array();
			foreach(array(4, 21, 22, 23, 24, 46) as $aid) {
				if(!is_array($data['answers'][$aid]['answer'])) {
					continue;
				}

				foreach($data['answers'][$aid]['answer'] as $answer) {
					switch($aid) {
						case 4:
							$name = 'q4_typeOf[%s]';
							break;

						case 21:
							$name = 'q21_isHuman21[%s]';
							break;

						case 22:
							$name = 'q22_isNew[%s]';
							break;

						case 23:
							$name = 'q23_areAdditional[%s]';
							break;

						case 24:
							$name = 'q24_isNew24[%s]';
							break;

						case 46:
							$name = 'q46_approved[%s]';
							break;
					}

					$checkboxes[sprintf($name, $answer)] = 'Yes';
				}
			}


			return array_merge(array(
				'q5_grantWritten' => (!isset($data['answers'][5]['answer']) ? NULL : $data['answers'][5]['answer']),
				'q6_phoneemail6' => (!isset($data['answers'][6]['answer']) ? NULL : $data['answers'][6]['answer']),
				'q7_grantSubmitted' => (!isset($data['answers'][7]['answer']) ? NULL : $data['answers'][7]['answer']),
				'q9_phoneemail9' => (!isset($data['answers'][9]['answer']) ? NULL : $data['answers'][9]['answer']),
				'q8_projectDirectormanager' => (!isset($data['answers'][8]['answer']) ? NULL : $data['answers'][8]['answer']),
				'q10_phoneemail' => (!isset($data['answers'][10]['answer']) ? NULL : $data['answers'][10]['answer']),
				'q11_grantAgency' => (!isset($data['answers'][11]['answer']) ? NULL : $data['answers'][11]['answer']),
				'q12_grantAgency12' => (!isset($data['answers'][12]['answer']) ? NULL : $data['answers'][12]['answer']),
				'q13_grantDue' => (!isset($data['answers'][13]['answer']) ? NULL : $data['answers'][13]['answer']),
				'q71_notificationDate71' => (!isset($data['answers'][71]['answer']) ? NULL : $data['answers'][71]['answer']),
				'q14_projectedStart' => (!isset($data['answers'][14]['answer']) ? NULL : $data['answers'][14]['answer']),
				'q15_projectedEnd' => (!isset($data['answers'][15]['answer']) ? NULL : $data['answers'][15]['answer']),
				'q4_typeOf[New]' => 'Off',
				'q4_typeOf[Renewal]' => 'Off',
				'q16_titleOf' => (!isset($data['answers'][16]['answer']) ? NULL : $data['answers'][16]['answer']),
				'q19_totalGrant' => (!isset($data['answers'][19]['answer']) ? NULL : $data['answers'][19]['answer']),
				'q20_maximumAmount' => (!isset($data['answers'][20]['answer']) ? NULL : $data['answers'][20]['answer']),
				'q21_isHuman21[NO]' => 'Off',
				'q21_isHuman21[YES]' => 'Off',
				'q22_isNew[NO]' => 'Off',
				'q22_isNew[YES]' => 'Off',
				'q23_areAdditional[NO]' => 'Off',
				'q23_areAdditional[YES]' => 'Off',
				'q24_isNew24[NO]' => 'Off',
				'q24_isNew24[YES]' => 'Off',
				'q25_pleaseProvide25' => (!isset($data['answers'][25]['answer']) ? NULL : $data['answers'][25]['answer']),
				'q26_isThere26' => (!isset($data['answers'][26]['answer']) ? NULL : $data['answers'][26]['answer']),
				'q27_pleaseDescribe' => (!isset($data['answers'][27]['answer']) ? NULL : $data['answers'][27]['answer']),
				'q29_briefOverview' => (!isset($data['answers'][39]['answer']) ? NULL : $data['answers'][39]['answer']),
				'q49_federal' => (!isset($data['answers'][49]['answer']) ? NULL : $data['answers'][49]['answer']),
				'q50_state' => (!isset($data['answers'][50]['answer']) ? NULL : $data['answers'][50]['answer']),
				'q51_local' => (!isset($data['answers'][51]['answer']) ? NULL : $data['answers'][51]['answer']),
				'q52_other' => (!isset($data['answers'][52]['answer']) ? NULL : $data['answers'][52]['answer']),
				'q55_salaries' => (!isset($data['answers'][55]['answer']) ? NULL : $data['answers'][55]['answer']),
				'q56_benefits' => (!isset($data['answers'][56]['answer']) ? NULL : $data['answers'][56]['answer']),
				'q57_services' => (!isset($data['answers'][57]['answer']) ? NULL : $data['answers'][57]['answer']),
				'q58_supplies' => (!isset($data['answers'][58]['answer']) ? NULL : $data['answers'][58]['answer']),
				'q59_capitalOutlay' => (!isset($data['answers'][59]['answer']) ? NULL : $data['answers'][59]['answer']),
				'q60_indirectCosts' => (!isset($data['answers'][60]['answer']) ? NULL : $data['answers'][60]['answer']),
				'q61_adminCosts' => (!isset($data['answers'][61]['answer']) ? NULL : $data['answers'][61]['answer']),
				'q34_input34' => (!isset($data['answers'][34]['answer']) ? NULL : $data['answers'][34]['answer']),
				'q36_input36' => (!isset($data['answers'][36]['answer']) ? NULL : $data['answers'][36]['answer']),
				'q39_input39' => (!isset($data['answers'][39]['answer']) ? NULL : $data['answers'][39]['answer']),
				'q41_input41' => (!isset($data['answers'][41]['answer']) ? NULL : $data['answers'][41]['answer']),
				'q43_input43' => (!isset($data['answers'][43]['answer']) ? NULL : $data['answers'][43]['answer']),
				'q44_reviewedBy' => (!isset($data['answers'][44]['answer']) ? NULL : $data['answers'][44]['answer']),
				'q65_date[month]' => (!isset($data['answers'][65]['answer']) ? NULL : $data['answers'][65]['answer']['month']),
				'q65_date[day]' => (!isset($data['answers'][65]['answer']) ? NULL : $data['answers'][65]['answer']['day']),
				'q65_date[year]' => (!isset($data['answers'][65]['answer']) ? NULL : $data['answers'][65]['answer']['year']),
				'q66_date[month]' => (!isset($data['answers'][66]['answer']) ? NULL : $data['answers'][66]['answer']['month']),
				'q66_date[day]' => (!isset($data['answers'][66]['answer']) ? NULL : $data['answers'][66]['answer']['day']),
				'q66_date[year]' => (!isset($data['answers'][66]['answer']) ? NULL : $data['answers'][66]['answer']['year']),
				'q67_date[month]' => (!isset($data['answers'][67]['answer']) ? NULL : $data['answers'][67]['answer']['month']),
				'q67_date[day]' => (!isset($data['answers'][67]['answer']) ? NULL : $data['answers'][67]['answer']['day']),
				'q67_date[year]' => (!isset($data['answers'][67]['answer']) ? NULL : $data['answers'][67]['answer']['year']),
				'q68_date[month]' => (!isset($data['answers'][68]['answer']) ? NULL : $data['answers'][68]['answer']['month']),
				'q68_date[day]' => (!isset($data['answers'][68]['answer']) ? NULL : $data['answers'][68]['answer']['day']),
				'q68_date[year]' => (!isset($data['answers'][68]['answer']) ? NULL : $data['answers'][68]['answer']['year']),
				'q69_date[month]' => (!isset($data['answers'][69]['answer']) ? NULL : $data['answers'][69]['answer']['month']),
				'q69_date[day]' => (!isset($data['answers'][69]['answer']) ? NULL : $data['answers'][69]['answer']['day']),
				'q69_date[year]' => (!isset($data['answers'][69]['answer']) ? NULL : $data['answers'][69]['answer']['year']),
				'q46_approved[YES]' => 'Off',
				'q46_approved[NO]' => 'Off',
				'q47_ifDenied' => (!isset($data['answers'][47]['answer']) ? NULL : $data['answers'][47]['answer']),
				'editSubmission' => $data['sub_id']
			), $checkboxes);
		}
	}