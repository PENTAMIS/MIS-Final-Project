<?php
	$projectId = $_GET['id'];

	require("calender_functions.php") ;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>專案行事曆</title>
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="jquery.min.js"></script>
</head>
<body>

	<!-- childbar -->
	<div class="container-fluid">
			<ul class="nav_area2">
			  <li class="buttom2"><a href="home.php">首頁</a></li>
			  <li class="buttom2">任務區</li>
			  <li class="buttom2"><a href="project_calender.php?id=<?php echo $_GET['id']; ?>">專案行事曆</a></li>
			  <li class="buttom2">專案設定</li>
			  <li class="buttom2">留言板</li>
			</ul>
  		</div>
  	<!-- mainbar -->
  	<div class="bar">
    <div class="circle circle1"></div>
    <div class="nav_area">
    <div class=class="panel-group" id="accordion">
  <div class="buttom">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        我的專案</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
          <li>進行中</li>
          <li>已完成</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="buttom">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        行事曆</a>
      </h4>
    </div>
  </div>
  <div class="buttom">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        個人設定</a>
      </h4>
    </div>
  </div>
        </div>
</div>
      <hr class="line3"></hr>
      </div>
		</div>
	</div>


<div id="calendar_div">
	<?php echo getCalender(); ?>
</div>

</body>
</html>
