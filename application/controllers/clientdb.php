<?php
class Clientdb extends CI_Controller {
	function index()
	{
		$this->existingClient();
	}

	function existingClient($arg = "none")
	{
		$data['title'] = 'Client DB';
		$this->load->view('template/header',$data);

		$data['page'] = "clientdb";
		$this->load->view('template/base', $data);
		$data['page'] = "existingClient";
		$this->load->view('clientdb/side_nav', $data);


		if($arg == "none") {
			$this->load->view('clientdb/getCid');
		} else if($arg == "show") {
			$this->load->model('clientdb_model');
			$details = $this->clientdb_model->getData($this->input->post('cid'));
			if(isset($details['error'])) {
				$details['error'] = "Specified client does not exist";
				$details['cid'] = $this->input->post('cid');
				$this->load->view('clientdb/getCid', $details);
			}
			else
				$this->load->view('clientdb/clientDetails', $details);
		}
		$this->load->view('template/footer');
	}

	function addClient($arg = "none")
	{
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
			$data['cid'] = $this->clientdb_model->getCid();
			$data['new'] = TRUE;
			$this->load->view('clientdb/clientDetails', $data);
		} else if ($arg == "add" || $arg == "modify") {
			$clientData['cid'] = $this->input->post('cid');
			$clientData['name'] = $this->input->post('name');
			$clientData['sex'] = $this->input->post('sex');
			$clientData['dob'] = $this->input->post('dob');
			$clientData['cmpname'] = $this->input->post('cmpname');
			$clientData['status_cat1'] = $this->input->post('status_cat1');
			$clientData['bus_cat2'] = $this->input->post('bus_cat2');
			$clientData['regno'] = $this->input->post('regno');
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
			$clientData['da_name'] = $this->input->post('da_name');
			$clientData['da_exp'] = $this->input->post('da_exp');
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

			if($arg == "add") {
				$this->clientdb_model->insert($clientData);
			}
			else {
				$this->clientdb_model->modify($clientData);
			}
			$this->load->model('clientdb_model');
			$details = $this->clientdb_model->getData($this->input->post('cid'));
			$details['success'] = "Successful";
			$this->load->view('clientdb/clientDetails', $details);
		}

		$this->load->view('template/footer');
	}
}
?>