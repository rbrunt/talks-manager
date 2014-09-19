<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions_Model extends CI_Model {

	Public function getQuestionsByEventId($EventId) {
		$EventId = $this->db->escape($EventId);
		$questions = $this->db->get_where('questions', 'eventid = '.$EventId);
		if ($questions->num_rows() > 0) {
			return $questions;
		} else {
			return false;
		}
	}

	public function getQuestionById($QuestionId) {
		$QuestionId = $this->db->escape($QuestionId);
		$questions = $this->db->get_where('questions', 'id = '.$QuestionId);
		return ($questions->num_rows() == 1) ? $questions->row() : false;
	}

	Public function editQuestion($array, $id) {
		$questions = $this->db->where("id", $id)->update("questions", $array);
		return $this->db->affected_rows();
	}

	public function addQuestion($array) {
		$question = $this->db->insert("questions", $array);
		return $this->db->insert_id();
	}

	public function deleteQuestion($questionId) {
		$this->db->where("id", $questionId)->delete("questions");
		return true;
	}
}
