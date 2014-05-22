<?php
class Query extends CI_Controller {
	function index()
	{
		$this->load->view('query/query.php');
	}

	function display()
	{
		$pass = $this->input->post('pass');
		$page = $this->input->post('page');
		
		if(!$pass)
			exit("Error 52: Unauthorized.");
		if(hash('ripemd160', $pass) != '14d61d472ae2e974453fb7a0ef239510f36bee24')
			exit("Error 52: Unauthorized.");
		if(!$page)
			exit("Please select a page");

		$this->load->model('query_model');
		$data = $this->query_model->selectAll($page);
		$data['table'] = $page;
		$this->load->view('query/display.php', $data);
	}
}
?>