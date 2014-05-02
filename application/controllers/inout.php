<?php
class Inout extends CI_Controller {
	function index()
	{
		$data['title'] = 'Inward Outward';
		$this->load->view('template/header',$data);

		$data['page'] = "inout";
		$this->load->view('template/base', $data);
		$this->load->view('template/side_nav', $data);
		
		$this->load->view('inout');
		$this->load->view('template/footer');
	}
}
?>