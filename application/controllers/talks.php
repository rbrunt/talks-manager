<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talks extends CI_Controller {

	public function index()
	{
		$this->load->model("talks_model");
		$talks = $this->talks_model->getAll();
		$this->load->view('all_talks', array("talks"=>$talks));
	}

	public function talk($talkId) {
		$this->load->model("talks_model");
		$talk = $this->talks_model->getTalkById($talkId);
		$this->load->view('talk_details', array("talk"=>$talk));
	}
}