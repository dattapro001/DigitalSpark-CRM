<?php
session_start();
include 'config.php';

// $imageLocation = $_FILES['image']['tmp_name'];
// $image_name = $_FILES['image']['name'];
// $image_des = "uploaded_img/" . $image_name;
// move_uploaded_file($imageLocation, $image_des);
$image = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = $image;

move_uploaded_file($image_tmp_name,$image_folder);

$insertQuery = "UPDATE `developer` SET d_profile='$image_folder' WHERE  d_email = '{$_SESSION['SESSION_EMAIL']}'";

if (mysqli_query($conn, $insertQuery)) {
    echo "<script>alert('inserted')</script>";
    echo "<script>location.href='dev-profile-1.php'</script>";
}


?>