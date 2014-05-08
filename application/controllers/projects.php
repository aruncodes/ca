<?php
class Projects extends CI_Controller {
	function index()
	{
		$this->existingTeams();
	}
	function existingTeams($team_id=1,$msg="none")
	{
		$data['title'] = 'Projects';
		$this->load->view('template/header',$data);

		$data['page'] = "projects";
		$this->load->view('template/base', $data);

		$this->load->model('team_model');
		$data['teams'] = $this->team_model->getTeams();
				
		$data['page'] = "existingTeams";
		$this->load->view('projects/side_nav', $data);
		
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

		$this->load->view('projects/existingTeams',$data);

		$this->load->view('template/footer');
	}
	function addNewTeam()
	{
		$data['title'] = 'Projects';
		$this->load->view('template/header',$data);

		$data['page'] = "projects";
		$this->load->view('template/base', $data);

		$data['page'] = "addNewTeam";
		$this->load->view('projects/side_nav', $data);
		
		$this->load->model('team_model');
		$data['non_members'] = $this->team_model->getNoTeamMembers();

		$this->load->view('projects/addNewTeam',$data);
		$this->load->view('template/footer');
	}
	function removeMember($team_id) {
		$this->load->model('team_model');
		$eid = $this->input->post('eid');

		$this->team_model->removeMemberFromTeam($eid);

		$this->existingTeams($team_id,"success");
	}
	function removeClient($team_id) {
		$this->load->model('team_model');
		$cid = $this->input->post('cid');

		$this->team_model->removeClientFromTeam($cid);

		$this->existingTeams($team_id,"success_client");
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

		$this->existingTeams($team_id,"success_add");
	}

	function addClient($team_id) {
		$this->load->model('team_model');
		$eid = $this->input->post('cid');

		$this->team_model->setTeamForClient($eid,$team_id);

		$this->existingTeams($team_id,"success_add_client");
	}
}
?>