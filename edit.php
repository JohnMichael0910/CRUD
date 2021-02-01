<?php 
	include_once("config.php");


if( isset($_POST['update']))
{
			$ID = mysqli_real_escape_string($mysqli, $_POST['ID']);
			$Name = mysqli_real_escape_string($mysqli, $_POST['Name']);
			$birthday = mysqli_real_escape_string($mysqli, $_POST['birthday']);

			if( empty($Name) || empty($birthday) ){

				if(empty($Name)){
					echo "<font color='red'> Name field is empty. </font><br/>";
				}

				if(empty($birthday)){
					echo "<font color='red'> Age field is empty. </font><br/>";
				}

			
				echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

			} else {

				$result = mysqli_query($mysqli, "UPDATE birthdays set Name='$Name', birthday='$birthday' WHERE ID=$ID");
				header("Location: index.php");
				
			}

}
?>



<?php 

	$ID = $_GET['ID'];

	$result = mysqli_query($mysqli,"SELECT * from birthdays where id=$ID");

	while($res = mysqli_fetch_array($result))
	{
		$Name = $res['Name'];
		$birthday = $res['birthday'];
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit data</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</head>
<body>

	<form name="form1" method="post" action="edit.php">

		<table widht="25%" border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="Name" value="<?php echo $Name;?>"></td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td><input type="text" name="birthday" value="<?php echo $birthday;?>" ></td>
			</tr>
			
			<tr>
				<td>
					<input type="hidden" name="ID" value="<?php echo $_GET['ID'];?>">
				</td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>		
		

	</form>



	
</body>
</html>