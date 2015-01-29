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
		$series = $this->db->count_all('series');
		return $series;
	}

	public function countTalksInSeries($seriesId) {
		return $this->db->where('seriesid', $seriesId)->count_all_results('talks');
	}

	public function getAllWithTalkCount() { // Talks to the talks table, but makes more sense to have it in this model...
		$series = $this->db->query('SELECT  series.*, (SELECT COUNT(*) FROM talks WHERE talks.seriesid = series.id) AS "numtalks" FROM series');
		if ($series->num_rows() > 0 ) {
			foreach($series->result() as $single_series){
				$seriesarray[] = $single_series;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function getSeriesPage($number, $offset) {
		$series = $this->db->order_by("lastmodified","desc")->get('series', $number, $offset);
		if ($series->num_rows() > 0 ) {
			foreach($series->result() as $single_series){
				$seriesarray[] = $single_series;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function getSeriesPageWithTalkCount($number, $offset) {
		$offset = (!is_numeric($offset)  ? 0 : $offset);
		$series = $this->db->query('SELECT  series.*, (SELECT COUNT(*) FROM talks WHERE talks.seriesid = series.id) AS "numtalks" FROM series LIMIT ' . $offset . ', ' . $number);
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
		$series = $this->db->where('id',$seriesId)->get('series');
		return ($series->num_rows() > 0) ? array($series->row()) : false;
	}

	public function getSeriesBySlug($slug) {
		$series = $this->db->where('slug',$slug)->get('series');
		return ($series->num_rows() > 0) ? array($series->row()) : false;
	}

	public function checkIfSlugExists($slug) {
		$series = $this->db->where('slug',$slug)->get('series');
		return ($series->num_rows() > 0) ? true : false;
	}

	public function getAllSeriesTitles() {
		$series = $this->db->select('id, title')->from('series')->order_by("id", "ASC")->get();
		if ($series->num_rows() > 0 ) {
			foreach($series->result() as $single){
				$seriesarray[] = $single;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function getSeriesInEvent($eventId) {
		$eventId = $this->db->escape($eventId);
		$series = $this->db->get_where("series", "eventid=".$eventID);
		if ($series->num_rows() > 0) {
			foreach($series->result() as $single) {
				$seriesarray[] = $single;
			}
			return $seriesarray;
		} else {
			return false;
		}
	}

	public function updateLastModified($id) {
		$series = $this->db->where("id", $id)->update("series", array("lastmodified"=>date('Y-m-d G:i:s')));
		return $this->db->affected_rows();
	}

	public function editSeries($array, $id) {
		$series = $this->db->where("id", $id)->update("series", $array);
		return $this->db->affected_rows();
	}

	public function addSeries($array) {
		$series = $this->db->insert("series", $array);
		return $this->db->insert_id();
	}

	public function deleteSeries($seriesId) {
		$this->load->model("files_model");
		//Check that the series is empty first...
		if ($this->countTalksInSeries($seriesId) != 0) {
			$this->load->model("talks_model");
			//need to delete each talk first...
			$talks = $this->talks_model->getTalksBySeries($seriesId);
			foreach ($talks as $talk) {
				$this->talks_model->deleteTalk($talk->id);
			}
		}
		$this->files_model->deleteArtwork($seriesId);
		$this->db->where("id", $seriesId)->delete("series");
		return true;
	}
}
