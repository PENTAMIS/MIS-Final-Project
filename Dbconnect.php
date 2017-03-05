<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'mis';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

	   mysqli_query("SET NAMES 'utf8'");
       mysqli_query("SET CHARACTER_SET_CLIENT=utf8");
       mysqli_query("SET CHARACTER_SET_RESULTS=utf8");
       $this->MySQLiObjectVariable->set_charset("utf8mb4"); 
?>