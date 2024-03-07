<?php

include 'config.php';
$message = "";
session_start();
$user_id = $_SESSION['unique_id'];
$query = "SELECT * FROM `developer` WHERE unique_id = '$user_id'";
$allData = mysqli_query($conn, $query);

$arrayData = mysqli_fetch_array($allData);

$query1 = "SELECT * FROM `admin` WHERE 1";
$allData1 = mysqli_query($conn, $query1);

$admin = mysqli_fetch_array($allData1);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Links -->
  <link href='https://fonts.googleapis.com/css?family=Salsa' rel='stylesheet'>
  <script></script>

  <style>
    .dropdown-menu {
      padding: 10px;
      border: 1px solid #ccc;
    }

    .show {
      display: block;
    }

    /* Basic styles */
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
  <div class="container" style="background-color:#ccc; height:80vh; width:80%; margin-top:5%; border:1px solid #333; border-radius:10px 10px; font-family: Salsa;">
    <div class="row">

      

      <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="container">
          <form style="margin-top:50%; width:250px;" action="folder.php" method="post">
            <div class="box" >

            <div class="message-icon" >
            <a href="dev-admin-chat.php?user_id=<?php echo $admin['unique_id']; ?>"><i class="fa-solid fa-message" ></i></a>
          </div>

              <label style="padding-bottom:15px; font-weight: bold;" for="comment">About me:</label>
              <textarea class="form-control" rows="5" id="comment"
                name="text"><?php echo $arrayData['d_bio']; ?></textarea>
                
            </div>
            <button type="submit" class="btn btn-primary"><i style="border-radius:50%;"
                class="fa-solid fa-pen-to-square"></i></button>
          </form>
        </div>
        <div class="logout">
            <a data-bs-toggle="modal" data-bs-target="#logout"> <button type="submit" style="border-radius:50%; margin-top:28.5%;margin-left:-3%" class="btn btn-primary"><i
                  class="fa-solid fa-right-from-bracket"></i></button></a>
          </div>
      </div>




      <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="container">
          <p style="margin-top:10%; margin-left:10%; font-size:20px; ;font-weight:bold;text-decoration:underline;">
          I am a <?php echo $arrayData['d_skill']; ?>
          </p>
          <div class="image">
            <img style="border-radius:50%; height:200px;width:270px; margin-top:30%;"
              src="uploaded_img\<?php echo $arrayData['d_profile'] ?>" alt="">
            <div class="div" style="margin-top:-12-%; z-index:1;margin-left:70% ">
              <a class="btn btn-primary" href="#" id="cameraIcon2"
                style="display: inline-block; padding: 5px; border-radius: 50%; margin-top:-90%;">
                <i class="fa fa-camera" style="font-size: 24px; color: white;"></i>
              </a>
            </div>
            <div class="dropdown-menu bg-primary" id="imageDropdown">
              <form action="dev-profile-change-action.php" method="post" enctype="multipart/form-data"
                class="image-form">
                <input type="file" name="image" id="image">
                <button type="submit">Change Image</button>
              </form>
            </div>
          </div>
        
        <div class="message-icon" >
            <a data-bs-toggle="modal" data-bs-target="#project"><button type="submit" style="border-radius:50%; margin-top:-46%;" class="btn btn-primary"><i 
                class="fa-solid fa-message" ></i></button></a>
          </div>
        
        
        </div>
      </div>




      <div class="col-lg-4 col-md-12 col-sm-12">

        <div class="container">
        <form style="margin-top:35%;" action="devinfo.php" method="post">
            <div class="mb-3">
              <label> Name:</label>
              <textarea class="form-control" id="name"
                name="name"><?php echo $arrayData['name']; ?></textarea>
            </div>
            <div class="mb-3">
              <label> Age:</label>
              <textarea class="form-control" id="age"
                name="age"><?php echo $arrayData['age']; ?></textarea>
            </div>
            <div class="mb-3">
              <label > Contact:</label>
              <textarea class="form-control" id="contact"
                name="contact"><?php echo $arrayData['d_mobile']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:-8.1%;" ><i style="border-radius:50%;"
                class="fa-solid fa-pen-to-square"></i></button>
          </form>
              
   

        </div>
      </div>
    </div>
  </div>




                                       <div class="modal" id="project">
                                            <div class="modal-dialog w-100 mt-3" style="margin-top: px;">
                                              <div class="modal-content">

                                                <!-- Modal body -->
                                                <div class="modal-body" style="">
                                                
            <?php
            
            $user_id = $_SESSION['unique_id'];
            $query = mysqli_query($conn, "SELECT * FROM project WHERE developer_1_id = '{$user_id}' OR developer_2_id = '{$user_id}' OR developer_3_id = '{$user_id}'");
              
            

            while($row = mysqli_fetch_assoc($query)){

              $project_name = $row['name'];
              $manager_id = $row['manager_id'];
              $project_id = $row['unique_id'];


              $sql2 = mysqli_query($conn, "SELECT * FROM manager WHERE unique_id = '$manager_id'");
              $manager = mysqli_fetch_assoc($sql2); 
              
              $dev1 = "";
              $dev2 = "";
              $dev3 = "";

              if($row['developer_1_id'] == $user_id){
                $dev1 = $row['manager_id'];
                $dev2 = $row['developer_2_id'];
                $dev3 = $row['developer_3_id'];

              }elseif($row['developer_2_id'] == $user_id){
                $dev1 = $row['manager_id'];
                $dev2 = $row['developer_1_id'];
                $dev3 = $row['developer_3_id'];
              }elseif($row['developer_3_id'] == $user_id){
                $dev1 = $row['manager_id'];
                $dev2 = $row['developer_1_id'];
                $dev3 = $row['developer_2_id'];
              }
              

              $per = "";

              // Check conditions using elseif
              if ($row['status'] == "Pending") {
                  $per = "25";
              } elseif ($row['status'] == "On-Hold") {
                  $per = "50";
              } elseif ($row['status'] == "Processing") {
                  $per = "75";
              } elseif ($row['status'] == "Done") {
                  $per = "100";
              }
           

              echo ' 

              <!-- 2nd side bar start -->
              <div class=" mt-3" id="sidebar" style="font-family: Salsa; ">
              <div class="row">
                  <div class="card bg-info" style="margin-left: 80px; width: 350px; ">
                      <ul class="nav nav-pills mt-1" style="border-radius: 10px; height: 130px; margin-left: -20px;" role="tablist">
                          <header class="justify-content-center align-items-center mt-2">
                          <a class="nav-link project-link text-dark" style="font-size: 17px;"  href="">' . $row['name'] . '</a>
                          </header>

                          <div class="progress mx-5" style="width: 300px; height: 8px;">
                          <div class="progress-bar progress-bar-striped bg-danger text-dark" role="progressbar" aria-valuenow=' . $per . ' aria-valuemin="0" aria-valuemax="100" style="width:' . $per . '%">
                            
                          </div>
                         
                      </div>
                      <p class="" style="margin-left: 300px; margin-top: -20px;">'.$per.'%</p>

                          <p class="mx-2" style="margin-top: -5px;"></p>
                          <div class="images d-flex">
                          <a class="nav-link project-link text-dark" style="font-size: 17px;"  href="dev-manager-chat.php?user_id='.$row['manager_id'].'">
                          <img src="uploaded_img/'.$manager['profile'].'" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 10px; margin-top: -10px;">
                          </a>
                          <p class="" style=" margin-left: 10px;">'.$manager['name'].'</p>

                          </div>
                      </ul>
                  </div>
                  </div>
                  </div>
                   ';

                 
              
            }
            ?>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">                                                  
                                                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                                                </div>

                                              </div>
                                            </div>
                                          </div>
                                       </div>




              <div class="modal" id="logout">
                                <div class="modal-dialog w-25" style="margin-top: 250px;">
                                  <div class="modal-content">

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <b>Are you sure to Logout?</b>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger"><a href="dev-logout.php" style="text-decoration:none; color: white;">Yes</a></button>
                                      <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                    </div>

                                  </div>
                                </div>
                              </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#cameraIcon2').click(function (event) {
        event.preventDefault();
        $('#imageDropdown').toggleClass('show');
      });
    });
    $(document).ready(function () {
      $('#cameraIcon').click(function (event) {
        event.preventDefault();
        $('#coverimageDropdown').toggleClass('show');
      });
    });
  </script>

  <script>


  </script>

</body>

</html>