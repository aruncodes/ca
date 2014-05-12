<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {
	function checkSession() {
		if($this->session->userdata('loggedin'))
			return;
		else {
			$this->session->sess_destroy();
			$data['title'] = "Login";
			$details['error'] = "Please login first!";

			echo $this->load->view('template/header',$data,TRUE);
			echo $this->load->view('template/login', $details,TRUE);
			echo $this->load->view('template/footer',array(),TRUE);
			exit;
		}
	}
	function index()
	{
		$this->checkSession();
		$this->viewServices();
	}
	function viewServices($arg = "none", $cid = "none")
	{
		$this->checkSession();
		$data['title'] = 'Services';
		$this->load->view('template/header',$data);

		$data['page'] = "svcs";
		$this->load->view('template/base', $data);

		$data['page'] = "viewServices";
		$this->load->view('services/side_nav', $data);

		if($this->input->post('cid')) {
			$this->load->model('clientdb_model');
			$cid = $this->input->post('cid');
			$present = $this->clientdb_model->isPresent($cid);
			if($present == 0) {
				$this->session->unset_userdata('cid');
				$details['error'] = "Specified client does not exist";
				$details['cid'] = $cid;
				$this->load->view('services/getCid', $details);
				return;
			} else {
				$details['cid'] = $cid;
				$this->session->set_userdata(array('cid'=>$cid));
			}
		}

		if($this->session->userdata('cid')) {
			$cid = $this->session->userdata('cid');

			$details['cid'] = $cid;
			$this->load->view('services/getCid', $details);

			$this->load->model('services_model');
			if($arg == "add")
				$this->services_model->addService($cid, $this->input->post('service'));
			$services = $this->services_model->getServices($cid);
			$services['serviceNames'] = $this->services_model->getServiceNames($cid);
			$services['cid'] = $cid;
			$this->load->view('services/viewServices', $services);
		} else {
			$this->load->view('services/getCid',array('close'=>TRUE));
		}

		$this->load->view('template/footer');
	}
	
	function modServices($arg = "none")
	{
		$this->checkSession();
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
			$flag = $this->services_model->remService($sname);
			if($flag == FALSE)
				$data['msg'] = "Removed Service";
			else {
				$data['msg'] = "Unable to remove service, clients are using it";
				$data['style'] = "msg error";
			}
		}
		$data['serviceNames'] = $this->services_model->getServiceNames();
		$this->load->view('services/modServices', $data);

		$this->load->view('template/footer');
	}

	function remService($cid="none")
	{
		$this->checkSession();
		$sname = $this->input->post('sname');
		if($cid != "none" && $sname) {
			$this->load->model("services_model");
			$this->services_model->remCliService($cid, $sname);
		}
		$this->viewServices("show");
	}

	function forgotCID()
	{
		$this->checkSession();
		$data['title'] = 'Services';
		$this->load->view('template/header',$data);

		$data['page'] = "svcs";
		$this->load->view('template/base', $data);

		$data['page'] = "viewServices";
		$this->load->view('services/side_nav', $data);
		
		$data=NULL;
		if($this->input->post('pan')) {
			$this->session->unset_userdata('cid');
			$pan = $this->input->post('pan');
			$this->load->model('clientdb_model');
			$data = $this->clientdb_model->getCIDs($pan);
			$data['pan'] = $pan;
		}
		$this->load->view('services/forgotCID', $data);
	}

	function setSession($cid)
	{
		$this->checkSession();
		$this->load->model('clientdb_model');
		$present = $this->clientdb_model->isPresent($cid);
		if($present == 1)
			$this->session->set_userdata(array('cid'=>$cid));
		else
			$this->session->unset_userdata('cid');

		$this->index();
	}
}
?>