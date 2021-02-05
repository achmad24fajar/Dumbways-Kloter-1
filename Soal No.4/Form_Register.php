<?php
include('Functions/Register.php');
if(isset($_POST['register'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$save = new Register;
	$status = $save->create($name, $email, $pass);
	if($status){
		header('Location: Form_Login.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Regiter Here</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="card p-4 mt-5 mx-auto" style="width: 60%">
			<div class="card-title text-center">
				<h2>Register Here</h2>
			</div>
			<div class="card-content">
				<form method="POST" action="">
					<div class="mb-3">
						<input type="text" name="name" placeholder="Name" class="form-control">
					</div>
					<div class="mb-3">
						<input type="email" name="email" placeholder="Email" class="form-control">
					</div>
					<div class="mb-3">
						<input type="password" name="password" placeholder="Password" class="form-control">
					</div>
					<div class="mb-3">
						<input type="submit" name="login" value="Login" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>