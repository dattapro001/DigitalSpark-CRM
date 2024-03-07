<?php
include 'config.php';

$id = $_GET['id'];
$deleteQuery = "DELETE FROM `details` WHERE id = '$id'";
try {
    mysqli_query($conn, $deleteQuery);
    header("location:admin-client.php");

} catch (\throwable $th) {
    echo $th;
}
?>
