<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Talks_Controller {

	public function __construct() {
 		parent::__construct();
		$this->load->helper("form");
	}

	public function index()	{
		$this->checkLogin();
		$this->load->view('includes/template', array("content"=>"admin/home"));
	}

	public function talks() {
		$this->checkLogin();
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
		$this->checkLogin();		
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
		$this->checkLogin();		
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

	public function login() {
		if ($this->isLoggedIn) redirect("admin");
		if ($this->input->post()) {
			$this->load->model("users_model");
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			$validated = $this->users_model->login($email, $password);

			if($validated) {
				$this->session->set_flashdata("alert",array("success"=>"Logged in!"));
				redirect("admin");
			} else {
				$this->load->view("includes/template", array("content"=>"login/login_page", "alert"=>array("error"=>"wrong username or password")));
			}

		} else {
			$this->load->view("includes/template", array("content"=>"login/login_page"));
		}
	}

	public function logout() {
		if ($this->isLoggedIn){
			$this->load->model("users_model");
			$this->users_model->logout();
			$this->session->set_flashdata("alert",array("success"=>"You've been logged out!"));
		} else {
			$this->session->set_flashdata("alert",array("error"=>"You need to be logged in to do that!"));
		}
		redirect("admin/login");
	}

	public function addUser() {
		$this->checkLogin();		
		if ($email = $this->input->post("email")) {
			$this->load->model("users_model");
			if ($insertId = $this->users_model->addUser($email)) {
				$this->session->set_flashdata("alert", array("success"=>"successfully added user ".$email." with userId:".$insertId["insertId"]." and token: ".$insertId["token"]));
				redirect(base_url());
			} else {
				$this->load->view("includes/template", array("content"=>"login/add_user", "alert"=>array("error"=>"a user with that email already exists!")));
			}
		} else {
			$this->load->view("includes/template", array("content"=>"login/add_user"));
		}
	}

	public function setpassword($token) {
		
		if ($this->input->post()){
			$password = ($this->input->post("password1") == $this->input->post("password2")) ? $this->input->post("password1") : false;
			if ($password) {
				$email = $this->input->post("email");
				$this->load->model("users_model");
				$affectedRows = $this->users_model->setPassword($token, $email, $password);
				if ($affectedRows == 1) {
					$this->session->set_flashdata("alert", array("success"=>"successfully set a password, now try loggin in!"));
					redirect(base_url());
				} else {
					$this->load->view("includes/template", array("content"=>"login/set_password", "alert"=>array("error"=>"email not in the system, invalid token, or other random error :(")));					
				}
			} else {
				$this->load->view("includes/template", array("content"=>"login/set_password", "alert"=>array("error"=>"passwords didn't match")));
			}
		} else {
			$this->load->view("includes/template", array("content"=>"login/set_password"));
		}
	}

	public function editusers() {

	}

	public function edittalk($talkId) {
		$this->checkLogin();		
		if (!$this->isLoggedIn) $this->sendHome();
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
		$this->checkLogin();		
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
		$this->checkLogin();
		// Configure the upload helper...
		$config["upload_path"] = "./files/covers/";
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config["overwrite"] = TRUE;
		$config['max_size']	= '500';
		$config['max_width']  = '1000';
		$config['max_height']  = '1000';	


		$this->load->library("upload", $config);
		if (isset($seriesId)) {
			if ($this->input->post()) {
				$config["file_name"] = $seriesId;
				$this->upload->initialize($config);
				if ($this->upload->do_upload()) {
					$data = $this->upload->data();
				} else {
					$this->session->set_flashdata("alert",array("error"=>$this->upload->display_errors()));
				}
				print_r($this->input->post());
				$this->load->model("series_model");
				$series = $this->series_model->editSeries($this->input->post(), $this->input->post("id"));
				redirect("/series/seriesdetail/".$this->input->post("id"));
			} else {
				$this->load->model("series_model");
				if ($series = $this->series_model->getSeriesById($seriesId)) {
					$this->load->view("includes/template", array("series"=>$series, "content"=>"admin/edit_series"));
				} else {
					show_404();
				}
			}
		} else {
			redirect("/series/");
		}
		

	}

	public function addtalk() {
		$this->checkLogin();
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
		$this->checkLogin();
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
		$this->checkLogin();		
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