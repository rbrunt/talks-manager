<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Talks_Controller {

	public function __construct() {
 		parent::__construct();
		$this->load->helper("form");
	}

	public function index()	{
		$this->checkLogin();
		$this->load->model("talks_model");
		$this->load->model("series_model");
		$this->load->model("speakers_model");
		$this->load->model("users_model");
		$num_talks = $this->talks_model->countTalks();
		$num_series = $this->series_model->countSeries();
		$num_speakers = $this->speakers_model->countSpeakers();
		$num_users = $this->users_model->countUsers();
		$this->load->view('includes/template', array("content"=>"admin/home", "num_talks"=>$num_talks, "num_series"=>$num_series, "num_speakers"=>$num_speakers, "num_users"=>$num_users, "title"=>"Admin"));
	}

	public function talks() {
		$this->checkLogin();
		$this->load->library("pagination"); // We want to paginate so we don't get a really really long list if there are lots of talks on the system...
		$this->load->model("talks_model");
		$this->load->model("files_model");

		// Config for pagination
		$config["base_url"] = base_url("/admin/talks/");
		$config["total_rows"] = $this->talks_model->countTalks();
		$limit = $config["per_page"] = 10;

		$this->pagination->initialize($config);
		$talks = $this->talks_model->getTalkPage($limit, $this->uri->segment(3));

		foreach ($talks as $talk) {
			$talk->exists = $this->files_model->checkTalkExists($talk->id);
		}

		$this->load->view("includes/template", array("content"=>"all_talks", "talks"=>$talks, "title"=>"Manage Talks"));
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
		$this->load->view("includes/template", array("content"=>"admin/all_series_table", "series"=>$series, "title"=>"Manage Series"));
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
		$this->load->view("includes/template", array("content"=>"admin/all_speakers", "speakers"=>$speakers, "title"=>"Manage Speakers"));
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
				$this->load->view("includes/template", array("content"=>"login/login_page", "alert"=>array("error"=>"wrong username or password", "title"=>"Login")));
			}

		} else {
			$this->load->view("includes/template", array("content"=>"login/login_page", "title"=>"Login"));
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
		$this->load->library("email");
		if ($email = $this->input->post("email")) {
			$this->load->model("users_model");
			if ($insertId = $this->users_model->addUser($email)) {
				$this->session->set_flashdata("alert", array("success"=>"successfully added user ".$email." with userId:".$insertId["insertId"]." and token: ".$insertId["token"]));

				$this->email->from($this->config->item("email_from"));
				$this->email->to($email);
				$this->email->subject("Account Verification");
				$message = "An account has been created for you on the DICCU Talks system. Please click on the link below to verify your email address and create a password:

				<a href=\"".base_url('/admin/setpassword/'.$insertId["token"])."\">".base_url('/admin/setpassword/'.$insertId["token"])."</a>";
				$this->email->send();
				echo $this->email->print_debugger();

				redirect(base_url());
			} else {
				$this->load->view("includes/template", array("content"=>"login/add_user", "alert"=>array("error"=>"a user with that email already exists!", "title"=>"Add a user | Admin")));
			}
		} else {
			$this->load->view("includes/template", array("content"=>"login/add_user", "title"=>"Add a user | Admin"));
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
					$this->session->set_flashdata("alert", array("success"=>"successfully set a password, now try <a href=\"".base_url('/admin/login')."\">logging in</a>!"));
					redirect(base_url());
				} else {
					$this->load->view("includes/template", array("content"=>"login/set_password", "alert"=>array("error"=>"Either your email isn't in the system, or you have an invalid token. Make sure typed your email address correctly and that you have the right link!", "title"=>"Account Creation - Set a password")));
				}
			} else {
				$this->load->view("includes/template", array("content"=>"login/set_password", "alert"=>array("error"=>"passwords didn't match", "title"=>"Account Creation - Set a password")));
			}
		} else {
			$this->load->view("includes/template", array("content"=>"login/set_password", "title"=>"Account Creation - Set a password"));
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
			$this->load->model("files_model");
			
			$series = $this->series_model->getAllSeriesTitles();
			$speakers = $this->speakers_model->getAllSpeakerNames();

			if ($talk = $this->talks_model->getTalkById($talkId)) {
				$artwork = $this->files_model->getSeriesArtworkFileName($talk[0]->seriesid);
				foreach($series as $single) {
					$seriesarray[$single->id] = $single->title;
				}
				foreach($speakers as $speaker) {
					$speakerarray[$speaker->id] = $speaker->name;
				}
				$talk[0]->exists = $this->files_model->checkTalkExists($talk[0]->id);
				$this->load->view("includes/template", array("talk"=>$talk, "series"=>$series, "seriesarray"=>$seriesarray, "speakerarray"=>$speakerarray, "content"=>"admin/edit_talk", "artwork"=>$artwork, "title"=>"Editing: ".$talk[0]->title." | Admin", "page"=>"edittalk"));
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
				$this->load->view("includes/template", array("content"=>"admin/edit_speaker", "speaker"=>$speaker, "title"=>"Editing Speaker: ".$speaker[0]->name));
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
				$this->load->model("series_model");
				$series = $this->series_model->editSeries($this->input->post(), $this->input->post("id"));
				redirect("/series/seriesdetail/".$this->input->post("id"));
			} else {
				$this->load->model("series_model");
				if ($series = $this->series_model->getSeriesById($seriesId)) {
					$this->load->model("files_model");
					$artwork = $this->files_model->getSeriesArtworkFileName($seriesId);
					$this->load->view("includes/template", array("series"=>$series, "content"=>"admin/edit_series", "artwork"=>$artwork, "page"=>"editseries", "title"=>"Editing: ".$series[0]->title." | Admin"));
				} else {
					show_404();
				}
			}
		} else {
			redirect("/series/");
		}
		
	}

	public function deleteseries($seriesId) {
		$this->checkLogin();
		$this->load->model("series_model");
		if ($this->series_model->deleteSeries($seriesId)) {
			$this->session->set_flashdata("alert", array("success"=>"Series and all talks in it successfully deleted!"));
			redirect("admin/series/");
		}

	}

	public function addtalk() {
		$this->checkLogin();
		if ($this->input->post()) {
			$this->load->model("talks_model");
			$insertId = $this->talks_model->addTalk($this->input->post());
			// $this->session->set_flashdata("alert", array("success"=>"Successfully added the talk <strong>".$this->input->post(title)."</strong>. Click <a href=\"".base_url("admin/addtalk")."\">here</a> to add another."));
			$this->session->set_flashdata("alert", array("success"=>"Successfully added the talk <strong>".$this->input->post("title")."</strong>. Now you just need to upload the mp3!"));
			//redirect("/talks/talk/".$insertId);
			redirect("/admin/uploadtalk/".$insertId);
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

			$this->load->view("includes/template", array("content"=>"admin/add_talk", "seriesarray"=>$seriesarray, "speakersarray"=>$speakersarray, "title"=>"Add a talk | Admin"));
		}
	}

	public function deletetalk($talkId) {
		$this->checkLogin();
		if (isset($talkId)) {
			$this->load->model("talks_model");
			if ($this->talks_model->deleteTalk($talkId)) {
				$this->session->set_flashdata("alert", array("success"=>"Successfully deleted the talk."));
				redirect("admin/talks");
			}
		} else {
			show_404();
		}
	}

	public function deletetalkfile($talkId) {
		$this->checkLogin();
		if (isset($talkId)) {
			$this->load->model("files_model");
			if ($this->files_model->checkTalkExists($talkId)) {
				if ($this->files_model->deleteTalkFile($talkId)) {
					$this->session->set_flashdata("alert", array("success"=>"Successfully deleted the talk."));
					redirect("/talks/talk/".$talkId);
				} else {
					$this->session->set_flashdata("alert", array("error"=>"There was a problem deleting the file."));
					redirect("/admin/edittalk/".$talkId);
				}
			} else {
				$this->session->set_flashdata("alert", array("warning"=>"No file has been uploaded for that talk!"));
				redirect("/talks/talk/".$talkId);
			}
		}
	}

	public function uploadtalk($talkId) {
		// Check that the user is logged in:
		$this->checkLogin();

		// Check that a talkId has been specified:
		if (!isset($talkId)) redirect("admin/addtalk");
		$this->load->model("talks_model");
		
		// Check that the supplied talkId is a valid talk:
		if (!$this->talks_model->checkValidTalkId($talkId)) show_404(); // Shows a 404 error if it isnt

		// Configure the upload helper...
		$config["upload_path"] = "./files/talks/";
		$config['allowed_types'] = 'mp3';
		$config["overwrite"] = TRUE;
		//$config['max_size']	= '100000';
		$config["file_name"] = $talkId;

		// Load the upload helper
		$this->load->library("upload", $config);
		$this->upload->initialize($config);



		if ($this->upload->do_upload()) {  // They've submitted the form, so we've got a file to process...
			$data = $this->upload->data();
			// Add flag in DB that talk has been uploaded if file passes all the checks

			// Add success message and redirect to talk details page:
			$this->session->set_flashdata("alert", array("success"=>"File upload succesful. Please try listening to it below to check that it was the right one!"));
			redirect("/talks/talk/$talkId");
			// } else {
			// 	$this->session->set_flashdata("alert",array("error"=>$this->upload->display_errors()));	
			// }			
		} else {
			
			$alert = ($this->input->server('REQUEST_METHOD') == "GET") ? array() : array("error"=>$this->upload->display_errors()); // Only show error message if someone used a POST request (tried to submit the form).

			$this->load->model("talks_model");
			$this->load->model("files_model");
			$talk = $this->talks_model->getTalkDetailsById($talkId);
			$artwork = $this->files_model->getSeriesArtworkFileName($talk[0]->seriesid);
			$this->load->view("includes/template", array("content"=>"admin/upload_talk", "talk"=>$talk, "page"=>"uploadtalk", "alert"=>$alert, "artwork"=>$artwork, "title"=>"Upload audio for \"".$talk[0]->title."\" | Admin"));
		}

	}

	public function addseries() {
		$this->checkLogin();
		if ($this->input->post()) {
			$this->load->model("series_model");
			$insertId = $this->series_model->addSeries($this->input->post());
			$alert["success"] = "Succesfully created the Series <strong>".$this->input->post("title")."</strong> Click <a href=\"".base_url("admin/addseries")."\">here</a> to add another. To upload custom cover artwork, just <a href=\"".base_url('admin/editseries/'.$insertId)."\">edit the series</a>."; //TODO: find a way of passing this through the redirect...
			$this->session->set_flashdata("alert", $alert); // Set this as a session parameter: will only last till the next page load...
			redirect("/series/seriesdetail/".$insertId);
		} else {
			$this->load->view("includes/template", array("content"=>"admin/add_series", "alert"=>array("info"=>"<strong>TODO:</strong> Add image upload ability. Can currently only do it from the talk edit screen"), "title"=>"Add a series | Admin"));
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
			$this->load->view("includes/template", array("content"=>"admin/add_speaker", "title"=>"Add a speaker | Admin"));
		}
	}
	
}