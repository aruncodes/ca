<?php
class Filemgmt extends CI_Controller {
	function index()
	{
		$data['title'] = 'File Management';
		$this->load->view('template/header',$data);

		$data['page'] = "filemgmt";
		$this->load->view('template/base', $data);
		$this->load->view('template/side_nav', $data);
		
		$this->load->view('filemgmt');
		$this->load->view('template/footer');
	}
}
?>