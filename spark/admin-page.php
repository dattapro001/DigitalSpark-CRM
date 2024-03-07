<?php 
  include "config.php";
  $output="";
  session_start();
  if (!isset($_SESSION['unique_id'])) {
   
    header("Location: admin-login.php");
    die();
  }
  $per="";
 
  //client count
  $sql10 = "SELECT COUNT(unique_id) as unique_id FROM details WHERE 1";
  $result1 = mysqli_query($conn, $sql10);
  $row20 = mysqli_fetch_assoc($result1);
  $total_client = $row20['unique_id'];

  //developer count
  $sql11 = "SELECT COUNT(unique_id) as unique_id FROM developer WHERE 1";
  $result11 = mysqli_query($conn, $sql11);
  $row21 = mysqli_fetch_assoc($result11);
  $total_developer = $row21['unique_id'];

  //Revenue count
  $sql = "SELECT SUM(amount) AS amount FROM billing";
  $result = mysqli_query($conn, $sql);
  $row40 = mysqli_fetch_assoc($result);
  $total_revenue = $row40['amount'];


  //Sales count
  $sql13 = "SELECT COUNT(project_id) as project_id FROM billing WHERE 1";
  $result13 = mysqli_query($conn, $sql13);
  $row23 = mysqli_fetch_assoc($result13);
  $total_sales = $row23['project_id'];



  if (isset($_POST['create'])) {
    $name = explode(',',$_POST['name']);
    $status = $_POST['status'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $manager =  explode(',', $_POST['manager']);
    $developer =  explode(',', $_POST['developer']); // Split names by comma
    $client =  explode(',', $_POST['client']); // Split names by comma
    $text =  explode(',',$_POST['text']);
    $amount =  $_POST['amount'];
    $bill = "Due";

    //project name and code
    $name1 = mysqli_real_escape_string($conn, trim($name[0]));
    $project_id = mysqli_real_escape_string($conn, trim($name[1]));

    //manager Area
    $manager1 = mysqli_real_escape_string($conn, trim($manager[0]));
    $manager_id = mysqli_real_escape_string($conn, trim($manager[1]));


    //developer area
    $dev1 = mysqli_real_escape_string($conn, trim($developer[0]));//1st name
    $dev_id1 = mysqli_real_escape_string($conn, trim($developer[1]));//1st id

    $dev2 = mysqli_real_escape_string($conn, trim($developer[2]));//2nd name
    $dev_id2 = mysqli_real_escape_string($conn, trim($developer[3]));//2nd id

    $dev3 = mysqli_real_escape_string($conn, trim($developer[4]));
    $dev_id3 = mysqli_real_escape_string($conn, trim($developer[5]));


    //client Area
    $client_name = mysqli_real_escape_string($conn, trim($client[0]));//1st name
    $client_id = mysqli_real_escape_string($conn, trim($client[1]));//1st id

    //text Area
    $txt1 = mysqli_real_escape_string($conn, trim($text[0]));//1st name
    $txt2 = mysqli_real_escape_string($conn, trim($text[1]));//1st id

    $txt3 = mysqli_real_escape_string($conn, trim($text[2]));//2nd name
    $txt4 = mysqli_real_escape_string($conn, trim($text[3]));//2nd id

    $txt5 = mysqli_real_escape_string($conn, trim($text[4]));
    $txt6 = mysqli_real_escape_string($conn, trim($text[5]));

    $txt7 = mysqli_real_escape_string($conn, trim($text[6]));


    $sql17 = "SELECT * FROM project WHERE manager_id = '{$manager_id}'";
    $result17 = mysqli_query($conn, $sql17);
    $row22 = mysqli_fetch_assoc($result17);
    
    

$sql2 = "INSERT INTO project (name, status, start, end, manager, manager_id, unique_id, amount, developer_1, developer_2, developer_3, developer_1_id, developer_2_id, developer_3_id,
des_1, des_2, des_3, des_4, des_5, des_6, des_7, client_name, client_id, bill) 
VALUES ('{$name1}', '{$status}', '{$start}', '{$end}', '{$manager1}', '{$manager_id}', '{$project_id}', '{$amount}', '{$dev1}', '{$dev2}', '{$dev3}', '{$dev_id1}', '{$dev_id2}', '{$dev_id3}',
 '{$txt1}', '{$txt2}', '{$txt3}', '{$txt4}', '{$txt5}', '{$txt6}', '{$txt7}', '{$client_name}', '{$client_id}', '{$bill}')";

$result2 = mysqli_query($conn, $sql2);

    // $query = mysqli_query($conn, "UPDATE details SET project_id='$code', amount = '$amount' WHERE unique_id='{$client_id}'");

    // $sql2 = mysqli_query($conn, "INSERT INTO pay_info (name, project_id, project_name, start, end, des_1, des_2, des_3, des_4, des_5, des_6, des_7, unique_id) 
    // VALUES ('{$client_name}', '{$project_id}', '{$name1}', '{$start}', '{$end}', '{$txt1}', '{$txt2}', '{$txt3}', '{$txt4}', '{$txt5}', '{$txt6}', '{$txt7}', '{$client_id}')");

    // $query = mysqli_query($conn, "UPDATE pay_info SET project_id='$code', project_name = '$name', des_1 = '$txt1', des_2 = '$txt2', des_3 = '$txt3',
    //  des_4 = '$txt4', des_5 = '$txt5', des_6 = '$txt6', des_7 = '$txt7', start = '$start', end = '$end', name = '$client_name', unique_id = '$client_id' WHERE 1");

  

  }

 


  
 
 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DigitalSpark CRM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Salsa' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Spicy Rice' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Squada One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Suez One' rel='stylesheet'>









  

  <!-- Chart link -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    :root {
  --bs-blue: #63B3ED;
  --bs-indigo: #596CFF;
  --bs-purple: #6f42c1;
  --bs-pink: #d63384;
  --bs-red: #F56565;
  --bs-orange: #fd7e14;
  --bs-yellow: #FBD38D;
  --bs-green: #81E6D9;
  --bs-teal: #20c997;
  --bs-cyan: #0dcaf0;
  --bs-white: #fff;
  --bs-gray: #6c757d;
  --bs-gray-dark: #343a40;
  --bs-gray-100: #f8f9fa;
  --bs-gray-200: #f0f2f5;
  --bs-gray-300: #dee2e6;
  --bs-gray-400: #ced4da;
  --bs-gray-500: #adb5bd;
  --bs-gray-600: #6c757d;
  --bs-gray-700: #495057;
  --bs-gray-800: #343a40;
  --bs-gray-900: #212529;
  --bs-primary: #e91e63;
  --bs-secondary: #7b809a;
  --bs-success: #4CAF50;
  --bs-info: #1A73E8;
  --bs-warning: #fb8c00;
  --bs-danger: #F44335;
  --bs-light: #f0f2f5;
  --bs-dark: #344767;
  --bs-white: #fff;
  --bs-dark-blue: #1A237E;
  --bs-primary-rgb: 233, 30, 99;
  --bs-secondary-rgb: , 128, 154;
  --bs-success-rgb: 76, 175, 80;
  --bs-info-rgb: 26, 115, 232;
  --bs-warning-rgb: 251, 140, 0;
  --bs-danger-rgb: 244, 67, 53;
  --bs-light-rgb: 240, 242, 245;
  --bs-dark-rgb: 52, 71, 103;
  --bs-white-rgb: 255, 255, 255;
  --bs-dark-blue-rgb: 26, 35, 126;
  --bs-white-rgb: 255, 255, 255;
  --bs-black-rgb: 0, 0, 0;
  --bs-body-color-rgb: , 128, 154;
  --bs-body-bg-rgb: 255, 255, 255;
  --bs-font-sans-serif: "Roboto", Helvetica, Arial, sans-serif;
  --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
  --bs-body-font-family: var(--bs-font-sans-serif);
  --bs-body-font-size: 1rem;
  --bs-body-font-weight: 400;
  --bs-body-line-height: 1.5;
  --bs-body-color: #7b809a;
  --bs-body-bg: #fff;
  --bs-border-width: 1px;
  --bs-border-style: solid;
  --bs-border-color: #dee2e6;
  --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
  --bs-border-radius: 0.375rem;
  --bs-border-radius-sm: 0.125rem;
  --bs-border-radius-lg: 0.5rem;
  --bs-border-radius-xl: 0.75rem;
  --bs-border-radius-2xl: 1rem;
  --bs-border-radius-pill: 50rem;
  --bs-link-color: #e91e63;
  --bs-link-hover-color: #e91e63;
  --bs-code-color: #d63384;
  --bs-highlight-bg: #fcf8e3;
    }
    .nav {
      /* background-image: linear-gradient(195deg,#42424a,#191919); */
      background-color: rgba(52,71,103,.3);
      margin-left: -10px;
      box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);

      
    }



    .nav-link.active,
    .nav-link:active {
      background-image: linear-gradient(195deg,#ec407a,#d81b60);!important;
      color: whitesmoke !important;
      margin-left: 11px;
      width: 212px;
      
    }

body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: var(--bs-body-bg)
  padding: 0 10px;
  font-family:var(--bs-font-sans-serif);
  background-color: #1a2035 !important;
  font-family: 'Squada One' !important
}

.dark-version .form-control, body.dark-version {
    color: hsla(0,0%,100%,.8)!important;
}

dark-version, .dark-version .main-content {
    background-color: #1a2035!important;
}

body {
    font-weight: 400;
    line-height: 1.6;
}

.client-container .back-icon{
  color:white;
  font-size: 1.5rem;
  padding: 20px;
}

.users-list::-webkit-scrollbar { 
  display: none; 
 } 

 /* Manager Section */
.container-fluid .users .manager-search input{
  position: absolute;
  height: 42px;
  width: calc(100% - 50px);
  font-size: 16px;
  padding: 0 200px;
  margin-left: -540px;
  margin-top:-20px;
  border: 5px solid #646161;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: 0.2s ;
}
.container-fluid .users .manager-search input.show{
  opacity: 1;
}
.container-fluid .users .manager-search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: black;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: 0.2s ;
}
.container-fluid .users .manager-search button.active{
  background-color: var(--bs-success);
  color: #fff;
}
.container-fluid .manager-search button.active i::before{
  content: '\f00d';
}


/* Client Section */
.container-fluid .users .search input{
  position: absolute;
  height: 42px;
  width: 95%;
  font-size: 16px;
  padding: 0 200px;
  margin-left: -530px;
  margin-top:-20px;
  border: 5px solid #646161;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition:  0.2s ;
}
.container-fluid .users .search input.show{
  opacity: 1;
}
.container-fluid .users .search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: black;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: 0.2s;
}
.container-fluid .users .search button.active{
  background-color: var(--bs-success);
  color: #fff;
}
.container-fluid .search button.active i::before{
  content: '\f00d';
}

 .container-fluid .users-list  .status-dot .button{
  font-size: 14px;
  background-color: var(--bs-success);
  color: #fff;
}

.container-fluid .users-list .status-dot .button.offline{
  background-color: var(--bs-gray-600);
  color: #fff;
} 


/* developer Section */
.container-fluid .users .dev-search input{
  position: absolute;
  height: 42px;
  width: 95%;
  font-size: 16px;
  padding: 0 200px;
  margin-left: -560px;
  margin-top:-20px;
  border: 5px solid #646161;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: 0.2s ;
}
.container-fluid .users .dev-search input.show{
  opacity: 1;
}
.container-fluid .users .dev-search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: black;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: 0.2s ;
}

.container-fluid .users .dev-search button.active{
  background-color: var(--bs-success);
  color: #fff;
}
.container-fluid .dev-search button.active i::before{
  content: '\f00d';
}

.container .dev-users-list  .status-dot .button{
  font-size: 14px;
  background-color: var(--bs-success);
  color: #fff;
}

.container-fluid .dev-users-list .status-dot .button.offline{
  background-color: var(--bs-gray-600);
  color: #fff;
} 

.dev-users-list::-webkit-scrollbar { 
  display: none; 
 }



/* Suspend Section */
.container-fluid .users .suspend-search input{
  position: absolute;
  height: 42px;
  width: 73%;
  font-size: 16px;
  padding: 0 200px;
  margin-left: -530px;
  margin-top:-20px;
  border: 5px solid #646161;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: 0.2s;
}
.container-fluid .users .suspend-search input.show{
  opacity: 1;
}
.container-fluid .users .suspend-search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: black;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: 0.2s;
}
.container-fluid .users .suspend-search button.active{
  background: black;
  color: #fff;
}
.container-fluid .suspend-search button.active i::before{
  content: '\f00d';
}

.container .suspend-list a .status-dot .button{
  background-color: green;

}

.suspend-list::-webkit-scrollbar { 
  display: none; 
 }

.container .suspendlist a .status-dot .button.offline{
  background-image: linear-gradient(195deg,#42424a,#191919);
} 

@keyframes rotateAnimation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .rotate-icon {
        animation: rotateAnimation 1s infinite linear; 
    }

    .billing-list::-webkit-scrollbar { 
      display: none; 
    }

    .loader {
          border: 16px solid rgb(234, 255, 0);
          border-radius: 50%;
          border-top: 16px ;
          width: 50px;
          height: 50px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
          margin-top: -7px;
          margin-left: 15px;
        }

        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }

        .loader-update {
        transform: rotateZ(45deg);
        perspective: 1000px;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        color: #fff;
      }
        .loader-update:before,
        .loader-update:after {
          content: '';
          display: block;
          position: absolute;
          top: 0;
          left: 0;
          width: inherit;
          height: inherit;
          border-radius: 50%;
          transform: rotateX(70deg);
          animation: 1s spin-up linear infinite;
        }
        .loader-update:after {
          color: #FF3D00;
          transform: rotateY(70deg);
          animation-delay: .4s;
        }

      @keyframes rotate {
        0% {
          transform: translate(-50%, -50%) rotateZ(0deg);
        }
        100% {
          transform: translate(-50%, -50%) rotateZ(360deg);
        }
      }

      @keyframes rotateccw {
        0% {
          transform: translate(-50%, -50%) rotate(0deg);
        }
        100% {
          transform: translate(-50%, -50%) rotate(-360deg);
        }
      }

      @keyframes spin-up {
        0%,
        100% {
          box-shadow: .2em 0px 0 0px currentcolor;
        }
        12% {
          box-shadow: .2em .2em 0 0 currentcolor;
        }
        25% {
          box-shadow: 0 .2em 0 0px currentcolor;
        }
        37% {
          box-shadow: -.2em .2em 0 0 currentcolor;
        }
        50% {
          box-shadow: -.2em 0 0 0 currentcolor;
        }
        62% {
          box-shadow: -.2em -.2em 0 0 currentcolor;
        }
        75% {
          box-shadow: 0px -.2em 0 0 currentcolor;
        }
        87% {
          box-shadow: .2em -.2em 0 0 currentcolor;
        }
      }
   

 
  </style>
  
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Nav pills -->
    <div class="" id="sidebar" style="height: 620px; width: 263px;">
      <ul class="nav card nav-pills flex-column h-100  text-light" style="border-radius: 10px; margin-left: 0px;" role="tablist">
        <header class="d-flex justify-content-center align-items-center mt-2">
          <p class="text-light" style="font-family:;font-size: 20px; margin-top: 5px; margin-left: -7px;">CRM SYSTEM</p>
        </header>
        <li class="nav-item ">
          <a class="nav-link active d-flex " style="color:white" data-bs-toggle="pill" href="#Deshboard"><i class="fa fa-bar-chart px-4" style="font-size:20px"></i><h1 style="font-size: 18px; margin-left: -10px;">Dashboard</h1></a>
        </li>
        <li class="nav-item mt-1">
          <a class="nav-link d-flex " style="color:white" data-bs-toggle="pill" href="#manager"><i class="fa fa-user-secret px-4" style="font-size:20px;"></i><h1 class="" style="font-size:18px; margin-left: -5px;">Managers</h1></a>
        </li>
        <li class="nav-item mt-1">
          <a class="nav-link d-flex" style="color:white" data-bs-toggle="pill" href="#Developers"><i class="fa fa-keyboard-o px-4" style="font-size:20px"></i><h1 style="font-size:18px; margin-left: -10px;">Developers</h1></a>
        </li>
        <li class="nav-item mt-1">
          <a class="nav-link d-flex" style="color:white" data-bs-toggle="pill" href="#Clients"><i class="fa fa-user px-4" style="font-size:20px;"></i><h1 class="" style="font-size:18px; margin-left: -5px;">Clients</h1></a>
        </li>
        <li class="nav-item mt-1">
          <a class="nav-link d-flex" style="color:white" data-bs-toggle="pill" href="#billing"><i class="fa fa-file-invoice px-4" style="font-size:20px"></i><h1 class="" style="font-size:18px; margin-left: -0px;">Billing</h1></a>
        </li>
        <li class="nav-item mt-2">
          <header class="d-flex justify-content-center">
            <p class=" py-2 bg-light d-flex justify-content-center" style=" margin-left: -90px; width: 215px; height: 40px; border-radius: 5px;">
            <i class="fa fa-project-diagram text-dark" style="font-size:20px; margin-left: -140px;"></i><p style="margin-left: -140px; margin-top: 15px; "><h1 style="font-size:18px; color: black; margin-top: 8px;">Project</h1></p></p>
          </header>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex " style="color:white" data-bs-toggle="pill" href="#approval"><i class="fa fa-hourglass-half px-4" style="font-size: 20px;"></i><h1 class=""style="font-size:18px; margin-left: -5px;">Approval</h1></a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex " style="color:white" data-bs-toggle="pill" href="#view"><i class="fa fa-tasks px-4" style="font-size: 20;"></i><h1 style="font-size:18px; margin-left: -5px;">Time-Line</h1></a>
        </li>
        <li class="nav-item mt-1">
          <header class="d-flex justify-content-center">
            <p class=" py-2 bg-light d-flex justify-content-center" style=" margin-left: -80px; width: 215px; height: 40px; border-radius: 5px;">
            <i class="fa fa-cogs text-dark" style="font-size:20px; margin-left: -140px;"></i><p style="margin-left: -140px;  "><h1 style="font-size:18px; color: black; margin-top: 8px;">Settings</h1></p></p>
          </header>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex " style="color:white" data-bs-toggle="pill" href="#suspend"><i class="fas fa-database  px-2 mx-3" style="font-size: 20px;"></i><h1 style="font-size:18px">Block-List</h1></a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex " data-bs-toggle="modal" data-bs-target="#logout" style="cursor:pointer; color:white">
          <i class="fas fa-sign-out-alt mx-4" style="font-size: 20px;"></i><h1 style="font-size:18px">Logout</h1></a>
        </li>
      </ul>
        
    </div>

    <!-- Tab panes -->
    <div class="col-md-8">
   
      <div class="tab-content">
        <div id="Deshboard" class="container tab-pane active">
        <a href="admin-notification.php" data-bs-toggle="modal" data-bs-target="#notification">
      <i class="fa fa-bell" style="font-size:24px; color: yellow;  margin-left: 970px "></i>
    </a>

             <div class="d-flex" style="margin-left: -15px;">

                <div class="mt-5">
            <div class="card mx-2" style="background-image: linear-gradient(195deg,#42424a,#191919); border-radius: 10px; width: 
            65px; height: 60px; z-index: 2;  margin-top: -20px; position: absolute;">
              <i class="fa fa-street-view d-flex justify-content-center mt-3" style="font-size:24px; color: white"></i>
              </div>
         <div class="card" style="width: 220px; height: 120px; background-color: #202940; z-index: 1;
                    box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);">
              <p class="d-flex justify-content-end mx-2 text-light"
               style="font-family: ;">Total Clients</p>
              <span class="d-flex justify-content-end mx-3 text-light" style="; font-size: 23px; margin-top: -10px;"><?php echo $total_client; ?></span>
              <div class=" loader "></div>
         </div>
         </div>

           <div class="mt-5" style="margin-left: 40px;">
         <div class="card " style="background-color: var(--bs-pink); margin-left: 9px; border-radius: 10px; width: 
         65px; height: 60px; z-index: 2;  margin-top: -20px; position: absolute;">
           <i class="fa fa-group d-flex justify-content-center mt-3" style="font-size:24px; color: white;"></i>
           </div>
      <div class="card" style="width: 220px; height: 120px; background-color: #202940; z-index: 1;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);">
           <p class="d-flex justify-content-end mx-1 text-light" 
           style="font-family: ;">Total Developers</p>
           <span class="d-flex justify-content-end mx-3 text-light" style=" font-size: 23px; margin-top: -10px;"><?php echo $total_developer; ?></span>
           <div class=" loader "></div>
          </div>
      </div>

    <div class="mt-5" style="margin-left: 45px;">
        <div class="card" style="background-color: var(--bs-info); margin-left: 7px; border-radius: 10px; width: 
        65px; height: 60px; z-index: 2;  margin-top: -20px; position: absolute;">
          <i class="fa fa-money d-flex justify-content-center mt-3" style="font-size:24px; color: white;"></i>
          </div>
     <div class="card " style="width: 220px; height: 120px; background-color: #202940; z-index: 1;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);">
          <p class="d-flex justify-content-end mx-1 text-light" 
          style="font-family: ;">Total Revenue</p>
          <span class="d-flex justify-content-end mx-3 text-light" style="font-family: ; font-size: 23px; margin-top: -10px;"> $ <?php echo $total_revenue; ?></span>
          <div class=" loader "></div>
        </div>
     </div>

   <div class="mt-5" style="margin-left: 25px;">
    <div class="card" style="background-color: var(--bs-success); margin-left: 32px; border-radius: 10px; width: 
    65px; height: 60px; z-index: 2;  margin-top: -20px; position: absolute;">
      <i class="fa fa-handshake-o d-flex justify-content-center mt-3" style="font-size:24px; color: white;"></i>
      </div>
 <div class="card mx-4" style="width: 220px; height: 120px; background-color: #202940; z-index: 1;
        box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);">
      <p class="d-flex justify-content-end mx-1 text-light" 
      style="font-family: ;">Total Sales</p>
      <span class="d-flex justify-content-end mx-3 text-light" style="font-family:; font-size: 23px; margin-top: -10px;"> <?php echo $total_sales; ?></span>
      <div class=" loader "></div>
    </div>
    </div>

    <!-- d-flex div -->
    </div> 

         <!-- Graph Part -->
        <div class="d-flex" style="margin-left: -15px; margin-top: -20px;">
            <div class="mt-5">
            <div class="card mt-3" style="background-image: linear-gradient(195deg,#ec407a,#d81b60); border-radius: 10px; ;
             height: 200px; z-index: 2;  margin-top: -20px; position: absolute; width: 300px; margin-left: 13px;" >
                <!-- <div class="card mt-3" style="background-color: rgb(255,20,147,0.7); border-radius: 10px; width: 
                  285px; height: 170px; z-index: 2; margin-left: 12px;  margin-top: -20px; position: absolute; "> -->

                  <!-- Bar Chart -->
                  <?php 
                    
                    $sql130 = "SELECT COUNT(*) as project_id FROM billing WHERE project_id = 2224";
                    $result130 = mysqli_query($conn, $sql130);
                    $row230 = mysqli_fetch_assoc($result130);
                    $total_web = $row230['project_id'];

                    $sql131 = "SELECT COUNT(*) as project_id FROM billing WHERE project_id = 2225";
                    $result131 = mysqli_query($conn, $sql131);
                    $row231 = mysqli_fetch_assoc($result131);
                    $total_seo = $row231['project_id'];

                    $sql132 = "SELECT COUNT(*) as project_id FROM billing WHERE project_id = 2226";
                    $result132 = mysqli_query($conn, $sql132);
                    $row232 = mysqli_fetch_assoc($result132);
                    $total_ppc = $row232['project_id'];

                    $sql133 = "SELECT COUNT(*) as project_id FROM billing WHERE project_id = 2227";
                    $result133 = mysqli_query($conn, $sql133);
                    $row233 = mysqli_fetch_assoc($result133);
                    $total_sm = $row233['project_id'];

                    $sql134 = "SELECT COUNT(*) as project_id FROM billing WHERE project_id = 2228";
                    $result134 = mysqli_query($conn, $sql134);
                    $row234 = mysqli_fetch_assoc($result134);
                    $total_cm = $row234['project_id'];

                    $sql135 = "SELECT COUNT(*) as project_id FROM billing WHERE project_id = 2229";
                    $result135 = mysqli_query($conn, $sql135);
                    $row235 = mysqli_fetch_assoc($result135);
                    $total_em = $row235['project_id'];
                    
                  ?>
                   
                  <div style="width: 100%; height: 100%; margin-top: 30px; ">
                    <canvas id="myChart"></canvas>
                  </div>

                  <script>
 
                        const labels = ['WEB', 'SEO', 'PPC', 'SM', 'CM', 'EM'];
                        const data = {
                          labels: labels,
                          datasets: [{
                            label: 'Project Database',
                            <?php 
                              $output_data = "";
                              $output_data .='data: ['.$total_web.', '.$total_seo.', '.$total_ppc.', '.$total_sm.', '.$total_cm.', '.$total_em.'],';

                              echo $output_data;
                            ?>
                                              
                            backgroundColor: [
                              'rgba(255, 99, 132)',
                              'rgba(255, 159, 64)',
                              'rgba(255, 205, 86)',
                              'rgba(75, 192, 192)',
                              'rgba(54, 162, 235)',
                              'rgba(153, 102, 255)',
                              'rgba(201, 203, 207)'
                            ],
                            borderColor: [
                              'rgb(255, 99, 132)',
                              'rgb(255, 159, 64)',
                              'rgb(255, 205, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(54, 162, 235)',
                              'rgb(153, 102, 255)',
                              'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                          }]
                        };

                        const config = {
                          type: 'bar',
                          data: data,
                          options: {
                            scales: {
                              y: {
                                beginAtZero: true,
                                max: 5, 
                                grid: {
                                  color: 'rgba(255, 255, 255)'
                                },
                                ticks: {
                                  color: 'white',
                                  stepSize: 1 
                                }
                              },
                              x: {
                                grid: {
                                  color: 'rgba(255, 255, 255, 0.2)' 
                                },
                                ticks: {
                                  color: 'white' 
                                }
                              }
                            },
                            plugins: {
                              legend: {
                                labels: {
                                  color: 'white' 
                                }
                              }
                            }
                          }
                        };

                        var myChart = new Chart(
                          document.getElementById('myChart'),
                          config
                        );
                          </script>


                  </div>
             <div class="card mt-5" style="width: 328px; height: 350px; background-color: #202940; z-index: 1;
                   box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);">
                  <p class="d-flex justify-content-start text-light mx-2" 
                  style="font-size: 19px; margin-top: 200px;">
                    Project Demand
                  </p>
                   
                  <?php 
                   $totals = array(
                    'Website Design' => $total_web,
                    'SEO' => $total_seo,
                    'Pay Per Click' => $total_ppc,
                    'Social Media Marketing'  => $total_sm,
                    'Content Marketing'  => $total_cm,
                    'Email Marketing'  => $total_em
                );
                
                
                $maxProject = array_keys($totals, max($totals))[0];
                
                  ?>
                  <div class="d-flex">
                  <div class="loader-update mx-2">   </div>
                  <p class="" style="margin-left: 10px; color: yellow; font-size: 18px;">Update Daily</p>
                  </div>

                  <p class="mx-3" style="color: white; ">
                  <?php
                  echo "$maxProject is trending in the market.";
                  ?>
                  </p>
                  <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: ;"> </span>
                </div>
                </div>
                

                <div class="mt-5">
                <div class="card mt-3" style="background-color: var(--bs-success); border-radius: 10px; 
                      285px; height: 200px; z-index: 2;  margin-top: -20px; position: absolute; margin-left: 25px; width: 300px; margin-left: 36px; ">
                    <!-- <div class="card mt-3" style="background-color: rgb(20,155,137,0.6); border-radius: 10px; width: 
                      285px; height: 170px; z-index: 2;  margin-top: -20px; position: absolute; margin-left: 35px; "> -->

                         <!-- Line Chart -->

                         <?php 
                    
                            $total_jan = 0;
                            $sql150 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-01-01' AND '2024-01-31'";
                            $result150 = mysqli_query($conn, $sql150);
                            $row250 = mysqli_fetch_assoc($result150);
                            $total_jan = $row250['end'];
                            
                            $total_feb = 0;
                            $sql151 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-02-01' AND '2024-02-28'";
                            $result151 = mysqli_query($conn, $sql151);
                            $row251 = mysqli_fetch_assoc($result151);
                            $total_feb = $row251['end'];
                            
                            $total_mar = 0;
                            $sql152 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-03-01' AND '2024-03-31'";
                            $result152 = mysqli_query($conn, $sql152);
                            $row252 = mysqli_fetch_assoc($result152);
                            $total_mar = $row252['end'];
                            
                            $total_apr = 0;
                            $sql153 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-04-01' AND '2024-04-30'";
                            $result153 = mysqli_query($conn, $sql153);
                            $row253 = mysqli_fetch_assoc($result153);
                            $total_apr = $row253['end'];
                            
                            $total_may = 0;
                            $sql154 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-05-01' AND '2024-05-31'";
                            $result154 = mysqli_query($conn, $sql154);
                            $row254 = mysqli_fetch_assoc($result154);
                            $total_may = $row254['end'];
                            
                            $total_jun = 0;
                            $sql155 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-06-01' AND '2024-06-30'";
                            $result155 = mysqli_query($conn, $sql155);
                            $row255 = mysqli_fetch_assoc($result155);
                            $total_jun = $row255['end'];
                            
                            $total_jul = 0;
                            $sql156 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-07-01' AND '2024-07-31'";
                            $result156 = mysqli_query($conn, $sql156);
                            $row256 = mysqli_fetch_assoc($result156);
                            $total_jul = $row256['end'];
                            
                            $total_aug = 0;
                            $sql157 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-08-01' AND '2024-08-31'";
                            $result157 = mysqli_query($conn, $sql157);
                            $row257 = mysqli_fetch_assoc($result157);
                            $total_aug = $row257['end'];
                            
                            $total_sep = 0;
                            $sql158 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-09-01' AND '2024-09-30'";
                            $result158 = mysqli_query($conn, $sql158);
                            $row258 = mysqli_fetch_assoc($result158);
                            $total_sep = $row258['end'];
                            
                            $total_oct = 0;
                            $sql159 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-10-01' AND '2024-10-31'";
                            $result159 = mysqli_query($conn, $sql159);
                            $row259 = mysqli_fetch_assoc($result159);
                            $total_oct = $row259['end'];
                            
                            $total_nov = 0;
                            $sql1510 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-11-01' AND '2024-11-30'";
                            $result1510 = mysqli_query($conn, $sql1510);
                            $row2510 = mysqli_fetch_assoc($result1510);
                            $total_nov = $row2510['end'];
                            
                            $total_dec = 0;
                            $sql1511 = "SELECT COUNT(*) as end FROM billing WHERE end BETWEEN '2024-12-01' AND '2024-12-31'";
                            $result1511 = mysqli_query($conn, $sql1511);
                            $row2511 = mysqli_fetch_assoc($result1511);
                            $total_dec = $row2511['end'];
                    
                    
                        ?>

                     <div style="width: 100%; height: 100%; margin-top: 30px;">
                     <canvas id="myLineChart"></canvas>
                      </div>
                      
                      <script>
                        const Linelabels =['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                         const Linedata = {
                        labels: Linelabels,
                        datasets: [{
                        label: 'Completed Project (2024)',
                        <?php 
                          $output_data = "";
                          $output_data .='data: ['.$total_jan.', '.$total_feb.', '.$total_mar.', '.$total_apr.', '.$total_may.', '.$total_jun.',
                           '.$total_jul.', '.$total_aug.', '.$total_sep.', '.$total_oct.', '.$total_nov.', '.$total_dec.'],';

                              echo $output_data;
                            ?>
                        fill: false,
                         borderColor: 'deeppink',
                         tension: 0.1
                          }]
                            };
                            const Lineconfig = {
                              type: 'line',
                              data: Linedata,
                              options: {
                                scales: {
                                  y: {
                                    beginAtZero: true,
                                    max: 15, 
                                    grid: {
                                      color: 'rgba(255, 255, 255)' 
                                    },
                                    ticks: {
                                      color: 'white' 
                                    }
                                  },
                                  x: {
                                    grid: {
                                      color: 'rgba(255, 255, 255)' 
                                    },
                                    ticks: {
                                      color: 'white', 
                                      stepSize: 5 
                                    }
                                  }
                                },
                                plugins: {
                                  legend: {
                                    labels: {
                                      color: 'white' 
                                    }
                                  }
                                }
                              }
                            };

                                 var myChart = new Chart(
                                  document.getElementById('myLineChart'),
                                     Lineconfig
                                 );
                      </script>
                      
                      </div>
                 <div class="card mt-5 mx-4" style="width: 327px; height: 350px; background-color: #202940; z-index: 1;
                       box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);">
                       <?php 
                        $smg="";
                        $totals = array(
                          'January' => $total_jan,
                          'February' => $total_feb,
                          'March' => $total_mar,
                          'April'  => $total_apr,
                          'May'  => $total_may,
                          'June'  => $total_jun,
                          'July' => $total_jul,
                          'August'  => $total_aug,
                          'September'  => $total_sep,
                          'October'  => $total_oct,
                          'November'  => $total_nov,
                          'December'  => $total_dec
                      );
                      
                     
                        if ($totals['January'] > $totals['February']) {
                          $smg = "Decrease from pervious month."; 
                        }elseif($totals['March'] > $totals['April']){
                          $smg = "Decrease from pervious month.";
                        }elseif($totals['May'] > $totals['June']){
                          $smg = "Decrease from pervious month.";
                        }elseif($totals['July'] > $totals['August']){
                          $smg = "Decrease from pervious month.";
                        }elseif($totals['September'] > $totals['October']){
                          $smg = "Decrease from pervious month.";
                        }elseif($totals['November'] > $totals['December']){
                          $smg = "Decrease from pervious month.";
                        }else {
                          $smg = "Increase from pervious month."; 
                        }
                      
                        ?>
                      <p class="d-flex justify-content-start mx-1 text-light mx-2" 
                      style="font-size: 19px; margin-top: 200px;">
                      Sales This Year
                      </p>
                      <div class="d-flex">
                      <div class="loader-update mx-2">   </div>
                  <p class="" style="margin-left: 10px; color: yellow; font-size: 18px;">Update Monthly</p>
                      </div>
                       <p class="mx-3" style="color: white">
                      <?php
                      echo $smg;
                      ?>
                      </p>
                      <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: ;"> </span>
                    </div>
                </div>
                    <div class="mt-5">
                      <div class="card mt-3" style="background-image: linear-gradient(195deg,#42424a,#191919);border-radius: 10px;
                      285px; height: 200px; z-index: 2;  margin-top: -20px; position: absolute;  width: 300px; margin-left: 13px;  ">
                        <!-- <div class="card mt-3" style="background-color: rgb(0,0,0,0.5); border-radius: 10px; width: 
                          285px; height: 170px; z-index: 2;  margin-top: -20px; position: absolute; margin-left: 12px; "> -->

                            <!-- Horizontal Bar  Chart -->

                            <?php 
                    
                            $sql140 = "SELECT COUNT(*) as amount FROM billing WHERE amount BETWEEN 100 AND 199";
                            $result140 = mysqli_query($conn, $sql140);
                            $row240 = mysqli_fetch_assoc($result140);
                            $total_100 = $row240['amount'];

                            $sql141 = "SELECT COUNT(*) as amount FROM billing WHERE amount BETWEEN 200 AND 299";
                            $result141 = mysqli_query($conn, $sql141);
                            $row241 = mysqli_fetch_assoc($result141);
                            $total_200 = $row241['amount'];

                            $sql142 = "SELECT COUNT(*) as amount FROM billing WHERE amount BETWEEN 300 AND 999";
                            $result142 = mysqli_query($conn, $sql142);
                            $row242 = mysqli_fetch_assoc($result142);
                            $total_300plus = $row242['amount'];
 
                            ?>

                            <div style="width: 100%; height: 100%; margin-top: 30px; margin-left: 0px;">
                            <canvas id="myHorChart"></canvas>
                          </div>

                          <script>
                            const Horlabels = ['100', '200', '300'];
                            const Hordata = {
                              labels: Horlabels,
                              datasets: [{
                                axis: 'y',
                                label: 'Project Budget (Dollar)',
                                <?php 
                              $output_data = "";
                              $output_data .='data: ['.$total_100.', '.$total_200.', '.$total_300plus.'],';

                              echo $output_data;
                               ?>
                                fill: false,
                                backgroundColor: [
                                  'rgba(255, 99, 132)',
                                  'rgba(255, 159, 64)',
                                  'rgba(25, 215, 86)',
                               
                                ],
                                borderColor: [
                                  'rgb(255, 99, 132)',
                                  'rgb(255, 159, 64)',
                                  'rgb(255, 205, 86)',
                                  'rgb(75, 192, 192)',
                                  'rgb(54, 162, 235)',
                                  'rgb(153, 102, 255)',
                                  'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1
                              }]
                            };
                            
                            const Horconfig = {
                              type: 'bar',
                              data: Hordata, 
                              options: {
                                indexAxis: 'y',
                                scales: {
                                  y: {
                                    beginAtZero: true,
                                    grid: {
                                      color: 'rgba(255, 255, 255, 0.8)' 
                                    },
                                    ticks: {
                                      color: 'white' 
                                    }
                                  },
                                  x: {
                                    grid: {
                                      color: 'rgba(255, 255, 255, 0.8)' 
                                    },
                                    ticks: {
                                      color: 'white' 
                                    }
                                  }
                                },
                                plugins: {
                                  legend: {
                                    labels: {
                                      color: 'white' 
                                    }
                                  }
                                }
                              }
                            };

                            var myHorChart = new Chart(
                              document.getElementById('myHorChart'),
                              Horconfig
                            );
                          </script>

                          </div>
                          
                     <div class="card mt-5" style="width: 327px; height: 350px; background-color: #202940; z-index: 1;
                           box-shadow: 0 2px 12px 0 rgba(0,0,0,.7);">
                              <?php 
                                $totals = array(
                                  '100-199' => $total_100,
                                  '200-299' => $total_200,
                                  '300+' => $total_300plus
                              );
                              
                             
                              $maxProject = array_keys($totals, max($totals))[0];
                              
                                ?>
                            <p class="d-flex justify-content-start mx-2 text-light" 
                            style="font-size: 19px; margin-top: 200px;">
                            Estimated Budget Demand
                            </p>
                            <div class="d-flex">
                            <div class="loader-update mx-2">   </div>
                            <p class="" style="margin-left: 10px; color: yellow; font-size: 18px;">Update Daily</p>
                            </div>

                            <p class="mx-3" style="color: white">
                            <?php
                            echo "$maxProject Dollar project is trending in the market.";
                            ?>
                            </p>
                          <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: ;"> </span>
                        </div>
                    </div>

            </div>
        </div>



       <!-- Manager Part -->
         <div id="manager" class="container-fluid tab-pane fade" style="margin-left: 0px; margin-top: -60px;"><br>
        <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
           background-image: linear-gradient(195deg,#ec407a,#d81b60); width: 920px; height: 80px; border-radius: 10px; margin-top: 42px;">
            <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Managers Table</a>
            </div>

  <div class="wrapper" style="width: 950px; margin-top:88px; margin-right:-200px;
  border-radius: 16px;  box-shadow: 0 2px 12px 0 rgba(0,0,0,.7); background-color: rgba(52,71,103,.3); z-index: 2;">
      
    <section class="users" style="padding: 0px 20px;">
      <header style=" display: flex; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e6e6e6; justify-content: space-between;">

      </header>
      <div class="manager-search" style="  margin: 20px 0; display: flex; position: relative; align-items: center; justify-content: space-between;">
        <span class="text-light" style="font-size: 18px;">Select a Manager to start chat</span>
        <form>
        <input type="text" style="font-size: 18px; color: black;" name="manager_search" id="manager_search" placeholder="Enter name to search...">
        </form>

        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="d-flex mt-3" style="font-size: 20px;"> 
              <p class="text-light" style="margin-left: 0px; ">Name</p>
              <p class="text-light px-5" style="margin-left: 355px;">Status</p>
              <p class="text-light px-5" style="margin-left: 190px;">Projects</p>
          </div>
      <div class="users-list" id="manager-search-results" style=" max-height: 420px; overflow-y: auto;">
        
        <?php  
        
            $outgoing_id = $_SESSION['unique_id'];

            $sql = "SELECT * FROM manager WHERE 1";
            $query = mysqli_query($conn, $sql);
          
            $output = "";
            if (mysqli_num_rows($query) == 0) {
            $output .= "No users are available to chat";
            } elseif (mysqli_num_rows($query) > 0) {

          while($row = mysqli_fetch_assoc($query)){
            $manager_id = $row['unique_id'];
            $sql1 = "SELECT COUNT(*) as project_count FROM project WHERE manager_id = '$manager_id'";
            $result = mysqli_query($conn, $sql1);
            $row2 = mysqli_fetch_assoc($result);
            $project_count = $row2['project_count'];

            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message ";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($row2['outgoing_msg_id'])){
                ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "<span style='color: yellow;font-size: 17px; '>You: </span>" : $you = "";
            }else{
                $you = "";
            }
            ($row['active_status'] == "Offline") ? $offline = "offline" : $offline = "";
            
      
            $output .= '<div style=" display: flex; position: relative;align-items: center; cursor: pointer;
            padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px;
            padding-right: 15px; border-bottom-color: #fff; text-decoration: none; margin-left: 0px; margin-top: 5px;  ">

                        <div class="content" style="display: flex; align-items: center;">
                        <img src="uploaded_img/'. $row['profile'] .'" alt="" style="object-fit: cover; border-radius: 50%; height: 40px; width: 40px;">
                        <div class="details" style=" margin-left: 20px;">

                        <a href="admin-manager-chat.php?user_id='. $row['unique_id'] .'" style="text-decoration:none;"> 
                        <span class="" style="color: white; font-size: 18px;  ">'. $row['name'].'</a></span>
                        <p style="color: white; font-size: 17px;">'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot d-flex" style="position: relative; margin-right: -110px;">
                        <button class="button '. $offline .' text-light" style="width: 55px; height:20px; border-radius: 10px; border: none;"><p class="justify-content-center align-item-center"
                         style="margin-left: -3px; margin-top: -5px; font-size: 17px;  ">'.$row['active_status'].'</p></button>
                        <p class="date text-light" style=" padding: 0px 200px; margin-left: 100px; font-size: 20px;  "><b>'.$project_count.'</b>
                        </p>
                       
                        </div>
                    </div>';
        }

       
         echo $output;

      }
  ?>

      </div>
    </section>
  </div>

        </div>

         <!-- Client Part -->
        <div id="Clients" class="container-fluid tab-pane fade" style="margin-left: 0px; margin-top: -60px; "><br>
        <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
            background-image: linear-gradient(195deg,#ec407a,#d81b60); width: 920px; height: 80px; border-radius: 10px; margin-top: 42px;">
            <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Clients Table</a>
            </div>

  <div class="wrapper" style="width: 950px; margin-top:88px; margin-right:-200px;
  border-radius: 16px; box-shadow: 0 2px 12px 0 rgba(0,0,0,.7); background-color: rgba(52,71,103,.3); z-index: 2;">
      
    <section class="users" style="padding: 0px 20px;">
      <header style=" display: flex; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e6e6e6; justify-content: space-between;">

      </header>
      <div class="search" style="  margin: 20px 0; display: flex; position: relative; align-items: center; justify-content: space-between;">
        <span class="text-light" style="font-size: 18px;">Select a client to start chat</span>
        <form>
        <input type="text" style=" font-size: ; color:black;" name="search" id="client-search" placeholder="Enter name to search...">
        </form>
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="d-flex mt-3" style="font-size: 20px;"> 
              <p class="text-light" style="margin-left: 0px;">Name</p>
              <p class="text-light px-5" style="margin-left: 293px;">Status</p>
              <p class="text-light px-5" style="margin-left: 100px;">Joined</p>
          </div>
      <div class="users-list" id="client-search-results" style=" max-height: 420px; overflow-y: auto;">
        
        <?php  
        
            $outgoing_id = $_SESSION['unique_id'];
            $sql = "SELECT * FROM details 
            WHERE NOT unique_id = {$outgoing_id} 
            AND status <> 'suspend'
            ORDER BY id DESC";

            $query = mysqli_query($conn, $sql);
            $output = "";
            $function = "client";
            if (mysqli_num_rows($query) == 0) {
            $output .= "No users are available to chat";
            } elseif (mysqli_num_rows($query) > 0) {

          while($row = mysqli_fetch_assoc($query)){
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message ";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($row2['incoming_msg_id'])){
                ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "<span style='color: yellow;'>You:  </span>" : $you = "";
            }else{
                $you = "";
            }
            ($row['active_status'] == "Offline") ? $offline = "offline" : $offline = "";
            
      
            $output .= '<div style=" display: flex; position: relative;align-items: center; cursor: pointer;
            padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px;
            padding-right: 15px; border-bottom-color: white; text-decoration: none; margin-left: 0px; margin-top: 5px; ">

                        <div class="content" style="display: flex; align-items: center;">
                        <img src="uploaded_img/'. $row['image'] .'" alt="" style="object-fit: cover; border-radius: 50%; height: 40px; width: 40px;">
                        <div class="details" style=" color: #fff; margin-left: 20px;">

                        <a href="admin-client-chat.php?user_id='. $row['unique_id'] .'" style="text-decoration:none;"> 
                        <span class="" style="color: white; font-size: 17px; font-family: ;">'. $row['name'].'</a></span>
                        <p style=" color: white; font-size: 16px;">'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot d-flex" style="position: relative; margin-right: -10px;">
                        <button class="button '. $offline .' text-light" style="width: 55px; height:20px; border-radius: 10px; border: none;"><p class="justify-content-center align-item-center"
                         style="margin-left: -3px; margin-top: -5px; font-size: 17px;  ">'.$row['active_status'].'</p></button>
                        <p class="date " style=" padding: 0px 180px; color : white; font-size: 17px;  ">'. $row['join_date'] .'
                        </p>
                        <div class="btn btn-outline-light" style="">
                        <a href="ban-list.php?user_id='. $row['unique_id'] .'&action='.$function.'" class="delete-button"  type="submit" style="border:none; color: var(--bs-pink) background:transparent; font-size: 12px;">
                        <i class="fa fa-trash"></i></a>
                        </div> 
                        </div>
                    </div>';
        }

       
         echo $output;

      }
  ?>

      </div>
    </section>
  </div>

        </div>


        
        <!-- Developer Part -->
        <div id="Developers" class="container tab-pane fade" style="margin-left: -10px; margin-top: -40px">
        <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
            background-image: linear-gradient(195deg,#ec407a,#d81b60); width: 970px; height: 80px; border-radius: 10px; margin-top:-42px;">
            <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Developers Table</a>
            </div>

  <div class="wrapper" style="width: 1000px; margin-top:88px; 
  border-radius: 16px; box-shadow: 0 2px 12px 0 rgba(0,0,0,.7); background-color: rgba(52,71,103,.3); z-index: 2;">
      
    <section class="users" style="padding: 0px 20px;">
      <header style=" display: flex; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e6e6e6; justify-content: space-between;">
        <div class="content" style="display: flex; align-items: center; color: #fff; margin-left: 20px;">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
        </div>

      </header>
      <div class="dev-search" style="  margin: 20px 0; display: flex; position: relative; align-items: center; justify-content: space-between; font-size: 17px;">
        <span class="text-light">Select a Developer to start chat</span>
        <form>
        <input type="text" style=" font-size: 18px; color:black;" name="dev_search" id="dev_search" placeholder="Enter name to search...">
          </form>
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="d-flex mt-3" style="font-size: 19px;"> 
              <p class="text-light" style="margin-left: 0px;">Name</p>
              <p class="text-light px-5" style="margin-left: 260px;">Function</p>
              <p class="text-light px-5" style="margin-left: 90px;">Status</p>
              <p class="text-light px-5" style="margin-left: 80px;">Joined</p>
          </div>
      <div class="dev-users-list" id="dev-search-results" style=" max-height: 420px; overflow-y: auto;">
        <?php    

        $outgoing_id = $_SESSION['unique_id'];
        $sql = "SELECT * FROM developer WHERE NOT unique_id = {$outgoing_id} AND status <> 'suspend'
        ORDER BY d_id DESC";
        $query = mysqli_query($conn, $sql);
        $output = "";
        $function2 = "developer";
        if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
        }elseif(mysqli_num_rows($query) > 0){

          while($row = mysqli_fetch_assoc($query)){
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($row2['incoming_msg_id'])){
              ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "<span style='color: yellow;'>You:  </span>" : $you = "";
            }else{
              $you = "";
            }
            ($row['active_status'] == "Offline") ? $offline = "offline" : $offline = "";
           
      
            $output .= '<div href="admin-dev-chat.php?user_id='. $row['unique_id'] .'" style="display: flex; position: relative;align-items: center;
            padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content:space-between; margin-bottom: 15px; padding-right: 15px; 
            border-bottom-color:white; text-decoration: none; margin-left: px; margin-top: 5px; ">

            <div class="content" style="display: flex; align-items: center;">
                <img src="uploaded_img/'. $row['d_profile'] .'" alt="" style="object-fit: cover; border-radius: 50%; height: 40px; width: 40px;">
                <div class="details" style="color: #fff; margin-left: 20px;">
                   <a href="admin-dev-chat.php?user_id='. $row['unique_id'] .'" style="text-decoration:none;"> 
                    <span class="" style="color: white; font-size: 17px; font-family: ;">'. $row['name'].'</a>
                    </span>
                    <p style="color: white; font-size: 15px;">'. $you . $msg .'</p>
                </div>
            </div>
            
            <div class="status-dot d-flex" style="position: relative; margin-right: -15px;">
               <div class="function" style="position: absolute; margin-left:-490px;">
                <p class="date" style="padding: 0px 50px; color: white; font-size: 17px;">'. $row['d_skill'] .'</p>
                </div>
                <div class="">

                <button class="button '. $offline .'" style="width: 45px; height:20px; border-radius: 10px; border:none; margin-left:-185px; font-size: 15px;">
                    <p class="justify-content-center align-item-center" style="margin-left: -1px; margin-top: -4px;">'. $row['active_status'].'</p>
                </button>
                </div>
                <div class="">
                <p class="date" style="padding: 0px 20px; color: white; font-size: 15px; margin-right: 40px;">'. $row['date'] .'</p>
                </div>
                <div class="btn btn-outline-light" style="">
                        <a href="ban-list.php?user_id='. $row['unique_id'] .'&action='.$function2.'" class=""  type="submit" style="color: var(--bs-pink) background:transparent; font-size: 12px; ">
                        <i class="fa fa-trash"></i></a>
                        </div> 
                       </div>
        </div>';
        }

        }
       
         echo $output;

   
  ?>

      </div>
    </section>
  </div>

        </div>




                            <!-- Billing Part -->
                            <div id="billing" class="container tab-pane fade" style="margin-left: -30px; margin-top: -40px">
                    <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
                        background-image: linear-gradient(195deg,#ec407a,#d81b60); width: 1000px; height: 80px; border-radius: 10px; margin-top:-42px;">
                        <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Billing Table</a>
                        </div>

              <div class="wrapper" style="width: 1030px; margin-top:88px; 
              border-radius: 16px; box-shadow: 0 2px 12px 0 rgba(0,0,0,.7); background-color: rgba(52,71,103,.3);z-index: 2;">
                  
                <section class="users" style="padding: 0px 20px;">
                  <header style=" display: flex; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e6e6e6; justify-content: space-between;">
                    <div class="content" style="display: flex; align-items: center; color: #fff; margin-left: 20px;">
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
                        if(mysqli_num_rows($sql) > 0){
                          $row = mysqli_fetch_assoc($sql);
                        }
                      ?>
                    </div>

                  </header>
                  <div class="dev-search" style="  margin: 20px 0; display: flex; position: relative; align-items: center; justify-content: space-between;">
                  </div>
                  <div class="d-flex mt-3" style="font-size: 19px;"> 
                          <p class="text-light" style="margin-left: 0px;">Name</p>
                          <p class="text-light px-5" style="margin-left: 145px;">Code</p>
                          <p class="text-light px-5" style="margin-left: 25px;">Delivery</p>
                          <p class="text-light px-5" style="margin-left: 40px;">Wallet</p>
                          <p class="text-light px-5" style="margin-left: 40px;">Amount</p>
                          <p class="text-light px-5" style="margin-left: 20px;">Client</p>
                      </div>
                  <div class="billing-list" id="dev-search-results" style=" max-height: 440px; overflow-y: auto;">
                    <?php    

                    $outgoing_id = $_SESSION['unique_id'];
                    $sql = "SELECT * FROM billing WHERE 1";
                    $query = mysqli_query($conn, $sql);
                    $output = "";
                    if(mysqli_num_rows($query) == 0){
                    $output .= "Empty Database....";
                    }elseif(mysqli_num_rows($query) > 0){

                      while($row = mysqli_fetch_assoc($query)){

                    
                        
                      
                        $output .= '<div class="project-card1" style="display: flex; position: relative; align-items: center; padding-bottom: 15px;
                         border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px; padding-right: 15px;
                          border-bottom-color: white; text-decoration: none; margin-left: 0; margin-top: 5px;">

                        <div class="content1" style="width: 170px; display: flex; align-items: center;">
                            <div class="details" style="color: white; margin-left: 0;">
                                <span class="project-name" style="color: white; font-size: 16px; font-family: ;">'. $row['project_name'].'</span>
                            </div>
                        </div>
                    
                        <div class="project-info1" style="width: 10px; margin-left: -30px;  ">
                            <p class="project-id" style="color: white; font-size: 17px; margin-bottom: 5px;">'. $row['project_id'] .'</p>
                            </div>

                            <div class="delivery" style="width: 90px; height: 20px; margin-left: 45px; border-radius: 10px; color: white; font-size: 12px;">
                            <p style="margin: 0; font-size: 16px;">'. $row['end'] .'</p>
                            </div>

                            <div class="wallet-numbe1r" style="width: 120px; height: 20px; border-radius: 10px; color: white; font-size: 12px; padding: 0px 0px; ">
                                <p style="margin: 0; font-size: 16px;">'. $row['wallet'] .'</p>
                            </div>
                            <p class="amount1" style="width: 50px; color: white; font-size: 16px; margin-bottom: 5px;">$'. $row['amount'] .'</p>
                            <p class="unique-id" style=" color: white; font-size: 15px;">'. $row['client_id'] .'</p>
                        </div>
                    ';
                    
                    }

                    }
                  
                    echo $output;

              
              ?>

                  </div>
                </section>
              </div>

                    </div>



        
 <!-- Suspend Part -->
 <div id="suspend" class="container tab-pane fade" style="margin-left: -10px; margin-top: -40px">
        <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
             background-image: linear-gradient(195deg,#ec407a,#d81b60); width: 950px; height: 80px; border-radius: 10px; margin-top:-42px;">
            <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Suspend Table</a>
            </div>

  <div class="wrapper" style="width: 980px; margin-top:88px; 
  border-radius: 16px; box-shadow: 0 2px 12px 0 rgba(0,0,0,.7); background-color: rgba(52,71,103,.3); z-index: 2;">
      
    <section class="users" style="padding: 0px 20px;">
      <header style=" display: flex; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e6e6e6; justify-content: space-between;">
        <div class="content" style="display: flex; align-items: center; color: #fff; margin-left: 20px;">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
        </div>

      </header>
      <div class="suspend-search" style="  margin: 20px 0; display: flex; position: relative; align-items: center; justify-content: space-between; font-size: 17px;">
        <span class="text-light"><?php echo "Today is: ". date("Y-m-d");?></span>
        <span class="text-light">Search Current Date To Unsuspend Users </span>
        <form>
        <input type="text" style=" font-size: 18px; color:black;" name="suspend_search" id="suspend_search" placeholder="(YY-MM-DD)">
          </form>
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="d-flex mt-3" style="font-size: 17px;"> 
              <p class="text-light" style="margin-left: 0px;">Name</p>
              <p class="text-light px-5" style="margin-left: 130px;">Email</p>
              <p class="text-light px-5" style="margin-left: 50px;">Function</p>
              <p class="text-light px-5" style="margin-left: 50px;">Action</p>
              <p class="text-light px-5" style="margin-left: 60px;">Release</p>
          </div>
      <div class="suspend-list" id="suspend-results" style=" max-height: 440px; overflow-y: auto;">
        <?php    

        $outgoing_id = $_SESSION['unique_id'];
        $sql = "SELECT * FROM suspend WHERE 1";
        $query = mysqli_query($conn, $sql);
        $output = "";


        while($row = mysqli_fetch_assoc($query)){
      
            $output .= '<div style="display: flex; position: relative;align-items: center; padding-bottom: 0px; border-bottom: 1px solid #e6e6e6;
             justify-content: space-between; margin-bottom: 15px; padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none; margin-left: px; margin-top: 5px;">

                <div class="" style="color: #fff; margin-left: 0px; margin-bottom: 20px;">
                    <span class=""style="color: white; font-size: 17px;">'. $row['name'].'
                    </span>
                 
                </div>

            
            <div class="status-dot d-flex" style="position: relative; margin-right: -5px;">
               <div class="function" style="position: absolute; margin-left:-650px;">
                <p class="date" style="padding: 0px 50px; color: white; font-size: 17px;">'. $row['email'] .'</p>
                </div>
                <div class="">
                <p class="justify-content-center align-item-center text-light" style="font-size: 17px; margin-left: -370px;">'. $row['function'].'</p>
                </div>
                <div class="">
                <div class="" style="  margin-left:-175px; font-size: 17px;">
                    <p class="justify-content-center align-item-center text-light" style="">'. $row['suspend_date'].'</p>
                </div>
                </div>
                <div class="">
                <p class="date" style="padding: 0px 20px; color: white; font-size: 17px; margin-right: 40px;">'. $row['date'] .'</p>
                </div>
                <div class="" style="">
                        <a href="unsuspend.php?user_id='. $row['unique_id'] .'" class="delete-button"  type="submit" style="border:none;
                         color: white; background:transparent; font-size: 16px;"><i class="fa fa-history"></i></a>
                        </div> 
                       </div>
        </div>';
       
        }
        echo $output;
   
  ?>

      </div>
    </section>
  </div>

        </div>




                      
                          <!-- Approval Part -->
                          <div id="approval" class="container-fluid tab-pane fade" style="margin-left: -10px; margin-top: -20px"><br>
                <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
                     background-image: linear-gradient(195deg,#ec407a,#d81b60); width: 950px; height: 80px; border-radius: 10px; margin-top: 0px;">
                    <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Approval Table</a>
                    </div>

          <div class="wrapper" style="width: 980px; margin-top:48px; margin-right:-200px; 
          border-radius: 16px; box-shadow: 0 2px 12px 0 rgba(0,0,0,.7); background-color: rgba(52,71,103,.3); z-index: 2;">
              
            <section class="users" style="padding: 0px 20px;">
            <header>
              <div class="" style="">
            By Create Button You can Create Project
              </div>
              </hearder>
          
              <div class="d-flex mt-3" style="font-size: 18px;"> 
            <p class="text-light" style="margin-left: 0px;">Project-Name</p>
            <p class="text-light px-5" style="margin-left: 290px;">Project-ID</p>
            <p class="text-light px-5" style="margin-left: 130px;">Client-ID</p>
        </div>

        <div class="users-list" id="search-results" style="max-height: 440px; overflow-y: auto;">
            <?php  
                      
                        $sql = "SELECT * FROM approval WHERE 1";
                        $query = mysqli_query($conn, $sql);
                        $output = "";

                        if (mysqli_num_rows($query) == 0) {
                            $output .= "No Approval here..";
                        } elseif (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
            
              
          

                // Display user information and progress bar
                $output .= '<div style="display: flex; position: relative; align-items: center; cursor: pointer;
                    padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px;
                    padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none; margin-left: 0px; margin-top: 5px; ">
                    <div class="content" style="display: flex; align-items: center;">
                        <div class="details" style="color: #fff; margin-left: 0px;">
                            <a href="" style="text-decoration:none;"> 
                                <span class="" style="color: white; font-size: 17px; font-family: ;">' . $row['name'] . '</a></span>
                            </div>
                        </div>
                      
                            <div class="container d-flex" style="margin-right: 50px; width: 450px; position: relative; ">
                                <div class="">
                                    <div class=" text-light" style="font-size: 17px;">
                                      ' . $row['project_id'] . '
                                    </div>
                                </div>
                          
                            <div class="container">
                                <p class="date text-light " style="margin-left: 235px; width: 65px; font-size: 17px;">' . $row['client_id'] . '</p>
                            </div>
                            <div class="" style="margin-right: -70px; margin-bottom: 10px;">
                            <a href="admin-project-approval.php?user_id='.$row['client_id'].'&project_id='.$row['project_id'].'&id='.$row['id'].'" class="btn btn-outline-light" style="font-size: 18px;">
                                <i class="fa fa-circle-o-notch rotate-icon"></i>
                            </a>
                        </div>
                        </div>
                    </div>';
            }
            echo $output;
        }     
    ?>


      </div>
    </section>
  </div>

        </div>

         <!--Project list Part -->
         <div id="view" class="container-fluid tab-pane fade" style="margin-left: 0px; margin-top: -20px"><br>
        <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
            background-image: linear-gradient(195deg,#ec407a,#d81b60);  width: 950px; height: 80px; border-radius: 10px; margin-top: 0px;">
            <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Project Table</a>
            </div>

  <div class="wrapper" style="width: 980px; margin-top:48px; margin-right:-200px; 
  border-radius: 16px; box-shadow: 0 2px 12px 0 rgba(0,0,0,.7); background-color: rgba(52,71,103,.3); z-index: 2;">
      
    <section class="users" style="padding: 0px 20px;">
    <header>
      <div class="" style="">
    By Create Button You can Create Project
      </div>
      </hearder>
  
      <div class="d-flex mt-3" style="font-size: 18px;"> 
    <p class="text-light" style="margin-left: 0px;">Project</p>
    <p class="text-light px-5" style="margin-left: 220px;">Progress</p>
    <p class="text-light px-5" style="margin-left: 80px;">Client</p>
    <p class="text-light px-5" style="margin-left: 70px;">Status</p>
    <input type="button" class="btn btn-light" value="Create" style="margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#project">
</div>

<div class="users-list" id="search-results" style="max-height: 440px; overflow-y: auto;">
    <?php  
        $outgoing_id = $_SESSION['unique_id'];
        $sql = "SELECT * FROM project WHERE 1";
        $query = mysqli_query($conn, $sql);
        $output = "";

        if (mysqli_num_rows($query) == 0) {
            $output .= "No developer here..";
        } elseif (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $sql2 = "SELECT * FROM project WHERE id = " . $row['id'];
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
                $result = (mysqli_num_rows($query2) > 0) ? $row2['des_1'] : "";
                $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result;
                $dev_id1 = $row['developer_1_id'];
                $dev_id2 = $row['developer_2_id'];
                $dev_id3 = $row['developer_3_id'];
                $manager_id = $row['manager_id'];
                $id = $row['id'];
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
                    padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none; margin-left: 0px; margin-top: 5px; ">
                    <div class="content" style="display: flex; align-items: center;">
                        <div class="details" style="color: #fff; margin-left: 0px;">
                            <a href="" style="text-decoration:none;"> 
                                <span class="" style="color: white; font-size: 17px;">' . $row['name'] . '</a></span>
                                <p style="color: white; font-size: 15px;">' . $msg . '</p>
                            </div>
                        </div>
                        <div class="status-dot d-flex" style="position: relative; margin-right: -140px;">
                            <div class="container" style="margin-right: -160px; width: 340px;">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-warning text-dark" role="progressbar" aria-valuenow=' . $per . ' aria-valuemin="0" aria-valuemax="100" style="width:' . $per . '%">
                                        ' . $per . '%
                                    </div>
                                </div>
                            </div>

                            <div class="client" style="margin-right: -50px;">
                            <p class="date text-light " style="margin-left: 240px; width: 5px; font-size: 17px;">' . $row['client_id'] . '</p>
                            </div>

                            <div class="container" style="margin-right: -60px">
                                <p class="date text-light " style="margin-left: 240px; width: 65px; font-size: 17px;">' . $row['status'] . '</p>
                            </div>
                            <div class="dropend" style="margin-left: -35px;">
                                <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" style="margin-right: 140px;">
                                    <i class="fa fa-folder"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" style="font-size: 13px; ">
                                <li>
                                <a class="dropdown-item bg-light" style="font-size: 17px;" href="admin-project-view.php?user_id='. $row['unique_id'] .'&dev1='.$dev_id1.'&dev2='.$dev_id2.'&dev3='.$dev_id3.'&manager='.$manager_id.'&id='.$id.'">
                                    View
                                </a>
                            </li>
                                <li><a class="dropdown-item bg-light" style="font-size: 17px"; href="admin-project-edit.php?id='.$row['id'].'">Edit</a></li>
                                <li><a class="dropdown-item bg-light" style="font-size: 17px"; href="admin-project-file.php?project_id='.$row['unique_id'].'&manager='.$row['manager_id'].'">File</a></li>
                                <li><a class="dropdown-item bg-light" style="font-size: 17px"; href="admin-project-handover.php?id='.$row['id'].'">Hand Over</a></li>
                                <li>
                                    <a class="dropdown-item bg-light" style="font-size: 17px" href="admin-project-delete.php?user_id=' . $row['client_id'] . '&manager_id=' . $row['manager_id'] . '&project_id=' . $row['unique_id'] . '">
                                    Delete</a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>';
            }
            echo $output;
        }     
    ?>

      </div>
    </section>
  </div>

        </div>


        




        </div>

      </div>
    </div>
  </div>
</div>




       <!-- The Create Project Modal -->
       <div class="modal" id="project">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #2c3e50; border-color: white; border-radius: 5px; margin-top: 0px; font-size: 17px;">
            <div class="modal-body text-light">
                <div class="container-fluid">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <select class="form-select text-light" name="name" style="background-color: #34495e; border-color: white;">
                                    <option>Web Development,2224</option>
                                    <option>Search Engine Optimization,2225</option>
                                    <option>Pay Per Click,2226</option>
                                    <option>Social Media Marketing,2227</option>
                                    <option>Content Marketing,2228</option>
                                    <option>Email Marketing,2229</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                <select class="form-select text-light" name="status" style="background-color: #34495e; border-color: white;" id="status">
                                    <option>Pending</option>
                                    <option>On-Hold</option>
                                    <option>Processing</option>
                                    <option>Done</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="start">Start-Date</label>
                                <input class="form-control text-light" name="start" style="background-color: #34495e; border-color: white;" type="date" id="start">
                            </div>
                            <div class="col-md-6">
                                <label for="end">End-Date</label>
                                <input class="form-control text-light" name="end" style="background-color: #34495e; border-color: white;" type="date" id="end">
                            </div>
                            <div class="col-md-6">
                                <label for="manager">Project-Manager</label>
                                <select class="form-select text-light" name="manager" style="background-color: #34495e; border-color: white;" id="manager">
                                <?php
                                $query = "SELECT * FROM `manager` WHERE 1";
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

                                <label for="client">Client</label>
                                <select class="form-select text-light" name="client" style="background-color: #34495e; border-color: white;" id="client">
                                <?php
                                $query = "SELECT * FROM `details` WHERE 1";
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
                                <label for="developer">Project-Developer</label>
                                <textarea class="form-control select text-light" name="developer" id="developer" style="width: 100%; height: 30px; background-color: #34495e; border-color: white;"></textarea>
                                <select class="names text-light" style="display:none; margin-top: 0px; margin-left: 0px; width: 93%; z-index: 2; position: absolute; background-color: #34495e; border-color: white;" multiple id="option">
                                <?php
                              $query = "SELECT * FROM `developer` WHERE 1";
                              $allData = mysqli_query($conn, $query);
                              $output2="";
                              if (mysqli_num_rows($allData) > 0) {
                                  while ($arrayData = mysqli_fetch_array($allData)) {
                                      $output2 .= ' 
                                      <option class="option" id="developer-select">
                                       <p>' . $arrayData['name'] . ' ,'. $arrayData['unique_id'] .'</p>
                                    
                                      </option> ';
                                  }
                              } else {
                                
                                  $output2 .= '<option>No project managers found</option>';
                              }
                              echo $output2;
                              ?>
                                </select>

                                <label for="amount">Project Amount</label>
                                <input type="text" name="amount" class="form-control text-light" style="background-color: #34495e; border-color: white;" id="amount" placeholder="Amount in dollar...">
                            </div>
                            <div class="col-md-12">
                                <label for="text">Description</label>
                                <textarea type="text" name="text" class="form-control text-light" style="background-color: #34495e; border-color: white; height: 200px;"></textarea>
                            </div>
                            <div class="col-md-12 mt-1">
                                <input type="submit" name="create" class="btn btn-outline-light" value="Create">
                                <button type="button" class="btn bg-light" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




                  <!-- The Logout Modal -->
                  <div class="modal" id="logout">
                    <div class="modal-dialog w-25" style="margin-top: 250px;">
                      <div class="modal-content" style="background-color: rgb(0,0,0,0.8); border-color: white;  ; ">

                        <!-- Modal body -->
                        <div class="modal-body text-light" style="font-size: 17px;">
                          Are you sure to Logout?
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn"><a href="logout.php" class="btn btn-outline-light" style="text-decoration:none;">Yes</a></button>
                          <button type="button" class="btn bg-light" data-bs-dismiss="modal">No</button>
                        </div>

                      </div>
                    </div>
                  </div>

                   <!-- The Logout Modal -->
                   <div class="modal" id="notification">
                    <div class="modal-dialog w-100" style="margin-top: 50px; margin-left: 750px;">
                      <div class="modal-content" style="">

                        <!-- Modal body -->
                        <div class="modal-body text-light" style="font-size: 17px;">
                        <?php    
                    $outgoing_id = $_SESSION['unique_id'];
                    $sql = "SELECT * FROM contact WHERE 1";
                    $query = mysqli_query($conn, $sql);
                    $output = "";
                    if(mysqli_num_rows($query) == 0){
                    $output .= "Empty Database....";
                    }elseif(mysqli_num_rows($query) > 0){

                      while($row = mysqli_fetch_assoc($query)){

                        $output .= '<div class="container card" style="max-height: 440px; overflow-y: auto; padding-top: 10px;">
                           <div class="content">
                           <div class="name d-flex">
                           <p class="" style="color: deeppink">'.$row['name'].'</p>
                           <p class="" style="margin-left: 70px; color: deeppink">'.$row['email'].'</p>
                           </div>
                           <div class="smg">
                           <p class="text-dark" style="margin-top: -20px;">'.$row['message'].'</p>
                           </div>
                           </div>
                           </div>
                    ';
                    
                    }
                    }
                    echo $output;
              ?>
                        </div>

                        <!-- Modal footer -->

                        <!-- <div class="modal-footer">
                          <button type="button" class="btn bg-dark" style="color: white" data-bs-dismiss="modal">Close</button>
                        </div> -->

                      </div>
                    </div>
                  </div>



        <script>
            

             // Manager Search button
             const msearchBar = document.querySelector(".manager-search input"),
            msearchIcon = document.querySelector(".manager-search button"),
            musersList = document.querySelector(".users-list");

            msearchIcon.onclick = ()=>{
            msearchBar.classList.toggle("show");
            msearchIcon.classList.toggle("active");
            msearchBar.focus();
            if(msearchBar.classList.contains("active")){
                msearchBar.value = "";
                msearchBar.classList.remove("active");
            }
            }


            // Client Search button
            const searchBar = document.querySelector(".search input"),
            searchIcon = document.querySelector(".search button"),
            usersList = document.querySelector(".users-list");

            searchIcon.onclick = ()=>{
            searchBar.classList.toggle("show");
            searchIcon.classList.toggle("active");
            searchBar.focus();
            if(searchBar.classList.contains("active")){
                searchBar.value = "";
                searchBar.classList.remove("active");
            }
            }
             
            //Developer Search button
            const devsearchBar = document.querySelector(".dev-search input"),
            devsearchIcon = document.querySelector(".dev-search button"),
            devusersList = document.querySelector(".dev-users-list");

            devsearchIcon.onclick = ()=>{
            devsearchBar.classList.toggle("show");
            devsearchIcon.classList.toggle("active");
            devsearchBar.focus();
            if(devsearchBar.classList.contains("active")){
                devsearchBar.value = "";
                devsearchBar.classList.remove("active");
            }
            }

                //Suspend Search button
                const suspendsearchBar = document.querySelector(".suspend-search input"),
                suspendsearchIcon = document.querySelector(".suspend-search button"),
                suspendusersList = document.querySelector(".suspend-users-list");

                suspendsearchIcon.onclick = ()=>{
                suspendsearchBar.classList.toggle("show");
                suspendsearchIcon.classList.toggle("active");
                suspendsearchBar.focus();
                if(suspendsearchBar.classList.contains("active")){
                suspendsearchBar.value = "";
                suspendsearchBar.classList.remove("active");
            }
            }
             
            //Developer Handle
            const select = document.querySelector(".select");
            const dropdown = document.querySelector(".names");
            

            select.addEventListener("click", () => {
                if (dropdown.style.display === 'none') {
                    dropdown.style.display = 'block';
                } else {
                    dropdown.style.display = 'none';
                }
            });

            //create project -> developer 
            $(document).ready(function () {
        $("#option").on('change', function () {
            
            var selectedValues = $(this).val();

           
            $(".select").val(selectedValues.join(',\n'));
            });
        });
      

         //Manager Search
         $(document).ready(function() {
            $('#manager_search').on('input', function() {
                var query = $(this).val();

                if (typeof query !== 'undefined') {
                    $.ajax({
                        url: 'admin-manager-search.php',
                        method: 'GET',
                        data: { search: query },
                        success: function(data) {
                            $('#manager-search-results').html(data);
                        }
                    });
                } else {
                    
                    $('#manager-search-results').html('');
                }
            });
        });



           //Client Search
           $(document).ready(function() {
            $('#client-search').on('input', function() {
                var query = $(this).val();

                if (typeof query !== 'undefined') {
                    $.ajax({
                        url: 'admin-client-search.php',
                        method: 'GET',
                        data: { search: query },
                        success: function(data) {
                            $('#client-search-results').html(data);
                        }
                    });
                } else {
                   
                    $('#client-search-results').html('');
                }
            });
        });

      
            

            //Developer Search
            $(document).ready(function() {
                $('#dev_search').on('input', function() {
                    var dev_query = $(this).val();

                    if (typeof dev_query !== 'undefined') {
                        $.ajax({
                            url: 'admin-dev-search.php',
                            method: 'GET',
                            data: { search: dev_query },
                            success: function(data) {
                                $('#dev-search-results').html(data);
                            }
                        });
                    } else {
                        $('#dev-search-results').html('');
                    }
                });
            });

            //suspend Search
            $(document).ready(function() {
                $('#suspend_search').on('input', function() {
                    var dev_query = $(this).val();

                    if (typeof dev_query !== 'undefined') {
                        $.ajax({
                            url: 'admin-suspend-search.php',
                            method: 'GET',
                            data: { search: dev_query },
                            success: function(data) {
                                $('#suspend-results').html(data);
                            }
                        });
                    } else {
                        $('#suspend-results').html('');
                    }
                });
            });
     

    
    </script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <!-- Bootstrap JS and Popper.js -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
