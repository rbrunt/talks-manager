<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Talks_Controller {

    public function index() {
        $this->load->model("talks_model");
        $this->load->model("files_model");
        $this->load->helper("relative_time");
        $talks = $this->talks_model->getRecentTalks(3);
        $futuretalks = $this->talks_model->getFutureTalks(3);
        foreach ($talks as $talk) {
        	$artwork[$talk->id] = $this->files_model->getSeriesArtworkFileName($talk->seriesid);
        }
        if (is_array($futuretalks)) {
            foreach ($futuretalks as $talk) {
            $artwork[$talk->id] = $this->files_model->getSeriesArtworkFileName($talk->seriesid);
           }
        }
        $this->load->view("includes/template", array("talks"=>$talks, "futuretalks"=>$futuretalks, "content"=>"homepage", "artwork"=>$artwork));
    }

}