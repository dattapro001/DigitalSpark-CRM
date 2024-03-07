<?php
  include "config.php";
  $output="";
  session_start();
  if (!isset($_SESSION['unique_id'])) {
   
    header("Location: admin-login.php");
    die();
  }

  $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
  $manager_id = mysqli_real_escape_string($conn, $_GET['manager_id']);
  $project_id = mysqli_real_escape_string($conn, $_GET['project_id']);

  $deleteQuery1 = "DELETE FROM `project` WHERE client_id = '$user_id'";
  $done = mysqli_query($conn, $deleteQuery1);

  $deleteQuery2 = "DELETE FROM `file` WHERE manager_id = '$manager_id' AND project_id = '$project_id'";
  $done2 = mysqli_query($conn, $deleteQuery2);

  $sql2 ="UPDATE `pay_info` SET project_id = '' , amount = '' WHERE unique_id='$user_id'";
  $result2 = mysqli_query($conn, $sql2);
  

  header("Location: admin-page.php");

  ?>