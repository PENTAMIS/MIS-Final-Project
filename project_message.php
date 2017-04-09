<?php
  require_once 'Dbconnect.php';
  ob_start();
  session_start();

  $projectId = $_GET['id'];

  $res = mysqli_query($db, "SELECT * FROM projects WHERE projectId=".$_GET['id']);
  $projectRow = mysqli_fetch_array($res);

  //echo $projectRow[3];<--專案名稱

  $res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $userRow[] = mysqli_result($res,$i,0);
  }

  $res = mysqli_query($db, "SELECT userName FROM users WHERE userId=".$_SESSION['user']);
  $userName = mysqli_fetch_array($res);

  $res = mysqli_query($db, "SELECT Comtext FROM comment WHERE ProjectId=".$_GET['id']);
  $commentRow = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $commentRow[] = mysqli_result($res,$i,0);
  }

  $res = mysqli_query($db, "SELECT ComId FROM comment WHERE ProjectId=".$_GET['id']);
  $commentRow_Id = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $commentRow_Id[] = mysqli_result($res,$i,0);
  }

  $res = mysqli_query($db, "SELECT ComId FROM comment WHERE ProjectId=".$_GET['id']);
  $commentIdRow = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $commentIdRow[] = mysqli_result($res,$i,0);
  }

  $res = mysqli_query($db, "SELECT ComTime FROM comment WHERE ProjectId=".$_GET['id']);
  $commentTimeRow = array();
  for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $commentTimeRow[] = mysqli_result($res,$i,0);
  }


  $error = false;

  if (isset($_POST['post'])) {
    $text = strip_tags($_POST['text']);
    $text = htmlspecialchars($text);

    $time = $_POST['time'];

    if (empty($text)) {
        $error = true;
        $errMSG = "請輸入文字";
    }

    if (!$error) {
        $query = "INSERT INTO comment(UserId,ProjectId,ComText,ComTime)
                  VALUES('$userRow[0]','$projectRow[0]','$text','$time')";
        $res = mysqli_query($db, $query);

        if ($res) {
          unset($text);
          unset($time);
        }
      }
     echo "<script>
     window.location.href='project_message.php?id=$projectId';
     </script>";
  }

  if(isset($_POST['post_subcomment'])){
    $subcomment = strip_tags($_POST['subcomment']);
    $subcomment = htmlspecialchars($subcomment);

    $ComId_subcomment = $_POST['ComId_subcomment'];

    $time_subcomment = $_POST['time_subcomment'];

    if (empty($subcomment)) {
        $error = true;
        $errMSG = "請輸入文字";
    }

    if (!$error) {
        $query = "INSERT INTO subcomment(ComId,SubComText,UserId)
                  VALUES('$ComId_subcomment','$subcomment','$userRow[0]')";
        $res = mysqli_query($db, $query);

        if ($res) {
          unset($ComId_subcomment);
          unset($subcomment);
        }
      }
     echo "<script>
     window.location.href='project_message.php?id=$projectId';
     </script>";

  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>留言板</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/PPost.css">
    <script type="text/javascript" src="assets/js/PPost.js"></script>
  </head>
  <body>
    <div class="container-fluid">
        <ul class="nav_area2">
            <li class="buttom2"><a href="PIndex.html">首頁</a></li>
            <li class="buttom2">任務區</li>
            <li class="buttom2"><a href="PCalen.html">專案行事曆</a></li>
            <li class="buttom2">專案設定</li>
            <li class="buttom2">留言板</li>
        </ul>
    </div>
    <div class="container-fluid">
        <ul class="nav_area2">
            <li class="buttom2"><a href="project_home.php?id=<?php echo $_GET['id']; ?>">專案首頁</a></li>
            <li class="buttom2">任務區</li>
            <li class="buttom2"><a href="PCalen.html">專案行事曆</a></li>
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
    <br>
    <br>
    <br>
    <!-- 新增留言 -->
    <div class="mainpost">
        <h4>留言板</h4>
        <br>
        <div class="post">
            <div class="btn-group1">
                <a href="javascript:ShowContent(1, 3, 'message')" class="btn">撰寫貼文</a>
                <a href="javascript:ShowContent(2, 3, 'message')" class="btn">新增檔案</a>
                <a href="javascript:ShowContent(3, 3, 'message')" class="btn">建立投票</a>
            </div>
            <div id="message1">
                <form method="post" action="project_message.php?id=<?php echo $_GET['id']; ?>" autocomplete="off" id="revise">
                    <div class="form-group">
                        <br>
                        <textarea class="form-control" row="3" name="text" placeholder=<?php echo $errMSG;?>></textarea>
                    </div>
                    <input type="hidden" name="time" value="<?php echo date('Y-m-d H:i:s', time()); ?>">
                    <input type="file" id="photo1" value="" name="FILE" onchange="this.form.FILEShow.value=this.value">
                    <button type="button" class="btn btn-info btn-s" value="View" onclick="this.form.FILE.click();">新增圖片/影片</button>
                    <img id="show1" src="#" alt="your image">
                    <button id="postsend" type="submit" float="right" name="post">貼文</button>
                </form>
            </div>
            <div id="message2" style="display: none">
                <form>
                    <div class="form-group">
                        <br>
                        <textarea class="form-control" rows="3" placeholder="請上傳檔案......"></textarea>
                    </div>
                    <input type="file" id="photo2" value="" name="FILE" onchange="this.form.FILEShow.value=this.value">
                    <button class="btn" value="View" onclick="this.form.FILE.click();">新增圖片/影片</button>
                    <img id="show2" src="#" alt="your image">
                    <button type="button" float="right">完成</button>
                </form>
            </div>
            <div id="message3" style="display: none">
                <form>
                    <div id="newvote" class="form-group">
                        <h5>標題:</h5>
                        <input type="text" class="form-control" placeholder="請輸入投票標題......">
                        <h5>到期時間:</h5>
                        <input type="text" class="form-control" placeholder="請輸入到期時間......">
                        <h5>內容:</h5>
                        <textarea class="form-control" rows="3" placeholder="請輸入投票問題......"></textarea>
                        <textarea class="form-control" rows="1" placeholder="投票選項......"></textarea>
                        <textarea class="form-control" rows="1" placeholder="投票選項......"></textarea>
                    </div>
                </form>
                <button type="button" id="newvotebutton" class="btn btn-info btn-s">新增選項</button>
                <button id="votebutton" type="button" class="btn btn-info btn-s">進階設定</button>
                <div id="vote" title="投票設定" style="display:none">
                    <form class="form-find">
                        <h5>選項:</h5>
                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>一人一票</option>
                                <option>一人多票</option>
                            </select>
                        </div>
                        <h5>新增:</h5>
                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>參與者可以新增選項</option>
                                <option>參與者不可新增選項</option>
                            </select>
                        </div>
                        <hr>
                        <button type="button" class="start">確認</button>
                    </form>
                </div>
                <button type="button" class="start">完成</button>
            </div>
        </div>
        <!-- 留言區 -->

            <div id="post1">
            </div>
            <!-- <div class="main2">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">編輯貼文</a></li>
                                    <li><a href="#">隱藏貼文</a></li>
                                    <li><a href="#">刪除貼文</a></li>
                                </ul>
                            </div>
                            <h5><img id="guest" src="https://unwire.hk/wp-content/uploads/2014/10/facebook-user.jpg" class="img-circle"  alt="Avatar"><a href="#member002"> 鄭俊彥</a>
                            <h6><span class="glyphicon glyphicon-time"></span>2017年2月3日</h6>
                            <br>
                            <p>大家好 我是筆記人 </p>
                            <br>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#d002">查看留言</button>
                            <button type="button" class="btn btn-warning btn-xs">收藏貼文</button>
                            <button type="button" class="btn btn-success btn-xs">至頂貼文</button>
                            <div id="d002" class="collapse">
                            </div>
                            <form class="form-find">
                                <br>
                                <input type="text" class="form-findtext" placeholder="請輸入留言......">
                                <button type="button" class="start">發送</button>
                            </form>

                        </div>
                    </div>


                                    <div class="main2">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">編輯貼文</a></li>
                                                    <li><a href="#">隱藏貼文</a></li>
                                                    <li><a href="#">刪除貼文</a></li>
                                                </ul>
                                            </div>
                                            <h5><img id="guest" src="https://unwire.hk/wp-content/uploads/2014/10/facebook-user.jpg" class="img-circle"  alt="Avatar"><a href="#member003"> 鄭韶葳</a>
                                                <h6><span class="glyphicon glyphicon-time"></span>2017年2月3日</h6>
                                                <br>
                                                <p>我是阿姨 </p>
                                                <br>
                                                <button type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#d003">查看留言</button>
                                                <button type="button" class="btn btn-warning btn-xs">收藏貼文</button>
                                                <button type="button" class="btn btn-success btn-xs">至頂貼文</button>
                                                <div id="d003" class="collapse">
                                                </div>
                                                <form class="form-find">
                                                    <br>
                                                    <input type="text" class="form-findtext" placeholder="請輸入留言......">
                                                    <button type="button" class="start">發送</button>
                                                </form>

                                            </div>
                                            <div class="main2">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">編輯貼文</a></li>
                                                            <li><a href="#">隱藏貼文</a></li>
                                                            <li><a href="#">刪除貼文</a></li>
                                                        </ul>
                                                    </div>
                                                    <h5><img id="guest" src="https://unwire.hk/wp-content/uploads/2014/10/facebook-user.jpg" class="img-circle"  alt="Avatar"><a href="#member004"> Sean</a>
                                                        <h6><span class="glyphicon glyphicon-time"></span>2017年2月3日</h6>
                                                        <br>
                                                        <p>我要吃火鍋 </p>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#d003">查看留言</button>
                                                        <button type="button" class="btn btn-warning btn-xs">收藏貼文</button>
                                                        <button type="button" class="btn btn-success btn-xs">至頂貼文</button>
                                                        <div id="d003" class="collapse">
                                                        </div>
                                                        <form class="form-find">
                                                            <br>
                                                            <input type="text" class="form-findtext" placeholder="請輸入留言......">
                                                            <button type="button" class="start">發送</button>
                                                        </form>

                                                    </div>





                                                </div> -->
        </div>
    </div>
    <?php
    for($i = count($commentRow)-1; $i >= 0; $i--){
      $subcommentRow = array();
      $res = mysqli_query($db, "SELECT SubComText FROM subcomment WHERE ComId=".$commentIdRow[$i]);
      if($res){
          for ($z = 0; $z < mysqli_num_rows($res); $z++) {
            $subcommentRow[] = mysqli_result($res,$z,0);
          }
       }

       ?><div id="post" class="col-sm-6">
           <div class="main2">
               <div class="post-left">
                   <div class="dropdown">
                       <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                       <ul class="dropdown-menu">
                           <li><a href="#">編輯貼文</a></li>
                           <li><a href="#">隱藏貼文</a></li>
                           <li><a href="project_message_delete.php?Com_id=<?php echo $commentIdRow[$i]; ?>&Pro_id=<?php echo $projectId; ?>">刪除貼文</a</li>
                       </ul>
                   </div>
                   <img id="guest" src="https://unwire.hk/wp-content/uploads/2014/10/facebook-user.jpg" class="img-circle" alt="Avatar">
                   <a href="#member001"><?php echo $userName[0]; ?></a>
                   <div id="time" class="glyphicon glyphicon-time"><?php echo $commentTimeRow[$i]; ?></div>
                   <p><br><?php echo $commentRow[$i]; ?></p>
                   <div class="btn-group2">
                       <button type="button" class="btn btn-warning btn-xs">收藏貼文</button>
                       <button type="button" class="btn btn-success btn-xs">置頂貼文</button>
                   </div>
               </div>
               <div class="post-right">
                 <?php
                  for ($x = count($subcommentRow)-1; $x >= 0; $x--) {
                    ?>
                    <h5><img id="guest" src="https://unwire.hk/wp-content/uploads/2014/10/facebook-user.jpg" class="img-circle" alt="Avatar"><?php echo $subcommentRow[$x]; ?></h5>
                    <?php
                  }
                  ?>
                   <!--  <div id="d001" class="collapse">
                                           <h5><img id="guest" src="https://unwire.hk/wp-content/uploads/2014/10/facebook-user.jpg" class="img-circle" alt="Avatar"><a href="#member001"><a href="#member004"> 阿姨</a> 你們都很棒!!!</h5>
                                           <h5><img id="guest" src="https://unwire.hk/wp-content/uploads/2014/10/facebook-user.jpg" class="img-circle" alt="Avatar"><a href="#member001"><a href="#member001"> 黃晨浩</a> 我更棒!!!</h5>
                                       </div> -->
                   <!-- <button type="button" class="btn btn-primary btn-s">...更多留言</button> -->
                   <a>...更多留言</a>
                   <form class="form-find" method="post" action="project_message.php?id=<?php echo $_GET['id']; ?>" autocomplete="off" id="revise">
                       <input type="text" name="subcomment" class="form-findtext" placeholder="請輸入留言......">
                       <input type="hidden" name="time_subcomment" value="<?php echo date('Y-m-d H:i:s', time()); ?>">
                       <input type="hidden" name="ComId_subcomment" value="<?php echo $commentIdRow[$i]; ?>">
                       <button class="btn" type="submit" name="post_subcomment">留言</button>
                   </form>
                   <!-- <button type="button" class="start">發送</button> -->
               </div>
           </div>
       <?php
       unset($subcommentRow);
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
  </body>
</html>

<?php ob_end_flush(); ?>
