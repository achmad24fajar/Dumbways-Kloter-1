<?php

/**
 * 
 */
class Register
{
	public $dbconn;
	public $fixId;

	function __construct()
	{
		try {
			$this->dbconn = new PDO('mysql:dbname=dbschool;host=127.0.0.1', "root", "");
		} catch(PDOexception $e) {
			echo 'Connection Failed: '. $e->getMessage();
		}
	}

	public function create($name, $email, $password){
		$create = $this->dbconn->prepare('INSERT INTO user (name, email, password) values (?,?,?)');

		$create->bindParam(1, $name);
		$create->bindParam(2, $email);
		$create->bindParam(3, $password);

		$create->execute();
		return $create->rowCount();
	}

}
?>