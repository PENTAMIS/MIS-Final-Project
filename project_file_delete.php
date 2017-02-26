<?php
include_once('Dbconnect.php');

if(isset($_GET['del']) )
	{
		$file = $_GET['del'];
		$id = $_GET['id'];
		$file_projectId = $_GET['projectId'];
		$del = unlink('uploads/'.$file);
		if($del){
		$sql = "DELETE FROM tbl_uploads WHERE id = '$id'";
		$res = mysql_query($sql) or die("Failed".mysql_error());
		if($res){
            echo "<script>
            alert('Deleted');
						window.location.href='project_file_view?id=$file_projectId';
            </script>";
						//header("Location: project_file_view.php?id=$file_projectId");

		} else
		{
            echo "<script>
            alert('error while deleting file');
						window.location.href='project_file_view?id=$file_projectId';
            </script>";
						//header("Location: project_file_view.php?id=$file_projectId");
		}
		}
	}
?>
