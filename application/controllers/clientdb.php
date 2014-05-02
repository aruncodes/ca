<?php
class Clientdb extends CI_Controller {
	function index()
	{
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$this->load->view('template/side_nav', $data);

		$this->load->view('clientdb/clientdb');
		$this->load->view('template/footer');
	}

	function addNew()
	{
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$this->load->view('template/side_nav', $data);

		$this->load->view('clientdb/addNewClient');
		$this->load->view('template/footer');
	}
}
?>