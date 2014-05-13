<?php
	class Inout_model extends CI_Model {
		 function __construct()	    {
	        parent::__construct();
	    }

	    function thereExistsClient($cid) {

	    	if( !is_numeric($cid)) {
				return FALSE;
			}

	    	$this->db->select('cid');
	    	$this->db->where('cid',$cid);

	    	$query = $this->db->get('client');

	    	if ($query->num_rows() > 0)
	    		return TRUE;
	    	return FALSE;
	    }
		function get_inward($cid = "none") {

			if($cid == "none") {
				$query = $this->db->query('SELECT id,doc_name,category FROM `doc_names` WHERE (category = "INA" OR category = "INN" OR category = "INO") AND id > 64 ORDER BY doc_name');
			} else {
				if( !$this->thereExistsClient($cid))
					return FALSE;
				$query = $this->db->query('SELECT inout.id,doc_name,doc_id,category FROM `inout` LEFT JOIN `doc_names` ON inout.doc_id = doc_names.id WHERE (category = "INA" OR category = "INN" OR category = "INO") AND cid = '.$cid.' ORDER BY doc_name' );
			}

			$result = array(0 => array(array(-1,"---")),
							1 => array(array(-1,"---")),
							2 => array(array(-1,"---")));
			$i = $j=$k= 0;
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->category == "INA")
				    	$result[0][$i++] = array($row->id,$row->doc_name);
				    else if($row->category == "INN")				    	
				    	$result[1][$j++] = array($row->id,$row->doc_name);
				    else if($row->category == "INO")				    	
				    	$result[2][$k++] = array($row->id,$row->doc_name);
				}
			}
			return $result;
		}

		function get_outward($cid = "none") {
			if($cid == "none") {
				$query = $this->db->query('SELECT id,doc_name FROM `doc_names` WHERE category = "OUT" AND id > 64 ORDER BY doc_name' );
			} else {
				if( !$this->thereExistsClient($cid))
					return FALSE;
				$query = $this->db->query('SELECT inout.id,doc_name FROM `inout` LEFT JOIN `doc_names` ON inout.doc_id = doc_names.id WHERE category = "OUT" AND cid = '.$cid.' ORDER BY doc_name' );
			}

			$result =  array(0 => array(array(-1,"No documents found!!")));
			$i = 0;
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
				    $result[0][$i++] = array($row->id,$row->doc_name);
				}
			}
			return $result;
		}

		function getInwardAddOptions($cid, $cat) {
			// $this->db->select('id','doc_name');
			// $this->db->where('category',$cat);
			// $query = $this->db->get('doc_names');

			$q = sprintf("SELECT DISTINCT result1.doc_name, result1.id
					FROM (SELECT id,doc_name FROM doc_names WHERE category='%s') AS result1 LEFT JOIN (SELECT doc_id FROM `inout` WHERE cid='%s') 
					AS result2 ON result1.id = result2.doc_id WHERE result2.doc_id IS NULL ORDER BY result1.doc_name;",$cat,$cid);
			//this is actually set difference in mysql. dont go too deep :P
			//now try doing this using db functions :P
			$query = $this->db->query($q);

			return $query->result_array();
		}

		function removeDoc($id) {
			$this->db->delete('inout', array('id' => $id)); 
		}

		function isDocPresent($data)
		{
			$this->db->where($data);
			$query = $this->db->get('inout');
			if($query->num_rows() != 0)
				return TRUE;
			return FALSE;
		}

		function addDoc($cid,$doc_id) {
			$data = array('cid'=>$cid, 'doc_id'=>$doc_id);
			if(!$this->isDocPresent($data))
				$this->db->insert('inout',$data);
		}

		function isDocNamePresent($data)
		{
			$this->db->where($data);
			$query = $this->db->get('doc_names');
			if($query->num_rows() != 0)
				return TRUE;
			return FALSE;
		}
		function addNewDoc($doc_name, $cat) {
			$data = array('doc_name'=>$doc_name, 'category'=>$cat);
			if(!$this->isDocNamePresent($data)) {
				$this->db->insert('doc_names',$data);
				return TRUE;
			}
			return FALSE;
		}

		function delDocName($id)
		{
			$this->db->delete('doc_names', array('id'=>$id));
		}
	}
?>