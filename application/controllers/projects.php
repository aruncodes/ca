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
		
		$data['page'] = "team".$team_id;
		$this->load->view('projects/side_nav', $data);
		
		$data['teamid'] = $team_id;

		$data['members'] = $this->team_model->getMembers($team_id);		
		$data['clients'] = $this->team_model->getClients($team_id);
		$data['non_clients'] = $this->team_model->getNoTeamClients();

		if($msg == "success_client")
			$data['msg'] = '<p class="msg done"> Successfully removed client from team </p>';
		else if($msg == "success_add_client")
			$data['msg'] = '<p class="msg done"> Successfully added client to the team </p>';

		$this->load->view('projects/existingTeams',$data);

		$this->load->view('template/footer');
	}

	function removeClient($team_id) {
		$this->load->model('team_model');
		$cid = $this->input->post('cid');

		$this->team_model->removeClientFromTeam($cid);

		$this->existingTeams($team_id,"success_client");
	}

	function addClient($team_id) {
		$this->load->model('team_model');
		$eid = $this->input->post('cid');

		$this->team_model->setTeamForClient($eid,$team_id);

		$this->existingTeams($team_id,"success_add_client");
	}
}
?>