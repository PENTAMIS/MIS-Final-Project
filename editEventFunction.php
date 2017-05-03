<?php
	require_once 'dbconnect.php';
	$title = $_POST["title"];
	$place = $_POST["place"];
	$from = $_POST["from"];
	$to = $_POST["to"];
	$id = $_POST["id"];
	$today = date("Y-m-d");

	if($_POST["sel"]==1){ //新增
		$sql ="INSERT INTO events (title,date,created,userId,projectId)  VALUES ( '$title','$from','$today','22','86')";
	}
	else{//修改
		echo $sql ="UPDATE events SET title='$title',date='$from',created='$today' WHERE id='$id'";
	}
	//place,to,其他的不知道放哪 userId&projectId 寫死 用hidden從前面傳之類的
	mysqli_query($db,$sql)or die ("無法新增".mysql_error()); //執行sql語法
	header("Location:personal_calendar.php");
?>
