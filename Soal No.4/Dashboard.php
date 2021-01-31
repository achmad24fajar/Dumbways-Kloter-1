<?php

session_start();
if(!isset($_SESSION["user"])) header("Location: Login.php");

include('Posts.php');
$posts = new Posts;
$data = $posts->index();

?>
<!DOCTYPE html>
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
		<div class="row">
			<div class="col">
				<a href="Add_School.php" class="btn btn-primary">Add School</a>
			</div>
			<div class="col text-end">
				<a href="Logout.php" class="btn btn-danger">Logout</a>
			</div>
		</div>

	    <?php foreach ($data as $row) {?>
	    	<div class="card mt-4" style="width: 18rem;">
				<img src="..." class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?php echo $row['name_school'] ?></h5>
					<p class="card-text"><?php echo $row['status_school'] ?></p>
					<a href="School_Detail.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Detail</a>
					<a href="Edit_School.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
				</div>
			</div>
	    <?php } ?>
	</div>
    
</body>
</html>