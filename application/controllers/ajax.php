<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends Talks_Controller {

    public function index() {
		redirect("/");
    }

    public function esvlookup() {

    	if (!$passage = $this->input->post("passage")) redirect("/");

    	$passage = str_replace(" ", "+", $passage);

    	$baseurl = "http://www.esvapi.org/v2/rest/passageQuery?key=IP&passage=$passage&include-footnotes=false&include-audio-link=false&include-short-copyright=false&include-passage-references=false";
    	//sleep(10); // To check the ajax loading icon
    	$response = file_get_contents($baseurl);
    	echo $response;
    }

    public function coverupload($seriesId) {
        if ($this->session->userdata("userid")) {
            
            $config["allowedExtensions"] = array("jpg", "jpeg", "png", "gif");
            $config["sizeLimit"] = 1 * 1024 * 1024;
            $config["fileName"] = $seriesId;

            $this->load->library("Qqfileuploader", $config);
            $result = $this->qqfileuploader->handleUpload("./files/covers/", true);

            $result["message"] = "sucssfully uploaded your file!";

            echo json_encode($result);
            //echo json_encode(array("success"=>true, "message"=>"New cover artwork has been successfully uploaded. " . $this->input->post("qqfilename")));
        } else {
            echo json_encode(array("success"=>false, "error"=>"you need to be logged in to upload anything. Try refreshing the page"));
        }
    }


    public function mp3upload($talkId) {
        if ($this->session->userdata("userid")) {
            
            $config["allowedExtensions"] = array("mp3");
            $config["sizeLimit"] = 100 * 1024 * 1024;
            $config["fileName"] = $talkId;

            $this->load->library("Qqfileuploader", $config);
            $result = $this->qqfileuploader->handleUpload("./files/talks/", true);

            $this->load->model("series_model");
            $this->load->model("talks_model");
            $talk = $this->talks_model->getTalkById($talkId)[0];
            $series = $this->series_model->updateLastModified($talk->seriesid);

            $result["message"] = "sucessfully uploaded your file!";
            echo json_encode($result);
            //echo json_encode(array("success"=>true, "message"=>"New cover artwork has been successfully uploaded. " . $this->input->post("qqfilename")));
        } else {
            echo json_encode(array("success"=>false, "error"=>"you need to be logged in to upload anything. Try refreshing the page"));
        }
    }

    public function getartworkurl($seriesId) {
    	$this->load->model("files_model");
 		echo $this->files_model->getSeriesArtworkFileName($seriesId);
 	}

    public function checkTalkSlug($slug) {
        $this->load->model("talks_model");
        echo $this->talks_model->checkIfSlugExists($slug) ?   json_encode(array("exists"=>true))  : json_encode(array("exists"=>false));
    }

    public function checkSeriesSlug($slug) {
        $this->load->model("series_model");
        echo $this->series_model->checkIfSlugExists($slug) ?   json_encode(array("exists"=>true))  : json_encode(array("exists"=>false));
    }

}