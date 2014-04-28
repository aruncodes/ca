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
	}
?>