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
				'q5_grantWritten' => $answers[5]['answer'],
				'q6_phoneemail6' => $answers[6]['answer'],
				'q7_grantSubmitted' => $answers[7]['answer'],
				'q9_phoneemail9' => $answers[9]['answer'],
				'q8_projectDirectormanager' => $answers[8]['answer'],
				'q10_phoneemail' => $answers[10]['answer'],
				'q11_grantAgency' => $answers[11]['answer'],
				'q12_grantAgency12' => $answers[12]['answer'],
				'q13_grantDue' => $answers[13]['answer'],
				'q71_notificationDate71' => $answers[71]['answer'],
				'q14_projectedStart' => $answers[14]['answer'],
				'q15_projectedEnd' => $answers[15]['answer'],
				'q4_typeOf[New]' => 'Off',
				'q4_typeOf[Renewal]' => 'Off',
				'q16_titleOf' => $answers[16]['answer'],
				'q19_totalGrant' => $answers[19]['answer'],
				'q20_maximumAmount' => $answers[20]['answer'],
				'q21_isHuman21[NO]' => 'Off',
				'q21_isHuman21[YES]' => 'Off',
				'q22_isNew[NO]' => 'Off',
				'q22_isNew[YES]' => 'Off',
				'q23_areAdditional[NO]' => 'Off',
				'q23_areAdditional[YES]' => 'Off',
				'q24_isNew24[NO]' => 'Off',
				'q24_isNew24[YES]' => 'Off',
				'q25_pleaseProvide25' => $answers[25]['answer'],
				'q26_isThere26' => $answers[26]['answer'],
				'q27_pleaseDescribe' => $answers[27]['answer'],
				'q29_briefOverview' => $answers[39]['answer'],
				'q49_federal' => $answers[49]['answer'],
				'q50_state' => $answers[50]['answer'],
				'q51_local' => $answers[51]['answer'],
				'q52_other' => $answers[52]['answer'],
				'q55_salaries' => $answers[55]['answer'],
				'q56_benefits' => $answers[56]['answer'],
				'q57_services' => $answers[57]['answer'],
				'q58_supplies' => $answers[58]['answer'],
				'q59_capitalOutlay' => $answers[59]['answer'],
				'q60_indirectCosts' => $answers[60]['answer'],
				'q61_adminCosts' => $answers[61]['answer'],
				'q34_input34' => $answers[34]['answer'],
				'q36_input36' => $answers[36]['answer'],
				'q39_input39' => $answers[39]['answer'],
				'q41_input41' => $answers[41]['answer'],
				'q43_input43' => $answers[43]['answer'],
				'q44_reviewedBy' => $answers[44]['answer'],
				'q65_date[month]' => $answers[65]['answer']['month'],
				'q65_date[day]' => $answers[65]['answer']['day'],
				'q65_date[year]' => $answers[65]['answer']['year'],
				'q66_date[month]' => $answers[66]['answer']['month'],
				'q66_date[day]' => $answers[66]['answer']['day'],
				'q66_date[year]' => $answers[66]['answer']['year'],
				'q67_date[month]' => $answers[67]['answer']['month'],
				'q67_date[day]' => $answers[67]['answer']['day'],
				'q67_date[year]' => $answers[67]['answer']['year'],
				'q68_date[month]' => $answers[68]['answer']['month'],
				'q68_date[day]' => $answers[68]['answer']['day'],
				'q68_date[year]' => $answers[68]['answer']['year'],
				'q69_date[month]' => $answers[69]['answer']['month'],
				'q69_date[day]' => $answers[69]['answer']['day'],
				'q69_date[year]' => $answers[69]['answer']['year'],
				'q46_approved[YES]' => 'Off',
				'q46_approved[NO]' => 'Off',
				'q47_ifDenied' => $answers[47]['answer']
			), $checkboxes);
		}
	}