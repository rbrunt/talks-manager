<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talks extends Talks_Controller {

	public function index() {
		$this->load->library("pagination");
		$this->load->model("talks_model");
		$this->load->model("files_model");
		$this->load->helper("relative_time");

		// Config for pagination
		$config["base_url"] = base_url("/talks/");
		$config["total_rows"] = $this->talks_model->countPastTalks();
		$segment = $config["uri_segment"] = 2;
		$limit = $config["per_page"] = 5;

		$this->pagination->initialize($config);

		$talks = $this->talks_model->getRecentTalksPage($limit, $this->uri->segment($segment));
		
		foreach ($talks as $talk) {
        	$artwork[$talk->id] = $this->files_model->getSeriesArtworkFileName($talk->seriesid);
        }

		$this->load->view('includes/template', array("talks"=>$talks, "artwork"=>$artwork, "content"=>"recent_talks", "breadcrumb"=>"Recent Talks"));
	}

	public function future() {
		$this->load->library("pagination");
		$this->load->model("talks_model");
		$this->load->model("files_model");
		$this->load->helper("relative_time");

		// Config for pagination
		$config["base_url"] = base_url("/talks/future/");
		$config["total_rows"] = $this->talks_model->countFutureTalks();
		$segment = $config["uri_segment"] = 3;
		$limit = $config["per_page"] = 5;

		$this->pagination->initialize($config);

		$talks = $this->talks_model->getFutureTalksPage($limit, $this->uri->segment($segment));
		$artwork = array();

		if ($talks != false) {
			foreach ($talks as $talk) {
	        	$artwork[$talk->id] = $this->files_model->getSeriesArtworkFileName($talk->seriesid);
        	}
        }

		$this->load->view('includes/template', array("talks"=>$talks, "artwork"=>$artwork, "content"=>"recent_talks", "breadcrumb"=>"Coming Soon"));
	}


	public function talk($talkId) {
		$this->load->model("talks_model");
		if ($talk = $this->talks_model->getTalkDetailsById($talkId)) {
			redirect($talk[0]->seriesslug.'/'.$talk[0]->slug);
		} else {
			show_404();
		}
	}

	public function byslug($seriesSlug, $talkSlug) {
		$this->load->library("typography");
		$this->load->model("talks_model");
		$this->load->model("series_model");
		$this->load->helper("relative_time");
		$this->load->helper("form");
		$series = $this->series_model->getSeriesBySlug($seriesSlug);
		if (!$series) {show_404();}
		if ($talk = $this->talks_model->getTalkDetailsBySlug($talkSlug, $series[0]->id)) {
			$this->load->model("files_model");
			$talkExists = $this->files_model->checkTalkExists($talk[0]->id);
			$artwork = $this->files_model->getSeriesArtworkFileName($talk[0]->seriesid);
			$this->load->view('includes/template', array("title"=>$talk[0]->title, "talk"=>$talk, "content"=>"talk_details", "artwork"=>$artwork, "talk_exists"=>$talkExists, "add_meta"=>true, "is_talk_page"=>true, "description"=>strip_tags(str_replace(array("\r\n", "\r", "\n"), " ", $talk[0]->summary))));
		} else {
			show_404();
		}
		
	}


	public function embed($talkId) {
		$this->load->library("typography");
		$this->load->model("talks_model");
		$this->load->helper("relative_time");
		if ($talk = $this->talks_model->getTalkDetailsById($talkId)) {
			$this->load->model("files_model");
			$talkExists = $this->files_model->checkTalkExists($talkId);
			$artwork = $this->files_model->getSeriesArtworkFileName($talk[0]->seriesid);
			$this->load->view('embeds/talk', array("talk"=>$talk[0], "artwork"=>$artwork, "talk_exists"=>$talkExists, "description"=>strip_tags(str_replace(array("\r\n", "\r", "\n"), " ", $talk[0]->summary))));
		} else {
			show_404();
		}
		
	}
}
