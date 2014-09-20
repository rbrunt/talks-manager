<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {


	public function add($eventId) {
		$this->load->model("events_model");
		$this->load->model("questions_model");
		$this->load->library("pusher");

		$event = $this->events_model->getEventById($eventId);
		if ($event) {
			$newQuestion = $this->input->post();

			$insertId = $this->questions_model->addQuestion($newQuestion);
			
			$question = $this->questions_model->getQuestionById($insertId);
			$this->pusher->trigger('event-'.$event->id, 'questionAdded', $question);
			
			redirect("/events/$eventId/");
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */