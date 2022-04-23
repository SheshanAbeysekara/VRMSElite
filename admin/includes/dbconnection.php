<!-- 
PPA Project - Elite Squad
Vehicle Repair Management System Website -->



<?php

$hostname = "us-cdbr-east-05.cleardb.net";
$username = "be3f3caab396e7";
$password = "ac56655c";
$db = "heroku_dc6170e48d9001f";

$con = mysqli_connect($hostname, $username, $password, $db); 
	if (!$con) {
  		die("Sorry, Connection failed: " . mysqli_connect_error());
	} 
?>
