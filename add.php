<?php 
	include_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Script</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<style type="text/css">
  body{
      background: url(bg.jpg)
      

      }
      a{
      	text-align:  center;
      }
   	font{
   		text-align: center;
   	}
</style>
      

    
</head>

<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-dark mt-5">

<?php
if( isset($_POST['Submit'])){
	$Name = mysqli_real_escape_string($mysqli, $_POST['Name']);
	$birthday = mysqli_real_escape_string($mysqli, $_POST['birthday']);
	

	if( empty($Name) || empty($birthday) ){

		if(empty($Name)){
			echo "<font color='red'> NAME FIELD IS EMPTY! </font><br/>";
		}

		if(empty($birthday)){
			echo "<font color='red'> BIRTHDAY FIELD IS EMPTY! </font><br/>";
		}


		echo "<br/><a href='javascript:self.history.back();' class='btn btn-success btn-block'>Go Back</a>";

	} else {

		$result = mysqli_query($mysqli, "INSERT INTO birthdays(Name, birthday) VALUES ('$Name', '$birthday')");
		echo "<font color='green'> Data Added Successfully.";
		echo "<br/><a href='index.php'> View Result </a>";
	}


}
?>
</div></div></div></div>

	
</body>
</html>