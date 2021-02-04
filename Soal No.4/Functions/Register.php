<?php

include('Queries/Connection.php');

class Register extends Connection
{

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