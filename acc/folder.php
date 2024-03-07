<?php
session_start();
include 'config.php';



$update=$_POST ['text'];



$insertQuery = "UPDATE `developer` SET `about`='$update' where d_email = '{$_SESSION['SESSION_EMAIL']}'";

if (mysqli_query($conn, $insertQuery)) {
    // echo "<script>alert('inserted')</script>";
    echo "<script>location.href='dev-profile-1.php'</script>";
}




?>

