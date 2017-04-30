<?php
session_start();
require_once 'Dbconnect.php';
require_once 'bar.php';


  $res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow = mysqli_fetch_array($res);

  $res = mysqli_query($db, "SELECT * FROM projects WHERE projectId=".$_GET['id']);
  $projectRow = mysqli_fetch_array($res);

  $res = mysqli_query($db, "SELECT projects_stageId FROM projects_stage WHERE projectId=".$_GET['id']);
  $projects_stageId = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $projects_stageId[] = mysqli_result($res,$i,0);
  }

  for ($i = 0; $i < count($projects_stageId) ;$i++) {
    $res = mysqli_query($db, "SELECT missionName FROM projects_stage_missions WHERE projects_stageId=".$projects_stageId[$i]);
    for ($t = 0; $t < mysqli_num_rows($res); $t++) {
      $missionName[] = mysqli_result($res,$t,0);
    }
  }

  for ($i = 0; $i < count($projects_stageId) ;$i++) {
    $res = mysqli_query($db, "SELECT missionDate FROM projects_stage_missions WHERE projects_stageId=".$projects_stageId[$i]);
    for ($t = 0; $t < mysqli_num_rows($res); $t++) {
      $missionDate[] = mysqli_result($res,$t,0);
    }
  }

  $res = mysqli_query($db, "SELECT project_stageName FROM projects_stage WHERE projectId=".$_GET['id']);
  $project_stageName = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $project_stageName[] = mysqli_result($res,$i,0);
  }

  $res = mysqli_query($db, "SELECT project_stageStart FROM projects_stage WHERE projectId=".$_GET['id']);
  $project_stageStart = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $project_stageStart[] = mysqli_result($res,$i,0);
  }

  $res = mysqli_query($db, "SELECT project_stageEnd FROM projects_stage WHERE projectId=".$_GET['id']);
  $project_stageEnd = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $project_stageEnd[] = mysqli_result($res,$i,0);
  }

  echo $project_stageStart[0];
  $project_startdate = strtotime($project_stageStart[0]);
  $project_enddate = strtotime(end($project_stageEnd));
  $days = round(($project_enddate-$project_startdate)/3600/24);

  // $date = $project_stageStart[0];
	// // End date
	// $end_date = $project_stageStart[1];
  //
	// while (strtotime($date) <= strtotime($end_date)) {
  //               echo "$date\n";
  //               $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
	// }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>專案首頁</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/hover-min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<script src="assets/js/jquery-3.1.1.min.js"></script>

	<link rel="stylesheet" href="assets/css/PIndex2.css">
	<script type="text/javascript">
    $(function(){
        var a= $(".date").length;
        var b= $(".assign").length;
        var w= 5*a+ 120*b;

        $('.T1').attr('style', 'width:' + w + 'px;');


    });
</script>
<!-- <script type='text/javascript'>
    $(function() {
        var w = $("#mwt_slider_content").width();
        $('#mwt_slider_content').css('height', ($(window).height()) + 'px'); //將區塊自動撐滿畫面高度

        $("#mwt_fb_tab").mouseover(function() { //滑鼠滑入時
            if ($("#mwt_mwt_slider_scroll").css('right') == '-' + w + 'px') {
                $("#mwt_mwt_slider_scroll").animate({
                    right: '0px'
                }, 600, 'swing');
            }
        });


        $("#mwt_slider_content").mouseleave(function() {　 //滑鼠離開後
            $("#mwt_mwt_slider_scroll").animate({
                right: '-' + w + 'px'
            }, 600, 'swing');
        });
    });
    </script> -->

  </head>
  <body>
    <div class="timeline">
			<img src="http://i.imgur.com/yGw58pM.png" id="background" >

		<div class="T1">

			<!-- <div class="city"> -->
			<div id="line" src="images/hhhhh-06.png" ></div>
			<!-- <hr height="20" color="black" top="180px" > -->
        <?php for ($i = 0; $i < $days; $i++) {?>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id="">
  					<div class="assign" id="as4">
              <?php
                if(isset($missionName[$i])){
  						?>
                  <img src="images/hhhhh-0<?php echo ($i%4) + 1;?>.png" width="125">
              <?php
                }
              ?>
  						<br>
  						<h5>
                <?php
                if(isset($missionName[$i])){
                  echo $missionName[$i];
                }
                ?>
              </h5>
  						<h5 align="center">
                <?php
                if(isset($missionDate[$i])){
                  echo $missionDate[$i];
                }
                ?>
              </h5>
  					</div>
  				</div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>
          <div class="date" id=""></div>

          <?php } ?>

<div style="clear:both"></div>

			<!-- </div> -->
		</div>
	</div>


<!--隱藏卷軸-->
<script type="text/javascript">
$(".timeline").on("mouseenter mouseleave", function (event) { //挷定滑鼠進入及離開事件
  if (event.type == "mouseenter") {
    $(this).css({"overflow-x": "scroll"}); //滑鼠進入
  } else {
    $(this).scrollTop(0).css({"overflow-x": "hidden"}); //滑鼠離開
  }
});
</script>

<!--淡入-->
<script type="text/javascript">
          function GoFadeIn() {
              $('#line').fadeIn(1500, function() {
                  // 淡入動畫完成後會進來這
              });
              $('.assign').fadeIn(3000, function() {
                  // 淡入動畫完成後會進來這
              });
          };



GoFadeIn();
</script>

    <?php
      ?>
  </body>
</html>
