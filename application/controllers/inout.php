<?php
class Inout extends CI_Controller {
	function index()
	{
		$this->inward();
	}
	function inward()
	{

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
	}

	function outward()
	{
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
	}

	function show($p="in", $cid=0) {
		
		if($cid == 0)
			$cid = $this->input->post('cid');

		$data['title'] = 'Inward Outward';
		$this->load->view('template/header',$data);

		$data['page'] = "inout";
		$this->load->view('template/base', $data);

		if($p == "in") {
			$data['page'] = "inward";
		} else if ($p == "out") {
			$data['page'] = "outward";
		}
		$this->load->view('inout/side_nav', $data);
		
		$this->load->model('inout_model');
		if($p == "in") {
			$data['title'] = "Inward Documents";
			$result = $this->inout_model->get_inward($cid);
		}	else if ($p == "out") {
			$data['title'] = "Outward Documents";
			$result = $this->inout_model->get_outward($cid);
		}
		
		$data['result'] = $result;
		$data['page_end'] = FALSE;
		$data['cid'] = $cid;

		$this->load->view('inout/inward',$data);
		$this->load->view('inout/show_data',$data);
		$this->load->view('template/footer');

	}

}
?>