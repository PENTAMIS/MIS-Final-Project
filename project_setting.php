<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 $res = mysqli_query($db, "SELECT * FROM projects WHERE projectId=".$_GET['id']);
 $projectRow = mysqli_fetch_array($res);


 //如果非登入狀態將導回首頁
 if (!isset($_SESSION['user'])) {
     header("Location: index.php");
     exit;
 }

 $error = false;

 $res = mysqli_query($db, "SELECT projects_stageId FROM projects_stage WHERE projectId=".$_GET['id']);
 $projects_stageId = array();
 for ($i = 0; $i < mysqli_num_rows($res); $i++) {
   $projects_stageId[] = mysqli_result($res,$i,0);
 }

 if (isset($_POST['btn-project_create'])) {
     //排除不合規定之name及passwords
     $project_creatorId = $_POST['project_creatorId'];

     $project_name = strip_tags($_POST['project_name']);
     $project_name = htmlspecialchars($project_name);

     $project_class = strip_tags($_POST['project_class']);
     $project_class = htmlspecialchars($project_class);

     $project_teacher = strip_tags($_POST['project_teacher']);
     $project_teacher = htmlspecialchars($project_teacher);

     $project_deadline = $_POST['project_deadline'];

     $project_Id = $_POST['project_Id'];

     $project_stage_name_1 = $_POST['project_stage_name_1'];
     $project_stage_name_1 = strip_tags($_POST['project_stage_name_1']);
     $project_stage_name_1 = htmlspecialchars($project_stage_name_1);

     $project_stage_start_1 = $_POST['project_stage_start_1'];
     $project_stage_end_1 = $_POST['project_stage_end_1'];

     $project_stage_name_2 = $_POST['project_stage_name_2'];
     $project_stage_name_2 = strip_tags($_POST['project_stage_name_2']);
     $project_stage_name_2 = htmlspecialchars($project_stage_name_2);

     $project_stage_start_2 = $_POST['project_stage_start_2'];
     $project_stage_end_2 = $_POST['project_stage_end_2'];

     $project_stage_name_3 = $_POST['project_stage_name_3'];
     $project_stage_name_3 = strip_tags($_POST['project_stage_name_3']);
     $project_stage_name_3 = htmlspecialchars($project_stage_name_3);

     $project_stage_start_3 = $_POST['project_stage_start_3'];
     $project_stage_end_3 = $_POST['project_stage_end_3'];

     if (empty($project_name)) {
         $error = true;
         $project_nameError = "請輸入專案名稱";
     }

     if (empty($project_class)) {
         $error = true;
         $project_classError = "請輸入課程(活動)名稱";
     }

     if (empty($project_teacher)){
         $error = true;
         $project_teacherError = "請輸入指導老師";
     }

     if (!$error) {
         $query = "UPDATE projects SET
                  projectName = '$project_name',
                  projectClassName = '$project_class',
                  projectTeacher = '$project_teacher',
                  projectDeadline = '$project_deadline' WHERE projectId =".$_GET['id'];
         $res_projects = mysqli_query($db, $query);

         $query = "UPDATE projects_stage SET
                  project_stageStart = '$project_stage_start_1',
                  project_stageEnd = '$project_stage_end_1',
                  project_stageName = '$project_stage_name_1' WHERE projects_stageId =".$projects_stageId[0];
         $res_stage = mysqli_query($db, $query);

         $query = "UPDATE projects_stage SET
                  project_stageStart = '$project_stage_start_2',
                  project_stageEnd = '$project_stage_end_2',
                  project_stageName = '$project_stage_name_2' WHERE projects_stageId =".$projects_stageId[1];
         $res_stage = mysqli_query($db, $query);

         $query = "UPDATE projects_stage SET
                  project_stageStart = '$project_stage_start_3',
                  project_stageEnd = '$project_stage_end_3',
                  project_stageName = '$project_stage_name_3' WHERE projects_stageId =".$projects_stageId[2];
         $res_stage = mysqli_query($db, $query);


         if ($res_projects&&$res_stage) {
             $errTyp = "success";
             $errMSG = "更新成功";
             unset($project_creatorId);
             unset($project_name);
             unset($project_class);
             unset($project_teacher);
             unset($project_creattime);
             unset($project_deadline);
             unset($project_Id);
             unset($project_stage_name_1);
             unset($project_stage_name_2);
             unset($project_stage_name_3);
             unset($project_stage_start_1);
             unset($project_stage_end_1);
             unset($project_stage_start_2);
             unset($project_stage_end_2);
             unset($project_stage_start_3);
             unset($project_stage_end_3);

         } else {
             $errTyp = "danger";
             $errMSG = "更新失敗";
         }
     }
 }

 //抓取登入之帳戶資料
 $res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow = mysqli_fetch_array($res);

 $query_projects = mysqli_query($db, "SELECT * FROM projects WHERE projectId=".$_GET['id']);
 $projectRow = mysqli_fetch_array($query_projects);

 $res = mysqli_query($db, "SELECT project_stageStart FROM projects_stage WHERE projectId=".$_GET['id']);
 $project_stageStartRow = array();
 for ($i = 0; $i < mysqli_num_rows($res); $i++) {
   $project_stageStartRow[] = mysqli_result($res,$i,0);
 }

 $res = mysqli_query($db, "SELECT project_stageEnd FROM projects_stage WHERE projectId=".$_GET['id']);
 $project_stageEndRow = array();
 for ($i = 0; $i < mysqli_num_rows($res); $i++) {
   $project_stageEndRow[] = mysqli_result($res,$i,0);
 }

 $res = mysqli_query($db, "SELECT project_stageName FROM projects_stage WHERE projectId=".$_GET['id']);
 $project_stageNameRow = array();
 for ($i = 0; $i < mysqli_num_rows($res); $i++) {
   $project_stageNameRow[] = mysqli_result($res,$i,0);
 }


 function mysqli_result($res,$row=0,$col=0){
 $numrows = mysqli_num_rows($res);
 if ($numrows && $row <= ($numrows-1) && $row >=0){
     mysqli_data_seek($res,$row);
     $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
     if (isset($resrow[$col])){
         return $resrow[$col];
     }
 }
 return false;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Project Index</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="css/hover-min.css">
  	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  	<link rel="stylesheet" href="assets/css/bootstrap.css">
  	<script src="assets/js/jquery-3.1.1.min.js"></script>
  	<!--選取日期-->
  	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.js"></script>
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
  	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css">

  	<link rel="stylesheet" href="assets/css/PSet.css">
    <script type="text/javascript">
    	$(function(){
    		// 預設顯示第一個 Tab
    		var _showTab = 0;
    		var $defaultLi = $('ul.tabs li').eq(_showTab).addClass('active');
    		$('.tab_content').eq($defaultLi.index()).siblings().hide();

    		// 當 li 頁籤被點擊時...
    		// 若要改成滑鼠移到 li 頁籤就切換時, 把 click 改成 mouseover
    		$('ul.tabs li').mouseover(function() {
    			// 找出 li 中的超連結 href(#id)
    			var $this = $(this),
    				_index = $this.index();
    			// 把目前點擊到的 li 頁籤加上 .active
    			// 並把兄弟元素中有 .active 的都移除 class
    			$this.addClass('active').siblings('.active').removeClass('active');
    			// 淡入相對應的內容並隱藏兄弟元素
    			$('.tab_content').eq(_index).stop(false, true).fadeIn().siblings().hide();

    			return false;
    		}).find('a').focus(function(){
    			this.blur();
    		});
    	});
    </script>
  </head>
  <body>
    <div class="container-fluid">
			<ul class="nav_area2">
			  <li class="buttom2"><a href="home.php">首頁</a></li>
			  <li class="buttom2">任務區</li>
			  <li class="buttom2">專案行事曆</a></li>
			  <li class="buttom2"><a href="project_setting.php?id=<?php echo $_GET['id']; ?>">專案設定</li>
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
                    我的專案
                  </a>
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
                    行事曆
                  </a>
                </h4>
              </div>
            </div>
            <div class="buttom">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                    個人設定
                  </a>
                </h4>
              </div>
            </div>
          </div>
        </div>
        <hr class="line3"></hr>
        </div>
		   </div>
	    </div>
      <div id="tab0" class="content">
		    <h2>專案設定</h2>
		    <table id="PSetting">
			  <tbody>
        <form method="post" action="project_setting.php?id=<?php echo $_GET['id']; ?>" action="form-handler" autocomplete="off" id="project_setting">
				<tr class="PS-1">
					<td class="PS1-1">專案名稱</td>
					<td class="PS1-2"><input type="text" name="project_name" placeholder="請輸入專案名稱" maxlength="40" value="<?php echo $projectRow[3]; ?>" /></td>
          <?php if (isset($project_nameError)){echo $project_nameError.'<br>';} ?>
					<td class="PS1-3"><input type=submit value=">" name="submit"></td>
				</tr>
				<tr class="PS-1">
					<td class="PS1-1">課程名稱（或活動名稱）</td>
					<td class="PS1-2"><input type="text" name="project_class" placeholder="請輸入課程(活動)名稱" maxlength="40" value="<?php echo $projectRow[4]; ?>" /></td>
          <?php if (isset($project_classError)){echo $project_classError.'<br>';} ?>
          <td class="PS1-3"><input type=submit value=">" name="submit"></td>
				</tr>
				<tr class="PS-1">
					<td class="PS1-1">授課老師</td>
					<td class="PS1-2"><input type="text" name="project_teacher" placeholder="請輸入指導老師" maxlength="40" value="<?php echo $projectRow[5]; ?>" /></td>
          <?php if (isset($project_teacherError)){echo $project_teacherError.'<br>';} ?>
          <td class="PS1-3"><input type=submit value=">" name="submit"></td>
				</tr>
				<tr class="PS-1">
					<td class="PS1-1">參與人員(尚未寫修改功能)</td>
					<td class="PS1-2"><input type="text" name="參與人員"></td>
					<td class="PS1-3"><input type=submit value=">" name="submit"></td>
				</tr>
				<tr class="PS-1">
					<td class="PS1-1">到期期限</td>
					<td class="PS1-2"><input type="date" name="project_deadline" maxlength="40" value="<?php echo $projectRow[7]; ?>" /></td>
					<td class="PS1-3"><input type=submit value=">" name="submit"></td>
				</tr>
				<tr class="PS-1">
					<td class="PS1-1">管理員(預設創立人)</td>
					<td class="PS1-2"><input type="text" name="管理員"></td>
					<td class="PS1-3"><input type=submit value=">" name="submit"></td>
				</tr>
				<tr class="PS-1">
					<td class="PS1-1">任務修改權限(未寫)</td>
					<td class="PS1-2">
						<select name="authority">
							<option value="">全體成員</option>
							<option value="">僅管理員</option>
						</select>
					</td>
					<td class="PS1-3"><input type=submit value=">" name="submit"></td>
				</tr>
			</tbody>
		</table>
	</div>
  <?php /*
  大區段部分code，尚未套入。
  大區段一：
  <input type="text" name="project_stage_name_1" placeholder="請輸入區段名稱" maxlength="40" value="<?php echo $project_stageNameRow[0]; ?>" />
  <input type="date" name="project_stage_start_1" maxlength="40" value="<?php echo $project_stageStartRow[0]; ?>" />
  <input type="date" name="project_stage_end_1" maxlength="40" value="<?php echo $project_stageEndRow[0]; ?>" /><br>
  大區段二：
  <input type="text" name="project_stage_name_2" placeholder="請輸入區段名稱" maxlength="40" value="<?php echo $project_stageNameRow[1]; ?>" />
  <input type="date" name="project_stage_start_2" maxlength="40" value="<?php echo $project_stageStartRow[1]; ?>" />
  <input type="date" name="project_stage_end_2" maxlength="40" value="<?php echo $project_stageEndRow[1]; ?>" /><br>
  大區段三：
  <input type="text" name="project_stage_name_3" placeholder="請輸入區段名稱" maxlength="40" value="<?php echo $project_stageNameRow[2]; ?>" />
  <input type="date" name="project_stage_start_3" maxlength="40" value="<?php echo $project_stageStartRow[2]; ?>" />
  <input type="date" name="project_stage_end_3" maxlength="40" value="<?php echo $project_stageEndRow[2]; ?>" /><br>
  */?>
  <button type="submit" name="btn-project_create">更改</button></br>
  <?php
  if (isset($errMSG)) {
       ?>
       <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
       <?php echo "<script type='text/javascript'>alert('$errMSG');</script>";
  }
  ?>
</form>
  <script type="text/javascript">
    $(".timeline").on("mouseenter mouseleave", function (event) { //挷定滑鼠進入及離開事件
      if (event.type == "mouseenter") {
        $(this).css({"overflow-x": "scroll"}); //滑鼠進入
      } else {
        $(this).scrollTop(0).css({"overflow-x": "hidden"}); //滑鼠離開
      }
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('input[name$="Date"]').datepicker({
            dateFormat: 'yy/mm/dd',
            beforeShow: function() {
                if ($(this).attr('maxDate')) {
                    var dateItem = $('#' + $(this).attr('maxDate'));
                    if (dateItem.val() !== "") {
                        $(this).datepicker('option', 'maxDate', dateItem.val());
                    }
                }

                if ($(this).attr('minDate')) {
                    var dateItem = $('#' + $(this).attr('minDate'));
                    if (dateItem.val() !== "") {
                        $(this).datepicker('option', 'minDate', dateItem.val());
                    }
                }
            }
        });
    });
  </script>
  </body>
</html>

<?php ob_end_flush(); ?>
