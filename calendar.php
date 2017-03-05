    <?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>行事曆</title>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <script src="jquery.min.js"></script>
  </head>
  <body>
    行事曆頁面<br>

    <div id="calendar_div">
    	<?php echo getCalender(); ?>
    </div>

    <a href="home.php">回首頁</a>
  </body>
</html>
