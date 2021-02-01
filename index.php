<?php

  //initialize session
  session_start();

  if( !isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location: login.php');
    exit;
  }
?>


<?php 
	include_once("config.php");

	$result = mysqli_query($mysqli, "SELECT * FROM birthdays");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background: url(bg.jpg)

		}
		h1{
			color: pink;
			text-align: center;
		}
	</style>
</head>
<body>
		<h1><?php echo "CRUD PHP Web App"; ?></h1> 
		<div class="row">
			<div class="col">
				<a href="add.html" class="btn btn-warning">Add Data</a><br/><br/>
			
		</div>

			<div class="justify-content-between">
			<p><a href="logout.php" class="btn btn-danger">Logout</a></p>
		</div>
		</div>
	<table class="table table-dark">
		<tr bgcolor='#cccccc'>
			<td>ID</td>
			<td>Birthday</td>
			<td>Name</td>
			<td>Created</td>
			<td>Update</td>

		</tr>


		<?php 

		while( $res = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$res['ID']."</td>";
			echo "<td>".$res['birthday']."</td>";
			echo "<td>".$res['Name']."</td>";
			echo "<td>".$res['created_at']."</td>";
			echo "<td><a href=\"edit.php?ID=$res[ID]\">Edit</a> | <a href=\"delete.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a></td>";
			echo "</tr>";
		} 

		?>
</body>
</html>