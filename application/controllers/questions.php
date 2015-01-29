<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {


	public function add($talkId) {
		$this->load->model("talks_model");
		$this->load->model("questions_model");
		$this->load->library("pusher");
		$talk = $this->talks_model->getTalkById($talkId);
		if ($talk) {
			if($talk[0]->questionsenabled && $talk[0]->date ==  date('Y-m-d')) { // Are we allowed to ask a question today?
				$newQuestion = $this->input->post();
				$newQuestion["talkid"] = $talkId;

				$insertId = $this->questions_model->addQuestion($newQuestion);
				
				$question = $this->questions_model->getQuestionById($insertId);
				$this->pusher->trigger('talk-'.$talkId, 'questionAdded', $question);
				$this->session->set_flashdata("alert",array("success"=>"Question received!"));
				redirect(base_url($talk[0]->seriesslug.'/'.$talk[0]->slug));
			} else {
				show_404();
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */