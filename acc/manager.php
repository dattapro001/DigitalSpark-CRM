<?php 
  include "config.php";
  $output="";
  session_start();
  if (isset($_SESSION['unique_id'])) {
   
  $user_id = $_SESSION['unique_id'];

  $sql = mysqli_query($conn, "SELECT * FROM manager WHERE unique_id = {$user_id}");
  $data = mysqli_fetch_assoc($sql);

  $sql2 = mysqli_query($conn, "SELECT * FROM admin WHERE 1");
  $admin = mysqli_fetch_assoc($sql2);

  if (isset($_POST['submit'])) {
    $type = "manager";
    $name = explode(',', $_POST['name']);
    $project = explode(',', $_POST['project']);
    $dev1 = explode(',', $_POST['dev1']);
    $dev2 = explode(',', $_POST['dev2']);
    $dev3 = explode(',', $_POST['dev3']);
    $email = $_POST['email'];

    $file = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_folder = "project_file/" . $file;
    $txt = $_POST['txt'];
    move_uploaded_file($file_tmp_name, $file_folder);

    $manager_name = mysqli_real_escape_string($conn, trim($name[0]));
    $manager_id = mysqli_real_escape_string($conn, trim($name[1]));

    $project_name = mysqli_real_escape_string($conn, trim($project[0]));
    $project_id = mysqli_real_escape_string($conn, trim($project[1]));

    $dev1_name = mysqli_real_escape_string($conn, trim($dev1[0]));
    $dev1_id = mysqli_real_escape_string($conn, trim($dev1[1]));

    $dev2_name = mysqli_real_escape_string($conn, trim($dev2[0]));
    $dev2_id = mysqli_real_escape_string($conn, trim($dev2[1]));

    $dev3_name = mysqli_real_escape_string($conn, trim($dev3[0]));
    $dev3_id = mysqli_real_escape_string($conn, trim($dev3[1]));

    

    $sql2 = mysqli_query($conn, "INSERT INTO file (type, manager_name, manager_id, project_name, project_id, dev1_name, dev1_id, dev2_name, dev2_id, dev3_name, dev3_id, email, file, details) 
    VALUES ('$type','$manager_name', '$manager_id', '$project_name', '$project_id', '$dev1_name', '$dev1_id', '$dev2_name', '$dev2_id', '$dev3_name', '$dev3_id', '$email', '$file', '$txt')");


    
      $sql5 ="UPDATE `project` SET file = '$file' WHERE manager_id ='$manager_id' and unique_id = '$project_id'";      
        $result5 = mysqli_query($conn, $sql5);
    

      

      echo '<script>alert("Project Submission Done!");
           window.location.href = "manager.php";
           </script>';
  }


  if (isset($_POST['sk1'])) {
    $skill_1 = $_POST['skill_1'];
    $updateQuery = "UPDATE manager SET skill_1='$skill_1' WHERE unique_id='$user_id'";
    mysqli_query($conn, $updateQuery);

    echo '<script>alert("Updated!");
    window.location.href = "manager.php";
    </script>';
    
}


if (isset($_POST['sk2'])) {
    $skill_2 = $_POST['skill_2'];
    $updateQuery = "UPDATE manager SET skill_2='$skill_2' WHERE unique_id='$user_id'";
    mysqli_query($conn, $updateQuery);

    echo '<script>alert("Updated!");
  window.location.href = "manager.php";
  </script>';
    
}



if (isset($_POST['sk3'])) {
    $skill_3 = $_POST['skill_3'];
    $updateQuery = "UPDATE manager SET skill_3='$skill_3' WHERE unique_id='$user_id'";
    mysqli_query($conn, $updateQuery);

    echo '<script>alert("Updated!");
    window.location.href = "manager.php";
    </script>';
    
}

if (isset($_POST['sk4'])) {
    $skill_4 = $_POST['skill_4'];
    $updateQuery = "UPDATE manager SET skill_4='$skill_4' WHERE unique_id='$user_id'";
    mysqli_query($conn, $updateQuery);

    echo '<script>alert("Updated!");
    window.location.href = "manager.php";
    </script>';
    
}


if (isset($_POST['bio'])) {
    $aboutData = $_POST['text']; 
    $updateQuery = "UPDATE manager SET bio='$aboutData' WHERE unique_id='$user_id'";
    mysqli_query($conn, $updateQuery);

    echo '<script>alert("Updated!");
    window.location.href = "manager.php";
    </script>';
    
}

if (isset($_POST['image'])) {
  $update_image = $_FILES['image']['name'];
   $update_image_size = $_FILES['image']['size'];
   $update_image_tmp_name = $_FILES['image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;
 
  
         $image_update_query = mysqli_query($conn, "UPDATE `manager` SET profile = '$update_image' WHERE unique_id = '$user_id'") or die('query failed');

            move_uploaded_file($update_image_tmp_name, $update_image_folder);
      
      //    $message= "<div class='alert alert-success'>Details Updated Successfully !</div>";
        
      

      echo '<script>alert("Updated!");
      window.location.href = "manager.php";
      </script>';
  
}

if (isset($_POST['sk'])) {
  $skill = $_POST['skill'];
  $updateQuery = "UPDATE manager SET skill='$skill' WHERE unique_id='$user_id'";
  mysqli_query($conn, $updateQuery);

  echo '<script>alert("Updated!");
  window.location.href = "manager.php";
  </script>';  
  
}

if (isset($_POST['ex'])) {
$ex = $_POST['ext'];
$updateQuery = "UPDATE manager SET experience='$ex' WHERE unique_id='$user_id'";
mysqli_query($conn, $updateQuery);

echo '<script>alert("Updated!");
window.location.href = "manager.php";
</script>';

}


  }else{
    header("Location: index.php");

  }


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalSpark CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    
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

    <!-- Your custom CSS variables -->

    <style>

    body{
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #1a2035!important;
  font-family: 'Timmana' !important;
  
        }

    .nav {
      background-color: rgba(52,71,103,.3);
      box-shadow: 0 2px 12px 0 rgba(0,0,0,.7); 
    }

    .nav-link.active,
    .nav-link:active {
      background-color: deeppink !important;
      color: whitesmoke !important;
      margin-left: 8px;
      width: 195px;
      height: 40px;
      
    }

        img {
            object-fit: cover;
            border-radius: 50%;
            height: 45px;
            width: 45px;
            margin-left: 30px;
        }

        #profile img {
        object-fit: cover;
        width: 70%;
        height: 90%;
        border-radius: 50%;
        border: 10px solid; 
        margin-top: 5%;
        margin-left: 15%;
      }

        .progress-bar {
            width: 0;
            transition: width 0.3s ease;
        }

      
        .loader {
          position: relative;
          width: 75px;
          height: 100px;
          margin-left: 40px;
          background-repeat: no-repeat;
          background-image: linear-gradient(deeppink 50px, transparent 0),
                            linear-gradient(#DDD 50px, transparent 0),
                            linear-gradient(#DDD 50px, transparent 0),
                            linear-gradient(#DDD 50px, transparent 0),
                            linear-gradient(#DDD 50px, transparent 0);
          background-size: 8px 100%;
          background-position: 0px 90px, 15px 78px, 30px 66px, 45px 58px, 60px 50px;
          animation: pillerPushUp 4s linear infinite;
        }
        .loader:after {
          content: '';
          position: absolute;
          bottom: 10px;
          left: 0;
          width: 10px;
          height: 10px;
          background: #de3500;
          border-radius: 50%;
          animation: ballStepUp 4s linear infinite;
        }

      @keyframes pillerPushUp {
        0% , 40% , 100%{background-position: 0px 90px, 15px 78px, 30px 66px, 45px 58px, 60px 50px}
        50% ,  90% {background-position: 0px 50px, 15px 58px, 30px 66px, 45px 78px, 60px 90px}
      }

      @keyframes ballStepUp {
        0% {transform: translate(0, 0)}
        5% {transform: translate(8px, -14px)}
        10% {transform: translate(15px, -10px)}
        17% {transform: translate(23px, -24px)}
        20% {transform: translate(30px, -20px)}
        27% {transform: translate(38px, -34px)}
        30% {transform: translate(45px, -30px)}
        37% {transform: translate(53px, -44px)}
        40% {transform: translate(60px, -40px)}
        50% {transform: translate(60px, 0)}
        57% {transform: translate(53px, -14px)}
        60% {transform: translate(45px, -10px)}
        67% {transform: translate(37px, -24px)}
        70% {transform: translate(30px, -20px)}
        77% {transform: translate(22px, -34px)}
        80% {transform: translate(15px, -30px)}
        87% {transform: translate(7px, -44px)}
        90% {transform: translate(0, -40px)}
        100% {transform: translate(0, 0);}
      }
          
      

        .ket::-webkit-scrollbar { 
        display: none; 
 }
</style>


</head>
<body>
    <div class="container-fluid mt-1">
        <div class="row">

    <!-- Sidebar -->
    <div class="col-md-2" id="sidebar" style="margin-top: 70px;" >
    <ul class="nav nav-pills flex-column  mt-1 card" style="border-radius: 10px; width: 215px; height: 500px; position: fixed; box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);" role="tablist">
      <header class="justify-content-center align-items-center " style="">
        <img src="uploaded_img\<?php echo $data['profile'] ?>" class="mt-4" style="object-fit: cover; border-radius: 50%; height: 60px; width: 60px; margin-left: 75px;">
        <p class="text-light mt-3 " style="margin-left: 45px; font-family: ;"><?php echo $data['name']; ?></p>
      </header>
      <li class="nav-item mt-4">
        <a class="nav-link d-flex active" data-bs-toggle="pill" style="color: #fff" href="#pogo"><i class="fa fa-keyboard-o px-4" style="font-size:20px;"></i>Project</a>
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
      $count .= '<div class="card bg-warning" style="border-radius: 20px; width: 10px; height: 10px;"></div>
      ';

       }else{
        
       }
        ?>
        <a class=" d-flex " href="manager-admin-chat.php?user_id=<?php echo $admin['unique_id'] ?>" style="color: #fff"  style="text-decoration: none;">
        <i class="fa fa-user px-4" style="font-size:20px; margin-left: 17px;"></i>Admin<b class="mx-5 text-warning"><?php echo $count; ?></b></a>
      </li>
      <li class="nav-item mt-3">
        <a class="nav-link  d-flex " data-bs-toggle="pill" href="#profile" style="color: #fff" ><i class="fa fa-bar-chart px-4" style="font-size:20px"></i>Profile</a>
      </li>  
      <li class="nav-item mt-3">
        <a class="nav-link d-flex t" data-bs-toggle="pill" href="#file" style="color: #fff" ><i class="fa fa-file-archive-o px-4" style="font-size:20px"></i>Files</a>
      </li>  
      <li class="nav-item mt-3">
        <a class="nav-link d-flex t" data-bs-toggle="pill" href="#contact" style="color: #fff" ><i class="fa fa-file-invoice px-4" style="font-size:20px"></i>Submission</a>
      </li>
      <li class="nav-item mt-3">
        <a class="nav-link d-flex " data-bs-toggle="modal" data-bs-target="#logout" style="cursor:pointer;color: #fff" >             
        <i class="fas fa-sign-out-alt px-4" style="font-size: 24px;"></i>Logout</a>
      </li>
    </ul>
     <!-- slider end -->
    </div>

        

  <!-- Tab panes -->
  <div class="col-md-8">
      <div class="tab-content" style="font-family: ">
          <!-- Dashboard Tab -->
    
      <div id="pogo" class="container tab-pane">
                <div class="d-flex" style="margin-left: 20px; position: fixed">
                    <div class="card  mt-2 w-100" style="height: 620px; margin-left: -10px; border-radius: 20px; background-color: rgba(52,71,103,.3);
                     box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);">

                      <div class="container d-flex mx-4 mt-4" style="height: 200px; ">

                      <?php
                      $sql1 = "SELECT COUNT(*) as manager_id FROM project WHERE manager_id = '$user_id'";
                      $result1 = mysqli_query($conn, $sql1);
                      $row1 = mysqli_fetch_assoc($result1);
                      $project_count = $row1['manager_id']; 
                      $developer_count = 3 * $project_count;

                      // $sql = "SELECT COUNT(DISTINCT developer_id) as unique_developer_count FROM project WHERE manager_id = '$user_id'";
                      // $result = mysqli_query($conn, $sql);
                      // $row = mysqli_fetch_assoc($result);
                      // $unique_developer_count = $row['unique_developer_count'];
                      // $developer_count = 3 * $unique_developer_count;


                      $sql2 = "SELECT COUNT(*) as status FROM project
                      WHERE  manager_id = {$user_id} 
                      AND status <> 'Pending'";
                      $result2 = mysqli_query($conn, $sql2);
                      $row2 = mysqli_fetch_assoc($result2);
                      $working_project = $row2['status'];
                      
                      
                      
                      ?>

                        <div class="card col-md-3 mx-4" style="border-radius: 20px; background-color: rgba(52,71,103,.3); box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);">
                          <p class="mt-2 w-100 text-light" style="margin-left: 30px;">Total Project</p>
                          <span class="text-light" style="margin-left: 65px; font-size: 24px; margin-top: -20px;"><b><?php echo $project_count ?></b></span>
                          <div class=" loader ""></div>
                          
                        </div>

                        <div class="card bg-worning col-md-3 mx-4" style="border-radius: 20px; background-color: rgba(52,71,103,.3); box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);">
                        <p class="mt-2  w-100 text-light" style="margin-left: 25px;">Total Developer</p>
                        <span class="text-light" style="margin-left: 68px; font-size: 24px; margin-top: -20px;"><b><?php echo $developer_count ?></b></span>
                        <div class="loader"></div>
                        </div>

                        <div class="card bg-worning col-md-3 mx-4" style="border-radius: 20px; background-color: rgba(52,71,103,.3); box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);">
                        <p class="mt-2 w-100 text-light" style="margin-left: 40px;">Working On</p>
                        <span class="text-light" style="margin-left: 65px; font-size: 24px; margin-top: -20px;"><b><?php echo $working_project ?></b></span>
                        <div class="loader"></div>
                        </div>

                    </div>

                    <div class="container">
                        <div class="card w-100   ket" style="height: 310px; border-radius: 20px; max-height: 430px; margin-top: 60px; overflow-y: auto; background-color: rgba(52,71,103,.3); box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);">
                        <div class="d-flex mt-3" style="font-family:"> 
                        <p class="text-light" style="margin-left: 30px;">Project</p>
                        <p class="text-light px-5" style="margin-left: 240px;">Progress</p>
                        <p class="text-light px-5" style="margin-left: 130px; margin-right: 20px;">Status</p>
                      </div>
                      <?php  
                    $id = $_SESSION['unique_id'];
                    $sql = "SELECT * FROM project WHERE manager_id = '$id'";
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

                            // Display user information and progress bar
                            $output .= '<div style="display: flex; position: relative; align-items: center; cursor: pointer; 
                                padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px;
                                padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none; margin-top: 5px; ">
                                <div class="content" style="display: flex; align-items: center;">
                                    <div class="details" style="color: #fff; margin-left: 20px;">
                                        
                                            <span class="text-light" style=" font-size: 17px; font-family: ;">' . $row['name'] . '</span>
                                            
                                        </div>
                                    </div>
                                    <div class="status-dot d-flex" style="position: relative; margin-right: -90px;">
                                        <div class="container" style="margin-right: -140px; width: 300px;">
                                            <div class="progress" style="border: 2px solid rgb(255, 255, 255,0.7) ">
                                                <div class="progress-bar progress-bar-striped text-light" role="progressbar" aria-valuenow=' . $per . ' aria-valuemin="0" aria-valuemax="100" style="width:' . $per . '%; background-color: deeppink;height:18px;">
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
            </div>


        <div id="profile" class="container tab-pane">
            <div class="d-flex" style="margin-left: 0px; position: fixed">
            <div class="card  mt-1 ket" style="height: 625px; width: 788px; margin-left: 0px; border-radius: 20px; max-height: 640px;
              margin-top: 60px; overflow-y: auto;  background-color: rgba(52,71,103,.3); box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);">                                     

    <form method="post" enctype="multipart/form-data">
        <div class="row">

              <div class="col-md-6">

              <img class="border-outline-primary " src="uploaded_img\<?php echo $data['profile'] ?>" alt="">
              <div class="div" style="z-index:1;margin-left:70% ">
              <a class="btn btn-outline-light border-2 p-2" href="#" id="cameraIcon2"
              style="border-radius: 50%; margin-top:-90%;"><i class="fa fa-camera"></i>
              </a>
              </div>
              <div class="dropdown-menu bg-light mx-5" id="imageDropdown">
              <input type="file" name="image" id="image">
              <button name="image" style="margin-left: 200px;margin-top: -20px;">Change Image</button>
              </div>


              <!-- col-md-6 -->
              </div>

              <div class="col-md-6">
                    
                    <div class="text-light">
                    <p class="mt-2 text-light">Manager</p>
                    <h4><?php echo $data['name'] ?></h4>
                    <textarea class="form-control text-light ket" id="txt" type="text" name="text" style="width: 370px; height:150px; background-color: rgb(0,0,0,0.8); border-color: rgb(255, 255, 255,0.9);"><?php echo $data['bio']  ?></textarea>
                    <button name="bio" class="btn btn-outline-light mt-2"><i style="" class="fa-solid fa-pen-to-square"></i></button>
                    </div>
              </div>

              <div class="text-light mx-2 col-md-12 text-center" style="position: relative;">
                  <hr class="my-2 bg-light" style="">
                  <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">What I Do</span>
              </div>

              <div class="col-md-6">
                    

                    <div class="text-light mx-1 mt-3">
                      <button name="sk1" class="btn btn-outline-light"><i style="" class="fa-solid fa-folder-open"></i></button>
                      <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="skill_1" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(255, 255, 255,0.9);;"><?php echo $data['skill_1'] ?></textarea>
                    </div>

                      <div class="text-light mx-1 mt-2">
                      <button name="sk2" class="btn btn-outline-light"><i style="" class="fa-solid fa-share-from-square"></i></button>
                      <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="skill_2" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(255, 255, 255,0.9);"><?php echo $data['skill_2']  ?></textarea>
                    </div>
              </div>

              <div class="col-md-6">
                    

                      <div class="text-light mx-1 mt-3">
                        <button name="sk3" class="btn btn-outline-light"><i style="" class="fa-solid fa-folder-open"></i></button>
                        <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="skill_3" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(255, 255, 255,0.9);,190,16);"><?php echo $data['skill_3'] ?></textarea>
                      </div>

                        <div class="text-light mx-1 mt-2">
                        <button name="sk4" class="btn btn-outline-light"><i style="" class="fa-solid fa-print"></i></button>
                        <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="skill_4" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(255, 255, 255,0.9);"><?php echo $data['skill_4'] ?></textarea>
                      </div>
                </div>

                <div class="text-light mx-2 col-md-12 text-center mt-5" style="position: relative;">
                  <hr class="my-2 bg-light" style="">
                  <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Skill & Experience</span>
              </div>

                <div class="col-md-6">
                            <div class="text-light mx-1 mt-3">
                              <button name="sk" class="btn btn-outline-light"><i style="" class="fa-solid fa-folder-open"></i></button>
                              <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="skill" style="height: 120px ; background-color: rgb(0,0,0,0.8); border-color: rgb(255, 255, 255,0.9);"><?php echo $data['skill'] ?></textarea>
                            </div>
                </div>

                <div class="col-md-6">
                              <div class="text-light mx-1 mt-3">
                              <button name="ex" class="btn btn-outline-light"><i style="" class="fa-solid fa-print"></i></button>
                              <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="ext" style="height: 120px ; background-color: rgb(0,0,0,0.8); border-color: rgb(255, 255, 255,0.9);"><?php echo $data['experience'] ?></textarea>
                            </div>
                </div>

                <div class="col-md-6" style="opacity: 0;">
                              <div class="text-light mx-1 mt-3">
                            </div>
                </div>


        <!-- row -->
        </div>

        </form>

                  </div>
                  </div>
              </div>


    <div id="file" class="container tab-pane">
        <div class="d-flex" style="margin-left: 0px; position: fixed">

        <div class="card  mt-2 ket" style="height: 620px; width: 788px; margin-left: 5px; border-radius: 20px; max-height: 620px;
          margin-top: 60px; overflow-y: auto; background-color: rgba(52,71,103,.3); box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);">
                
              
                <div class="d-flex mt-3" style="font-family: ;"> 
                <p class="text-light" style="margin-left: 30px;">Dev-Name</p>
                <p class="text-light px-5" style="margin-left: 180px;">Email</p>
                <p class="text-light px-5" style="margin-left: 90px;">Project-ID</p>
              </div>
              <?php  
            $id = $_SESSION['unique_id'];
            $sql = "SELECT * FROM file WHERE manager_id = '$id' AND type = 'developer'";
            $query = mysqli_query($conn, $sql);

            $output = "";

            if (mysqli_num_rows($query) == 0) {
                $output .= '<div class="text-warning" style="margin-left: 300px;" > No Project File Yet.</div>';
            } elseif (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                  $id = $_SESSION['unique_id'];
                  $sql2 = "SELECT * FROM file WHERE manager_id = '$id' AND type = 'developer'";
                  $query2 = mysqli_query($conn, $sql2);
                  $row2 = mysqli_fetch_assoc($query2);
                  $result = (mysqli_num_rows($query2) > 0) ? $row2['dev_name'] : "";
                  $name = (strlen($result) > 20) ? substr($result, 0, 20) . '...' : $result;

                  $result2 = (mysqli_num_rows($query2) > 0) ? $row2['dev_email'] : "";
                  $email = (strlen($result2) > 25) ? substr($result2, 0, 25) . '...' : $result2;
                    

                    // Display user information and progress bar
                    $output .= '<div style="display: flex; position: relative; align-items: center; cursor: pointer; 
                        padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px;
                        padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none;">
                        <div class="content" style="display: flex; align-items: center;">
                            <div class="details" style="color: #fff; margin-left: 20px;">
                                
                                    <span class="text-light" style=" font-size: 17px; font-family:; ">' . $name . '</span>
                                    
                                </div>
                            </div>
                            <div class="status-dot d-flex" style="position: relative; margin-right: -90px;">
                                <div class="container" style="margin-right: -50px; width: 300px;">
                                <span class="text-light" style=" font-size: 17px; font-family: ;">' . $email . '</span>
                                </div>

                                <div class="container">
                                    <p class="date text-light " style="margin-left: 140px; width: 40px;">' . $row['project_id'] . '</p>
                                </div>

                            </div>

                            <form action="manager-download.php" method="post" enctype="multipart/form-data">
                              <input type="text" name="any" style="display: none" value="'.$row['file'].'">
                            <button type="submit" class="btn btn-outline-light" style="margin-bottom: 10px;">Download</button>
                            </form>

                        </div>';
                }
                
            } 
            echo $output;    
        ?>

                </div>



              </div>
        </div>
                        


                    
                      
      <div id="contact" class="container tab-pane">
            <div class="d-flex" style="margin-left: 5px; position: fixed">
                <div class="card  mt-2" style="height: 625px; width: 788px; margin-left: 0px; border-radius: 20px; background-color: rgba(52,71,103,.3); box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);">
                  

          <div class="container mt-2 text-dark">
        <div class="row">

          <div class="col-md-6 mt-2">
            <h2 class="text-light">Project Submission</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <label for="name" class="text-light">Your Name & Unique ID</label>
                <input type="text" class="form-control btn btn-outline-light" style="" id="name" name="name" value="

<?php echo $data['name'] ?>,
<?php echo $data['unique_id'] ?>

                " required>
              </div>

            <div class="col-md-6" style="margin-top: 53px;">
              <label for="email" class="text-light">Project Name & Unique ID</label>
              <select class="form-select btn btn-outline-light" name="project" id="manager">
            <?php
              $query = "SELECT * FROM `project` WHERE manager_id = {$user_id}";
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
            
            <div class="col-md-6 mt-2">
            <label for="manager" class="text-light">Developer 1 Name & Unique ID</label>
            <select class="form-select btn btn-outline-light" name="dev1" id="manager">
            <?php
              $query = "SELECT * FROM `project` WHERE manager_id = {$user_id}";
              $allData = mysqli_query($conn, $query);
              $output3="";
              if (mysqli_num_rows($allData) > 0) {
                  while ($arrayData = mysqli_fetch_array($allData)) {
                    echo '<option>' . $arrayData['developer_1'] . ','. $arrayData['developer_1_id'] .'</option>';
                  }
              } else {
                  echo '<option>No project managers found</option>';
              }
                ?>
            </select>

        </div>

        <div class="col-md-6 mt-2">
            <label for="manager" class="text-light">Developer 2 Name & Unique ID</label>
            <select class="form-select btn btn-outline-light" name="dev2" id="manager">
            <?php
              $query = "SELECT * FROM `project` WHERE manager_id = {$user_id}";
              $allData = mysqli_query($conn, $query);
              $output3="";
              if (mysqli_num_rows($allData) > 0) {
                  while ($arrayData = mysqli_fetch_array($allData)) {
                      echo '<option>' . $arrayData['developer_2'] . ','. $arrayData['developer_2_id'] .'</option>';
                  }
              } else {
                  echo '<option>No project managers found</option>';
              }
                ?>
            </select>

        </div>

        <div class="col-md-6 mt-2">
            <label for="manager" class="text-light">Developer 3 Name & Unique ID</label>
            <select class="form-select btn btn-outline-light" name="dev3" id="manager">
            <?php
              $query = "SELECT * FROM `project` WHERE manager_id = {$user_id}";
              $allData = mysqli_query($conn, $query);
              $output3="";
              if (mysqli_num_rows($allData) > 0) {
                  while ($arrayData = mysqli_fetch_array($allData)) {
                    echo '<option>' . $arrayData['developer_3'] . ','. $arrayData['developer_3_id'] .'</option>';
                  }
              } else {
                  echo '<option>No project managers found</option>';
              }
                ?>
            </select>

        </div>

            <div class="col-md-6">
              <label for="email" class="mt-2 text-light">Your Email</label>
              <input type="email" class="form-control btn btn-outline-light" style="" id="email" name="email"
              value="<?php echo $data['email'] ?>" required>
            </div>

            <div class="col-md-12">
              <label for="email" class="mt-2 text-light">Upload Project Files (Zip)</label>
              <input type="file" class="form-control btn btn-outline-light" style="" id="email" name="file" required>
            </div>

            <div class="col-md-12">
              <label for="message" class="mt-2 text-light">Project Details</label>
              <textarea class="form-control text-light" style="border-color:white; background-color: rgb(0,0,0,0.6);" id="message" name="txt" rows="6" required></textarea>
            </div>

            <input type="submit" name="submit" class="btn btn-outline-light w-75 mt-2" style="margin-left: 90px;" value="Submit Work">
          </form>
        </div>
      </div>
    
    


          </div>
          </div>
      </div>



<?php
  $query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

  while ($row = mysqli_fetch_assoc($query)) {
      echo '
      <div id="project' . $row['id']. '" class="container tab-pane">
          <div class="d-flex" style="margin-right: 0px; position: fixed">
              <!-- Content for each project will be dynamically loaded here using AJAX -->
          </div>
      </div>';
  }
  ?>


                    <!-- tab-content -->
                </div>
                <!-- col-md-8 -->
            </div>

            <?php
            
                $user_id = $_SESSION['unique_id'];
                $query =  mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");
                  
                

                while($row = mysqli_fetch_assoc($query)){

                  $dev1_id = $row['developer_1_id'];
                  $dev2_id = $row['developer_2_id'];
                  $dev3_id = $row['developer_3_id'];

                  $sql2 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev1_id'");
                  $dev1 = mysqli_fetch_assoc($sql2); 
                  $sql3 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev2_id'");
                  $dev2 = mysqli_fetch_assoc($sql3); 
                  $sql4 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev3_id'");
                  $dev3 = mysqli_fetch_assoc($sql4); 

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


                  //Developer____1
                  $sql0 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id) FROM messages WHERE (incoming_msg_id = {$user_id} AND outgoing_msg_id = {$dev1_id}))";
                  $query2 = mysqli_query($conn, $sql0);
                  $result10 = '';
                if ($query2) {
                    if (mysqli_num_rows($query2) > 0) {
                        $row2 = mysqli_fetch_assoc($query2);
                        $result10 = $row2['msg_id'];
                    }
                }

                $sql3 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id) FROM messages WHERE incoming_msg_id = {$dev1_id} AND outgoing_msg_id = {$user_id})";
                $query3 = mysqli_query($conn, $sql3);                

                $result20 = '';
                if ($query3) {
                    if (mysqli_num_rows($query3) > 0) {
                        $row3 = mysqli_fetch_assoc($query3);
                        $result20 = $row3['msg_id'];
                    }
                }
              $count_dev1 = "";

          if($result20 < $result10) {
            $count_dev1 .= '<div class="card bg-warning mx-2" style="border-radius: 20px; width: 7px; height: 7px; margin-top: -40px;"></div>';

              }else{
              
              }

              //Developer ___2
              $sql4 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id) FROM messages WHERE (incoming_msg_id = {$user_id} AND outgoing_msg_id = {$dev2_id}))";
              $query4 = mysqli_query($conn, $sql4);
              $result4 = '';
            if ($query4) {
                if (mysqli_num_rows($query4) > 0) {
                    $row4 = mysqli_fetch_assoc($query4);
                    $result4 = $row4['msg_id'];
                }
            }

            $sql5 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id) FROM messages WHERE incoming_msg_id = {$dev2_id} AND outgoing_msg_id = {$user_id})";
            $query5 = mysqli_query($conn, $sql5);                

            $result5 = '';
            if ($query5) {
                if (mysqli_num_rows($query5) > 0) {
                    $row5 = mysqli_fetch_assoc($query5);
                    $result5 = $row5['msg_id'];
                }
            }
          $count_dev2 = "";

      if($result5 < $result4) {
        $count_dev2 .= '<div class="card bg-warning mx-4" style="border-radius: 20px; width: 7px; height: 7px; margin-top: -40px;"></div>';

          }else{
          
          }
       
        
          // Deceloper 3
          $sql6 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id) FROM messages WHERE (incoming_msg_id = {$user_id} AND outgoing_msg_id = {$dev3_id}))";
          $query6 = mysqli_query($conn, $sql6);
          $result6 = '';
        if ($query6) {
            if (mysqli_num_rows($query6) > 0) {
                $row6 = mysqli_fetch_assoc($query6);
                $result6 = $row6['msg_id'];
            }
        }

        $sql7 = "SELECT * FROM messages WHERE msg_id = (SELECT MAX(msg_id) FROM messages WHERE incoming_msg_id = {$dev3_id} AND outgoing_msg_id = {$user_id})";
        $query7 = mysqli_query($conn, $sql7);                

        $result7 = '';
        if ($query5) {
            if (mysqli_num_rows($query7) > 0) {
                $row7 = mysqli_fetch_assoc($query7);
                $result7 = $row7['msg_id'];
            }
        }
      $count_dev3 = "";

  if($result7 < $result6) {
    $count_dev3 .= '<div class="card bg-warning mx-4" style="border-radius: 20px; width: 7px; height: 7px; margin-top: -40px;"></div>';

      }else{
      
      }
               

                  echo ' 

                  <!-- 2nd side bar start -->
                  <div class="col-md-2 mt-3" id="sidebar" style="display: flex; position: relative;font-family:">
                  <div class="row">
                      <div class="" style="margin-left: -25px;">
                          <ul class="nav nav-pills flex-column mt-1 card" style="border-radius: 20px; height: 130px; width: 230px; margin-left: -20px; box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);" role="tablist">
                              <header class="justify-content-center align-items-center mt-2">
                              <a class="nav-link project-link" style="font-size: 17px; color:#fff" id="project-tab' . $row['id'] . '" href="#project' . $row['id'] . '">' . $row['name'] . '</a>
                              </header>

                              <div class="progress mx-3" style="width: 200px; height: 8px;">
                              <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow=' . $per . ' aria-valuemin="0" aria-valuemax="100" style="width:' . $per . '%; background-color: deeppink">
                                 
                              </div>
                          </div>

                              <p class="mx-2" style="margin-top: -5px;"></p>
                              <div class="images d-flex">
                              <a href="manager-dev-chat.php?user_id='.$row['developer_1_id'].'&name='.$row['name'].'">
                                <img src="uploaded_img/'.$dev1['d_profile'].'" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 17px;">'.$count_dev1.'
                                </a>
                                <a href="manager-dev-chat.php?user_id='.$row['developer_2_id'].'&name='.$row['name'].'">
                                <img src="uploaded_img/'.$dev2['d_profile'].'" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">'.$count_dev2.'
                                </a>
                                <a href="manager-dev-chat.php?user_id='.$row['developer_3_id'].'&name='.$row['name'].'">
                                <img src="uploaded_img/'.$dev3['d_profile'].'" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">'.$count_dev3.'
                                </a>
                              </div>
                          </ul>
                      </div> ';

                     
                  
                }
                

                ?>
  

      


            <!-- row -->
        </div>

   <!--COntainer  -->
    </div>

     <!-- The Logout Modal -->
     <div class="modal" id="logout">
                    <div class="modal-dialog w-25" style="margin-top: 250px;">
                      <div class="modal-content" style="background-color: rgb(0,0,0,0.8); border-color:rgb(255,255,255);">

                        <!-- Modal body -->
                        <div class="modal-body text-light">
                          Are you sure to Logout?
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn"><a href="manager-logout.php?logout_id=<?php echo $user_id; ?>"  class="btn btn-outline-light" style="text-decoration:none;">Yes</a></button>
                        <button type="button" class="btn bg-light" data-bs-dismiss="modal">No</button>
                        </div>

                      </div>
                    </div>
                  </div>

    

<script>
 
 $(document).ready(function () {
    
    $('#pogo').addClass('show active');

    $('.project-link, .nav-link').click(function (e) {

      e.preventDefault();

        $('.project-link, .nav-link').removeClass('active');

        $(this).addClass('active');

        var tabId = $(this).attr('href');
        $('.tab-pane').removeClass('show active');
        $(tabId).addClass('show active');
    });
});



document.addEventListener('DOMContentLoaded', function () {
            var navLinks = document.querySelectorAll('a.nav-link');
        
            navLinks.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
        
                    var projectId = this.id.replace('project-tab', '');
        
                    var xhr = new XMLHttpRequest();
        
                    xhr.open('POST', 'manager-details.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                var container = document.getElementById('project' + projectId);
                                if (container) {
                                    container.getElementsByClassName('d-flex')[0].innerHTML = xhr.responseText;
                                }
                            } else {
                                console.error('Error:', xhr.status, xhr.statusText);
                            }
                        }
                    };
        
                    xhr.send('project_id=' + projectId);
                });
            });
        });


        // Camera
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
    })

 


   
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
