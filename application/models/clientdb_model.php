<?php
class Clientdb_model extends CI_Model {
	function insert($clientData)
	{
		if(!$this->isPresentPAN($clientData['pan']))
			$this->db->insert('client', $clientData);
	}
	function modify($clientData)
	{
		$this->db->update('client', $clientData, array('cid'=>$clientData['cid']));
	}
	function deleteClient($cid)
	{
		$this->db->delete('client', array('cid'=>$cid));
		$this->db->delete('files', array('cid'=>$cid));
		$this->db->delete('inout', array('cid'=>$cid));
		$this->db->delete('services', array('cid'=>$cid));
	}


	function getCid($arg)
	{
		$this->db->select('cid');

		$this->db->where('name', $arg[0]);
		$this->db->where('fatname', $arg[1]);
		$this->db->where('dob', $arg[2]);
		$this->db->where('cmpname', $arg[3]);
		$this->db->where('cmpdob', $arg[4]);
		$this->db->where('status_cat1', $arg[5]);
		$this->db->where('bus_cat2', $arg[6]);
		$this->db->where('regno', $arg[7]);
		$this->db->where('email', $arg[8]);
		$this->db->where('pan',$arg[9]);

		$query = $this->db->get('client');
		if(isset($query->result_array()[0]['cid']))
			return $query->result_array()[0]['cid'];
		return 0;
	}

	function isPresent($cid)
	{
		$this->db->select('*');
		$this->db->where(array('cid' => $cid));
		$query = $this->db->get('client');
		return $query->num_rows();
	}

	function isPresentPAN($pan)
	{
		$this->db->select('*');
		$this->db->where(array('pan' => $pan));
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

	function getCIDs($pan = "none")
	{
		$this->db->select('cid, cmpname, name, status_cat1');
		if($pan != "none")
			$this->db->where('pan',$pan);
		$query = $this->db->get('client');
		if($query->num_rows() == 0)
			return array('error'=>TRUE);
		return array('cids'=>$query->result_array());
	}

	function updateLVDate($cid)
	{
		$this->db->where('cid',$cid);
		$this->db->update('client', array('lvdate'=>date('d/m/Y')));
	}
}
?>