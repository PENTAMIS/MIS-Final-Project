<?php
  include_once 'dbconnect.php';
  session_start();

  $res = mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow = mysql_fetch_array($res);

  $res = mysql_query("SELECT * FROM projects WHERE projectId=".$_GET['id']);
  $projectRow = mysql_fetch_array($res);

  echo $projectRow[3];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>專案首頁</title>
  </head>
  <body>
    專案首頁<br>
    <a href="project_message.php?id=<?php echo $_GET['id']; ?>">留言板</a><br>
    <a href="project_mission.php?id=<?php echo $_GET['id']; ?>">任務區</a><br>
    <a href="project_calender.php?id=<?php echo $_GET['id']; ?>">行事曆</a><br>
    <a href="project_file.php?id=<?php echo $_GET['id']; ?>">檔案區</a><br>
    <?php
      if ($userRow[0] == $projectRow[1]){
        echo "<a href=project_setting.php?id={$_GET['id']}>專案設定</a><br>";
        echo "<a href=project_delete.php?id={$_GET['id']}>刪除專案</a><br>";
      }
    ?>
    <a href="home.php">回首頁</a>
  </body>
</html>
