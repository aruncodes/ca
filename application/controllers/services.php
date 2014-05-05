<?php
class Services extends CI_Controller {
	function index()
	{
		$this->viewServices();
	}
	function viewServices($arg = "none", $cid = "none")
	{
		$data['title'] = 'Services';
		$this->load->view('template/header',$data);

		$data['page'] = "svcs";
		$this->load->view('template/base', $data);

		$data['page'] = "viewServices";
		$this->load->view('services/side_nav', $data);

		if($arg == "none") {
			$this->load->view('services/getCid');
		} else if($arg == "show" || $arg == "add") {
			
			if($cid == "none")
				$cid = $this->input->post('cid');
			
			$this->load->model('clientdb_model');
			$present = $this->clientdb_model->isPresent($cid);
			if($present == 1) {
				$this->load->model('services_model');

				if($arg == "add")
					$this->services_model->addService($cid, $this->input->post('service'));

				$services = $this->services_model->getServices($cid);
				$services['serviceNames'] = $this->services_model->getServiceNames($cid);
				$services['cid'] = $cid;
				$this->load->view('services/viewServices', $services);
			} else {
				$details['error'] = "Specified client does not exist";
				$details['cid'] = $this->input->post('cid');
				$this->load->view('services/getCid', $details);
			}
		}
		$this->load->view('template/footer');
	}
	
	function modServices($arg = "none")
	{
		$data['title'] = 'Services';
		$this->load->view('template/header',$data);

		$data['page'] = "svcs";
		$this->load->view('template/base', $data);

		$data['page'] = "addNewService";
		$this->load->view('services/side_nav', $data);
		
		$this->load->model('services_model');

		if($arg == "addService") {
			$sname = $this->input->post('sname');
			$flag = $this->services_model->insertService($sname);
			if($flag) 
				$data['msg'] = "Inserted service successfully";
			else {
				$data['style'] = "msg error";
				$data['msg'] = "Service already present";
			}
		} else if($arg == "remService") {
			$sname = $this->input->post('sname');
			$this->services_model->remService($sname);
			$data['msg'] = "Removed Service";
		}
		$data['serviceNames'] = $this->services_model->getServiceNames();
		$this->load->view('services/modServices', $data);

		$this->load->view('template/footer');
	}

	function remService($cid="none")
	{
		$sname = $this->input->post('sname');
		if($cid != "none" && $sname) {
			$this->load->model("services_model");
			$this->services_model->remCliService($cid, $sname);
		}
		$this->viewServices("show", $cid);
	}
}
?>