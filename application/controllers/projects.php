<?php
class Projects extends CI_Controller {
	function index()
	{
		$this->existingTeams();
	}
	function existingTeams()
	{
		$data['title'] = 'Projects';
		$this->load->view('template/header',$data);

		$data['page'] = "projects";
		$this->load->view('template/base', $data);

		$data['page'] = "existingTeams";
		$this->load->view('projects/side_nav', $data);
		
		$this->load->view('projects/existingTeams');
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
		
		$this->load->view('projects/addNewTeam');
		$this->load->view('template/footer');
	}
}
?>