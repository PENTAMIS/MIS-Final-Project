<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'pcsettingroot';
$dbPassword = '48800';
$dbName = 'cal';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>