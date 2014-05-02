<?php
class Clientdb extends CI_Controller {
/*	function index()
	{
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$this->load->view('template/side_nav', $data);

		$this->load->view('clientdb/existingClient');
		$this->load->view('template/footer');
	}
	*/
	function index()
	{
		$this->existingClient();
	}

	function existingClient()
	{
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$data['page'] = "existingClient";
		$this->load->view('clientdb/side_nav', $data);

		$this->load->view('clientdb/existingClient');
		$this->load->view('template/footer');
	}

	function addNewClient()
	{
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		
		$data['page'] = "addNewClient";
		$this->load->view('clientdb/side_nav', $data);

		$this->load->view('clientdb/addNewClient');
		$this->load->view('template/footer');
	}
}
?>