<?php
class Projects extends CI_Controller {
	function index()
	{
		$data['title'] = 'Projects';
		$this->load->view('template/header',$data);

		$data['page'] = "projects";
		$this->load->view('template/base', $data);

		$this->load->view('template/side_nav', $data);
		
		$this->load->view('projects');
		$this->load->view('template/footer');
	}
}
?>