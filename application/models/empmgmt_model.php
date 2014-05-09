<?php
	class Empmgmt_model extends CI_Model {

		function getEmployees() {

			$query = $this->db->get('users');

			return $query->result_array();
		}

		function removeEmployee($eid) {
			$this->db->delete('users',array('eid'=>$eid));
		}
		function makeAdmin($eid) {
			$this->db->where('eid',$eid);
			$this->db->update('users',array('isadmin'=>'y'));
		}

		function removeAdmin($eid) {
			$this->db->where('eid',$eid);
			$this->db->update('users',array('isadmin'=>'n'));
		}
	}
?>