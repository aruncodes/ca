<?php
class Clientdb_model extends CI_Model {
	function insert($clientData)
	{
		$this->db->insert('client', $clientData);
	}
	function modify($clientData)
	{
		$this->db->delete('client', array('cid'=>$clientData['cid']));
		$this->insert($clientData);
	}
	function deleteClient($cid)
	{
		$this->db->delete('client', array('cid'=>$cid));
		$this->db->delete('docs_rcvd', array('cid'=>$cid));
		$this->db->delete('files', array('cid'=>$cid));
		$this->db->delete('inout', array('cid'=>$cid));
		$this->db->delete('services', array('cid'=>$cid));
	}

	function getCid()
	{
		$this->db->select_max('cid');
		$query = $this->db->get('client');
		if($query->num_rows() == 0)
			return 1;
		return $query->result_array()[0]['cid'] + 1;
	}

	function isPresent($cid)
	{
		$this->db->select('*');
		$this->db->where(array('cid' => $cid));
		$query = $this->db->get('client');
		return $query->num_rows();
	}
	
	function getData($cid)
	{
		if(! $this->isPresent($cid)) {
			$data['error'] = 1;
			return $data;
		}

		$this->db->where('cid',$cid);
		$query = $this->db->get('client');
		$row = $query->result()[0];
		$clientData = (array)$row;

		$this->db->select('service');
		$this->db->where(array('cid' => $cid));
		$query = $this->db->get('services');

		if($query->num_rows() == 0)
			$services = "none";
		else {
			$services = array();
			foreach($query->result() as $row) {
				array_push($services, $row->service);
			}
		}

		$clientData['services'] = $services;
		return $clientData;
	}

	function getCIDs($pan)
	{
		$this->db->select('cid, cmpname, name');
		$this->db->where('pan',$pan);
		$query = $this->db->get('client');
		if($query->num_rows() == 0)
			return array('error'=>TRUE);
		return array('cids'=>$query->result_array());
	}
}
?>