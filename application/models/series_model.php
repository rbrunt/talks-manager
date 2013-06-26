<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Series_Model extends CI_Model {

	public function getAll() {
		$series = $this->db->get('series');
		if ($series->num_rows() > 0 ) {
			foreach($series->result() as $single_series){
				$seriesarray[] = $single_series;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function countSeries() {
		$talks = $this->db->count_all('series');
		return $talks;
	}

	public function getSeriesPage($number, $offset) {
		$series = $this->db->get('series', $number, $offset);
		if ($series->num_rows() > 0 ) {
			foreach($series->result() as $single_series){
				$seriesarray[] = $single_series;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function getSeriesById($seriesId) {
		$seriesId = $this->db->escape($seriesId);
		$series = $this->db->get_where('series', 'id = '.$seriesId);
		return ($series->num_rows() > 0) ? array($series->row()) : false;
	}

	public function getAllSeriesTitles() {
		$series = $this->db->select('id, title')->from('series')->get();
		if ($series->num_rows() > 0 ) {
			foreach($series->result() as $single){
				$seriesarray[] = $single;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function editSeries($array, $id) {
		$series = $this->db->where("id", $id)->update("series", $array);
		return $this->db->affected_rows();
	}

	// public function addTalk($array) {
	// 	$talk = $this->db->query("INSERT INTO talks SET title = ".$array['title'].", speaker = ".$array['speaker'].", seriesid = ".$array['seriesId'].", date = ".$array['date'].", summary = ".$array['summary'].",  passage = ".$array['passage'].", uploadedby = ".$array['userid']);
	// 	return $this->db->insert_id();
	// }

	// public function editTalk($array) {
	// 	$talk = $this->db->query("UPDATE talks SET title = ".$array['title'].", speaker = ".$array['speaker'].", seriesid = ".$array['seriesId'].", date = ".$array['date'].", summary = ".$array['summary'].",  passage = ".$array['passage'].", uploadedby = ".$array['userid']);
	// 	return $this->db->affected_rows();
	// }

}
