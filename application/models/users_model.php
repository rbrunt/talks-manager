<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {

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
	
	public function getUsersPage($number, $offset) {
		$users = $this->db->get('users', $number, $offset);
		if ($users->num_rows() > 0 ) {
			foreach($users->result() as $user){
				$userarray[] = $user;
			}
			return $userarray;
		} else {
			return false;
		}
	}

	public function countUsers() {
		$users = $this->db->count_all('users');
		return $users;
	}

	public function getUserById($userId) {
		$user = $this->db->where("id", $userId)->get("users");
		return ($user->num_rows() > 0) ? $user->row() : false;
	}

	public function getUserByEmail($email) {
		$user = $this->db->where("email", $email)->get("users");
		return ($user->num_rows() > 0) ? $user->row() : false;
	}

	public function addUser($email) {
		if ($this->getUserByEmail($email)) return false;
		$token = bin2hex(mcrypt_create_iv(16)); // Generate a 32 character hex token which we'll send in an email

		$insertArray = array(
			"email" => $email,
			"token" => $token
			);

		$this->db->insert("users", $insertArray); // Insert the new user and their token into the DB

		return array("token"=>$token, "insertId"=>$this->db->insert_id());
	}

	public function login($email, $password) {
		$user = $this->getUserByEmail($email);
		
		if ($user == false) return false;
		if ($user->password != hash("SHA512", $password.$user->salt)) return false;
		$this->session->set_userdata("userid", $user->id);
		$this->session->set_userdata("useremail", $user->email);
		return true;
	}

	public function logout() {
		$this->session->unset_userdata("userid");
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
