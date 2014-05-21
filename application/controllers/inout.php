<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inout extends CI_Controller {
	function checkSession() {
		if($this->session->userdata('loggedin'))
			return;
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
	function index()
	{
		$this->checkSession();
		$cid = $this->session->userdata('cid');

		if($cid == FALSE)
			$this->inward();
		else
			$this->show("in",$cid);
	}
	function inward()
	{
		$this->checkSession();
		$cid = $this->session->userdata('cid');

		if($cid == FALSE) {

			$data['title'] = 'Inward Outward';
			$this->load->view('template/header',$data);

			$data['page'] = "inout";
			$this->load->view('template/base', $data);

			$data['page'] = "inward";
			$this->load->view('inout/side_nav', $data);
			
			$data['page_end'] = TRUE;
			$data['title'] = "Inward Documents";

			$this->load->view('inout/inward',$data);
			$this->load->view('template/footer');
		}	else {
			$this->show("in",$cid);
		}
	}

	function add_doc($arg = "none")
	{
		$this->checkSession();
		$data['title'] = 'Add Document';
		$this->load->view('template/header',$data);

		$data['page'] = "inout";
		$this->load->view('template/base', $data);

		$data['page'] = "add_doc";
		$this->load->view('inout/side_nav', $data);
		
		if($arg == "fromRem") {
			$data['msg'] = '<p class="msg done">Document deleted</p>';
		} else if($this->input->post('submit') == "Add") {
			$this->load->model('inout_model');
			$doc_name = $this->input->post('doc_name');
			$cat = $this->input->post('doc_type');
			if($this->inout_model->addNewDoc($doc_name,$cat))
				$data['msg'] = '<p class="msg done"> New document added successfully!!</p>';
			else
				$data['msg'] = '<p class="msg error">Document already added</p>';
		}

		$data['title'] = "Add new document";

		$this->load->model('inout_model');
		$data['inward'] = $this->inout_model->get_inward();
		$data['outward'] = $this->inout_model->get_outward();

		$this->load->view('inout/add_doc',$data);
		$this->load->view('template/footer');		
	}

	function rem_doc($id = "none")
	{
		$this->checkSession();
		if($id != "none"){
			$this->load->model('inout_model');
			$this->inout_model->delDocName($id);
			$this->add_doc("fromRem");
		} else
			$this->add_doc();
	}

	function outward()
	{
		$this->checkSession();
		$cid = $this->session->userdata('cid');

		if($cid == FALSE) {
			$data['title'] = 'Inward Outward';
			$this->load->view('template/header',$data);

			$data['page'] = "inout";
			$this->load->view('template/base', $data);

			$data['page'] = "outward";
			$this->load->view('inout/side_nav', $data);
			
			$data['page_end'] = TRUE;
			$data['title'] = "Outward Documents";


			$this->load->view('inout/inward',$data);
			$this->load->view('template/footer');
		}	else {
			$this->show("out",$cid);
		}
	}

	function show($p="in", $cid=0, $msg = "none") 
	{		
		$this->checkSession();

		if($cid == 0) {
			$cid = $this->input->post('cid');
			$this->session->set_userdata(array('cid'=>$cid));
		}

		$data['title'] = 'Inward Outward';
		$this->load->view('template/header',$data);

		$data['page'] = "inout";
		$this->load->view('template/base', $data);

		if($p == "in") {
			$data['page'] = "inward";
		} else if ($p == "out") {
			$data['page'] = "outward";
		}

		$data['cid'] = $cid;
		$this->load->view('inout/side_nav', $data);
		
		$this->load->model('inout_model');
		if($p == "in") {
			$data['title'] = "Inward Documents";
			$result = $this->inout_model->get_inward($cid);
		}	else if ($p == "out") {
			$data['title'] = "Outward Documents";
			$result = $this->inout_model->get_outward($cid);
		}
		
		if($result == FALSE)
			$this->session->unset_userdata('cid');

		$data['result'] = $result;
		$data['page_end'] = FALSE;
		$data['cid'] = $cid;
		if ($p == "in" ) {
			$data['INOUT'] = array(0=>$this->inout_model->getInwardAddOptions($cid,"INA"),
									1 => $this->inout_model->getInwardAddOptions($cid,"INN"),
									2 => $this->inout_model->getInwardAddOptions($cid,"INO"));
		} else {
			$data['INOUT'] = array(0=>$this->inout_model->getInwardAddOptions($cid,"OUT"));
		}
		$data['p'] = $p;		
		$data['msg'] = '';

		$this->load->view('inout/inward',$data);
		if($msg == "deleted") {
			$data['msg'] ='<p class="msg done">Successfully deleted!</p>';			
		} else if( $msg == "delete_error") {
			$data['msg'] ='<p class="msg error">Could not remove document!</p>';	
		} else if( $msg == "added") {
			$data['msg'] ='<p class="msg done">Successfully added document!</p>';	
		} else if( $msg == "add_error") {
			$data['msg'] ='<p class="msg error">Could not add document!</p>';	
		}
		$this->load->view('inout/msg_echo',$data);
		$this->load->view('inout/show_data',$data);
		$this->load->view('template/footer');

	}

	function remove($p="in",$cid=100,$inout_id = -1) 
	{
		$this->checkSession();
		if($inout_id == -1) {
			$inout_id = $this->input->post('inout_id');
		}

		if($inout_id > 0) {
			$this->load->model('inout_model');
			$this->inout_model->removeDoc($inout_id);
			$this->show($p,$cid,"deleted");
		} else
			$this->show($p,$cid,"delete_error");
	}

	function add($p="in",$cid=100) 
	{		
		$this->checkSession();
		$doc_id = $this->input->post('new_doc');
		
		if($doc_id > 0) {
			$this->load->model('inout_model');
			$this->inout_model->addDoc($cid,$doc_id);
			$this->show($p,$cid,"added");
		} else {
			$this->show($p,$cid,"add_error");
		}
	}

	function printDocs($cid)
	{
		$this->checkSession();
		$this->load->model('inout_model');
		$details['inward'] = $this->inout_model->get_inward($cid);
		$details['outward'] = $this->inout_model->get_outward($cid);

		$this->load->model('clientdb_model');
		$details['client'] = $this->clientdb_model->getData($cid);
		$this->load->view('inout/printDocs', $details);
	}

	function forgotCID($page)
	{
		$this->checkSession();
		$data['title'] = 'Inward Outward';
		$this->load->view('template/header',$data);

		$data['page'] = "inout";
		$this->load->view('template/base', $data);
		
		$data['page'] = $page;
		$this->load->view('inout/side_nav', $data);

		
		$data=NULL;
		if($this->input->post('pan')) {
			$this->session->unset_userdata('cid');
			$pan = $this->input->post('pan');
			$this->load->model('clientdb_model');
			$data = $this->clientdb_model->getCIDs($pan);
			$data['pan'] = $pan;
		}
		$data['page'] = $page;
		$this->load->view('inout/forgotCID', $data);
		$this->load->view('template/footer');
	}

	function setSession($cid, $page = "none")
	{
		$this->checkSession();
		$this->load->model('clientdb_model');
		$present = $this->clientdb_model->isPresent($cid);
		if($present == 1)
			$this->session->set_userdata(array('cid'=>$cid));
		else
			$this->session->unset_userdata('cid');

		if($page == "none")
			$this->index();
		else if($page == "inward")
			$this->inward();
		else if($page == "outward")
			$this->outward();
	}
}
?>