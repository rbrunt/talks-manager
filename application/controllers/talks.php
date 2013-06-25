<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talks extends CI_Controller {

	public function index()
	{
		// $this->load->model("talks_model");
		// $talks = $this->talks_model->getAll();
		// $this->load->view('includes/template', array("talks"=>$talks, "content"=>"all_talks"));
		redirect("/series/");
	}

	public function talk($talkId) {
		$this->load->model("talks_model");
		$this->load->model("series_model");
		if ($talk = $this->talks_model->getTalkById($talkId)) {
			$series = $this->series_model->getSeriesById($talk[0]->seriesid);
			$this->load->view('includes/template', array("talk"=>$talk, "series"=>$series, "content"=>"talk_details"));
		} else {
			show_404();
		}
		
	}
}