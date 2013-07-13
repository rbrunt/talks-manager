<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files_Model extends CI_Model {

	public function getSeriesArtworkFileName($seriesId) {
		return base_url("files/covers/" . ((file_exists("files/covers/$seriesId.jpg")) ? "$seriesId.jpg" : "default.gif"));
	}

	public function checkTalkExists($talkId) {
		return (file_exists("files/talks/$talkId.mp3")) ? true : false ;
	}

}

