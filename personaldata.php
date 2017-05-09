
<?php
ob_start();
session_start();
require_once 'dbconnect.php';
if(isset($_GET['id'])){
  $res = mysqli_query($db, "SELECT * FROM projects WHERE projectId=".$_GET['id']);
  $projectRow = mysqli_fetch_array($res);

  $res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow = mysqli_fetch_array($res);
}
$res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow = mysqli_fetch_array($res);

$res = mysqli_query($db, "SELECT projectName FROM projects WHERE projectCreatorId=".$userRow[0]);
$projectNameRow = array();
for ($i = 0; $i < mysqli_num_rows($res); $i++) {
  $projectNameRow[] = mysqli_result($res,$i,0);
}

$res = mysqli_query($db, "SELECT projectId FROM projects WHERE projectCreatorId=".$userRow[0]);
$projectIdRow = array();
for ($i = 0; $i < mysqli_num_rows($res); $i++) {
  $projectIdRow[] = mysqli_result($res,$i,0);
}

$res = mysqli_query($db, "SELECT projectCreatorId FROM projects WHERE projectCreatorId=".$userRow[0]);
$projectCreatorIdRow = array();
for ($i = 0; $i < mysqli_num_rows($res); $i++) {
  $projectCreatorIdRow[] = mysqli_result($res,$i,0);
}


$res = mysqli_query($db, "SELECT projectName FROM projects WHERE (projectMembersId LIKE '%$userRow[2]%')");
$projectNameRow_members = array();
for ($i = 0; $i < mysqli_num_rows($res); $i++) {
  $projectNameRow_members[] = mysqli_result($res,$i,0);
}

$res = mysqli_query($db, "SELECT projectId FROM projects WHERE (projectMembersId LIKE '%$userRow[2]%')");
$projectIdRow_members = array();
for($i = 0; $i < mysqli_num_rows($res); $i++){
  $projectIdRow_members[] = mysqli_result($res,$i,0);
}

$res = mysqli_query($db, "SELECT postText FROM post WHERE (postInvolvedMembers LIKE '%$userRow[2]%') AND postUserId!=".$userRow[0]);
$postText = array();
for($i = 0; $i < mysqli_num_rows($res); $i++){
  $postText[] = mysqli_result($res,$i,0);
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
 // require_once 'bar.php';
//如果非登入狀態將導回首頁
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}
//抓取登入之帳戶資料
$res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow = mysqli_fetch_array($res);
$error = false;
if (isset($_POST['btn-revise'])) {
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  $department = trim($_POST['department']);
  $department = strip_tags($department);
  $department = htmlspecialchars($department);
  $studentid = trim($_POST['studentid']);
  $studentid = strip_tags($studentid);
  $studentid = htmlspecialchars($studentid);
  $cellphone = trim($_POST['cellphone']);
  $cellphone = strip_tags($cellphone);
  $cellphone = htmlspecialchars($cellphone);
  $introduction = strip_tags($_POST['introduction']);
  $introduction = htmlspecialchars($introduction);
  $interests = strip_tags($_POST['interests']);
  $interests = htmlspecialchars($interests);
  if (empty($name)) {
    $error = true;
    $nameError = "請輸入名稱";
  }
  if (!$error) {
    $query = "UPDATE users SET
    userName = '$name',
    userDepartment = '$department',
    userStudentid = '$studentid',
    userCellphone = '$cellphone',
    userIntroduction = '$introduction',
    userInterests = '$interests' WHERE userId=".$_SESSION['user'];
    $res = mysqli_query($db, $query);
    if ($res) {
      $errTyp = "success";
      $errMSG = "修改成功";
      unset($name);
      unset($department);
      unset($studentid);
      unset($cellphone);
      unset($introduction);
      unset($interests);
    }
  } else {
    $errTyp = "danger";
    $errMSG = "更改失敗";
  }
  echo "<script>
  alert('$errMSG');
  window.location.href='personaldata.php';
  </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <meta charset="utf-8">
     <title>設定y</title>
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
     <link rel="stylesheet" href="/resources/demos/style.css">
     <link href="titatoggle-dist.css" rel="stylesheet">
     <script type="text/javascript" src="SystemSetup.js"></script>
     <link rel="stylesheet" href="SystemSetup.css">
     <title>Bootstrap Case</title>
    <script type='text/javascript' src='https://code.jquery.com/jquery-1.9.1.min.js'></script>
    <link rel="stylesheet" href="bar_per.css">

 
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
   <!-- childbar -->
    <div>
        <ul class="nav_area2">
        <div style="position:absolute;left:10px;height:50px;top:0px;">
        <a href="home.php"><img src="images/logobo-04.png" class="logoimg" width="150"></a>

                <li class="button2"><a href="">會員資料</a></li>
                <li class="button2"><a href="">安全性</a></li>
                <li class="button2"><a href="">偏好設定</a></li>

          </div>
                <button class="c-hamburger c-hamburger--htra" onclick="openNav()">
                        <span >&#9776;</span>
                </button>
        </ul>


        
    </div>

    <div class="w3-overlay"  id="myOverlay" style="cursor:pointer;display:none;" ></div>
      <!-- mainbar -->
      <div class="w3-animate-right" id="mwt_mwt_slider_scroll" style="display:none;">

        <div id="mwt_slider_content" >
            <div >
              
              
              <div class="user">
                  <div style="top:20px;width:180px;position:relative;height:82px;left:10px;">
                        <div class="circle"></div> 
                        <div style="margin-left:10px;height:80px;float:left;position:relative;">
                              <div class="userName">鄭俊彥</div>
                              <div class="userCoin">$00000</div> 
                        </div>
                        <a href="personaldata.php"><img class="edit" src="images/editicon.png" ></a>
                  </div>
                  <a href="logout.php?logout"><img class="logout" src="images/logout.png" ></a>
                    
                        
              </div>
              
              <hr class="line3"></hr>
            </div>
            <div  class="nav_area" id="accordion">
              <div class="button">
                <a href="home.php">首頁</a>
              </div>
              <div class="button">
                <a data-toggle="collapse" href="#collapse2">我的專案</a>
                                    
                                <div id="collapse2" class="panel-collapse collapse">
                                    <!-- <div class="panel-body"> -->
                                        <ul>
                                            <li class="button3"><a href="" >進行中</a></li>
                                            <?php
                                            for($i = 0; $i < count($projectNameRow); $i++){
                                               echo "<li class='button3'><a href=\"project_home.php?id=$projectIdRow[$i]\">$projectNameRow[$i]</a><br>";
                                            }
                                            for($i = 0; $i < count($projectNameRow_members); $i++){
                                               echo "<a href=\"project_home.php?id=$projectIdRow_members[$i]\">$projectNameRow_members[$i]</a><br>";
                                               if (stristr($userRow[9],$projectIdRow_members[$i])==false) {
                                               ?>
                                               <form action="projects_members_comfirm.php?id=<?php echo $projectIdRow_members[$i]?>" method="post">
                                                 <input type="submit" name="projects_members_confirm" value="確認">
                                               </form>
                                               <form action="projects_members_deny.php?id=<?php echo $projectIdRow_members[$i]?>" method="post">
                                                 <input type="submit" name="projects_members_deny" value="拒絕">
                                               </form>
                                               <?php
                                              }
                                            }
                                             ?>
                                            <li class="button3"><a href="" >已完成</a></li>
                                        </ul>
                                    <!-- </div> -->
                                </div>
              </div>
              <div class="button">
                <a href="">個人行事曆</a>
              </div>
               <div class="button">
                <a href="todolist.php">待辦清單</a>
              </div>
              <div class="button">
                <a href="">檔案總管</a>
              </div>
              <div class="button">
                <a href="">分享市集</a>
              </div>
            </div>
              
            
        </div>
      </div>
        <!-- animation click main bar -->
        <script>
    function openNav() {
      if(document.getElementById("mwt_mwt_slider_scroll").style.display=="none"){
        document.getElementById("mwt_mwt_slider_scroll").style.display = "block";
      }
      else{
        document.getElementById("mwt_mwt_slider_scroll").style.display = "none";
      }

      if(document.getElementById("myOverlay").style.display=="none"){
        document.getElementById("myOverlay").style.display = "block";
      }
      else{
        document.getElementById("myOverlay").style.display = "none";
      }
    }

    </script>

<!-- animation hamburger btn    -->
<script type="text/javascript">(function() {

  "use strict";

  var toggles = document.querySelectorAll(".c-hamburger");

  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  };

  function toggleHandler(toggle) {
    toggle.addEventListener( "click", function(e) {
      e.preventDefault();
      (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
    });
  }

})();</script>


<!-- bodyinfo -->
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-10">
                <div class="mainpage">
                    <div class="mainpart" id="setup1">
                        <br>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" id="revise">
                        <div class="container-fluid">
                            <h3>會員資料</h3>
                            
                            <br>
                            <br>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="t1"><h5>姓名</h5></td>
                                        <td class="t2">
                                            <h5 id="name1"><?php echo $userRow[1]; ?></h5>
                                            <div id="name2" style="display:none">
                                                <h5><input type="text" name="name" class="form-findtext" value="<?php echo $userRow[1]; ?>"></h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>系級</h5></td>
                                        <td class="t2">
                                            <h5 id="department1"><?php echo $userRow[4]; ?></h5>
                                            <div id="department2" style="display:none">
                                                <h5><input type="text" name="department" class="form-findtext" value="<?php echo $userRow[4]; ?>"></h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>學號</h5></td>
                                        <td class="t2">
                                            <h5 id="number1"><?php echo $userRow[5]; ?></h5>
                                            <div id="number2" style="display:none">
                                                <h5><input type="number" name="studentid" class="form-findtext" value="<?php echo $userRow[5]; ?>"></h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>聯絡手機</h5></td>
                                        <td class="t2">
                                            <h5 id="phone1"><?php echo $userRow[6]; ?></h5>
                                            <div id="phone2" class="form-find" style="display: none">
                                                
                                                <h5><input type="nember" name="cellphone" class="form-findtext" value="<?php echo $userRow[6]; ?>"></h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>自我介紹</h5></td>
                                        <td class="t2">
                                            <h5 id="introduction1"><?php echo $userRow[7]; ?></h5>
                                            <div id="introduction2" style="display:none" class="form-find">
                                                <h5><textarea row="5" col="60" name="introduction" class="form-findtext"><?php echo $userRow[7]; ?></textarea></h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>興趣</h5></td>
                                        <td class="t2">
                                            <h5 id="interests1"><?php echo $userRow[8]; ?></h5>
                                            <div id="interests2" style="display:none" class="form-find">
                                                <h5><textarea row="5" col="60" name="interests" class="form-findtext" ><?php echo $userRow[8]; ?></textarea></h5>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button id="memberbutton1" type="button" class="set">修改</button>
                            <button id="memberbutton2" style="display:none" type="button" class="set">取消</button>
                            <button id="memberbutton3" type="submit" name="btn-revise" style="display:none" class="set">確認</button>
                        </div>
                      </form>
                    </div>
                    <div class="mainpart" id="setup2" style="display: none">
                        <br>
                        <div class="container-fluid">
                            <h3>安全性設定</h3>
                            
                            <br>
                            <br>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="t1"><h5>登入警告</h5></td>
                                        <td class="t2">
                                            <h5 id="alert1">警告郵件:啟用 <br><br>警告簡訊:啟用</h5>
                                            <form id="alert2" class="form-find" style="display: none">
                                                <div class="checkbox checkbox-slider--b">
                                                    <label>
                                                        <input type="checkbox"><span>從陌生裝置或瀏覽器登入時收到警告郵件</span>
                                                    </label>
                                                </div>
                                                <br>
                                                <div class="checkbox checkbox-slider--b">
                                                    <label>
                                                        <input type="checkbox"><span>從陌生裝置或瀏覽器登入時收到警告簡訊</span>
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>登入驗證</h5></td>
                                        <td class="t2">
                                            <h5 id="verify1">簡訊驗證:啟用 <br><br>代碼產生器:啟用</h5>
                                            <form id="verify2" class="form-find" style="display: none">
                                                <div class="checkbox checkbox-slider--b">
                                                    <label>
                                                        <input type="checkbox"><span>簡訊驗證:</span>
                                                    </label>
                                                </div>
                                                <br>
                                                <div class="checkbox checkbox-slider--b">
                                                    <label>
                                                        <input type="checkbox"><span>代碼產生器</span>
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>登入位置</h5></td>
                                        <td class="t2"></td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>帳號救援</h5></td>
                                        <td class="t2">
                                            <h5 id="forget1">寄郵件到電子信箱:啟用 <br><br>寄簡訊到手機:啟用</h5>
                                            <form id="forget2" class="form-find" style="display: none">
                                                <div class="checkbox checkbox-slider--b">
                                                    <label>
                                                        <input type="checkbox"><span>忘記密碼時寄郵件至預設信箱</span>
                                                    </label>
                                                </div>
                                                <hr>
                                                <div class="checkbox checkbox-slider--b">
                                                    <label>
                                                        <input type="checkbox"><span>忘記密碼時寄簡訊至預設手機</span>
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button id="safebutton1" type="button" class="set">修改</button>
                            <button id="safebutton2" style="display:none" type="button" class="set">取消</button>
                            <button id="safebutton3" style="display:none" type="button" class="set">確認</button>
                        </div>
                    </div>
                    <div class="mainpart" id="setup3" style="display: none">
                        <br>
                        <div class="container-fluid">
                            <h3>帳戶偏好設定</h3>
                            
                            <br>
                            <br>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="t1"><h5>語言</h5></td>
                                        <td class="t2">
                                            <h5 id="language1">繁體中文</h5>
                                            <form id="language2" class="form-find" style="display: none">
                                                
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>繁體中文</option>
                                                        <option>英文</option>
                                                        <option>簡體中文</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>音效</h5></td>
                                        <td class="t2">
                                            <h5 id="sound1">通知音效:啟用 <br><br>提醒音效:啟用</h5>
                                            <form id="sound2" class="form-find" style="display: none">
                                                <div class="checkbox checkbox-slider--b">
                                                    <label>
                                                        <input type="checkbox"><span>收到新通知時撥放音效</span>
                                                    </label>
                                                </div>
                                                <br>
                                                <div class="checkbox checkbox-slider--b">
                                                    <label>
                                                        <input type="checkbox"><span>收到提醒時撥放音效</span>
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>通知</h5></td>
                                        <td class="t2">
                                            <h5 id="notice1">郵件發送:啟用 <br><br>簡訊發送:啟用</h5>
                                            <form id="notice2" class="form-find" style="display: none">
                                                
                                                    <div class="checkbox checkbox-slider--b">
                                                        <label>
                                                            <input type="checkbox"><span>重要通知發送郵件到電子信箱</span>
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="checkbox checkbox-slider--b">
                                                        <label>
                                                            <input type="checkbox"><span>重要通知發送簡訊到手機</span>
                                                        </label>
                                                    </div>
                                                    <hr>
                                                    <h5>那些屬於重要通知:</h5>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">專案邀請</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">專案成員變更</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">代辦事項提醒</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">任務變更</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">大區段變更</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">檔案上傳</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">新的貼文</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">貼文回應</label>
                                                    </div>
                                                
                                                
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="t1"><h5>貼文</h5></td>
                                        <td class="t2"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button id="preferbutton1" type="button" class="set">修改</button>
                            <button id="preferbutton2" style="display:none" type="button" class="set">取消</button>
                            <button id="preferbutton3" style="display:none" type="button" class="set">確認</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
