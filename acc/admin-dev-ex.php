
<?php include('admin-header.php'); ?>
<?php 
include "config.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   
  </head>
  <body>
  <div class="container">
    <table class="table caption-top">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      
     
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'config.php';
    $allData =mysqli_query($conn,"SELECT * FROM `developer`");
    while($row=mysqli_fetch_array($allData)){
      echo "
      <tr>
      <td>$row[d_id]</td>
      <td><a href='admin-dev-profile.php?id=$row[d_id]'>".$row['d_name']."</a></td>
     
      <td>$row[d_email]</td>
      <td>$row[d_mobile]</td>
    
     
      <td><a class='btn btn-danger' href='admin-dev-delete.php?id=$row[d_id]'>Delete</a></td>
      </tr>
      ";
    }
      

    
    ?>
    
  
  </tbody>
</table>


    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>