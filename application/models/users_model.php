<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {

	// public function getAll() {
	// 	$series = $this->db->get('series');
	// 	if ($series->num_rows() > 0 ) {
	// 		foreach($series->result() as $single_series){
	// 			$seriesarray[] = $single_series;
	// 		}
	// 		return $seriesarray;
	// 	} else {
	// 		return false;
	// 	}
	// }

	public function addUser($email) {
		if ($this->db->where("email",$email)->from("users")->count_all_results() == 0) {
			$token = bin2hex(mcrypt_create_iv(16)); // Generate a 32 character hex token which we'll send in an email

			$insertArray = array(
				"email" => $email,
				"token" => $token
				);

			$this->db->insert("users", $insertArray); // Insert the new user and their token into the DB

			return array("token"=>$token, "insertId"=>$this->db->insert_id());
		} else {
			return false;
		}

	}

	public function validatePassword($email, $password) {
		$query = $this->db->select("salt, password")->where("email", $email)->get("users"); // Get the sat and hash from DB

		if ($query->num_rows() == 1) {
			$row = $query->row();

			$salt = $row->salt;
			$db_hash = $row->password;

			$hash = hash("SHA512", $password.$salt); // Generate hash from provided Password

			if ($hash == $db_hash) {
				// Passwords match!
				return TRUE;
				echo "suces";
			} else {
				// Wrong Password...
				return FALSE;
			}
		} else {
			// User doesn't exist
			return FALSE;
		}
	}

	public function setPassword($token, $email, $password) {		

		$salt = bin2hex(mcrypt_create_iv(32)); // Generate a cryptographically strong salt
		$hash = hash("SHA512", $password.$salt); // Hash the password and salt

		$insertArray = array(
			"salt"=>$salt,
			"password"=>$hash
			);

		$this->db->where("token",$token)->where("email",$email)->update("users", $insertArray); // Insert salt and hash into DB

		return $this->db->affected_rows();
	}

}
