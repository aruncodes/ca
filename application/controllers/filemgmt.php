<?php
class Filemgmt extends CI_Controller {
	function index()
	{
		$this->showFiles();
	}

	function addFile()
	{
		$details['cid'] = $this->session->userdata('cid');
		$details['fid'] = $this->input->post('fid');
		$details['file_type'] = $this->input->post('file_type');
		$details['priority'] = $this->input->post('priority');
		$details['location'] = $this->input->post('location');

		$this->load->model('file_model');
		$this->file_model->insert($details);

		$this->showFiles("Added file");

	}

	function showFiles($msg = "none")
	{
		$data['title'] = 'File Management';
		$this->load->view('template/header',$data);

		$data['page'] = "filemgmt";
		$this->load->view('template/base', $data);

		$data['page'] = 'viewFiles';
		$this->load->view('filemgmt/side_nav', $data);

		if($this->input->post('cid')) {
			$this->load->model('clientdb_model');
			$cid = $this->input->post('cid');
			$present = $this->clientdb_model->isPresent($cid);
			if($present == 0) {
				$this->session->unset_userdata('cid');
				$details['error'] = "Specified client does not exist";
				$details['cid'] = $cid;
				$this->load->view('filemgmt/getCid', $details);
				return;
			} else {
				$details['cid'] = $cid;
				$this->session->set_userdata(array('cid'=>$cid));
			}
		}

		if($this->session->userdata('cid')) {
			$cid = $this->session->userdata('cid');

			$details['cid'] = $cid;
			$this->load->view('filemgmt/getCid', $details);

			$this->load->model('file_model');
			$this->load->model('clientdb_model');
			$data['files'] = $this->file_model->getFiles($cid);
			$data['clientData'] = $this->clientdb_model->getData($cid);
			if($msg != "none")
				$data['msg'] = $msg;
			$data['fid'] = $this->file_model->getFid($cid);
			$this->load->view('filemgmt/viewFiles', $data);
		} else {
			$this->load->view('filemgmt/getCid',array('close'=>TRUE));
		}

		$this->load->view('template/footer');
	}
	
	function remFile()
	{
		$id = $this->input->post('id');
		if($id) {
			$this->load->model("file_model");
			$this->file_model->remFile($id);
		}
		$this->showFiles("Deleted file");
	}

	function modFile()
	{
		$id = $this->input->post('id');
		$data['file_type'] = $this->input->post('file_type');
		$data['priority'] = $this->input->post('priority');
		$data['location'] = $this->input->post('location');

		$this->load->model('file_model');
		$this->file_model->modify($id, $data);

		$this->showFiles("Modified file");
	}

	function forgotCID()
	{
		$data['title'] = 'File Management';
		$this->load->view('template/header',$data);

		$data['page'] = "filemgmt";
		$this->load->view('template/base', $data);

		$data['page'] = 'viewFiles';
		$this->load->view('filemgmt/side_nav', $data);

		$data=NULL;
		if($this->input->post('pan')) {
			$this->session->unset_userdata('cid');
			$pan = $this->input->post('pan');
			$this->load->model('clientdb_model');
			$data = $this->clientdb_model->getCIDs($pan);
			$data['pan'] = $pan;
		}
		$this->load->view('filemgmt/forgotCID', $data);
	}

	function setSession($cid)
	{
		$this->session->set_userdata(array('cid'=>$cid));
		$this->index();
	}
}
?>