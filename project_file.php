<?php
include_once 'dbconnect.php';
session_start();
ob_start();

if (!isset($_SESSION['user'])) {
		header("Location: index.php");
		exit;
}

$res = mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow = mysql_fetch_array($res);

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.js"></script>
</head>
<body>
	檔案上傳<br>
		<form action="project_file_upload.php" method="post" enctype="multipart/form-data">
		  <input type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
			<input type="hidden" name="project_Id" value="<?php echo $_GET['id']; ?>">
			<input type="hidden" name="user_Id" value="<?php echo $userRow[0]; ?>">
			<label for="file"></label><br>
			<input type="submit" value="Upload" disabled />
		</form>
		<?php
		if(isset($_GET['success']))
		{
			?>
			<label>上傳成功<a href="project_file_view.php">瀏覽檔案</a></label>
			<?php
		}
		else if(isset($_GET['fail']))
		{
			?>
			<label>上傳失敗</label>
			<?php
		}
		else
		{
			?>
			<a href="project_file_view.php?id=<?php echo $_GET['id']; ?>">瀏覽已上傳檔案</a><br>
			<a href="project_home.php?id=<?php echo $_GET['id']; ?>">專案首頁</a>
			<?php
		}
		?>
		<script type="text/javascript">
		$(document).ready(
			function(){
				$('input:submit').attr('disabled',true);
				$('input:file').change(
					function(){
						if ($(this).val()){
							$('input:submit').removeAttr('disabled');
						}
						else {
							$('input:submit').attr('disabled',true);
						}
					});
				});
		</script>
		<script src="js/custom-file-input.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
