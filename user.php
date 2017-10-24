<?php
require_once('connect.php');

class User extends connect {

	private $db;

	public function __construct() {
		$this->db = parent::__construct();
	}

	public function login($username, $password) {

		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$result = $this->db->query($sql);

		if ($result->num_rows > 0) {
		    $row = $result->fetch_assoc();
				$_SESSION['user_session'] = $row['id'];
				$_SESSION['message'] = 'Successfully logged in!'	;
				return true;
		} else {
			$_SESSION['message'] = "Username and password did not match!";
			return false;
		}
	}

	public function register($firstName, $lastName, $username, $password) {
		if (isset($firstName) && isset($lastName) && isset($username) && isset($password)) {

			$sql = "INSERT INTO users (first_name, last_name, username, password)
			VALUES ('$firstName', '$lastName', '$username', '$password')";

			if ($this->db->query($sql)) {
				$_SESSION['message'] = "Successful registration";
			    return true;
			} else {	
				$_SESSION['message'] = $this->db->error;
				return false;
			}			
		} 

		$_SESSION['message'] = "I need all the data!";
		return false;
	}

	public function update($id, $firstName, $lastName, $username, $password) {
		if (isset($firstName) && isset($lastName) && isset($username) && isset($password)) {

			$sql = "UPDATE users SET first_name='$firstName', last_name='$lastName', username='$username', password='$password' WHERE id='$id'";

			if ($this->db->query($sql)) {
				$_SESSION['message'] = "Successfully update";
			    return true;
			} else {	
				$_SESSION['message'] = $this->db->error;
				return false;
			}			
		} 

		$_SESSION['message'] = "I need all the data!";
		return false;
	}

	public function getUserData($id) {
		$sql = "SELECT * FROM users WHERE id='$id' limit 1";
		$result = $this->db->query($sql);

		if ($result->num_rows > 0) {
			$row = mysqli_fetch_object($result);
			return $row;
		} else {
			return false;
		}
	}

	public function isLoggedIn() {
		if(isset($_SESSION['user_session'])) {
			return true;
		}	
		return false;
	}

	public function logout() {
		session_destroy();
        unset($_SESSION['user_session']);
        return true;
	}
}