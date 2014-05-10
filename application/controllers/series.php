<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Series extends Talks_Controller {

	public function index()
	{
		$this->load->library("pagination");
		$this->load->model("series_model");
		$this->load->model("files_model");

		// Config for pagination
		$config["base_url"] = base_url("/series/");
		$config["total_rows"] = $this->series_model->countSeries();
		$segment = $config["uri_segment"] = 2;
		$limit = $config["per_page"] = 5;

		$this->pagination->initialize($config);

		$series = $this->series_model->getSeriesPage($limit, $this->uri->segment($segment));
		foreach ($series as $single_series) {
			$artwork[$single_series->id] = $this->files_model->getSeriesArtworkFileName($single_series->id);
		}

		$this->load->view('includes/template', array("title"=>"Browse Series", "series"=>$series, "content"=>"all_series", "artwork"=>$artwork));
	}

	public function seriesdetail($seriesId) {
		$this->load->library("typography");
		$this->load->model("series_model");
		$this->load->model("talks_model");
		$this->load->model("files_model");
		if ($series = $this->series_model->getSeriesById($seriesId)) {
			$artwork_location = $this->files_model->getSeriesArtworkFileName($seriesId);
			$talks = $this->talks_model->getTalksBySeries($seriesId);
			$this->load->view('includes/template', array("series"=>$series, "talks"=>$talks, "content"=>"series_details", "artwork"=>$artwork_location, "title"=>$series[0]->title, "add_meta"=>true, "is_series_page"=>true, "description"=>strip_tags(str_replace(array("\r\n", "\r", "\n"), " ", $series[0]->summary))));
		} else {
			show_404();
		}
	}
}