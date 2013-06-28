<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index($searchTerm)	{
		if(isset($searchTerm)) {
			$searchTerm = rawurldecode($searchTerm);
			$this->load->model("search_model");

			$talks = $this->search_model->searchTalkNames($searchTerm);
			$series = $this->search_model->searchSeriesByName($searchTerm);

			$this->load->view('includes/template', array("content"=>"search_results", "talks"=>$talks, "series"=>$series, "searchTerm"=>$searchTerm));
		} else {
			$this->session->set_flashdata("alert", array("info"=>"You need to provide a search term!"));
			redirect("series");
		}
	}

}