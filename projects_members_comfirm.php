<?php
ob_start();
session_start();
require_once 'dbconnect.php';
$res = mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow = mysql_fetch_array($res);
$projectId = $_GET['id'];

if (empty($userRow[9])) {
  $userRow[9] = $projectId;
}else{
  $userRow[9] = $userRow[9].",".$projectId;//<--這邊有問題
}

$res = mysql_query("UPDATE users SET user_projectId ='$userRow[9]' WHERE userId =".$SESSION['user']);

if($res){
  echo "<script>
  alert('加入成功！');
  window.location.href='home.php';
  </script>";

}else{
  echo "<script>
  alert('加入失敗！');
  window.location.href='home.php';
  </script>";
}
 ?>
