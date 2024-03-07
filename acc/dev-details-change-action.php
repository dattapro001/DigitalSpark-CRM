<?php
session_start();
include 'config.php';

$mobile = $_POST['mobile'];
$skill = $_POST['skill'];

$insertQuery = "UPDATE `developer` SET d_mobile='$mobile' , d_skill = '$skill' WHERE  d_email = '{$_SESSION['SESSION_EMAIL']}'";

if (mysqli_query($conn, $insertQuery)) {
    echo "<script>alert('inserted')</script>";
    echo "<script>location.href='dev-profile-1.php'</script>";
}

?>