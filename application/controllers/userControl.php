<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserControl extends CI_Controller {
	function checkSession() {
		if($this->session->userdata('loggedin'))
			;
		else {
			$this->session->sess_destroy();
			$data['title'] = "Login";
			$details['error'] = "Please login first!";

			echo $this->load->view('template/header',$data,TRUE);
			echo $this->load->view('template/login', $details,TRUE);
			echo $this->load->view('template/footer',array(),TRUE);
			exit;
		}
	}
	function index() {
		$this->checkSession();
		$this->changePassword();
	}

	function changePassword() {
		$this->checkSession();
		$this->load->model('userdetails');
		$currentUser = $this->session->userdata('uname');
		$currentPass = $this->userdetails->getPass($currentUser);

		if($this->input->post('currentPassword')) {
			$inputPass = $this->input->post('currentPassword');
			$newPassword = $this->input->post('newPassword');

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

		$this->load->view('template/footer');
	}
	function showUser($uname="--") {
		$this->checkSession();

		if($uname == "--")
			$uname = $this->session->userdata('uname');

		$data['title'] = 'Account Settings';
		$this->load->view('template/header',$data);
		
		$data['page'] = "accSettings";
		$this->load->view('template/base', $data);

		$data['page'] = "viewDetails";
		$this->load->view('accSettings/side_nav', $data);

		$this->load->model('empmgmt_model');

		$data['mode'] = "show";
		$eid = $this->empmgmt_model->getEID($uname);
		if(isset($eid) && is_numeric($eid)) {
			$data['emp'] = $this->empmgmt_model->getUserDetails($eid);
		}

		if($this->session->userdata('isa') == 'y') {
			$data['isa'] = TRUE;
		}

		$this->load->view('admin/editUser',$data);
		$this->load->view('template/footer');
	}
	function editUser($uname="--",$action="none") {
		$this->checkSession();

		if($uname == "--")
			$uname = $this->session->userdata('uname');

		$data['title'] = 'Account Settings';
		$this->load->view('template/header',$data);
		
		$data['page'] = "accSettings";
		$this->load->view('template/base', $data);

		$data['page'] = "editDetails";
		$this->load->view('accSettings/side_nav', $data);

		$this->load->model('empmgmt_model');

		$data['mode'] = "edit";

		if($action == "update") {
			if($this->updateUser()) {
				$data['msg'] = '<p class="msg done"> Successfully updated profile!</p>';
				$data['mode'] = "show";
			} else {
				$data['msg'] = '<p class="msg error"> Could not updated profile!</p>';
				$data['mode'] = "edit";
			}
		}

		$eid = $this->empmgmt_model->getEID($uname);
		if(isset($eid) && is_numeric($eid)) {
			$data['emp'] = $this->empmgmt_model->getUserDetails($eid);
		}

		if($this->session->userdata('isa') == 'y') {
			$data['isa'] = TRUE;
		}

		$this->load->view('admin/editUser',$data);
		$this->load->view('template/footer');
	}
	function updateUser() {
		$this->checkSession();

		$data['name'] = $this->input->post('name');
		$data['sex'] = $this->input->post('sex');
		if($this->input->post('isadmin'))
			$data['isadmin'] = $this->input->post('isadmin');
		$data['dob'] = $this->input->post('dob');
		$data['doj'] = $this->input->post('doj');
		$data['qualification'] = $this->input->post('quali');
		if($this->input->post('sal'))
			$data['sal_structure'] = $this->input->post('sal');
		if($this->input->post('leaves'))
			$data['leaves'] = $this->input->post('leaves');
		$data['email'] = $this->input->post('email');
		$data['contact'] = $this->input->post('contact');
		$data['em_contact'] = $this->input->post('em_contact');
		$data['addr_gn'] = $this->input->post('addr');
		$data['state'] = $this->input->post('state');
		$data['pin'] = $this->input->post('pin');

		$eid = $this->input->post('eid');

		$this->load->model('empmgmt_model');
		return $this->empmgmt_model->updateUser($data,$eid);
	}
}
?>