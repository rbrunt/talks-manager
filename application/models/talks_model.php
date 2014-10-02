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

	public function countPastTalks() {
		$talks = $this->db->where("date <", date("Y-m-d"))->count_all_results('talks');
		return $talks;
	}

	public function countFutureTalks() {
		$talks = $this->db->where("date >", date("Y-m-d"))->count_all_results('talks');
		return $talks;
	}

	public function getTalkPage($number, $offset) {
		$talks = $this->db->select("talks.title, talks.id, talks.date, talks.passage, talks.speakername, talks.seriesid, talks.video, series.title as seriestitle")->join("series", "talks.seriesid = series.id")->order_by("date", "DESC")->get('talks', $number, $offset);
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}
	}

	public function getRecentTalksPage($number, $offset) {
		$talks = $this->db->select("talks.title, talks.id, talks.date, talks.summary, talks.speakername, talks.seriesid, talks.video, series.title as seriestitle")->where("date <", date("Y-m-d"))->join("series", "talks.seriesid = series.id")->order_by("date", "DESC")->get('talks', $number, $offset);
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}
	}

	public function getFutureTalksPage($number, $offset) {
		$talks = $this->db->select("talks.title, talks.id, talks.date, talks.summary, talks.speakername, talks.seriesid, talks.video, series.title as seriestitle")->where("date >", date("Y-m-d"))->join("series", "talks.seriesid = series.id")->order_by("date", "ASC")->get('talks', $number, $offset);
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}
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
		$talk = $this->db->select("talks.*, series.title AS seriestitle")->from("talks")->where("talks.id = ".$talkId)->join("series", "talks.seriesid = series.id")->get();
		//echo $this->db->last_query();
		return ($talk->num_rows() > 0) ? array($talk->row()) : false;
	}

	public function getTalksBySeries($seriesId, $ascending=false) {
		$seriesId = $this->db->escape($seriesId);
		if ($ascending==true){
			$talks = $this->db->select("talks.*")->from("talks")->where("seriesid = $seriesId")->order_by("date", "ASC")->get();
		} elseif ($ascending==false){
			$talks = $this->db->select("talks.*")->from("talks")->where("seriesid = $seriesId")->order_by("date", "DESC")->get();
		}
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
		$talks = $this->db->select("talks.id, talks.title, talks.summary, talks.seriesid, talks.date, talks.speakername, talks.video")->where("date <", date("Y-m-d"))->from("talks")->order_by("date", "DESC")->limit($numTalks)->get();
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}
	}

	public function getTodaysTalks() {
		$talks = $this->db->select("talks.id, talks.title, talks.summary, talks.seriesid, talks.date, talks.speakername, talks.video, talks.questionsenabled")->where("date =", date("Y-m-d"))->from("talks")->order_by("date", "DESC")->get();
		if ($talks->num_rows() > 0 ) {
			foreach($talks->result() as $talk){
				$talkarray[] = $talk;
			}
			return $talkarray;
		} else {
			return false;
		}
	}

	public function getFutureTalks($numTalks = 1) {
		$numTalks = $this->db->escape($numTalks);
		$talks = $this->db->select("talks.id, talks.title, talks.summary, talks.seriesid, talks.date, talks.speakername, talks.video")->where("date >", date("Y-m-d"))->from("talks")->order_by("date", "ASC")->limit($numTalks)->get();
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
		if(isset($array['questionsenabled'])) {
			$array['questionsenabled'] = true;
		} else {
			$array['questionsenabled'] = false;
		}
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
