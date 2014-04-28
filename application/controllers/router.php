<?php
class Router extends CI_Controller {
	function r($arg) {
		$this->load->view($arg);
	}
}
?>