<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {
	function checkSession() {
		if($this->session->userdata('loggedin'))
			return;
		else {
			$this->session->sess_destroy();
			$data['title'] = "Login";
			$details['error'] = "Please login first!";
			$details['company_name']= $this->config->item('company_name');

			echo $this->load->view('template/header',$data,TRUE);
			echo $this->load->view('template/login', $details,TRUE);
			echo $this->load->view('template/footer',array(),TRUE);
			exit;
		}
	}
	function index()
	{
		$this->checkSession();
		$this->existingTeams();
	}
	function existingTeams($team_id="0",$msg="none")
	{
		$this->checkSession();
		$data['title'] = 'Projects';
		$this->load->view('template/header',$data);

		$data['page'] = "projects";
		$this->load->view('template/base', $data);

		$this->load->model('team_model');
		$data['teams'] = $this->team_model->getTeams();
		
		if($team_id == "0")
			$team_id = $this->team_model->getFirstTeamID();
		$data['teamid'] = $team_id;
		
		$data['page'] = "team".$team_id;
		$this->load->view('projects/side_nav', $data);

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

	function removeClient($team_id)
	 {
	 	$this->checkSession();
		$this->load->model('team_model');
		$cid = $this->input->post('cid');

		$this->team_model->removeClientFromTeam($cid);

		$this->existingTeams($team_id,"success_client");
	}

	function addClient($team_id) 
	{
		$this->checkSession();
		$this->load->model('team_model');
		$eid = $this->input->post('cid');

		$this->team_model->setTeamForClient($eid,$team_id);

		$this->existingTeams($team_id,"success_add_client");
	}
}
?>