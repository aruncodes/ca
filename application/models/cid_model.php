<?php
	class Cid_model extends CI_Model {
		
		/*
		* Funtions to use:
		*	1. getRealCID()
		*	2. getInCID()
		*/

		/*
			Input: First char for structure followed by number. Ec: C1, C32, I56
			Output: Corresponding CID of that client
		*/

		function getRealCID($In_cid) {
			if($In_cid) {
				
				$first_char = $In_cid[0];

				if(ctype_alpha($first_char))
					$cid = substr($In_cid,1);
				else if(ctype_digit($In_cid))
					$cid = $In_cid;				
				else $cid = '0';

				$struct = $this->getStructure($first_char);

				if($struct == '--')
					return $cid;

				$result = $this->getCidFromDB($struct,$cid);

				if(count($result) == 0) {
					return 0;
				}

				return $result[0]['cid'];	
			}
		}

		function getCidFromDB($struct, $In_cid) {

			$this->db->select('cid');
			$this->db->where(array('in_cid' => $In_cid,'status_cat1' => $struct));
			$query = $this->db->get('client');

			return $query->result_array();
		}

		function getStructure($char) {
			switch($char) {
				case 'L': 
				case 'l': return 'LP';

				case 'F': 
				case 'f': return 'FM';

				case 'C': 
				case 'c': return 'CO';

				case 'I': 
				case 'i': return 'IL';

				case 'T': 
				case 't': return 'TR';

				default: return '--';
			}
		}

		function getInCID($cid) {

			$this->db->select('in_cid,status_cat1');
			$this->db->where(array('cid' => $cid));
			$query = $this->db->get('client');

			$result = $query->result_array();

			if(count($result) == 0)
				return 0;

			else return $result[0]['status_cat1'][0].$result[0]['in_cid'];
		}
	}

	// $c = new Cid_model;
	// echo $c->getRealCID("I1");
?>