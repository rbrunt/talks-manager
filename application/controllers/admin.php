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
		$this->load->library("pagination"); // We want to paginate so we don't get a really really long list if there are lots of talks on the system...
		$this->load->model("talks_model");

		// Config for pagination
		$config["base_url"] = base_url("/admin/talks/");
		$config["total_rows"] = $this->talks_model->countTalks();
		$limit = $config["per_page"] = 10;

		$this->pagination->initialize($config);
		$talks = $this->talks_model->getTalkPage($limit, $this->uri->segment(3));
		$this->load->view("includes/template", array("content"=>"all_talks", "talks"=>$talks));
	}

	public function series() {
		$this->load->library("pagination");
		$this->load->helper("text");
		$this->load->model("series_model");

		// Config for pagination
		$config["base_url"] = base_url("/admin/series/");
		$config["total_rows"] = $this->series_model->countSeries();
		$limit = $config["per_page"] = 10;

		$this->pagination->initialize($config);
		//$series = $this->series_model->getSeriesPage($limit, $this->uri->segment(3));
		$series = $this->series_model->getSeriesPageWithTalkCount($limit, $this->uri->segment(3));
		$this->load->view("includes/template", array("content"=>"admin/all_series_table", "series"=>$series));
	}

	public function speakers() {
		$this->load->library("pagination"); // We want to paginate so we don't get a really really long list if there are lots of talks on the system...
		$this->load->model("speakers_model");

		// Config for pagination
		$config["base_url"] = base_url("/admin/speakers/");
		$config["total_rows"] = $this->speakers_model->countSpeakers();
		$limit = $config["per_page"] = 5;

		$this->pagination->initialize($config);
		$speakers = $this->speakers_model->getSpeakersPage($limit, $this->uri->segment(3));
		$this->load->view("includes/template", array("content"=>"admin/all_speakers", "speakers"=>$speakers));
	}

	public function users() {

	}

	public function editusers() {

	}

	public function edittalk($talkId) {

		if (isset($talkId)){
			$this->load->model("talks_model");
			$this->load->model("series_model");
			$this->load->model("speakers_model");

			$series = $this->series_model->getAllSeriesTitles();
			$speakers = $this->speakers_model->getAllSpeakerNames();

			if ($talk = $this->talks_model->getTalkById($talkId)) {
				foreach($series as $single) {
					$seriesarray[$single->id] = $single->title;
				}
				foreach($speakers as $speaker) {
					$speakerarray[$speaker->id] = $speaker->name;
				}
				$this->load->view("includes/template", array("talk"=>$talk, "series"=>$series, "seriesarray"=>$seriesarray, "speakerarray"=>$speakerarray, "content"=>"admin/edit_talk"));
			} else {
				show_404();
			}
		} elseif ($this->input->post()) {
			$this->load->model("talks_model");
			$talk = $this->talks_model->editTalk($this->input->post(), $this->input->post("id"));
			$this->session->set_flashdata("alert",array("success"=>"Talk details updated successfully"));
			redirect("/talks/talk/".$this->input->post("id"));
		} else {
			redirect("/talks/");
		}
	}

	public function editspeaker($speakerId) {
		if (isset($speakerId))	{
			$this->load->model("speakers_model");
			if ($speaker = $this->speakers_model->getSpeakerById($speakerId)) {
				$this->load->view("includes/template", array("content"=>"admin/edit_speaker", "speaker"=>$speaker));
			} else {
				show_404();
			}
		} elseif ($this->input->post()) {
			$this->load->model("speakers_model");
			$this->speakers_model->editSpeaker($this->input->post(), $this->input->post("id"));
			$this->session->set_flashdata("alert", array("success"=>"Successfully updated speaker name"));
			redirect("/admin/speakers");
		}
	}

	public function talkslist() {

	}

	public function editseries($seriesId) {
		// TODO: Sanitise variables
		if (isset($seriesId)) {
			$this->load->model("series_model");
			if ($series = $this->series_model->getSeriesById($seriesId)) {
				$this->load->view("includes/template", array("series"=>$series, "content"=>"admin/edit_series"));
			} else {
				show_404();
			}
		} elseif ($this->input->post()) {
			$this->load->model("series_model");
			$series = $this->series_model->editSeries($this->input->post(), $this->input->post("id"));
			redirect("/series/seriesdetail/".$this->input->post("id"));
		} else {
			redirect("/series/");
		}
		

	}

	public function addtalk() {

		if ($this->input->post()) {
			$this->load->model("talks_model");
			$insertId = $this->talks_model->addTalk($this->input->post());
			$this->session->set_flashdata("alert", array("success"=>"Successfully added the talk <strong>".$this->input->post(title)."</strong>. Click <a href=\"".base_url("admin/addtalk")."\">here</a> to add another."));
			redirect("/talks/talk/".$insertId);
		}
		else {
			$this->load->model("series_model");
			$this->load->model("speakers_model");
			
			$series = $this->series_model->getAllSeriesTitles();
			$speakers = $this->speakers_model->getAll();
			foreach($series as $single) {
				$seriesarray[$single->id] = $single->title;
			}
			foreach($speakers as $speaker) {
				$speakersarray[$speaker->id] = $speaker->name;
			}

			$this->load->view("includes/template", array("content"=>"admin/add_talk", "seriesarray"=>$seriesarray, "speakersarray"=>$speakersarray));
		}
	}

	public function addseries() {
		if ($this->input->post()) {
			$this->load->model("series_model");
			$insertId = $this->series_model->addSeries($this->input->post());
			$alert["success"] = "Succesfully created the Series <strong>".$this->input->post("title")."</strong> Click <a href=\"".base_url("admin/addseries")."\">here</a> to add another."; //TODO: find a way of passing this through the redirect...
			$this->session->set_flashdata("alert", $alert); // Set this as a session parameter: will only last till the next page load...
			redirect("/series/seriesdetail/".$insertId);
		} else {
			$this->load->view("includes/template", array("content"=>"admin/add_series", "alert"=>array("warning"=>"Add image upload ability")));
		}
	}

	public function addspeaker() {
		if ($this->input->post()) {
			$this->load->model("speakers_model");
			$insertId = $this->speakers_model->addSpeaker($this->input->post());
			$alert["success"] = "Successfully added speaker <strong>".$this->input->post("name")."</strong>. Click <a href=\"".$this->input->post("id")."\">here</a> to add another.";
			$this->session->set_flashdata("alert", $alert);
			redirect("admin/speakers");
		} else {
			$this->load->view("includes/template", array("content"=>"admin/add_speaker"));
		}
	}
	
}