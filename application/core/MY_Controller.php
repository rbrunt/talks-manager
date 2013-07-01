<?php 

class Talks_Controller extends CI_Controller {

	protected $isLoggedIn;

    function __construct() {
        parent::__construct();
        $userid = $this->session->userdata("userid");
        $this->isLoggedIn = ($this->session->userdata("userid")) ? true : false;
        $this->load->vars(array("isLoggedIn"=>$this->isLoggedIn));
    }

    function sendHome() {
    	//$this->session->set_flashdata("alert", array("error"=>"you need to be <a href=\"".base_url("admin/login")."\">logged in</a> to go there!"));
		$this->session->set_flashdata("alert", array("error"=>"you need to be logged in to go there!"));
    	redirect("/admin/login");
    }

    function checkLogin() {
    	if(!$this->isLoggedIn) {
    		$this->sendHome();
    		return false;
    	} else {
    		return true;
    	}
    }
}