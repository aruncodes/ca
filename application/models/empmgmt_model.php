<?php
	class Empmgmt_model extends CI_Model {

		function getEmployees() {

			$this->db->where('eid !=',0);// avoid admin account from employee list for modification/deletion
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

		function resetPass($uname) {
			$this->db->where('uname',$uname);
			$this->db->update('users',array('pass'=>$uname));
		}

		function getUsernames() {
			$this->db->select('uname');
			$query = $this->db->get('users');

			return $query->result_array();
		}

		function getCSVUsernames() {
			$unames = $this->getUsernames();

			$list = "";
			foreach ($unames as $uname) {
				$list .= "'".$uname['uname']."' ,";
			}

			return $list;
		}

		function getUserDetails($eid) {
			$this->db->where('eid',$eid);
			$query = $this->db->get('users');

			$result = $query->result_array();
			if(count($result) == 0) 
				return array();
			return $result[0];
		}
		
		function getEID($uname) {
			$this->db->where('uname',$uname);
			$query = $this->db->get('users');

			return $query->result_array()[0]['eid'];
		}

		function insertUser($data) {
			$this->db->insert('users',$data);
			if($this->db->affected_rows() > 0)
				return TRUE;
			return FALSE;
		}

		function updateUser($data,$eid) {
			$this->db->where('eid',$eid);
			$this->db->update('users',$data);
			if($this->db->affected_rows() > 0)
				return TRUE;
			return FALSE;
		}
	}
?>