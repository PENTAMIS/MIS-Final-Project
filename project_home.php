<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require_once 'bar.php';

  $res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow = mysqli_fetch_array($res);

  $res = mysqli_query($db, "SELECT * FROM projects WHERE projectId=".$_GET['id']);
  $projectRow = mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>專案首頁</title>
  </head>
  <body>
    <br><br><br>
    <?php echo $projectRow[3];?>
  </body>
</html>
