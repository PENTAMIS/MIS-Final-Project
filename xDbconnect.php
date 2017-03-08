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

	     mysql_query("SET NAMES 'utf8'");
       mysql_query("SET CHARACTER_SET_CLIENT=utf8");
       mysql_query("SET CHARACTER_SET_RESULTS=utf8");

?>
