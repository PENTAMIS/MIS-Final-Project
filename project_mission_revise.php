<?php
session_start();
require_once 'Dbconnect.php';

$res = mysqli_query($db, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow = mysqli_fetch_array($res);

$res = mysqli_query($db, "SELECT MAX(projectId) FROM projects");
$projectId = mysqli_fetch_array($res);




for ($p = 0; $p < $_POST['y'] ; $p++) {
    $project_stage_name = $_POST["project_stage_name$p"];
    $project_stage_name = strip_tags($_POST["project_stage_name$p"]);
    $project_stage_name = htmlspecialchars($project_stage_name);

    $project_stage_start = $_POST["project_stage_start$p"];

    $project_stage_end = $_POST["project_stage_end$p"];

    $project_stageId = $_POST["project_stageId$p"];

    $query_stage = "UPDATE projects_stage SET
                    project_stageStart = '$project_stage_start',
                    project_stageEnd = '$project_stage_end',
                    project_stageName = '$project_stage_name' WHERE projects_stageId =".$project_stageId;
    $res_stage = mysqli_query($db, $query_stage);

    $res = mysqli_query($db, "SELECT MAX(projects_stageId) FROM projects_stage");
    $projects_stageId = mysqli_fetch_array($res);

    for ($i = 0; $i <= $_POST['x'] ; $i++) {
          if (isset($_POST["missionName$p$i"])) {

              $missionName = $_POST["missionName$p$i"];
             //  $missionName = strip_tags($_POST["missionName$i"]);
             //  $missionName = htmlspecialchars(${"missionName".$i});

              $missionMembers = $_POST["missionMembers$p$i"];

              $missionDate = $_POST["missionDate$p$i"];

              $missionContent = $_POST["missionContent$p$i"];

              $project_stage_missionId = $_POST["project_stage_missionId$p$i"];

              if(isset($_POST["missionFile$p$i"])){
                $missionFile = $_POST["missionFile$p$i"];
              }else{
                $missionFile = 0;
              }



              $query_mission = "UPDATE projects_stage_missions SET
                                missionName = '$missionName',
                                missionMembers = '$missionMembers',
                                missionDate = '$missionDate',
                                missionContent = '$missionContent',
                                file_upload = '$missionFile' WHERE missionId = ".$project_stage_missionId;
              $res_mission = mysqli_query($db, $query_mission);

              unset($missionName);
              unset($missionMembers);
              unset($missionDate);
              unset($missionContent);
              unset($missionFile);
          }
    }
    unset($project_stage_name);
    unset($project_stage_start);
    unset($project_stage_end);
    unset($projects_stageId);
}

  for ($p = 1; $p <= $_POST['y_new'] ; $p++) {

      $project_stage_name = $_POST["project_stage_name_new$p"];
      $project_stage_name = strip_tags($_POST["project_stage_name_new$p"]);
      $project_stage_name = htmlspecialchars($project_stage_name);

      $project_stage_start = $_POST["project_stage_start_new$p"];

      $project_stage_end = $_POST["project_stage_end_new$p"];

      $query_stage = "INSERT INTO projects_stage(projectId,project_stageStart,project_stageEnd,project_stageName)
                           VALUES('$projectId[0]','$project_stage_start','$project_stage_end','$project_stage_name')";
      $res_stage = mysqli_query($db, $query_stage);

      $res = mysqli_query($db, "SELECT MAX(projects_stageId) FROM projects_stage");
      $projects_stageId = mysqli_fetch_array($res);

      for ($i = 0; $i <= $_POST['x_new'] ; $i++) {
            if (isset($_POST["missionName_new$p$i"])) {

                $missionName = $_POST["missionName_new$p$i"];
               //  $missionName = strip_tags($_POST["missionName$i"]);
               //  $missionName = htmlspecialchars(${"missionName".$i});

                $missionMembers = $_POST["missionMembers_new$p$i"];

                $missionDate = $_POST["missionDate_new$p$i"];

                $missionContent = $_POST["missionContent_new$p$i"];

                if(isset($_POST["missionFile_new$p$i"])){
                  $missionFile = $_POST["missionFile_new$p$i"];
                }else{
                  $missionFile = 0;
                }


                $stageId = $projects_stageId[0];

                $query_mission = "INSERT INTO projects_stage_missions(projects_stageId,missionName,missionMembers,missionDate,missionContent,file_upload)
                                       VALUES('$stageId','$missionName','$missionMembers','$missionDate','$missionContent','$missionFile')";
                $res_mission = mysqli_query($db, $query_mission);

                unset($missionName);
                unset($missionMembers);
                unset($missionDate);
                unset($missionContent);
                unset($missionFile);
            }
      }
      unset($project_stage_name);
      unset($project_stage_start);
      unset($project_stage_end);
      unset($projects_stageId);
  }

  for ($i = 1; $i <= $_POST['x_new'] ; $i++) {
    $p = 0;
        if (isset($_POST["missionName_new$p$i"])) {

            $missionName = $_POST["missionName_new$p$i"];
           //  $missionName = strip_tags($_POST["missionName$i"]);
           //  $missionName = htmlspecialchars(${"missionName".$i});

            $missionMembers = $_POST["missionMembers_new$p$i"];

            $missionDate = $_POST["missionDate_new$p$i"];

            $missionContent = $_POST["missionContent_new$p$i"];

            if(isset($_POST["missionFile_new$p$i"])){
              $missionFile = $_POST["missionFile_new$p$i"];
            }else{
              $missionFile = 0;
            }


            $query_mission = "INSERT INTO projects_stage_missions(projects_stageId,missionName,missionMembers,missionDate,missionContent,file_upload)
                                   VALUES('$stageId','$missionName','$missionMembers','$missionDate','$missionContent','$missionFile')";
            $res_mission = mysqli_query($db, $query_mission);

            unset($missionName);
            unset($missionMembers);
            unset($missionDate);
            unset($missionContent);
            unset($missionFile);
        }
  }

echo "<script>
alert('成功');
window.location.href='project_mission.php?id=$projectId[0]';
</script>";
 ?>
