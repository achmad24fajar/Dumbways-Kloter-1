<?php

include('Functions/Posts.php');

session_start();
if(!isset($_SESSION["user"])) header("Location: Login.php");

$posts = new Posts;

if(isset($_POST['submit'])){
	$npsn = $_POST['npsn'];
	$name_school = $_POST['name_school'];
	$address = $_POST['address'];
	$logo_school = $_FILES['logo_school'];
	$level = $_POST['level'];
	$status = $_POST['status'];
	$user_id = $_SESSION['user']['id'];

	$save = $posts->create($npsn, $name_school, $address, $logo_school, $level, $status, $user_id);
	if($save){
		header('Location: Dashboard.php');
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New School</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-dark bg-primary">
		<div class="container">
		<a class="navbar-brand">Dashboard</a>
		<span class="text-light"><?php echo $_SESSION["user"]["name"] ?></span>
		</div>
	</nav>
	<div class="container mt-4">
		<h3>Add New School</h3>
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="mb-3">
				<input type="text" name="npsn" placeholder="NPSN" class="form-control" required>
			</div>
			<div class="mb-3">
				<input type="text" name="name_school" placeholder="Name School" class="form-control" required>
			</div>
			<div class="mb-3">
				<input type="text" name="address" placeholder="Address" class="form-control" required>
			</div>
			<div class="mb-3">
				<input type="file" name="logo_school" placeholder="Logo School" class="form-control" required>
			</div>
			<div class="mb-3">
				<select name="level" class="form-control">
					<option>Choose Level</option>
					<option value="SD">SD</option>
					<option value="SMP">SMP</option>
					<option value="SMA">SMA</option>
					<option value="SMK">SMK</option>
					<option value="MI">MI</option>
				</select>
			</div>
			<div class="mb-3">
				<select name="status" class="form-control">
					<option>Choose Status</option>
					<option value="Negeri">Negeri</option>
					<option value="Swasta">Swasta</option>
				</select>
			</div>
			<input type="submit" name="submit" value="Save" class="btn btn-primary">
		</form>
	</div>
</body>
</html>