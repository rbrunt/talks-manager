<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $this->load->model("talks_model");
        $talks = $this->talks_model->getRecentTalks(3);
        $this->load->view("includes/template", array("talks"=>$talks, "content"=>"homepage"));
    }

}