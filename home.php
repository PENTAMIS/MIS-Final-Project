<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 require_once 'bar.php';

 //如果非登入狀態將導回首頁
 if (!isset($_SESSION['user'])) {
     header("Location: index.php");
     exit;
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>首頁</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="mainpage.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function () {
			$('.boxb').mouseover(function() {
    		$(this).removeClass('boxb');
    		$(this).addClass('boxbnew');
		})
		});
		$(function () {
			$('.boxo').mouseover(function() {
    		$(this).removeClass('boxo');
    		$(this).addClass('boxonew');
		})
		});

	</script>
</head>

<body>
  <div class="bigbox">
<!-- <div class="sideboxa"></div>
<div class="sideboxb"></div> -->
<!-- <div> -->
<div id="b-1" class="box"><img src="images/cc-09.png"></div>
<div id="o-1" class="box"><img src="images/cc-05.png"></div>
<div id="a-1" class="box"><img src="images/cc-06.png"></div>
<div id="a-2" class="box"><img src="images/cc-07.png"></div>
<div id="b-2" class="box"><img src="images/cc-08.png"></div>
<div id="o-2" class="boxo d2"><p class="po">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="a-3" class="box"></div>
<!-- <div id="b-3" class="boxb"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div> -->

<!-- <div class="sideboxb s-1"></div>
<div class="sideboxb s-2"></div> -->

<div id="o-3" class="boxo d3"><p class="po">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="a-4" class="box"></div>
<div id="b-4" class="boxb d1"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="o-4" class="boxo d2"><p class="po">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="a-5" class="box"></div>
<div id="b-5" class="boxb d3"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="o-5" class="boxo d4"><p class="po">鄭俊彥在會計學報告新增了一個檔案</p></div>
<!-- <div id="a-6" class="box"></div> -->

<!-- <div class="sideboxb s-3"></div>
<div class="sideboxb s-4"></div>
-->
<div id="b-6" class="boxb d1"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="a-7" class="box"></div>
<div id="o-6" class="boxo d4"><p class="po">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="a-8" class="box"></div>
<div id="o-7" class="boxo d3"><p class="po">鄭俊彥在會計學報告新增了一個檔案</p></div>

<div id="b-7" class="boxb d2"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="a-9" class="box"></div>
<!-- <div id="a-10" class="box"></div> -->

<!-- <div class="sideboxb s-5"></div>
<div class="sideboxb s-6"></div> -->


<div id="o-8" class="boxo d1"><p class="po">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="b-8" class="boxb d4"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="a-10" class="box"></div>
<div id="o-9" class="boxb d2"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div>
<div id="a-11" class="box"></div>
<div id="a-12" class="box"></div>
<div id="b-9" class="boxb d3"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div>
<!-- <div id="b-10" class="boxb"><p class="pb">鄭俊彥在會計學報告新增了一個檔案</p></div> -->

<!-- <div class="sideboxb s-7"></div>
<div class="sideboxb s-8"></div> -->

<!-- </div> -->
</div>
<!-- <script>
$(document).ready(function(){
  $(".boxb").hover(function(){
    $(this).css({"width": "300px","height":"300px"});
  },function(){
    $(this).css({"width": "150px","height":"150px"});

  });
});
</script> -->
    <?php echo "您好！{$userRow['userName']}同學！"?>
    <?php
      for($i = 0; $i < count($postText); $i++){
        echo $postText[$i];?><br><?php
      }
    ?>
</body>
</html>
<?php ob_end_flush(); ?>
