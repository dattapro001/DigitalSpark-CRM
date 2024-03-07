<?php
session_start();
include 'config.php';

$imageLocation = $_FILES['image']['tmp_name'];
$image_name = $_FILES['image']['name'];
$image_des = $image_name;
move_uploaded_file($imageLocation, $image_des);

$insertQuery = "UPDATE  `developer` SET d_cover='$image_des' WHERE d_email = '{$_SESSION['SESSION_EMAIL']}'";

if (mysqli_query($conn, $insertQuery)) {
    echo "<script>alert('inserted')</script>";
    echo "<script>location.href='dev-profile-1.php'</script>";
}


?>