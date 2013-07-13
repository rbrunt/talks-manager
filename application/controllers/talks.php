<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talks extends Talks_Controller {

	public function index()
	{
		// $this->load->model("talks_model");
		// $talks = $this->talks_model->getAll();
		// $this->load->view('includes/template', array("talks"=>$talks, "content"=>"all_talks"));
		redirect("/series/");
	}

	public function talk($talkId) {
		$this->load->model("talks_model");
		if ($talk = $this->talks_model->getTalkDetailsById($talkId)) {
			$this->load->model("files_model");
			$artwork = $this->files_model->getSeriesArtworkFileName($talk[0]->seriesid);
			$this->load->view('includes/template', array("talk"=>$talk, "content"=>"talk_details", "artwork"=>$artwork));
		} else {
			show_404();
		}
		
	}
}