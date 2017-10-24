<?php
session_start();

class connect {

private $hostname = 'localhost';
private $username = 'root';
private $password = 'Patapon300';
private $dbName = 'login';

	public function __construct() {
		$conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);

		if($conn->connect_error){
			die('CONNECTION FAILED');
		}
		
		return $conn;
	}	
}	

require_once('user.php');
$user = new User;