<?php

include 'config.php';
$message = "";
session_start();
$user_id = $_SESSION['unique_id'];
$query = "SELECT * FROM `developer` WHERE unique_id ='$user_id'";
$allData = mysqli_query($conn, $query);

$arrayData = mysqli_fetch_assoc($allData);

$sql2 = mysqli_query($conn, "SELECT * FROM admin WHERE 1");
$admin = mysqli_fetch_assoc($sql2);


  if (isset($_POST['sk1'])) {
      $skill_1 = $_POST['skill_1'];
      $updateQuery = "UPDATE developer SET skill_1='$skill_1' WHERE unique_id='$user_id'";
      mysqli_query($conn, $updateQuery);

      echo '<script>alert("Updated!");
      window.location.href = "dev-profile-1.php";
      </script>';
      
  }


  if (isset($_POST['sk2'])) {
      $skill_2 = $_POST['skill_2'];
      $updateQuery = "UPDATE developer SET skill_2='$skill_2' WHERE unique_id='$user_id'";
      mysqli_query($conn, $updateQuery);

      echo '<script>alert("Updated!");
      window.location.href = "dev-profile-1.php";
      </script>';
      
  }



  if (isset($_POST['sk3'])) {
      $skill_3 = $_POST['skill_3'];
      $updateQuery = "UPDATE developer SET skill_3='$skill_3' WHERE unique_id='$user_id'";
      mysqli_query($conn, $updateQuery);

      echo '<script>alert("Updated!");
      window.location.href = "dev-profile-1.php";
      </script>';
      
  }

  if (isset($_POST['sk4'])) {
      $skill_4 = $_POST['skill_4'];
      $updateQuery = "UPDATE developer SET skill_4='$skill_4' WHERE unique_id='$user_id'";
      mysqli_query($conn, $updateQuery);

      echo '<script>alert("Updated!");
      window.location.href = "dev-profile-1.php";
      </script>';
      
  }


  if (isset($_POST['bio'])) {
      $aboutData = $_POST['text']; 
      $updateQuery = "UPDATE developer SET d_bio='$aboutData' WHERE unique_id='$user_id'";
      mysqli_query($conn, $updateQuery);

      echo '<script>alert("Updated!");
      window.location.href = "dev-profile-1.php";
      </script>';
      
  }

  if (isset($_POST['image'])) {
    $update_image = $_FILES['image']['name'];
     $update_image_size = $_FILES['image']['size'];
     $update_image_tmp_name = $_FILES['image']['tmp_name'];
     $update_image_folder = 'uploaded_img/'.$update_image;
   
    
           $image_update_query = mysqli_query($conn, "UPDATE `developer` SET d_profile = '$update_image' WHERE unique_id = '$user_id'") or die('query failed');

              move_uploaded_file($update_image_tmp_name, $update_image_folder);
        
        //    $message= "<div class='alert alert-success'>Details Updated Successfully !</div>";
          
        

    echo '<script>alert("image Updated!");
    window.location.href = "dev-profile-1.php";
    </script>';
    
}

if (isset($_POST['submit'])) {
  $type = "developer";
  $name = explode(',', $_POST['name']);
  $man_name = explode(',', $_POST['manager']);
  $project = explode(',', $_POST['project']);
  $email = $_POST['email'];

  $file = $_FILES['fifo']['name'];
  $file_tmp_name = $_FILES['fifo']['tmp_name'];
  $file_folder = "project_file/" . $file;
  $txt = $_POST['txt'];
  move_uploaded_file($file_tmp_name, $file_folder);

  $manager_name = mysqli_real_escape_string($conn, trim($man_name[0]));
  $manager_id = mysqli_real_escape_string($conn, trim($man_name[1]));

  $project_name = mysqli_real_escape_string($conn, trim($project[0]));
  $project_id = mysqli_real_escape_string($conn, trim($project[1]));

  $dev1_name = mysqli_real_escape_string($conn, trim($name[0]));
  $dev1_id = mysqli_real_escape_string($conn, trim($name[1]));


  

  $sql2 = mysqli_query($conn, "INSERT INTO file (type, manager_name, manager_id, project_name, project_id, dev_name, dev_id, dev_email, file, details) 
  VALUES ('$type', '$manager_name', '$manager_id', '$project_name', '$project_id', '$dev1_name', '$dev1_id', '$email', '$file', '$txt')");


  
    $sql5 ="UPDATE `project` SET file = '$file' WHERE manager_id ='$manager_id' and unique_id = '$project_id'";      
      $result5 = mysqli_query($conn, $sql5);
  

    

    echo '<script>alert("Project Submission Done!");
         window.location.href = "dev-profile-1.php";
         </script>';
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    

    
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Font Links -->
<link href='https://fonts.googleapis.com/css?family=Salsa' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Spicy Rice' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Squada One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Suez One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>
 

  <style>
    body{
  align-items: center;
  justify-content: center;
  background: url('images/view-bg.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; 
  
        }
        body::-webkit-scrollbar { 
        display: none; 
 }
 .ket::-webkit-scrollbar { 
        display: none; 
 }
 #txt::-webkit-scrollbar { 
        display: none; 
 }
    .nav {
      background-color: rgb(0,0,0,0.8); 
    
    }

    .nav-link.active,
    .nav-link:active {
      background-color: rgb(254,190,16) !important;
      margin-left: 8px;
      width: 195px;
      height: 40px;
      color: black !important;
    }
    .dropdown-menu {
      padding: 10px;
      border: 1px solid #ccc;
    }

    .show {
      display: block;
    }
   #profile img {
  object-fit: cover;
  width: 50%;
  height: 80%;
  border-radius: 50%;
  border: 10px solid; /* Specify border style */
  margin-top: 5%;
  margin-left: 25%;
}

.progress-bar {
            width: 0;
            transition: width 0.3s ease;
        }
.loader {
          border: 16px solid rgb(234, 255, 0);
          border-radius: 50%;
          border-top: 16px ;
          width: 80px;
          height: 80px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
          margin-top: 10px;
          margin-left: 60px;
        }

        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
   
  </style>
  
</head>

<body>
 

<div class="row">

      <!-- Sidebar -->
      <div class="col-md-2 mx-3" id="sidebar" style="margin-top: 110px; " >
            <ul class="nav nav-pills flex-column  mt-1 card" style="border-radius: 10px; width: 215px; height: 440px; position: fixed; border: 2px solid rgb(254,190,16) " role="tablist">
              <header class="justify-content-center align-items-center " >
                <img src="uploaded_img\<?php echo $arrayData['d_profile'] ?>" class="mt-3" style="object-fit: cover; border-radius: 50%; height: 60px; width: 60px; margin-left: 80px;">
                <p class="text-light mt-2 " style="margin-left: 40px; font-family:'Timmana';"><?php echo $arrayData['name']; ?></p>
              </header>
              <li class="nav-item mt-3">
                <a class="nav-link d-flex active" data-bs-toggle="pill" style="color: #fff; font-family:'Timmana';" href="#project"><i class="fa fa-keyboard-o px-4" style="font-size:20px; "></i>Project</a>
              </li>     
              <li class="nav-item mt-3">
              <?php 

                $sql0 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id)  FROM messages WHERE (incoming_msg_id = {$user_id} AND outgoing_msg_id = {$admin['unique_id']}))";
                $query2 = mysqli_query($conn, $sql0);
                $result1 = '';
                if ($query2) {
                    if (mysqli_num_rows($query2) > 0) {
                        $row2 = mysqli_fetch_assoc($query2);
                        $result1 = $row2['msg_id'];
                    }
                }


                $sql3 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id) FROM messages WHERE (incoming_msg_id = {$admin['unique_id']} AND outgoing_msg_id = {$user_id}))";
                $query3 = mysqli_query($conn, $sql3);

                $result2 = '';
                if ($query3) {
                    if (mysqli_num_rows($query3) > 0) {
                        $row3 = mysqli_fetch_assoc($query3);
                        $result2 = $row3['msg_id'];
                    }
                }


                $count = "";

                if($result2 < $result1) {
                $count .= '<div class="card bg-warning" style="border-radius: 20px; width: 15px; height: 15px;"></div>
                ';

                }else{

                }
                ?>
                <a class=" d-flex " href="dev-admin-chat.php?user_id=<?php echo $admin['unique_id'] ?>" style="color: #fff; font-family:'Timmana';"  style="text-decoration: none;">
                <i class="fa fa-user px-4" style="font-size:20px; margin-left: 17px; "></i>Admin<b class="mx-5 text-warning"><?php echo $count; ?></b></a>
              </li>
              <li class="nav-item mt-3">
                <a class="nav-link  d-flex " data-bs-toggle="pill" href="#profile" style="color: #fff; font-family:'Timmana';" ><i class="fa fa-bar-chart px-4" style="font-size:20px; "></i>Profile</a>
              </li>    
              <li class="nav-item mt-3">
                <a class="nav-link d-flex t" data-bs-toggle="pill" href="#contact" style="color: #fff; font-family:'Timmana';" ><i class="fa fa-file-invoice px-4" style=""></i>Submission</a>
              </li>
              <li class="nav-item mt-3">
                <a class="nav-link d-flex " data-bs-toggle="modal" data-bs-target="#logout" style="cursor:pointer;color: #fff; font-family:'Timmana';" >             
                <i class="fas fa-sign-out-alt px-4" style="font-size: 24px;"></i>Logout</a>
              </li>
            </ul>
     <!-- slider end -->
    </div>

     <!-- Tab panes -->
     <div class="col-md-10">
        <div class="tab-content" style="font-family: Salsa">


        <div id="project" class="container tab-pane" style="margin-top: -90px; margin-left: 250px;">
                      <div class="d-flex" style="margin-left: 0px; position: fixed">


                      <div class="card" style="height: 620px; width: 988px; margin-left: 0px; border-radius: 20px; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);">

                      
                      <div class="container d-flex mx-5 mt-3" style="height: 200px; ">

                            <?php
                            $sql = "SELECT COUNT(*) as manager_id FROM project WHERE developer_1_id = '$user_id' OR developer_2_id = '$user_id' OR developer_3_id = '$user_id'  ";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $project_count = $row['manager_id']; 
                            $developer_count = 3 * $project_count;

                            $sql2 = "SELECT COUNT(*) as status FROM project WHERE (developer_1_id = '$user_id' OR developer_2_id = '$user_id' 
                            OR developer_3_id = '$user_id') AND status <> 'Pending'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $working_project = $row2['status'];



                            ?>

                      <div class="card col-md-5 mx-2 " style="border-radius: 20px; background-color:  rgb(0,0,0,0.8); border-color: rgb(234, 255, 0); font-family:'Timmana';">
                         <div class="row">
                            <div class="col-md-6">
                                <p class="mt-2 text-light" style="margin-left: 60px;">Total Project</p>
                                <span class="text-light" style="margin-left: 85px; font-size: 24px; margin-top: -20px;"><b><?php echo $project_count ?></b></span>
                                <div class=" loader "></div>
                            </div>  
                            <div class="col-md-6 mt-4">
                                <img src="img\dev-project-1.svg" style="width: 150px;">
                            </div>  

                         </div>
                          
                      </div>

                      <div class="card bg-worning col-md-5 " style="border-radius: 20px; font-family:'Timmana'; background-color: rgb(0,0,0,0.8); border-color: rgb(234, 255, 0); margin-left: 30px;">
                      <div class="row">
                            <div class="col-md-6">
                            <p class="mt-2  w-100 text-light" style="margin-left: 60px;">Working On</p>
                                <span class="text-light" style="margin-left: 90px; font-size: 24px; margin-top: -20px;"><b><?php echo $working_project ?></b></span>
                                <div class=" loader "></div>
                            </div>  
                            <div class="col-md-6 mt-4">
                                <img src="img\dev-project-2.svg" style="width: 150px;">
                            </div>  

                         </div>
                      </div>

                      </div>

                      <div class="container" style="font-family:'Timmana';">
                                     <div class="card w-100 ket" style="height: 300px; border-radius: 20px; max-height: 430px; margin-top: 60px; overflow-y: auto; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);">
                                     <div class="d-flex mt-3" style="font-family:'Timmana';"> 
                                      <p class="text-light" style="margin-left: 30px;">Project</p>
                                      <p class="text-light" style="margin-left:200px;">Manager</p>
                                      <p class="text-light px-5" style="margin-left: 200px;">Progress</p>
                                      <p class="text-light px-5" style="margin-left: 130px; margin-right: 20px;">Status</p>
                                    </div>
                                   <?php  
                                  $id = $_SESSION['unique_id'];
                                  $sql = "SELECT * FROM project WHERE developer_1_id = '$id' OR developer_2_id = '$id' OR developer_3_id = '$id'  ";
                                  $query = mysqli_query($conn, $sql);

                                  $output = "";

                                  if (mysqli_num_rows($query) == 0) {
                                      $output .= '<div class="text-light"> You Have No Project Yet </div>';
                                  } elseif (mysqli_num_rows($query) > 0) {
                                      while ($row = mysqli_fetch_assoc($query)) {
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

                                          $sql0 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id)  FROM messages WHERE (incoming_msg_id = {$user_id} AND outgoing_msg_id = {$row['manager_id']}))";
                                          $query2 = mysqli_query($conn, $sql0);
                                          $result1 = '';
                                          if ($query2) {
                                              if (mysqli_num_rows($query2) > 0) {
                                                  $row2 = mysqli_fetch_assoc($query2);
                                                  $result1 = $row2['msg_id'];
                                              }
                                          }
                                
                                
                                          $sql3 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id) FROM messages WHERE (incoming_msg_id = {$row['manager_id']} AND outgoing_msg_id = {$user_id}))";
                                          $query3 = mysqli_query($conn, $sql3);
                                
                                          $result2 = '';
                                          if ($query3) {
                                              if (mysqli_num_rows($query3) > 0) {
                                                  $row3 = mysqli_fetch_assoc($query3);
                                                  $result2 = $row3['msg_id'];
                                              }
                                          }
                                        $count = "";
                                
                                    if($result2 < $result1) {
                                      $count .= '<div class="card bg-warning" style="border-radius: 20px; width: 7px; height: 7px; margin-left: 170px; margin-top: -25px"></div>
                                      ';
                                
                                       }else{
                                        
                                       }

                                          // Display user information and progress bar
                                          $output .= '<div style="display: flex; position: relative; align-items: center; cursor: pointer; 
                                              padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px;
                                              padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none; margin-top: 5px; ">
                                              <div class="content" style="display: flex; align-items: center; font-family:"Timmana";">
                                                  <div class="details" style="color: #fff; margin-left: 20px; width: 200px;">
                                                     
                                                          <span class="text-light" style=" font-size: 17px;;">' . $row['name'] . '</span>
                                                         
                                                      </div>
                                                      <div class="details" style="color: #fff; margin-left: 20px;">
                                                     
                                                          <a href="dev-manager-chat.php?user_id='.$row['manager_id'].'" class="text-light" style=" font-size: 17px;  text-decoration:none;">' . $row['manager'] . '</a>'.$count.'
                                                         
                                                      </div>
                                                  </div>
                                                  <div class="status-dot d-flex" style="position: relative; margin-right: -90px;">
                                                      <div class="container" style="margin-right: -140px; width: 300px;">
                                                          <div class="progress">
                                                              <div class="progress-bar progress-bar-striped bg-warning text-dark " role="progressbar" aria-valuenow=' . $per . ' aria-valuemin="0" aria-valuemax="100" style="width:' . $per . '%">
                                                                  ' . $per . '%
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="container">
                                                          <p class="date text-light " style="margin-left: 240px; width: 100px;">' . $row['status'] . '</p>
                                                      </div>
                                                  </div>
                                              </div>';
                                      }
                                      
                                  } 
                                  echo $output;    
                              ?>

                                     </div>

                                   </div>
                      </div>



           </div>
           <!-- project End -->
        </div>

        <div id="profile" class="container tab-pane" style="margin-top: -90px; margin-left: 250px;">
                      <div class="d-flex" style="margin-left: 0px; position: fixed">

                  
                <div class="card" style="height: 600px; width: 988px; font-family:'Timmana'; margin-left: 0px; border-radius: 20px; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);">

                <form method="post" enctype="multipart/form-data">
                 <div class="row">

                      <div class="col-md-6">

                      <img class="border-outline-primary " src="uploaded_img\<?php echo $arrayData['d_profile'] ?>" alt="">
                      <div class="div" style="z-index:1;margin-left:70% ">
                      <a class="btn btn-outline-warning border-2 p-2" href="#" id="cameraIcon2"
                      style="display: inline-block; padding: 5px; border-radius: 50%; margin-top:-90%;"><i class="fa fa-camera"></i>
                      </a>
                      </div>
                      <div class="dropdown-menu bg-warning" id="imageDropdown">
                      <input type="file" name="image" id="image">
                      <button name="image">Change Image</button>
                      </div>


                      <!-- col-md-6 -->
                      </div>

                      <div class="col-md-6">
                             
                             <div class="text-light">
                             <p class="mt-2 text-warning"><?php echo $arrayData['d_skill'] ?></p>
                             <h4><?php echo $arrayData['name'] ?></h4>
                             <textarea class="form-control text-light" id="txt" type="text" name="text" style="width: 473px; height:150px; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);"><?php echo $arrayData['d_bio'] ?></textarea>
                             <button name="bio" class="btn btn-outline-warning mt-2"><i style="" class="fa-solid fa-pen-to-square"></i></button>
                             </div>
                      </div>


                      <div class="text-light mx-2 col-md-12 text-center mt-1" style="position: relative;">
                      <hr class="my-2 bg-light" style="">
                      <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"><b>What I DO</b></span>
                      </div>


                      <div class="col-md-6 mt-3">
                             

                             <div class="text-light mx-1">
                              <button name="sk1" class="btn btn-outline-warning"><i style="" class="fa-solid fa-folder-open"></i></button>
                              <textarea class="form-control mt-2 text-light" id="txt" type="text" name="skill_1" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);"><?php echo $arrayData['skill_1'] ?></textarea>
                             </div>

                              <div class="text-light mx-1 mt-2">
                              <button name="sk2" class="btn btn-outline-warning"><i style="" class="fa-solid fa-share-from-square"></i></button>
                              <textarea class="form-control mt-2 text-light" id="txt" type="text" name="skill_2" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);"><?php echo $arrayData['skill_2'] ?></textarea>
                             </div>
                      </div>

                      <div class="col-md-6 mt-3">
                             

                               <div class="text-light mx-1">
                                <button name="sk3" class="btn btn-outline-warning"><i style="" class="fa-solid fa-folder-open"></i></button>
                                <textarea class="form-control mt-2 text-light" id="txt" type="text" name="skill_3" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);"><?php echo $arrayData['skill_3'] ?></textarea>
                               </div>
  
                                <div class="text-light mx-1 mt-2">
                                <button name="sk4" class="btn btn-outline-warning"><i style="" class="fa-solid fa-print"></i></button>
                                <textarea class="form-control mt-2 text-light" id="txt" type="text" name="skill_4" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);"><?php echo $arrayData['skill_4'] ?></textarea>
                               </div>
                        </div>


                 <!-- row -->
                 </div>

                 </form>
              <!-- card end -->
                </div>
        
           <!-- Profile tab end -->
           </div>
        </div>




        <div id="contact" class="container tab-pane"  style="margin-top: -100px; margin-left: 250px; font-family:'Timmana';">
                              <div class="d-flex" style="position: fixed">
                                  <div class="card  mt-2" style="height: 600px; width: 950px; margin-left: 0px; border-radius: 20px; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);">
                                   

                            <div class="container mt-2 text-dark">
                          <div class="row">

                            <div class="col-md-6 mt-2">
                              <h2 class="text-light">Project Submission</h2>
                              <form  method="post" enctype="multipart/form-data">
                                  <label for="name" class="text-light">Your Name & Unique ID</label>
                                  <input type="text" class="form-control btn btn-outline-warning" style="" id="name" name="name" value="
<?php echo $arrayData['name'] ?>,<?php echo $arrayData['unique_id'] ?>
                                  " required>


                                </div>

                                <div class="col-md-6" style="margin-top: 53px;">
                                  <label for="email" class="text-light">Project Name & Unique ID</label><br>
                                  <select class="form-select btn btn-outline-warning w-100" name="project" id="manager">
                                <?php
                                  $query = "SELECT * FROM `project` WHERE developer_1_id = '$user_id' OR developer_2_id = '$user_id' OR developer_3_id = '$user_id'";
                                  $allData = mysqli_query($conn, $query);
                                  $output3="";
                                  if (mysqli_num_rows($allData) > 0) {
                                      while ($arrayData = mysqli_fetch_array($allData)) {
                                          echo '<option>' . $arrayData['name'] . ','. $arrayData['unique_id'] .'</option>';
                                      }
                                  } else {
                                      echo '<option>No project managers found</option>';
                                  }
                                    ?>
                                </select>

                                </div>
                                
                               

                          

                                <div class="col-md-6">
                                  <?php
                                  $user_id = $_SESSION['unique_id'];
                                  $query2 = "SELECT * FROM `developer` WHERE unique_id ='$user_id'";
                                  $allData2 = mysqli_query($conn, $query2);
                                  
                                  $arrayData2 = mysqli_fetch_assoc($allData2);
                                  ?>
                                  <label for="email" class="mt-2 text-light">Your Email</label>
                                  <input type="text" class="form-control btn btn-outline-warning" style="" id="name" name="email" value="<?php echo $arrayData2['email']; ?>" required>
                                </div>

                                <div class="col-md-6 mt-2">
                                <label for="manager" class="text-light">Manager Name & Unique ID</label>
                                <select class="form-select btn btn-outline-warning w-100" name="manager" id="manager">
                                <?php
                                  $query = "SELECT * FROM `project` WHERE developer_1_id = '$user_id' OR developer_2_id = '$user_id' OR developer_3_id = '$user_id'";
                                  $allData = mysqli_query($conn, $query);
                                  $output3="";
                                  if (mysqli_num_rows($allData) > 0) {
                                      while ($arrayData = mysqli_fetch_array($allData)) {
                                        echo '<option>' . $arrayData['manager'] . ','. $arrayData['manager_id'] .'</option>';
                                      }
                                  } else {
                                      echo '<option>No project managers found</option>';
                                  }
                                    ?>
                                </select>

                            </div>

                                <div class="col-md-12">
                                  <label for="email" class="mt-2 text-light">Upload Project Files (Zip)</label>
                                  <input type="file" class="form-control btn btn-outline-warning" style="" name="fifo" required>
                                </div>

                                <div class="col-md-12">
                                  <label for="message" class="mt-2 text-light">Project Details</label>
                                  <textarea class="form-control text-warning h-100" style="border-color:yellow; background-color: rgb(0,0,0,0.6);" id="message" name="txt" rows="6" required></textarea>
                                </div>

                                <input type="submit" name="submit" class="btn btn-outline-warning w-75" style="margin-left: 90px; margin-top: 50px;" value="Submit Work">
                              </form>
                            </div>
                          </div>
                        
                        


                              </div>
                              </div>
                          </div>

       <!-- Tab Pane -->
        </div>
     </div>

</div>

<!-- The Logout Modal -->
<div class="modal" id="logout">
                    <div class="modal-dialog w-25" style="margin-top: 250px; font-family:'Timmana';">
                      <div class="modal-content" style="background-color: rgb(0,0,0,0.8); border-color:rgb(254,190,16);  ; ">

                        <!-- Modal body -->
                        <div class="modal-body text-light">
                          Are you sure to Logout?
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <a href="dev-logout.php?logout_id=<?php echo $user_id; ?>" class="btn btn-outline-warning" style=" text-decoration:none; ">Yes</a>
                          <button type="button" class="btn bg-warning" data-bs-dismiss="modal">No</button>
                        </div>

                      </div>
                    </div>
                  </div>


  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
 
  <script>
     $(document).ready(function () {
    // Show the first tab content by default
    $('#project').addClass('show active');
});
   
    
  </script>

</body>

</html>