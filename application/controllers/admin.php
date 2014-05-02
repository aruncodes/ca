<?php
class Admin extends CI_Controller {
	function index()
	{
		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$this->load->view('template/side_nav', $data);
		
		if($this->session->userdata['isa'] == 'y') {
			$this->load->view('admin');
		} else {
			$this->load->view('thepp');
		}
		$this->load->view('template/footer');
	}
}
?>