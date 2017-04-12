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
</head>

<body>
    <br><br><br>
    <?php echo "您好！{$userRow['userName']}同學！"?>
    <?php
      for($i = 0; $i < count($postText); $i++){
        echo $postText[$i];?><br><?php
      }
    ?>
</body>
</html>
<?php ob_end_flush(); ?>
