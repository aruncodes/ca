<?php
class Inout extends CI_Controller {
	function index()
	{
		$this->inward();
	}
	function inward()
	{
		$data['title'] = 'Inward Outward';
		$this->load->view('template/header',$data);

		$data['page'] = "inout";
		$this->load->view('template/base', $data);

		$data['page'] = "inward";
		$this->load->view('inout/side_nav', $data);
		
		$this->load->view('inout/inward');
		$this->load->view('template/footer');		
	}
	function outward()
	{
		$data['title'] = 'Inward Outward';
		$this->load->view('template/header',$data);

		$data['page'] = "inout";
		$this->load->view('template/base', $data);

		$data['page'] = "outward";
		$this->load->view('inout/side_nav', $data);
		
		$this->load->view('inout/outward');
		$this->load->view('template/footer');
	}
}
?>