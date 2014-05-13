<?php
class Services_model extends CI_Model {
	function getServices($cid)
	{
		$this->db->select('service');
		$this->db->where(array('cid'=>$cid));
		$this->db->order_by('service', 'asc');
		$query = $this->db->get('services');
		if($query->num_rows() == 0)
			$result['services'] = array('numrows'=>0);
		else
			$result['services'] = $query->result_array();
		return $result;
	}

	function getExistingServices($cid)
	{
		$retval = $this->getServices($cid)['services'];
		$existingServices = array();
		foreach($retval as $row)
			array_push($existingServices, $row['service']);
		return $existingServices;
	}

	function getServiceNames($cid = "none")
	{
		$this->db->select('sname');
		if($cid == "none")
			$this->db->where('scode >',6);
		$this->db->order_by('sname', 'asc');
		$query = $this->db->get('service_names');
		$res = array();

		if($cid != "none" && $cid != "all") {
			$existingServices = $this->getExistingServices($cid);
			foreach($query->result_array() as $row) {
				if(!in_array($row['sname'], $existingServices))
					array_push($res, $row['sname']);
			}
		} else {
			foreach($query->result_array() as $row)
				array_push($res, $row['sname']);
		}
		return $res;
	}

	function addService($cid, $service)
	{
		$existingServices = $this->getExistingServices($cid);

		if(!in_array($service, $existingServices)) {
			$data = array(
				'cid'=>$cid,
				'service'=>$service
			);
			$this->db->insert('services', $data);
		}
	}


	function isAlreadyPresent($sname) {
		$services = $this->getServiceNames("all");
		return (in_array($sname, $services));
	}
	function insertService($sname)
	{
		if(!$this->isAlreadyPresent($sname)) {
			$data = array('sname'=>$sname);
			$this->db->insert('service_names', $data);
			return TRUE;
		}
		return FALSE;
	}

	function remService($sname)
	{
		$query = $this->db->get_where('services', array('service'=>$sname));
		if($query->num_rows() == 0) {
			$data = array('sname'=>$sname);
			$this->db->delete('service_names', $data);
			return FALSE;
		} else {
			return array('error'=>TRUE);
		}
	}
	
	function remCliService($cid, $sname)
	{
		$data = array('cid'=>$cid,'service'=>$sname);
		$this->db->delete('services', $data);
	}
}
?>