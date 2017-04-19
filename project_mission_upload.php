<?php
session_start();
require_once 'Dbconnect.php';

$res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow = mysqli_fetch_array($res);

$res = mysqli_query($db, "SELECT MAX(projectId) FROM projects");
$projectId = mysqli_fetch_array($res);

for ($i = 0; $i <= $_POST['x'] ; $i++) {
  $project_stage_name_1 = $_POST['project_stage_name_1'];
  $project_stage_name_1 = strip_tags($_POST['project_stage_name_1']);
  $project_stage_name_1 = htmlspecialchars($project_stage_name_1);

  $project_stage_start_1 = $_POST['project_stage_start_1'];

  $project_stage_end_1 = $_POST['project_stage_end_1'];

  $query_stage = "INSERT INTO projects_stage(projectId,project_stageStart,project_stageEnd,project_stageName)
                       VALUES('$projectId[0]','$project_stage_start_1','$project_stage_end_1','$project_stage_name_1')";
  $res_stage = mysqli_query($db, $query_stage);

        $missionName = $_POST["missionName$i"];
       //  $missionName = strip_tags($_POST["missionName$i"]);
       //  $missionName = htmlspecialchars(${"missionName".$i});

        $missionMembers = $_POST["missionMembers$i"];

        $missionDate = $_POST["missionDate$i"];

        $missionContent = $_POST["missionContent$i"];

        if(isset($_POST["missionFile$i"])){
          $missionFile = $_POST["missionFile$i"];
        }else{
          $missionFile = 0;
        }

        $projects_stageId = 1;

        $query_mission = "INSERT INTO projects_stage_missions(projects_stageId,missionName,missionMembers,missionDate,missionContent,file_upload)
                               VALUES('$projects_stageId','$missionName','$missionMembers','$missionDate','$missionContent','$missionFile')";
        $res_mission = mysqli_query($db, $query_mission);

        unset($missionName);
        unset($missionMembers);
        unset($missionDate);
        unset($missionContent);
        unset($missionFile);
}
 ?>
