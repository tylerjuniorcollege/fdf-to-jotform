<?php
// This is the first transform written, but it is also meant to be an example.
// Clone/Mimic this and use it in the config.php file for the appropriate pdf.

use League\Fractal\TransformerAbstract;

class ExternalFundingRequestTransform
	extends TransformerAbstract
	{

		public function transform($answers) {
			// Checkboxes:
			$checkboxes = array();
			foreach(array(4, 21, 22, 23, 24, 46) as $aid) {
				if(!is_array($answers[$aid]['answer'])) {
					continue;
				}

				foreach($answers[$aid]['answer'] as $answer) {
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
				'q5_grantWritten' => (!isset($answers[5]['answer']) ? NULL : $answers[5]['answer']),
				'q6_phoneemail6' => (!isset($answers[6]['answer']) ? NULL : $answers[6]['answer']),
				'q7_grantSubmitted' => (!isset($answers[7]['answer']) ? NULL : $answers[7]['answer']),
				'q9_phoneemail9' => (!isset($answers[9]['answer']) ? NULL : $answers[9]['answer']),
				'q8_projectDirectormanager' => (!isset($answers[8]['answer']) ? NULL : $answers[8]['answer']),
				'q10_phoneemail' => (!isset($answers[10]['answer']) ? NULL : $answers[10]['answer']),
				'q11_grantAgency' => (!isset($answers[11]['answer']) ? NULL : $answers[11]['answer']),
				'q12_grantAgency12' => (!isset($answers[12]['answer']) ? NULL : $answers[12]['answer']),
				'q13_grantDue' => (!isset($answers[13]['answer']) ? NULL : $answers[13]['answer']),
				'q71_notificationDate71' => (!isset($answers[71]['answer']) ? NULL : $answers[71]['answer']),
				'q14_projectedStart' => (!isset($answers[14]['answer']) ? NULL : $answers[14]['answer']),
				'q15_projectedEnd' => (!isset($answers[15]['answer']) ? NULL : $answers[15]['answer']),
				'q4_typeOf[New]' => 'Off',
				'q4_typeOf[Renewal]' => 'Off',
				'q16_titleOf' => (!isset($answers[16]['answer']) ? NULL : $answers[16]['answer']),
				'q19_totalGrant' => (!isset($answers[19]['answer']) ? NULL : $answers[19]['answer']),
				'q20_maximumAmount' => (!isset($answers[20]['answer']) ? NULL : $answers[20]['answer']),
				'q21_isHuman21[NO]' => 'Off',
				'q21_isHuman21[YES]' => 'Off',
				'q22_isNew[NO]' => 'Off',
				'q22_isNew[YES]' => 'Off',
				'q23_areAdditional[NO]' => 'Off',
				'q23_areAdditional[YES]' => 'Off',
				'q24_isNew24[NO]' => 'Off',
				'q24_isNew24[YES]' => 'Off',
				'q25_pleaseProvide25' => (!isset($answers[25]['answer']) ? NULL : $answers[25]['answer']),
				'q26_isThere26' => (!isset($answers[26]['answer']) ? NULL : $answers[26]['answer']),
				'q27_pleaseDescribe' => (!isset($answers[27]['answer']) ? NULL : $answers[27]['answer']),
				'q29_briefOverview' => (!isset($answers[39]['answer']) ? NULL : $answers[39]['answer']),
				'q49_federal' => (!isset($answers[49]['answer']) ? NULL : $answers[49]['answer']),
				'q50_state' => (!isset($answers[50]['answer']) ? NULL : $answers[50]['answer']),
				'q51_local' => (!isset($answers[51]['answer']) ? NULL : $answers[51]['answer']),
				'q52_other' => (!isset($answers[52]['answer']) ? NULL : $answers[52]['answer']),
				'q55_salaries' => (!isset($answers[55]['answer']) ? NULL : $answers[55]['answer']),
				'q56_benefits' => (!isset($answers[56]['answer']) ? NULL : $answers[56]['answer']),
				'q57_services' => (!isset($answers[57]['answer']) ? NULL : $answers[57]['answer']),
				'q58_supplies' => (!isset($answers[58]['answer']) ? NULL : $answers[58]['answer']),
				'q59_capitalOutlay' => (!isset($answers[59]['answer']) ? NULL : $answers[59]['answer']),
				'q60_indirectCosts' => (!isset($answers[60]['answer']) ? NULL : $answers[60]['answer']),
				'q61_adminCosts' => (!isset($answers[61]['answer']) ? NULL : $answers[61]['answer']),
				'q34_input34' => (!isset($answers[34]['answer']) ? NULL : $answers[34]['answer']),
				'q36_input36' => (!isset($answers[36]['answer']) ? NULL : $answers[36]['answer']),
				'q39_input39' => (!isset($answers[39]['answer']) ? NULL : $answers[39]['answer']),
				'q41_input41' => (!isset($answers[41]['answer']) ? NULL : $answers[41]['answer']),
				'q43_input43' => (!isset($answers[43]['answer']) ? NULL : $answers[43]['answer']),
				'q44_reviewedBy' => (!isset($answers[44]['answer']) ? NULL : $answers[44]['answer']),
				'q65_date[month]' => (!isset($answers[65]['answer']) ? NULL : $answers[65]['answer']['month']),
				'q65_date[day]' => (!isset($answers[65]['answer']) ? NULL : $answers[65]['answer']['day']),
				'q65_date[year]' => (!isset($answers[65]['answer']) ? NULL : $answers[65]['answer']['year']),
				'q66_date[month]' => (!isset($answers[66]['answer']) ? NULL : $answers[66]['answer']['month']),
				'q66_date[day]' => (!isset($answers[66]['answer']) ? NULL : $answers[66]['answer']['day']),
				'q66_date[year]' => (!isset($answers[66]['answer']) ? NULL : $answers[66]['answer']['year']),
				'q67_date[month]' => (!isset($answers[67]['answer']) ? NULL : $answers[67]['answer']['month']),
				'q67_date[day]' => (!isset($answers[67]['answer']) ? NULL : $answers[67]['answer']['day']),
				'q67_date[year]' => (!isset($answers[67]['answer']) ? NULL : $answers[67]['answer']['year']),
				'q68_date[month]' => (!isset($answers[68]['answer']) ? NULL : $answers[68]['answer']['month']),
				'q68_date[day]' => (!isset($answers[68]['answer']) ? NULL : $answers[68]['answer']['day']),
				'q68_date[year]' => (!isset($answers[68]['answer']) ? NULL : $answers[68]['answer']['year']),
				'q69_date[month]' => (!isset($answers[69]['answer']) ? NULL : $answers[69]['answer']['month']),
				'q69_date[day]' => (!isset($answers[69]['answer']) ? NULL : $answers[69]['answer']['day']),
				'q69_date[year]' => (!isset($answers[69]['answer']) ? NULL : $answers[69]['answer']['year']),
				'q46_approved[YES]' => 'Off',
				'q46_approved[NO]' => 'Off',
				'q47_ifDenied' => (!isset($answers[47]['answer']) ? NULL : $answers[47]['answer']),
				'editSubmission' => $answers['sub_id']
			), $checkboxes);
		}
	}