<?php
class Admin extends CI_Controller {
	function index()
	{
		$this->teamMgmt();
	}
	function teamMgmt($team_id=0,$msg="none")
	{
		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$this->load->model('team_model');
		$data['teams'] = $this->team_model->getTeams();

		$data['page'] = "teamMgmt";
		$this->load->view('admin/side_nav', $data);

		if($team_id == 0)
			$team_id = $this->team_model->getFirstTeamID();
		$data['teamid'] = $team_id;

		$data['members'] = $this->team_model->getMembers($team_id);
		$data['non_members'] = $this->team_model->getNoTeamMembers();
		$data['clients'] = $this->team_model->getClients($team_id);
		$data['non_clients'] = $this->team_model->getNoTeamClients();

		if($msg == "success")
			$data['msg'] = '<p class="msg done"> Successfully removed employee from team </p>';
		else if($msg == "success_client")
			$data['msg'] = '<p class="msg done"> Successfully removed client from team </p>';
		else if($msg == "success_add")
			$data['msg'] = '<p class="msg done"> Successfully added employee to the team </p>';
		else if($msg == "success_add_client")
			$data['msg'] = '<p class="msg done"> Successfully added client to the team </p>';
		
		if($this->session->userdata['isa'] == 'y') {
			$this->load->view('admin/teamMgmt',$data);
		} else {
			$this->load->view('admin/noadmin');
		}
		$this->load->view('template/footer');
	}
	function employeeMgmt($msg="none")
	{
		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$data['page'] = "employeeMgmt";
		$this->load->view('admin/side_nav', $data);

		$this->load->model('empmgmt_model');
		$data['emps'] = $this->empmgmt_model->getEmployees();
		
		if($msg == "madeadmin") {
			$data['msg'] = '<p class="msg done"> Successfully made the employee as administrator. </p>';
		} else if($msg == "remadmin") {
			$data['msg'] = '<p class="msg info"> Successfully removed the employee from administrator group. </p>';
		}
		else if($msg == "empdel") {
			$data['msg'] = '<p class="msg info"> Successfully removed the employee. </p>';
		}

		if($this->session->userdata['isa'] == 'y') {
			$this->load->view('admin/employeeMgmt',$data);
		} else {
			$this->load->view('admin/noadmin');
		}
		$this->load->view('template/footer');
	}
	function editUser($eid) {
		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$data['page'] = "employeeMgmt";
		$this->load->view('admin/side_nav', $data);

		$this->load->model('empmgmt_model');

		if($this->session->userdata['isa'] == 'y') {
			$this->load->view('admin/editUser',$data);
		} else {
			$this->load->view('admin/noadmin');
		}
		$this->load->view('template/footer');
	}
	function removeEmployee() {
		$eid = $this->input->post('eid');
		$this->load->model('empmgmt_model');
		$this->empmgmt_model->removeEmployee($eid);

		$this->employeeMgmt("empdel");
	}
	function makeAdmin() {
		$eid = $this->input->post('eid');
		$this->load->model('empmgmt_model');
		$this->empmgmt_model->makeAdmin($eid);

		$this->employeeMgmt("madeadmin");
	}
	function removeAdmin() {
		$eid = $this->input->post('eid');

		$this->load->model('empmgmt_model');
		$this->empmgmt_model->removeAdmin($eid);

		$this->employeeMgmt("remadmin");
	}
	function addNewTeam()
	{
		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$data['page'] = "teamMgmt";

		$this->load->model('team_model');
		$data['teams'] = $this->team_model->getTeams();
		
		$this->load->view('admin/side_nav', $data);
		
		$data['non_members'] = $this->team_model->getNoTeamMembers();
		
		if($this->session->userdata['isa'] == 'y') {
			$this->load->view('admin/addNewTeam',$data);			
		} else {
			$this->load->view('admin/noadmin');
		}

		$this->load->view('template/footer');
	}

	function removeMember($team_id) {
		$this->load->model('team_model');
		$eid = $this->input->post('eid');

		$this->team_model->removeMemberFromTeam($eid);

		$this->teamMgmt($team_id,"success");
	}
	function removeClient($team_id) {
		$this->load->model('team_model');
		$cid = $this->input->post('cid');

		$this->team_model->removeClientFromTeam($cid);

		$this->teamMgmt($team_id,"success_client");
	}
	function getNextTeam() {

	}
	function addMember($team_id) {
		$this->load->model('team_model');
		$eid = $this->input->post('eid');

		if($team_id == 0) {
			$team_id = $this->input->post('team_id');
		}

		$this->team_model->setTeamForMember($eid,$team_id);

		$this->teamMgmt($team_id,"success_add");
	}

	function addClient($team_id) {
		$this->load->model('team_model');
		$eid = $this->input->post('cid');

		$this->team_model->setTeamForClient($eid,$team_id);

		$this->teamMgmt($team_id,"success_add_client");
	}
	function deleteClient($cid = "none") {
		$this->load->model('clientdb_model');

		if($cid != "none") {
			$this->clientdb_model->deleteClient($cid);
			if($this->session->userdata('cid') == $cid)
				$this->session->unset_userdata('cid');
		}

		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$data['page'] = "delClient";
		$this->load->view('admin/side_nav', $data);
		
		if($this->session->userdata['isa'] == 'y') {
			$data = $this->clientdb_model->getCIDs();
			$this->load->view('admin/deleteClient',$data);			
		} else {
			$this->load->view('admin/noadmin');
		}

		$this->load->view('template/footer');
	}
}
?>