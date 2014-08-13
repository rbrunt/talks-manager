<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_Model extends CI_Model {

	public function getAll() {
		$events = $this->db->get('events');
		if ($events->num_rows() > 0 ) {
			foreach($events->result() as $event){
				$eventssarray[] = $event;
			}
			return $eventssarray;
		} else {
			return false;
		}
	}

	public function countEvents() {
		$events = $this->db->count_all('events');
		return $events;
	}

	public function countSeriesInEvent($eventID) {
		return $this->db->where('eventid', $eventId)->count_all_results('series');
	}

	public function getAllWithSeriesCount() { // Talks to the talks table, but makes more sense to have it in this model...
		$events = $this->db->query('SELECT  events.*, (SELECT COUNT(*) FROM series WHERE series.eventid = event.id) AS "numseries" FROM events');
		if ($events->num_rows() > 0 ) {
			foreach($events->result() as $event){
				$eventsarray[] = $event;
			}
			return $eventsarray;
		} else {
			return false;
		}
	}

	public function getEventsPage($number, $offset) {
		$events = $this->db->order_by("id","desc")->get('events', $number, $offset);
		if ($events->num_rows() > 0 ) {
			foreach($events->result() as $event){
				$evnetsarray[] = $event;
			}
			return $eventsarray;
		} else {
			return false;
		}
	}

	public function getEventsPageWithSeriesCount($number, $offset) {
		$offset = (!is_numeric($offset)  ? 0 : $offset);
		$events = $this->db->query('SELECT  series.*, (SELECT COUNT(*) FROM talks WHERE talks.seriesid = series.id) AS "numtalks" FROM series LIMIT ' . $offset . ', ' . $number);
		if ($events->num_rows() > 0 ) {
			foreach($events->result() as $event){
				$eventsarray[] = $event;
			}
			return $eventsarray;
		} else {
			return false;
		}
	}

	public function getEventById($EventId) {
		$EventId = $this->db->escape($EventId);
		$events = $this->db->get_where('events', 'id = '.$EventId);
		return ($events->num_rows() > 0) ? array($events->row()) : false;
	}

	public function getAllEventsTitles() {
		$events = $this->db->select('id, title')->from('events')->order_by("id", "ASC")->get();
		if ($events->num_rows() > 0 ) {
			foreach($events->result() as $event){
				$eventsarray[] = $event;
			}
			return $eventsarray;
		} else {
			return false;
		}
	}

	public function editEvent($array, $id) {
		$events = $this->db->where("id", $id)->update("events", $array);
		return $this->db->affected_rows();
	}

	public function addEvent($array) {
		$events = $this->db->insert("events", $array);
		return $this->db->insert_id();
	}

	public function deleteEvent($eventId) {
		if ($this->countSeriesInEvent($eventId) != 0) {
			//need to clear the references to this event first...
			$this->db->where("eventid", $eventId)->update("series", array("eventid"=>NULL));
		}
		$this->db->where("id", $eventId)->delete("events");
		return true;
	}
}
