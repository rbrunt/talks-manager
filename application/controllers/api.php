<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class API extends Talks_Controller {

	public function index()
	{

	}

	public function series($seriesId) {
		$this->load->model("series_model");
		$this->load->model("talks_model");
		$this->load->model("files_model");
		if ($series = $this->series_model->getSeriesById($seriesId)[0]) {
			$talks = $this->talks_model->getTalksBySeries($seriesId, true);
			$series->talks = $talks;
			$series->artwork = $this->files_model->getSeriesArtworkFileName($seriesId);
			//Add a urls to the json:
			$series->url = base_url($series->slug);
			foreach($series->talks as $talk) {
				$talk->url = base_url($series->slug.'/'.$talk->slug);
				$talk->hasaudio = $this->files_model->checkTalkExists($talk->id);
			}

			$this->output
				->set_content_type('application/json')
    			->set_output(json_encode($series));
		} else {
			$this->output
				->set_content_type('application/json')
				->set_status_header('404')
				->set_output(json_encode(array("success"=>False,"message"=>"Series doesn't exist")));
		}
	}


}