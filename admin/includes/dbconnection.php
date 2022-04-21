<!-- 
PPA Project - Elite Squad
Vehicle Repair Management System Website -->

<?php

$hostname = "us-cdbr-east-05.cleardb.net ";
$username = "be3f3caab396e7";
$password = "ac56655c";
$db = "heroku_db38da5d8dd34df";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}

?>
