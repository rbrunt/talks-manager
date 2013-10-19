<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends Talks_Controller {

    public function index() {
        $this->load->view("includes/template", array("content"=>"errors/error_404"));
    }

    public function cookies() {
    	$this->load->view("includes/template", array("title"=>"Cookies", "content"=>"cookies"));
    }

    public function copyright() {
    	$this->load->view("includes/template", array("content"=>"copyright", "title"=>"Copyright Policy"));
    }

}