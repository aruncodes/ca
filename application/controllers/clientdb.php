<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientdb extends CI_Controller {
	function checkSession() {
		if($this->session->userdata('loggedin')) {
			return;
		}
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
		$this->existingClient();
	}

	function existingClient($arg = "none")
	{
		$this->checkSession();
		
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$data['page'] = "existingClient";
		$this->load->view('clientdb/side_nav', $data);

		$this->load->model('clientdb_model');
		if($this->input->post('cid')) {
			$cid = $this->input->post('cid');
			if(ctype_digit($cid))
				$cid = 0;
			else
				$cid = $this->cid_model->getRealCID($cid);

			$details = $this->clientdb_model->getData($cid);
			if(isset($details['error'])) {
				$this->session->unset_userdata('cid');
				$details['error'] = "Specified client does not exist";
				$details['cid'] = $this->input->post('cid');
				$this->load->view('clientdb/getCid', $details);
				$this->load->view('template/footer');
				return;
			} else {
				$details['cid'] = $cid;
				$this->session->set_userdata(array('cid'=>$cid));
			}
		}

		if($this->session->userdata('cid')) {
			$cid = $this->session->userdata('cid');
			if(!isset($details))
				$details = $this->clientdb_model->getData($cid);
			$details['cid'] = $cid;

			$this->load->model('team_model');
			$details['teams'] = $this->team_model->getTeams();

			$details['cid'] = $this->cid_model->getInCID($details['cid']);
			$this->load->view('clientdb/getCid', $details);
			$this->load->view('clientdb/clientDetails', $details);
		} else {
			$this->load->view('clientdb/getCid',array('close'=>TRUE));
		}

		$this->load->view('template/footer');
	}

	function addClient($arg = "none")
	{
		$this->checkSession();
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);

		if($arg == "modify")
			$data['page'] = "existingClient";
		else
			$data['page'] = "addNewClient";
		$this->load->view('clientdb/side_nav', $data);
		
		$this->load->model('clientdb_model');
		if($arg == "none") {
			$data['cid'] = "___";
			$data['new'] = TRUE;
			
			$this->load->model('team_model');
			$data['teams'] = $this->team_model->getTeams();
			
			$this->load->view('clientdb/clientDetails', $data);
		} else if ($arg == "add" || $arg == "modify") {
			if($this->input->post('cid') != "___") {
				$clientData['cid'] = $this->input->post('cid');
				$clientData['cid'] = $this->cid_model->getRealCID($clientData['cid']);
			}
			$clientData['name'] = $this->input->post('name');
			$clientData['fatname'] = $this->input->post('fatname');
			$clientData['sex'] = $this->input->post('sex');
			$clientData['dob'] = $this->input->post('dob');
			$clientData['cmpname'] = $this->input->post('cmpname');
			$clientData['cmpdob'] = $this->input->post('cmpdob');
			$clientData['status_cat1'] = $this->input->post('status_cat1');
			$clientData['bus_cat2'] = $this->input->post('bus_cat2');
			$clientData['regno'] = $this->input->post('regno');
			$clientData['email'] = $this->input->post('email');
			$clientData['addr1_gn'] = $this->input->post('addr1_gn');
			$clientData['addr1_ds'] = $this->input->post('addr1_ds');
			$clientData['addr1_st'] = $this->input->post('addr1_st');
			$clientData['addr1_pin'] = $this->input->post('addr1_pin');
			$clientData['addr2_gn'] = $this->input->post('addr2_gn');
			$clientData['addr2_ds'] = $this->input->post('addr2_ds');
			$clientData['addr2_st'] = $this->input->post('addr2_st');
			$clientData['addr2_pin'] = $this->input->post('addr2_pin');
			$clientData['phnos'] = $this->input->post('phnos');
			$clientData['pan'] = $this->input->post('pan');
			$clientData['cmppan'] = $this->input->post('cmppan');
			$clientData['da_name'] = $this->input->post('da_name');
			$clientData['da_exp'] = $this->input->post('da_exp');
			$clientData['it_uname'] = $this->input->post('it_uname');
			$clientData['it_pass'] = $this->input->post('it_pass');
			$clientData['st_uname'] = $this->input->post('st_uname');
			$clientData['st_pass'] = $this->input->post('st_pass');
			$clientData['tid'] = $this->input->post('tid');
			$clientData['stat_filing'] = $this->input->post('stat_filing');
			$clientData['lvdate'] = $this->input->post('lvdate');
			$clientData['bank_name'] = $this->input->post('bank_name');
			$clientData['acno'] = $this->input->post('acno');
			$clientData['micr'] = $this->input->post('micr');
			$clientData['ifsc'] = $this->input->post('ifsc');
			$clientData['branch'] = $this->input->post('branch');
			$clientData['dscindex'] = $this->input->post('dscindex');
			$clientData['signingauth_pan'] = $this->input->post('signingauth_pan');
			$clientData['signingauth_fat_name'] = $this->input->post('signingauth_fat_name');
			$clientData['carry_fwd_losses'] = $this->input->post('carry_fwd_losses');
			$clientData['last_year_of_filing'] = $this->input->post('last_year_of_filing');
			$clientData['vat_audit_applicable'] = $this->input->post('vat_audit_applicable');

			if($arg == "add") {
				$this->clientdb_model->insert($clientData);

				$args = array();
				$args[0] = $clientData['status_cat1'];
				$args[1] = $clientData['bus_cat2'];
				$args[2] = $clientData['email'];
				$args[3] = $clientData['cmpname'];
				$args[4] = $clientData['bank_name'];
				$args[5] = $clientData['acno'];
				$args[6] = $clientData['micr'];
				$args[7] = $clientData['ifsc'];
				$args[8] = $clientData['branch'];
				$args[9] = $clientData['pan'];

				$cid = $this->clientdb_model->getCid($args);
			}
			else {
				$this->clientdb_model->modify($clientData);
				$cid = $this->input->post('cid');
				$cid = $this->cid_model->getRealCID($cid);
			}
			$this->load->model('clientdb_model');
			$this->session->set_userdata(array('cid'=>$cid));
			$details = $this->clientdb_model->getData($cid);
			$details['success'] = "Successful";

			$this->load->model('team_model');
			$details['teams'] = $this->team_model->getTeams();

			$details['cid'] = $this->cid_model->getInCID($details['cid']);
			$this->load->view('clientdb/clientDetails', $details);
		}

		$this->load->view('template/footer');
	}

	function forgotCID()
	{
		$this->checkSession();
		$data['title'] = 'Client DB';
		$this->load->view('template/header', $data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$data['page'] = "existingClient";
		$this->load->view('clientdb/side_nav', $data);

		
		$data=NULL;
		if($this->input->post('pan')) {
			$this->session->unset_userdata('cid');
			$pan = $this->input->post('pan');
			$this->load->model('clientdb_model');
			$data = $this->clientdb_model->getCIDs($pan);
			$data['pan'] = $pan;
		}
		$this->load->view('clientdb/forgotCID', $data);

		$this->load->view('template/footer');
	}

	function setSession($cid)
	{
		$this->checkSession();
		$cid = $this->cid_model->getRealCID($cid);
		$this->load->model('clientdb_model');
		$present = $this->clientdb_model->isPresent($cid);
		if($present == 1)
			$this->session->set_userdata(array('cid'=>$cid));
		else
			$this->session->unset_userdata('cid');
		$this->index();
	}

	function listClients()
	{
		$this->checkSession();
		$data['title'] = 'Client DB';
		$this->load->view('template/header', $data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$data['page'] = "listClients";
		$this->load->view('clientdb/side_nav', $data);

		$this->load->model('clientdb_model');
		$clients = $this->clientdb_model->getCIDs();
		$this->load->view('clientdb/clientList', $clients);

		$this->load->view('template/footer');
	}

	function updateLVDate($cid = "none")
	{
		$this->checkSession();
		if($cid != "none") {
			$cid = $this->cid_model->getRealCID($cid);
			$this->load->model("clientdb_model");
			$this->clientdb_model->updateLVDate($cid);
		}
		$this->index();
	}
}
?>