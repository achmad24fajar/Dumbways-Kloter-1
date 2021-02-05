<?php


class Logout
{
	
	public function sign_out(){
		session_start();
		unset($_SESSION['user']);
		header("Location: Form_Login.php");
	}
}

$logout = new Logout;
$logout->sign_out();

?>