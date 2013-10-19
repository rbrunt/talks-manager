<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends Talks_Controller {

	public function __construct() {
 		parent::__construct();
		$this->load->helper("form");
	}

	public function index()	{
	}

	public function error_404() {
		$this->output->set_status_header("404");
		$this->load->view("includes/template", array("content"=>"errors/error_404", "title"=>"Page not found"));
	}
}
