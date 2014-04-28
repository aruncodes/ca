<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function index()
	{
		if(!$this->session->userdata('isa')) {
			$data['title'] = "Login";
			$this->load->view('template/header',$data);
			$this->load->view('template/login');
			$this->load->view('template/footer');
		}
		else{
			$this->load_home();
		}
	}
	private function load_home() {
		$data['title'] = "Home";
		$this->load->view('template/header',$data);
		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$this->load->view('clientdb/clientdb');
		$this->load->view('template/footer');
	}
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
	function details()
	{
		if(!$this->session->userdata('isa')) {
			$this->load->model('userdetails');
			$uname = $this->input->post('uname');
			$pass = $this->input->post('pass');
			if($uname && $pass)
				$isadmin = $this->userdetails->login($uname, $pass);
			else
				exit('Unauthorized access. No thepp allowed');

			if($isadmin == 'x')
				echo "DO something when the user doesn't exist";
			else {
				$userdata = array(
					'uname' => $uname,
					'pass' => $pass,
					'isa' => $isadmin
				);
				$this->session->set_userdata($userdata);
				$this->load_home();
			}
		} else {
			$this->load_home();
		}
	}
	function forgotpass()
	{
		$this->load->view('forgotpass');
	}
}

?>