<?php
include_once('Dbconnect.php');

if(isset($_GET['id']) )
	{
		$id = $_GET['id'];
		$sql = "DELETE FROM projects_stage WHERE projectId = '$id'";
		$res = mysql_query($sql) or die("Failed".mysql_error());
    $sql = "DELETE FROM projects WHERE projectId = '$id'";
    $res = mysql_query($sql) or die("Failed".mysql_error());
		if($res){
            echo "<script>
            alert('刪除成功！');
						window.location.href='home.php';
            </script>";

		} else
		{
            echo "<script>
            alert('刪除失敗！');
						window.location.href='home.php';
            </script>";
		}
	}
?>