<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		$this->teamMgmt();
	}
	function teamMgmt($team_id='-',$msg="none")
	{
		$this->checkSession();
		$this->load->model('team_model');
		$data['teams'] = $this->team_model->getTeams();

		if(count($data['teams']) == 0) {
			$this->addNewTeam();
			return;
		}

		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);


		$data['page'] = "teamMgmt";
		$this->load->view('admin/side_nav', $data);

		if($team_id == '-')
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
		$this->checkSession();
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
		} else if($msg == "reset") {
			$data['msg'] = '<p class="msg info"> Password of employee resetted to his username! </p>';
		}

		if($this->session->userdata['isa'] == 'y') {
			$this->load->view('admin/employeeMgmt',$data);
		} else {
			$this->load->view('admin/noadmin');
		}
		$this->load->view('template/footer');
	}
	function editUser($mode="new",$eid=1,$update_mode="none") {
		$this->checkSession();
		$data['title'] = 'Administration';
		$this->load->view('template/header',$data);
		
		$data['page'] = "admin";
		$this->load->view('template/base', $data);

		$data['page'] = "employeeMgmt";
		$this->load->view('admin/side_nav', $data);

		$this->load->model('empmgmt_model');

		if($update_mode == "change" && $mode=="new") {
			if($this->insertUser()) {
				$data['msg'] = '<p class="msg done"> Successfully added new employee!</p>';
				$mode="show";
				$eid = $this->empmgmt_model->getEID($this->input->post('uname'));
			} else {
				$data['msg'] = '<p class="msg error"> Could not add new employee!</p>';
				$mode="edit";
				unset($eid);
			}
		} else if($update_mode == "change" && $mode=="edit") {
			if($this->updateUser()) {
				$data['msg'] = '<p class="msg done"> Successfully updated employee details!</p>';
				$mode="show";
				$eid = $this->input->post('eid');
			} else {
				$data['msg'] = '<p class="msg error"> Could not edit employee details!</p>';
				$mode="edit";
				unset($eid);
			}
		}

		$data['mode'] = $mode;
		$data['unames'] = $this->empmgmt_model->getCSVUsernames();
		if(isset($eid) && is_numeric($eid)) {
			$data['emp'] = $this->empmgmt_model->getUserDetails($eid);
		}

		if($this->session->userdata['isa'] == 'y') {
			$data['isa'] = TRUE;
			$this->load->view('admin/editUser',$data);
		} else {
			$this->load->view('admin/noadmin');
		}
		$this->load->view('template/footer');
	}
	function insertUser() {

		$this->checkSession();
		$data['name'] = $this->input->post('name');
		$data['sex'] = $this->input->post('sex');
		$data['uname'] = $this->input->post('uname');
		$data['pass'] = $this->input->post('uname');
		$data['isadmin'] = $this->input->post('isadmin');
		$data['dob'] = $this->input->post('dob');
		$data['doj'] = $this->input->post('doj');
		$data['qualification'] = $this->input->post('quali');
		$data['sal_structure'] = $this->input->post('sal');
		$data['leaves'] = $this->input->post('leaves');
		$data['email'] = $this->input->post('email');
		$data['contact'] = $this->input->post('contact');
		$data['em_contact'] = $this->input->post('em_contact');
		$data['addr_gn'] = $this->input->post('addr');
		$data['state'] = $this->input->post('state');
		$data['pin'] = $this->input->post('pin');
		$data['teamid'] = '-';

		$this->load->model('empmgmt_model');
		return $this->empmgmt_model->insertUser($data);
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

	function removeEmployee() {
		$this->checkSession();
		$eid = $this->input->post('eid');
		$this->load->model('empmgmt_model');
		$this->empmgmt_model->removeEmployee($eid);

		$this->employeeMgmt("empdel");
	}
	function makeAdmin() {
		$this->checkSession();
		$eid = $this->input->post('eid');
		$this->load->model('empmgmt_model');
		$this->empmgmt_model->makeAdmin($eid);

		$this->employeeMgmt("madeadmin");
	}
	function removeAdmin() {
		$this->checkSession();
		$eid = $this->input->post('eid');

		$this->load->model('empmgmt_model');
		$this->empmgmt_model->removeAdmin($eid);

		$this->employeeMgmt("remadmin");
	}
	function resetPass() {
		$this->checkSession();
		$uname = $this->input->post('uname');

		$this->load->model('empmgmt_model');
		$this->empmgmt_model->resetPass($uname);

		$this->employeeMgmt("reset");
	}
	function addNewTeam() {
		$this->checkSession();
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
		$this->checkSession();
		$this->load->model('team_model');
		$eid = $this->input->post('eid');

		$this->team_model->removeMemberFromTeam($eid);

		$this->teamMgmt($team_id,"success");
	}
	function removeClient($team_id) {
		$this->checkSession();
		$this->load->model('team_model');
		$cid = $this->input->post('cid');

		$this->team_model->removeClientFromTeam($cid);

		$this->teamMgmt($team_id,"success_client");
	}
	function getNextTeam() {
		$this->checkSession();

	}
	function addMember($team_id) {
		$this->checkSession();
		$this->load->model('team_model');
		$eid = $this->input->post('eid');

		if($team_id == '-') {
			$team_id = $this->input->post('team_id');
		}

		$this->team_model->setTeamForMember($eid,$team_id);

		$this->teamMgmt($team_id,"success_add");
	}

	function addClient($team_id) {
		$this->checkSession();
		$this->load->model('team_model');
		$cid = $this->input->post('cid');

		$this->team_model->setTeamForClient($cid,$team_id);

		$this->teamMgmt($team_id,"success_add_client");
	}
	function deleteClient($cid = "none") {
		$this->checkSession();
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

	private function getGender($gen) {
		if($gen == "M")
			return "Male";
		return "Female";
	}

	private function yesNo($yn) {
		if($yn == "Y")
			return "Yes";
		return "No";
	}

	function generate_xls()	{
	   $this->load->helper('php-excel');
	   $this->db->group_by(array('status_cat1', 'in_cid')); 
	   $query = $this->db->get('client');
	   $fields = (
	   $field_array[] = array ("Client ID", "Name", "Fathers Name",
	    "Gender","DOB","Company Name","Company Start Date",
	    "Legal Structure","Business Category","Registration No.",
	    "Email ID","Office Address","District","State","PIN",
	    "Residence Address","District","State","PIN","Phone Numbers",
	    "Personnel PAN","Company PAN","Digital auth name",
	    "Digital Auth Expiry Date","IT Username","IT Password",
	    "Sales Tax Username","Sales Tax Password","Team assigned",
	    "Status of filling","Last date of Visit","Bank Name",
	    "Account No","MICR Code","IFSC Code","Branch Name",
	    "DSC Index No.","Signing Authority PAN",
	    "Signing Authority's Father Name",
	    "Carry Forward Lossess Details","Last year of Filling",
	    "VAT Audit Applicable")
	                   );
	   foreach ($query->result() as $row)
	         {
	         $data_array[] = array( 
	         	$row->status_cat1[0].$row->in_cid,$row->name,$row->fatname,$this->getGender($row->sex),$row->dob,$row->cmpname,
	         	$row->cmpdob,$row->status_cat1,$row->bus_cat2,$row->regno,$row->email,
	         	$row->addr1_gn,$row->addr1_ds,$row->addr1_st,$row->addr1_pin,
	         	$row->addr2_gn,$row->addr2_ds,$row->addr2_st,$row->addr2_pin,
	         	$row->phnos,$row->pan,$row->cmppan,$row->da_name,$row->da_exp,
	         	$row->it_uname,$row->it_pass,$row->st_uname,$row->st_pass,$row->tid,
	         	$this->yesNo($row->stat_filing),$row->lvdate,$row->bank_name,$row->acno,$row->micr,
	         	$row->ifsc,$row->branch,$row->dscindex,$row->signingauth_pan,
	         	$row->signingauth_fat_name,$row->carry_fwd_losses,
	         	$row->last_year_of_filing,$this->yesNo($row->vat_audit_applicable)
	          );
	         }
	   $xls = new Excel_XML;
	   $xls->addArray ($field_array);
	   if(isset($data_array))
	   		$xls->addArray ($data_array);
	   $xls->generateXML ( "client_list" );
	}
}
?>