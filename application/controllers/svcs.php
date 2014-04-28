<?php
class Svcs extends CI_Controller {
	function index()
	{
		$data['title'] = 'Services';
		$this->load->view('template/header',$data);

		$data['page'] = "svcs";
		$this->load->view('template/base', $data);
		
		$this->load->view('svcs');
		$this->load->view('template/footer');
	}
}
?>