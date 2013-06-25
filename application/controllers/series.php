<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Series extends CI_Controller {

	public function index()
	{
		$this->load->library("pagination");
		$this->load->model("series_model");

		// Config for pagination
		$config["base_url"] = base_url("/series/");
		$config["total_rows"] = $this->series_model->countSeries();
		$segment = $config["uri_segment"] = 2;
		$limit = $config["per_page"] = 5;

		$this->pagination->initialize($config);

		$series = $this->series_model->getSeriesPage($limit, $this->uri->segment($segment));
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