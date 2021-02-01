<?php

$ID = $_GET['ID'];

include("config.php");
$result = mysqli_query($mysqli, "DELETE FROM birthdays where ID=$ID");

header("Location:index.php");

?>