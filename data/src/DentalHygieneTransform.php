<?php
use League\Fractal\TransformerAbstract;

class DentalHygieneTransform
	extends TransformerAbstract
	{
		public function gradeToPoints($grade, $modifier = 1) {
			switch($grade) {
				case 'A':
					$points = 3;
					break;

				case 'B':
					$points = 2;
					break;

				case 'C':
					$points = 1;
					break;

				default:
					$points = 0;
					break;
			}

			return ($points * $modifier);
		}

		public function boolToPoints($bool, $points) {
			if($bool == 'Yes') {
				return $points;
			}
			return 0;
		}

		public function transform($data) {
			// Total Points Counter
			$total_points = 0;

			// Grades
			$points = array();
			foreach(array(
				'biol2401points' => array('id' => 5, 'modifier' => 4),
				'biol2402points' => array('id' => 10, 'modifier' => 4),
				'biol2420points' => array('id' => 15, 'modifier' => 4),
				'chem1405points' => array('id' => 20, 'modifier' => 4),
				'biol1322points' => array('id' => 25, 'modifier' => 2),
				'engl1301points' => array('id' => 29, 'modifier' => 1),
				'psycElectivepoints' => array('id' => 33, 'modifier' => 1),
				'sociElectivepoints' => array('id' => 37, 'modifier' => 1),
				'humafineArtpoints' => array('id' => 41, 'modifier' => 1),
				'spchElectivepoints' => array('id' => 45, 'modifier' => 1)
			) as $name => $grade) {
				$points[$name] = $this->gradeToPoints($data['answers'][$grade['id']]['answer'], $grade['modifier']);
				$total_points += $this->gradeToPoints($data['answers'][$grade['id']]['answer'], $grade['modifier']);
			}

			// Calculate Completed Points
			foreach(array(
				'biol2401completed' => 8,
				'biol2402completed' => 13,
				'biol2420completed' => 18,
				'chem1405completed' => 23
			) as $name => $id) {
				$points[$name] = $this->boolToPoints($data['answers'][$id]['answer'], 1);
				$total_points += $this->boolToPoints($data['answers'][$id]['answer'], 1);
			}

			// Calculate Repeated Points
			foreach(array(
				'biol2401repeated' => array('id' => 9, 'points' => 1),
				'biol2402repeated' => array('id' => 14, 'points' => 1),
				'biol2420repeated' => array('id' => 19, 'points' => 1),
				'chem1405repeated' => array('id' => 24, 'points' => 1),
				'biol1322repeated' => array('id' => 28, 'points' => 1),
				'engl1301repeated' => array('id' => 32, 'points' => 0.5),
				'psycElectiverepeated' => array('id' => 36, 'points' => 0.5),
				'sociElectiverepeated' => array('id' => 40, 'points' => 0.5),
				'humafineArtrepeated' => array('id' => 44, 'points' => 0.5),
				'spchElectiverepeated' => array('id' => 48, 'points' => 0.5)
			) as $name => $val) {
				$points[$name] = $this->boolToPoints($data['answers'][$val['id']]['answer'], $val['points']);
				$total_points -= $this->boolToPoints($data['answers'][$val['id']]['answer'], $val['points']);
			}

			// Calculate HESI Points from Composite Score.
			if(isset($data['answers'][49]['answer'])) {
				$points['hesiPoints'] = $data['answers'][49]['answer'] * 0.30;
				$total_points += $points['hesiPoints'];
			} else {
				$points['hesiPoints'] = 0;
			}

			// Calculate Additional Information
			foreach(array(
				'inDistrictpoints' => array('id' => 50, 'points' => 2),
				'hprs12011105points' => array('id' => 51, 'points' => 1),
				'hitt1305points' => array('id' => 52, 'points' => 1),
				'hitt1303points' => array('id' => 53, 'points' => 1),
				'tjcDApoints' => array('id' => 54, 'points' => 3),
				'CDApoints' => array('id' => 55, 'points' => 6)
			) as $name => $val) {
				$points[$name] = $this->boolToPoints($data['answers'][$val['id']]['answer'], $val['points']);
				$total_points += $this->boolToPoints($data['answers'][$val['id']]['answer'], $val['points']);
			}


			return array_merge(array(
				'q3_applicantName' => (isset($data['answers'][3]['prettyFormat']) ? $data['answers'][3]['prettyFormat'] : NULL),
				'q5_biol2401' => (isset($data['answers'][5]['answer']) ? $data['answers'][5]['answer'] : NULL),
				'q6_biol24016' => (isset($data['answers'][6]['answer']) ? $data['answers'][6]['answer'] : NULL),
				'q7_biol24017' => (isset($data['answers'][7]['answer']) ? $data['answers'][7]['answer'] : NULL),

				'q10_biol2402' => (isset($data['answers'][10]['answer']) ? $data['answers'][10]['answer'] : NULL),
				'q11_biol240211' => (isset($data['answers'][11]['answer']) ? $data['answers'][11]['answer'] : NULL),
				'q12_biol240212' => (isset($data['answers'][12]['answer']) ? $data['answers'][12]['answer'] : NULL),

				'q15_biol2420' => (isset($data['answers'][15]['answer']) ? $data['answers'][15]['answer'] : NULL),
				'q16_biol242016' => (isset($data['answers'][16]['answer']) ? $data['answers'][16]['answer'] : NULL),
				'q17_biol242017' => (isset($data['answers'][17]['answer']) ? $data['answers'][17]['answer'] : NULL),

				'q20_chem140514061411' => (isset($data['answers'][20]['answer']) ? $data['answers'][20]['answer'] : NULL),
				'q21_chem14051406141121' => (isset($data['answers'][21]['answer']) ? $data['answers'][21]['answer'] : NULL),
				'q22_chem14051406141122' => (isset($data['answers'][22]['answer']) ? $data['answers'][22]['answer'] : NULL),

				'q25_biol1322' => (isset($data['answers'][25]['answer']) ? $data['answers'][25]['answer'] : NULL),
				'q26_biol132226' => (isset($data['answers'][26]['answer']) ? $data['answers'][26]['answer'] : NULL),
				'q27_biol132227' => (isset($data['answers'][27]['answer']) ? $data['answers'][27]['answer'] : NULL),

				'q29_engl1301' => (isset($data['answers'][29]['answer']) ? $data['answers'][29]['answer'] : NULL),
				'q30_engl130130' => (isset($data['answers'][30]['answer']) ? $data['answers'][30]['answer'] : NULL),
				'q31_engl130131' => (isset($data['answers'][31]['answer']) ? $data['answers'][31]['answer'] : NULL),

				'q33_psycElective' => (isset($data['answers'][33]['answer']) ? $data['answers'][33]['answer'] : NULL),
				'q34_psycElective34' => (isset($data['answers'][34]['answer']) ? $data['answers'][34]['answer'] : NULL),
				'q35_psycElective35' => (isset($data['answers'][35]['answer']) ? $data['answers'][35]['answer'] : NULL),

				'q37_sociElective' => (isset($data['answers'][37]['answer']) ? $data['answers'][37]['answer'] : NULL),
				'q38_sociElective38' => (isset($data['answers'][38]['answer']) ? $data['answers'][38]['answer'] : NULL),
				'q39_sociElective39' => (isset($data['answers'][39]['answer']) ? $data['answers'][39]['answer'] : NULL),

				'q41_humafineArt' => (isset($data['answers'][41]['answer']) ? $data['answers'][41]['answer'] : NULL),
				'q42_humafineArt42' => (isset($data['answers'][42]['answer']) ? $data['answers'][42]['answer'] : NULL),
				'q43_humafineArt43' => (isset($data['answers'][43]['answer']) ? $data['answers'][43]['answer'] : NULL),

				'q45_spchElective' => (isset($data['answers'][45]['answer']) ? $data['answers'][45]['answer'] : NULL),
				'q46_spchElective46' => (isset($data['answers'][46]['answer']) ? $data['answers'][46]['answer'] : NULL),
				'q47_spchElective47' => (isset($data['answers'][47]['answer']) ? $data['answers'][47]['answer'] : NULL),

				'q49_hesiScore' => (isset($data['answers'][49]['answer']) ? $data['answers'][49]['answer'] : NULL),

				'total_points' => $total_points
			), $points);
		}
	}