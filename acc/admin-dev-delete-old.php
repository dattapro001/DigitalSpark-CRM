<?php
include 'config.php';

$id = $_GET['id'];
$deleteQuery = "DELETE FROM `developer` WHERE d_id = '$id'";
try {
    mysqli_query($conn, $deleteQuery);
    header("location:admin-dev.php");

} catch (\throwable $th) {
    echo $th;
}
?>
