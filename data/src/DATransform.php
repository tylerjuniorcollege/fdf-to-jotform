<?php
use League\Fractal\TransformerAbstract;

class DATransform
	extends TransformerAbstract
	{
		public function gradeToBiolPoints($grade, $completed) {
			switch($grade) {
				case 'A':
					$points = 6;
					break;

				case 'B':
					$points = 4;
					break;

				case 'C':
					$points = 2;
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
			$output['full_name'] = (isset($data['answers'][1]['prettyFormat']) ? $data['answers'][1]['prettyFormat'] : NULL);
			$output['a_number'] = $this->nullCheck($data['answers'][3]['answer']);
			
			// HESI Calculation.
			foreach(array(
				'hesi_reading' => array('id' => 5, 'multiply' => 0.10),
				'hesi_math' => array('id' => 6, 'multiply' => 0.05),
				'hesi_vocab' => array('id' => 7, 'multiply' => 0.10),
				'hesi_ap' => array('id' => 8, 'multiply' => 0.05)
			) as $name => $var) {
				$points[$name] = round((((float) $data['answers'][$var['id']]['answer']) * $var['multiply']), 2);
			}
			
			$points['residency'] = $this->boolToPoints($data['answers'][9]['answer'], 2);
			$points['biol2402'] = $this->gradeToBiolPoints($data['answers'][10]['answer'], $data['answers'][11]['answer']);
			$points['hprs12011103'] = $this->boolToPoints($data['answers'][13]['answer'], 1);
			
			
			$output['total_points'] = 0;
			foreach($points as $name => $val) {
				$output[($name . '_points')] = $val;
				$output['total_points'] += $val;
			}

			return $output;
		}
	}