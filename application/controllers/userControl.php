<?php
class UserControl extends CI_Controller {
	function index() {
		$this->changePassword();
	}

	function changePassword() {
		$this->load->model('userdetails');
		$currentUser = $this->session->userdata('uname');
		$currentPass = $this->userdetails->getPass($currentUser);

		if($this->input->post('currentPassword')) {
			$inputPass = $this->input->post('currentPassword');
			$newPassword = $this->input->post('newPassword');
			//$newPassConf = $this->input->post('newPasswordConfirm');

			if($inputPass == $currentPass) {
				$data['msg'] = "Password Changed Successfully for '$currentUser'";
				$data['style'] = "msg done";

				$this->userdetails->changePassword($currentUser, $newPassword);
			} else {
				$data['msg'] = "Current password incorrect";
				$data['style'] = "msg error";				
			}
		}

		$data['title'] = 'Account Settings';
		$this->load->view('template/header',$data);
		
		$data['page'] = "accSettings";
		$this->load->view('template/base', $data);

		$data['page'] = "changePassword";
		$this->load->view('accSettings/side_nav', $data);

		$this->load->view('accSettings/changePassword');
	}
}
?>