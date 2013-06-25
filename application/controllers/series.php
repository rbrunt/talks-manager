<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Series extends CI_Controller {

	public function index()
	{
		$this->load->model("series_model");
		$series = $this->series_model->getAll();
		$this->load->view('includes/template', array("series"=>$series, "content"=>"all_series"));
	}

	public function seriesdetail($seriesId) {
		$this->load->model("series_model");
		$this->load->model("talks_model");
		if ($series = $this->series_model->getSeriesById($seriesId)) {
			$talks = $this->talks_model->getTalksBySeries($seriesId);
			$this->load->view('includes/template', array("series"=>$series, "talks"=>$talks, "content"=>"series_details"));
		} else {
			show_404();
		}
	}
}