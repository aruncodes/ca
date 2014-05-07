<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function index($details = "none")
	{
		if(!$this->session->userdata('isa')) {
			$data['title'] = "Login";
			$this->load->view('template/header',$data);
			$this->load->view('template/login', $details);
			$this->load->view('template/footer');
		}
		else{
			$this->load_home();
		}
	}
	private function load_home() {
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);

		$data['page'] = "existingClient";
		$this->load->view('clientdb/side_nav', $data);
		$this->load->view('clientdb/getCid');
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

			if($isadmin == 'x') {
				$details = array(
					'uname'=>$uname,
					'pass'=>$pass,
					'error'=>"Invalid username/password"
					);
				$this->index($details);
				return;
			}
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
		$this->index(array('info'=>"Kindly Contact Administrator with login details"));
	}
}

?>