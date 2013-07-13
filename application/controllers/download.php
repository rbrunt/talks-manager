<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// class Download extends Talks_Controller {
class Download extends CI_Controller {

	public function index() {

	}

	public function talk($talkId)	{
		$this->load->model("files_model");
		$this->load->model("talks_model");
		
		if ($this->files_model->checkTalkExists($talkId)) {
			$talks = $this->talks_model->getTalkDetailsById($talkId);

			$filename = $talks[0]->seriestitle . " - " . $talks[0]->title . " (talks.diccu.co.uk)";
			$file = FCPATH . "/files/talks/$talkId.mp3";

			header("Content-Description: File Transfer");
			header("Content-Type: application/octet-stream; "); 
			header("Content-Disposition: attachment; filename=\"$filename.mp3\"");
			header("Content-Transfer-Encoding: binary");
			header("Expires: 0");
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_end_flush(); // Makes sure file isn't buffered into memory
			readfile($file); // Reads file directly to output_add_rewrite_var(name, value)
		} else {
			show_404();
		}
	}

}