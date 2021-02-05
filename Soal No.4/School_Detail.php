<?php

session_start();
if(!isset($_SESSION["user"])) header("Location: Login.php");

include('Functions/Posts.php');
$edit = new Posts;
if(isset($_GET['id'])){
	$post = $edit->show($_GET['id']);
}

?>
<html>
<head>
	<title>Dashboard</title>
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
		<div class="card">
			<img src="..." class="card-img-top" alt="...">
				<div class="card-body">
				<h5 class="card-title"><?php echo $post['name_school']; ?></h5>
				<p class="card-text">NPSN: <?php echo $post['npsn']; ?></p>
				<p class="card-text">Alamat: <?php echo $post['address']; ?></p>
				<p class="card-text">Status: <?php echo $post['status_school']; ?></p>
				<p class="card-text">Ditambahkan Oleh: <?php echo $post['name']; ?></p>
			</div>
		</div>
	</div>

	<div class="container mt-4">
		
	</div>
    
</body>
</html>