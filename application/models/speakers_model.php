<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Speakers_Model extends CI_Model {

	public function getAll() {
		$series = $this->db->order_by("name", "ASC")->get('speakers');
		if ($series->num_rows() > 0 ) {
			foreach($series->result() as $single_series){
				$seriesarray[] = $single_series;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function countSpeakers() {
		$talks = $this->db->count_all('speakers');
		return $talks;
	}

	public function getSpeakersPage($number, $offset) {
		$series = $this->db->get('speakers', $number, $offset);
		if ($series->num_rows() > 0 ) {
			foreach($series->result() as $single_series){
				$seriesarray[] = $single_series;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function getSpeakerById($speakerId) {
		$speakerId = $this->db->escape($speakerId);
		$speaker = $this->db->get_where('speakers', 'id = '.$speakerId);
		return ($speaker->num_rows() > 0) ? array($speaker->row()) : false;
	}

	public function editSpeaker($array, $id) {
		$speaker = $this->db->where("id", $id)->update("speakers", $array);
		return $this->db->affected_rows();
	}

	public function addSpeaker($array) {
		$speakers = $this->db->insert("speakers", $array);
		return $this->db->insert_id();
	}

}
