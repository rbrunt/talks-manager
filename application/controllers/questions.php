<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {


	public function add($talkId) {
		$this->load->model("talks_model");
		$this->load->model("questions_model");
		$this->load->library("pusher");

		$talk = $this->talks_model->getTalkById($talkId);
		if ($talk) {
			$newQuestion = $this->input->post();
			$newQuestion["talkid"] = $talkId;

			$insertId = $this->questions_model->addQuestion($newQuestion);
			
			$question = $this->questions_model->getQuestionById($insertId);
			$this->pusher->trigger('talk-'.$talkId, 'questionAdded', $question);
			$this->session->set_flashdata("alert",array("success"=>"Question received!"));
			redirect("/talks/talk/$talkId/");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */