<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends Talks_Controller {

    public function index() {
		redirect("/");
    }

    public function esvlookup() {

    	if (!$passage = $this->input->post("passage")) redirect("/");

    	$passage = str_replace(" ", "+", $passage);

    	//"http://www.esvapi.org/v2/rest/passageQuery?key=IP&passage='+passage+'&include-headings=false&include-footnotes=false&include-audio-link=false&include-short-copyright=false&output-format=plain-text"
    	$baseurl = "http://www.esvapi.org/v2/rest/passageQuery?key=IP&passage=$passage&include-footnotes=false&include-audio-link=false&include-short-copyright=false&include-passage-references=false";

    	$response = file_get_contents($baseurl);
    	echo $response;
    }

}