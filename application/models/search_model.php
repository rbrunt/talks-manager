<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_Model extends CI_Model {

	public function searchTalkNames($searchTerm) {
		//$results = $this->db->select("talks.*, series.title as seriestitle")->like("talks.title", $searchTerm, "both")->join("series", "talks.seriesid = series.id")->get("talks", 10); // Limit 10
		$escapedSearch = $this->db->escape_like_str($searchTerm);
		$query = "(SELECT `talks`.*, `series`.`title` AS seriestitle FROM `talks` JOIN `series` ON `talks`.`seriesid` = `series`.`id` WHERE `talks`.`title` LIKE '%$escapedSearch%') 
		UNION 
		(SELECT `talks`.*, `series`.`title` AS seriestitle FROM `talks` JOIN `series` ON `talks`.`seriesid` = `series`.`id` WHERE `talks`.`passage` LIKE '%$escapedSearch%') 
		UNION
		(SELECT `talks`.*, `series`.`title` AS seriestitle FROM `talks` JOIN `series` ON `talks`.`seriesid` = `series`.`id` WHERE `talks`.`date` LIKE '%$escapedSearch%') 
		UNION
		(SELECT `talks`.*, `series`.`title` AS seriestitle FROM `talks` JOIN `series` ON `talks`.`seriesid` = `series`.`id` WHERE `talks`.`speakername` LIKE '%$escapedSearch%') 
		LIMIT 10";
		$results = $this->db->query($query);
		if ($results->num_rows() > 0 ) {
			foreach($results->result() as $result){
				$resultarray[] = $result;
			}
			return $resultarray;
		} else {
			return false;
		}
	}
	public function searchSeriesByName($searchTerm) {
		$results = $this->db->select("series.*")->like("series.title", $searchTerm, "both")->get("series", 10);
		if ($results->num_rows() > 0 ) {
			foreach($results->result() as $result){
				$resultarray[] = $result;
			}
			return $resultarray;
		} else {
			return false;
		}
	}


}

