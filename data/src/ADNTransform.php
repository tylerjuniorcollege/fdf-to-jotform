<?php
use League\Fractal\TransformerAbstract;

class ADNTransform
	extends TransformerAbstract
	{
		public function gradeToBiolPoints($grade, $completed) {
			switch($grade) {
				case 'A':
					$points = 12;
					break;

				case 'B':
					$points = 8;
					break;

				case 'C':
					$points = 4;
					break;

				default:
					$points = 0;
					break;
			}
			
			$points += $this->boolToPoints($completed, 1);

			return $points;
		}
		
		public function gradeToBonusPoints($grade) {
			switch($grade) {
				case 'A':
					$points = 2;
					break;

				case 'B':
					$points = 1;
					break;

				default:
					$points = 0;
					break;
			}

			return $points;
		}

		public function boolToPoints($bool, $points) {
			if($bool == 'Yes') {
				return $points;
			}
			return 0;
		}
		
		public function boolCheck($bool) {
			if($bool == 'Yes')
				return "Yes";
			
			return "Off";
		}
		
		public function nullCheck($value) {
			if(!isset($value)) {
				return NULL;
			}
			
			return $value;
		}

		public function transform($data) {
			// Output Array - this is what was submitted to the jotform.
			$output = array();
			
			// Points array.
			$points = array();
			
			// Full name and A#
			$output['full_name'] = $this->nullCheck($data['answers'][1]['prettyFormat']);
			$output['a_number'] = $this->nullCheck($data['answers'][4]['answer']);
			
			// GPA Calculation.
			$output['gpa'] = round($data['answers'][5]['answer'], 2);
			$points['gpa'] = round(($data['answers'][5]['answer'] * 20), 2);
			
			// HESI Calculation.
			foreach(array(
				'hesi_reading' => 6,
				'hesi_math' => 7,
				'hesi_ap' => 8
			) as $name => $id) {
				$output[$name] = $data['answers'][$id]['answer'];
				$points[$name] = round(($data['answers'][$id]['answer'] * 0.05), 2);
			}
			
			// No Value Checks
			$output['vocab_gen'] = $this->boolCheck($data['answers'][25]['answer']);
			$output['personality_profile'] = $this->boolCheck($data['answers'][26]['answer']);
			$output['learning_style'] = $this->boolCheck($data['answers'][27]['answer']);
			
			// BIOLOGY Grades
			foreach(array(
				'biol2401' => array('id' => 12, 'completed' => 13),
				'biol2402' => array('id' => 14, 'completed' => 15),
				'biol2420' => array('id' => 16, 'completed' => 17)
			) as $name => $val) {
				$points[$name] = $this->gradeToBiolPoints($data['answers'][$val['id']]['answer'], $data['answers'][$val['completed']]['answer']);
			}
			
			// Bonus
			foreach(array(
				'hitt1305' => 18,
				'hitt1303' => 19,
				'hrps12011105' => 20
			) as $name => $id) {
				$points[$name] = $this->gradeToBonusPoints($data['answers'][$id]['answer']);
			}
			
			foreach(array(
				'cna' => array('id' => 21, 'points' => 3),
				'sixmonth' => array('id' => 22, 'points' => 2),
				'tjc_enrollment' => array('id' => 23, 'points' => 2),
				'indistrict' => array('id' => 24, 'points' => 3)
			) as $name => $val) {
				$points[$name] = $this->boolToPoints($data['answers'][$val['id']]['answer'], $val['points']);
			}
			
			$output['total_points'] = 0;
			foreach($points as $name => $val) {
				$output[($name . '_points')] = $val;
				$output['total_points'] += $val;
			}

			return $output;
		}
	}