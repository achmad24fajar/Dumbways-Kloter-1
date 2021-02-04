<?php

include('Queries/Connection.php');

class Login extends Connection
{

	public function sign_in($email, $password){
	    $sql = "SELECT * FROM user WHERE email=:email OR password=:password";
	    $statement = $this->dbconn->prepare($sql);
	    
	    $params = array(
	        ":email" => $email,
	        ":password" => $password
	    );

	    $statement->execute($params);

	    $user = $statement->fetch(PDO::FETCH_ASSOC);

	    if($user){
	        if($password == $user["password"]){
	            session_start();
	            $_SESSION["user"] = $user;
	            header("Location: Dashboard.php");
	        }else{
	        	echo "Gagal Masuk";
	        }
	    }
	}
}

?>