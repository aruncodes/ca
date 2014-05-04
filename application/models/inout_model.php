<?php
	class Inout_model extends CI_Model {
		 function __construct()	    {
	        parent::__construct();
	    }
		function get_inward($cid) {

			if( !is_numeric($cid)) {
				return FALSE;
			}

			$query = $this->db->query('SELECT doc_name,sub_cat FROM `inout` WHERE (sub_cat = "INA" OR sub_cat = "INN" OR sub_cat = "INO") AND cid = '.$cid.'' );

			$result = array();
			$i = 0;
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->sub_cat == "INA")
				    	$result[0][$i++] = $row->doc_name;
				    else if($row->sub_cat == "INN")
				    	$result[1][$i++] = $row->doc_name;
				    else if($row->sub_cat == "INO")
				    	$result[2][$i++] = $row->doc_name;
				}

				return $result;
			} else {
				return array(0 => array("No documents found!!"),
					1 => array("No documents found!!"),
					2 => array("No documents found!!"));
			}			
		}

		function get_outward($cid) {

			if( !is_numeric($cid)) {
				return FALSE;
			}

			$query = $this->db->query('SELECT doc_name FROM `inout` WHERE sub_cat = "OUT" AND cid = '.$cid.'' );

			$result = array();
			$i = 0;
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
				    $result[0][$i++] = $row->doc_name;
				}
			}
			return $result;
		}
	}
?>