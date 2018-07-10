<?php
error_reporting(0);

class db{
	public $host="localhost";
	public $username="root";
	public $password="";
	public $dbname="school";
	public $connect;
	
	
	function connect(){	
	$this->connect=mysqli_connect($this->host,$this->username,$this->password);
	
		mysqli_select_db($this->connect,$this->dbname);
		
	}
	
}
