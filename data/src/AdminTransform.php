<?php
use League\Fractal\TransformerAbstract;

class AdminTransform
	extends TransformerAbstract
	{
		public function transform($data) {
			$return = array(
				'submission_id' => $data['id']
			);

			if($data['form_id'] == '51525414183955') {
				$add_data = array(
					'name' => (isset($data['answers'][3]['prettyFormat']) ? $data['answers'][3]['prettyFormat'] : null),
					'a_number' => (isset($data['answers'][62]['answer']) ? $data['answers'][62]['answer'] : null),
					'email' => (isset($data['answers'][4]['answer']) ? $data['answers'][4]['answer'] : null)
				);
			} elseif(in_array($data['form_id'], array(52374252783964, 52466612988973, 52604460246955))) {
				$add_data = array(
					'name' => (isset($data['answers'][1]['prettyFormat']) ? $data['answers'][1]['prettyFormat'] : null),
					'a_number' => (isset($data['answers'][4]['answer']) ? $data['answers'][4]['answer'] : null),
					'email' => (isset($data['answers'][3]['answer']) ? $data['answers'][3]['answer'] : null)
				);
			}

			return array_merge($return, $add_data);
		}
	}