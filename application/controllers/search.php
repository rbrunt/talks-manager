<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends Talks_Controller {

	public function index($searchTerm)	{
		if(isset($searchTerm)) {
			$searchTerm = rawurldecode($searchTerm);
			$this->load->model("search_model");
			$this->load->model("files_model");
			$this->load->helper("text");

			$talks = $this->search_model->searchTalkNames($searchTerm);
			$series = $this->search_model->searchSeriesByName($searchTerm);
			if ($series) {
				foreach($series as $single_series) {
					$artwork[$single_series->id] = $this->files_model->getSeriesArtworkFileName($single_series->id);
				}
			} else {
				$artwork = false;
			}

			$this->load->view('includes/template', array("content"=>"search_results", "talks"=>$talks, "series"=>$series, "searchTerm"=>$searchTerm, "artwork"=>$artwork));
		} else {
			$this->session->set_flashdata("alert", array("info"=>"You need to provide a search term!"));
			redirect("series");
		}
	}

}