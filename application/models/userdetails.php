<?php
	class Userdetails extends CI_Model {
		function login($uname, $pass)
		{
			$this->db->select('*');
			$this->db->where(array('uname'=>$uname, 'pass'=>$pass));
			$query = $this->db->get('users');

			if($query->num_rows() == 0)
				return "x";
			return $query->row('isadmin');
		}

		function getPass($uname)
		{
			$this->db->select('pass')->from('users')->where('uname',$uname);
			$query = $this->db->get();
			return $query->result_array()[0]['pass'];
		}

		function changePassword($uname, $newPass)
		{
			$this->db->where('uname', $uname);
			$this->db->update('users', array('pass'=>$newPass));
		}
	}
?>