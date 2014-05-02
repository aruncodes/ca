<?php
class Admin extends CI_Controller {
	function index()
	{
		$this->teamMgmt();
	}
	function teamMgmt()
	{
		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$data['page'] = "teamMgmt";
		$this->load->view('admin/side_nav', $data);
		
		if($this->session->userdata['isa'] == 'y') {
			$this->load->view('admin/teamMgmt');
		} else {
			$this->load->view('thepp');
		}
		$this->load->view('template/footer');
	}
	function employeeMgmt()
	{
		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$data['page'] = "employeeMgmt";
		$this->load->view('admin/side_nav', $data);
		
		if($this->session->userdata['isa'] == 'y') {
			$this->load->view('admin/employeeMgmt');
		} else {
			$this->load->view('thepp');
		}
		$this->load->view('template/footer');
	}
}
?>