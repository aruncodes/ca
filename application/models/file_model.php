<?php
	class File_model extends CI_Model {
		function getFiles($cid)
		{
			$this->db->where('cid',$cid);
			$query = $this->db->get('files');

			if($query->num_rows() == 0)
				return array('error'=>TRUE);
			return $query->result_array();
		}

		function isPresent($cid)
		{
			$query = $this->db->get_where('files', array('cid'=>$cid));
			if($query->num_rows() == 0)
				return FALSE;
			return TRUE;
		}

		function getFid($cid)
		{
			$this->db->select_max('fid');
			$this->db->where('cid', $cid);
			$query = $this->db->get('files');
			if($query->num_rows() == 0)
				return 1;
			return $query->result_array()[0]['fid'] + 1;
		}

		function isFilePresent($cid, $fid)
		{
			$this->db->where(array('fid'=>$fid, 'cid'=>$cid));
			$query = $this->db->get('files');
			if($query->num_rows() == 0)
				return FALSE;
			return TRUE;
		}

		function insert($details)
		{
			if(!$this->isFilePresent($details['cid'], $details['fid']))
				$this->db->insert('files', $details);
		}

		function remFile($id)
		{
			$this->db->delete('files', array('id'=>$id));
		}

		function modify($id, $data)
		{
			$this->db->where('id',$id);
			$this->db->update('files', $data);
		}
	}
?>