<?php
session_start(); // Start the PHP session
include 'config.php'; // Include your database connection file
$output2 ="";
if (!isset($_SESSION['unique_id'])) {
   
    header("Location: admin-login.php");
    die();
  }


$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    $status =   $_POST['status'];
    $progress1 = $_POST['progressInput1'];
    $progress2 = $_POST['progressInput2'];
    $progress3 = $_POST['progressInput3'];

    $sql5 ="UPDATE `project` SET status = '$status' , dev_1_pog = '$progress1' , dev_2_pog = '$progress2' ,
    dev_3_pog = '$progress3' WHERE id='$user_id'";      
      $result5 = mysqli_query($conn, $sql5);

      echo '<script>alert("Changes Done!");
           window.location.href = "manager.php";
           </script>';


?>