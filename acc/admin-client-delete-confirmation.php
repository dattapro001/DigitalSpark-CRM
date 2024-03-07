<?php
// Your PHP code for handling the deletion goes here
include "config.php";

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    
    // Fetch data for confirmation message
    $query = mysqli_query($conn, "SELECT * FROM details WHERE unique_id = '$user_id'");
    $row = mysqli_fetch_assoc($query);
    
    // Display confirmation alert
    echo '<script>
            var confirmation = confirm("Are you sure you want to delete: ' . $row['name'] . '?");
            if (confirmation) {
                window.location.href = "admin-client-delete.php?confirmed=yes&user_id=' . $user_id . '";
            } else {
                alert("Deletion canceled.")
                window.location.href = "admin-page.php";
            }
          </script>';
} else {
    echo '<script>alert("Invalid user ID. Deletion canceled.")</script>';
    header("location: admin-page.php");
    exit();
}
?>

