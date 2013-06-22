<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talks extends CI_Controller {

	public function index()
	{
		$this->load->model("talks_model");
		$talks = $this->talks_model->getAll();

		

		$this->load->view('all_talks', array("talks"=>$talks));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */