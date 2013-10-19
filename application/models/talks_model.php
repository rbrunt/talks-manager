<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talks_Model extends CI_Model {

	public function getAll() {
		$talks = $this->db->get('talks');
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}

		// return ($talks->num_rows() > 0) ? $talks : false;
	}

	public function countTalks() {
		$talks = $this->db->count_all('talks');
		return $talks;
	}

	public function getTalkPage($number, $offset) {
		$talks = $this->db->select("talks.title, talks.id, talks.date, talks.passage, talks.seriesid, speakers.name AS speakername, series.title as seriestitle")->join("speakers", "speakers.id = talks.speakerid")->join("series", "talks.seriesid = series.id")->order_by("date", "DESC")->get('talks', $number, $offset);
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}

		// return ($talks->num_rows() > 0) ? $talks : false;
	}

	public function getTalkById($talkId) {
		$talkId = $this->db->escape($talkId);
		$talk = $this->db->get_where('talks', 'id = '.$talkId);
		return ($talk->num_rows() > 0) ? array($talk->row()) : false;
	}

	public function checkValidTalkId($talkId) {
		$talkId = $this->db->escape($talkId);
		$talk = $this->db->get_where("talks", "id = $talkId");
		return ($talk->num_rows() > 0) ? true : false;
	}

	public function getTalkDetailsById($talkId) {
		$talkId = $this->db->escape($talkId);
		$talk = $this->db->select("talks.*, speakers.name AS speakername, series.title AS seriestitle")->from("talks")->where("talks.id = ".$talkId)->join("speakers", "talks.speakerid = speakers.id")->join("series", "talks.seriesid = series.id")->get();
		//echo $this->db->last_query();
		return ($talk->num_rows() > 0) ? array($talk->row()) : false;
	}

	public function getTalksBySeries($seriesId) {
		$seriesId = $this->db->escape($seriesId);
		$talks = $this->db->select("talks.*, speakers.name AS speakername")->from("talks")->where("seriesid = $seriesId")->join("speakers", "talks.speakerid = speakers.id")->order_by("date", "ASC")->get();
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}
	}

	public function getRecentTalks($numTalks = 5) {
		$numTalks = $this->db->escape($numTalks);
		//$talks = $this->db->query("SELECT id, title, summary, date FROM talks ORDER BY date DESC LIMIT ".$numTalks);
		$talks = $this->db->select("talks.id, talks.title, talks.summary, talks.seriesid, talks.date, speakers.name AS speakername")->from("talks")->join("speakers", "talks.speakerid = speakers.id")->order_by("date", "DESC")->limit($numTalks)->get();
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}
	}

	public function addTalk($array) {
		// $talk = $this->db->query("INSERT INTO talks SET title = ".$array['title'].", speakerid = ".$array['speakerid'].", seriesid = ".$array['seriesid'].", date = ".$array['date'].", summary = ".$array['summary'].",  passage = ".$array['passage'].", uploadedby = ".$array['userid']);
		$talk = $this->db->insert("talks", $array);
		return $this->db->insert_id();
	}

	public function editTalk($array, $id) {
		// $talk = $this->db->query("UPDATE talks SET title = ".$array['title'].", speakerid = ".$array['speakerid'].", seriesid = ".$array['seriesid'].", date = ".$array['date'].", summary = ".$array['summary'].",  passage = ".$array['passage']);
		$talk = $this->db->where("id", $id)->update("talks", $array);
		return $this->db->affected_rows();
	}

	public function deleteTalk($talkId) {
		$this->load->model("files_model");
		
		if ($this->files_model->deleteTalkFile($talkId)) {
			//Pass...
		} else {
			return false;
		}
		if ($this->db->where("id", $talkId)->delete("talks")) {
			return true;
		} else {
			return false;
		}

		
	}
}
