<?php
use League\Fractal\TransformerAbstract;

class VNETransform
	extends TransformerAbstract
	{
		public function gradeToPoints($grade) {
			$grade = $this->nullCheck($grade);
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

			return $points;
		}
		
		public function gradeToBonusPoints($grade) {
			$grade = $this->nullCheck($grade);
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
			
			// Name/A#
			$output['full_name'] = $this->nullCheck($data['answers'][1]['prettyFormat']);
			$output['a_number'] = $this->nullCheck($data['answers'][4]['answer']);
			
			// GPA Calculation.
			$gpa = $this->nullCheck($data['answers'][5]['answer']);
			$points['gpa'] = round(($gpa * 4), 2);
			$add_pts = 0; // Addtional GPA points for greater than 2.3 GPA
			if($gpa > 3.5) {
				$add_pts = 3;
			} elseif($gpa >= 3.1 && $gpa <= 3.5) {
				$add_pts = 2;
			} elseif($gpa >= 2.3 && $gpa <= 3.0) {
				$add_pts = 1;
			}
			
			$points['gpa_additional'] = $add_pts;
			
			// HESI Calculation.
			foreach(array(
				'hesi_reading' => 6,
				'hesi_math' => 7,
				'hesi_ap' => 8
			) as $name => $id) {
				$score = (int)$data['answers'][$id]['answer'];
				
				if($score > 90) {
					$points[$name] = 6;
				} elseif($score >= 81 && $score <= 90) {
					$points[$name] = 4;
				} elseif($score >= 71 && $score <= 80) {
					$points[$name] = 2;
				}
			}
			
			// Calculate Main BIOL Required Points:
			$add_bonus = true;
			if(!is_null($this->nullCheck($data['answers'][25]['answer']))) { // We use the score for BIOL 2404
				$points['biol2404_24012402'] = $this->gradeToPoints($data['answers'][25]['answer']);
			} elseif(is_null($this->nullCheck($data['answers'][25]['answer'])) && (!is_null($this->nullCheck($data['answers'][12]['answer'])) && !is_null($data['answers'][14]['answer']))) {
				$add_bonus = false;
				$points['biol2404_24012402'] = ($this->gradeToPoints($data['answers'][12]['answer']) + $this->gradeToPoints($data['answers'][14]['answer']));
			} else {
				$points['biol2404_24012402'] = 0;
			}
			
			// Bonus Biology Points
			$points['biology'] = 0;
			
			if($add_bonus) {
				$points['biology'] += ($this->gradeToPoints($data['answers'][12]['answer']) + $this->gradeToPoints($data['answers'][14]['answer']));
			}
			
			$points['biology'] += $this->gradeToPoints($data['answers'][16]['answer']);
			
			// HITT Bonus Points
			$points['hitt13051303'] = ($this->gradeToBonusPoints($data['answers'][18]['answer']) + $this->gradeToBonusPoints($data['answers'][19]['answer']));
			
			foreach(array(
				'current_certificate' => array('id' => 21, 'points' => 4),
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