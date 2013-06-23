<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
 		parent::__construct();
		$this->load->helper("form");
		$this->load->helper("url");
	}

	public function index()	{
		$this->load->view('includes/template', array("content"=>"admin_home"));
	}

	public function talks() {
		$this->load->model("talks_model");
		$talks = $this->talks_model->getAll();
		$this->load->view("includes/template", array("content"=>"all_talks", "talks"=>$talks));
	}

	public function series() {

	}

	public function users() {

	}

	public function editusers() {

	}

	public function edittalk($talkId) {

		if (isset($talkId)){
			$this->load->model("talks_model");
			$talk = $this->talks_model->getTalkById($talkId);
			$this->load->view("includes/template", array("talk"=>$talk, "content"=>"edit_talk"));
		} elseif ($this->input->post()) {
			$this->load->model("talks_model");
			$talk = $this->talks_model->editTalk($this->input->post(), $this->input->post("id"));
			// $this->load->view("includes/template", array("talk"=>$this->input->post("id"), "content"=>"talk_details"));
			redirect("talks/talk/".$this->input->post("id"));
		} else {
			redirect("talks");
		}
	}

	public function talkslist() {

	}

	public function editseries() {

	}

	public function addtalk() {

	}

	public function addseries() {

	}
}