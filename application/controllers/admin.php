<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
 		parent::__construct();
		$this->load->helper("form");
		$this->load->helper("url");
	}

	public function index()	{
		$this->load->view('includes/template', array("content"=>"admin/home"));
	}

	public function talks() {
		$this->load->model("talks_model");
		$talks = $this->talks_model->getAll();
		$this->load->view("includes/template", array("content"=>"all_talks", "talks"=>$talks));
	}

	public function series() {
		$this->load->helper("text");
		$this->load->model("series_model");
		$series = $this->series_model->getAll();
		$this->load->view("includes/template", array("content"=>"admin/all_series_table", "series"=>$series));
	}

	public function users() {

	}

	public function editusers() {

	}

	public function edittalk($talkId) {

		if (isset($talkId)){
			$this->load->model("talks_model");
			$this->load->model("series_model");
			$talk = $this->talks_model->getTalkById($talkId);
			$series = $this->series_model->getAllSeriesTitles();
			foreach($series as $single) {
				$seriesarray[$single->id] = $single->title;
			}
			$this->load->view("includes/template", array("talk"=>$talk, "series"=>$series, "seriesarray"=>$seriesarray, "content"=>"admin/edit_talk"));
		} elseif ($this->input->post()) {
			$this->load->model("talks_model");
			$talk = $this->talks_model->editTalk($this->input->post(), $this->input->post("id"));
			// $this->load->view("includes/template", array("talk"=>$this->input->post("id"), "content"=>"talk_details"));
			redirect("/talks/talk/".$this->input->post("id"));
		} else {
			redirect("/talks/");
		}
	}

	public function talkslist() {

	}

	public function editseries($seriesId) {
		// TODO: Sanitise variables
		if (isset($seriesId)) {
			$this->load->model("series_model");
			$series = $this->series_model->getSeriesById($seriesId);
			$this->load->view("includes/template", array("series"=>$series, "content"=>"admin/edit_series"));
		} elseif ($this->input->post()) {
			$this->load->model("series_model");
			$series = $this->series_model->editSeries($this->input->post(), $this->input->post("id"));
			redirect("/series/seriesdetail/".$this->input->post("id"));
		} else {
			redirect("/series/");
		}
		

	}

	public function addtalk() {

	}

	public function addseries() {

	}
}