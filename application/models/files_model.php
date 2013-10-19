<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files_Model extends CI_Model {

	public function getSeriesArtworkFileName($seriesId) {
		return base_url("files/covers/" . ((file_exists("files/covers/$seriesId.jpg")) ? "$seriesId.jpg" : "default.gif"));
	}

	public function checkArtworkExists($seriesId) {
		return (file_exists("files/covers/$seriesId.jpg")) ? true : false ;
	}

	public function checkTalkExists($talkId) {
		return (file_exists("files/talks/$talkId.mp3")) ? true : false ;
	}

	public function deleteTalkFile($talkId) {
		if ($this->checkTalkExists($talkId)) {
			return unlink("files/talks/$talkId.mp3");
		} else {
			return true;
		}
	}

	public function deleteArtwork($seriesId) {
		if ($this->checkArtworkExists($seriesId)) {
			return unlink("files/covers/$seriesId.jpg");
		}
	}
}

