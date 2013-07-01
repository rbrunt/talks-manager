<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Talks_Controller {

	public function index()
	{
		$this->load->view('includes/template', array('content'=>'login/login_page'));
	}
}