<?php
	class Inout_model extends CI_Model {
		 function __construct()	    {
	        parent::__construct();
	    }
		function get_inward($cid) {


			$query = $this->db->query('SELECT doc_name FROM `inout` WHERE sub_cat = "IN" AND cid = '.$cid.'' );

			$result = array();
			$i = 0;
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
				    $result[$i++] = $row->doc_name;
				}
			}
			return $result;
		}

		function get_outward($cid) {


			$query = $this->db->query('SELECT doc_name FROM `inout` WHERE sub_cat = "OUT" AND cid = '.$cid.'' );

			$result = array();
			$i = 0;
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
				    $result[$i++] = $row->doc_name;
				}
			}
			return $result;
		}
	}
?>