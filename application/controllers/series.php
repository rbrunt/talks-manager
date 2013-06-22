<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Series extends CI_Controller {

	public function index()
	{
		$this->load->model("series_model");
		$series = $this->series_model->getAll();
		$this->load->view('all_series', array("series"=>$series));
	}

	public function seriesdetail($seriesId) {
		$this->load->model("series_model");
		$series = $this->series_model->getSeriesById($seriesId);
		$this->load->view('series_details', array("series"=>$series));
	}
}