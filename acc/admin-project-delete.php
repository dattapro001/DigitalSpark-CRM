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

  echo '<script>
  var confirmation = confirm("Are you sure to delete this project?");
  if (confirmation) {
      window.location.href = "admin-project-delete-confirmation.php?user_id=' . $user_id . '&manager_id='.$manager_id.'&project_id='.$project_id.'";
  } else {
      alert("Deletion canceled.")
      window.location.href = "admin-page.php";
  }
</script>';





?>