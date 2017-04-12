<?php
	require("calender_functions.php") ;
	$_SESSION['projectId'] = $_GET['id'];
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

<div id="calendar_div">
	<?php
		echo getCalender();
	?>
</div>
</body>
<script>
//讓頁面自動重整
	window.onload = function() {
	    if(!window.location.hash) {
	        window.location = window.location + '#loaded';
	        window.location.reload();
	    }
	}
</script>

</html>
