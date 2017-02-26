<?php
  require_once 'Dbconnect.php';
  $res = mysql_query("SELECT * FROM projects WHERE projectId=".$_GET['id']);
  $projectRow = mysql_fetch_array($res);

  echo $projectRow[3];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>任務區</title>
  </head>
  <body>
    任務頁面<br>
    <a href="project_home.php?id=<?php echo $_GET['id']; ?>">專案首頁</a>
  </body>
</html>
