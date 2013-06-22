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

	public function getTalkById($talkId) {
		$talkId = $this->db->escape($talkId);
		$talk = $this->db->get_where('talks', 'id = '.$talkId);
		return ($talk->num_rows() > 0) ? array($talk->row()) : false;
	}

	public function getTalksBySeries($seriesId) {
		$seriesId = $this->db->escape($seriesId);
		$talks = $this->db->get_where('talks', 'seriesid ='.$seriesId);
		return ($talk->num_rows() > 0) ? $talk->row() : false;
	}

	public function getRecentTalks($numTalks) {
		$numTalks = $this->db->escape($numTalks);
		$talks = $this->db->query("SELECT id, title, summary, date FROM talks ORDER BY date DESC LIMIT ".$numTalks);
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
		$talk = $this->db->query("INSERT INTO talks SET title = ".$array['title'].", speaker = ".$array['speaker'].", seriesid = ".$array['seriesId'].", date = ".$array['date'].", summary = ".$array['summary'].",  passage = ".$array['passage'].", uploadedby = ".$array['userid']);
		return $this->db->insert_id();
	}

	public function editTalk($array) {
		$talk = $this->db->query("UPDATE talks SET title = ".$array['title'].", speaker = ".$array['speaker'].", seriesid = ".$array['seriesId'].", date = ".$array['date'].", summary = ".$array['summary'].",  passage = ".$array['passage'].", uploadedby = ".$array['userid']);
		return $this->db->affected_rows();
	}

}
