<?php

include "config.php";
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: index.php");
  die();
}
$output1 = " ";
$output2 = "";
$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
$project_id = mysqli_real_escape_string($conn, $_GET['project_id']);
$query =  mysqli_query($conn, "SELECT * FROM crm_wallet WHERE unique_id = '$user_id'");
$row = mysqli_fetch_assoc($query);

$query2 =  mysqli_query($conn, "SELECT * FROM details WHERE unique_id = '$user_id'");
$row2 = mysqli_fetch_assoc($query2);

$query3 =  mysqli_query($conn, "SELECT * FROM details WHERE unique_id = '$user_id'");
$result = mysqli_fetch_assoc($query3);

$web =  mysqli_query($conn, "SELECT * FROM web WHERE 1");
$web1 = mysqli_fetch_assoc($web);

if (isset($_POST['transfer'])) {
  $card_number = $_POST['card_number'];
  $amount = $_POST['amount'];
  $first_name= $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $wallet_number = $_POST['wallet_number'];
  $security = $_POST['security'];

  $card_pattern = "/^[0-9]{8}$/";
  $amount_pattern = "/^(?:[3-9][0-9]?|[1-4][0-9]{2}|500)$/";
  $firstName_pattern = "/[A-Za-z .]{3,25}/";
  $lastName_pattern = "/[A-Za-z .]{3,20}/";
  $wallet_pattern = "/[0-9 .]{3,50}/";
  $security_pattern = "/[0-9]{4}/";
 

  if(!preg_match($card_pattern,$card_number)){
    echo "<script>alert('Card Format Not Matching. 8 Digit Only');</script>";
   }
   else if(!preg_match($amount_pattern,$amount)){
    echo "<script>alert('Amount Format Not Matching. Range should be 30-500$.');</script>";
   } 
    else if(!preg_match($firstName_pattern,$first_name)){
      echo "<script>alert('Name Format Not Matching');</script>";
   }
   else if(!preg_match($lastName_pattern,$last_name)){
    echo "<script>alert('Title Format Not Matching');</script>";
   }
   else if(!preg_match($wallet_pattern,$wallet_number)){
    echo "<script>alert('Perdefine');</script>";
   }
   else if(!preg_match($security_pattern,$security)){
    echo "<script>alert('Security Code only 4 Length');</script>";
   }
   else{
      $sql = "INSERT INTO transfer (number, crm_number, amount, first_name, last_name) VALUES ('{$card_number}', '{$wallet_number}', '{$amount}', '{$first_name}', '{$last_name}')";
      $result = mysqli_query($conn, $sql);
       
      // Assuming $amount contains the additional amount you want to add
    $newAmount = $amount + $row['amount']; // $row['amount'] is the current amount in the database

    $sql2 = "UPDATE `crm_wallet` SET amount = amount + $amount WHERE unique_id = '$user_id'";
    $result2 = mysqli_query($conn, $sql2);

    $project_id = mysqli_real_escape_string($conn, $_GET['project_id']);
    $project_id = trim($project_id);
    $project_id = str_replace(' ', '', $project_id);
    $encoded_project_id = urlencode($project_id);

    echo '<script>alert("Money Transfer Sucessfully.");
    window.location.href = "CRM.php?user_id=' . $user_id . '&project_id=' . $encoded_project_id . '";
    </script>';

   }


}

if (isset($_POST['change'])) {
   $query20 =  mysqli_query($conn, "SELECT * FROM crm_wallet WHERE unique_id = '$user_id'");
   $row20 = mysqli_fetch_assoc($query20);

   $current = $_POST['current'];
   $pass = $_POST['pass'];
   $con_pass = $_POST['con_pass'];

   $pass_pattern = "/^[0-9]{4}$/";

   if ($current != $row20['password']){
    echo "<script>alert('Current Password Not Matching Check Your Mail Box.');</script>";
   }elseif(!preg_match($pass_pattern,$pass)){
      echo "<script>alert('4 Digit Only');</script>";
   }elseif($pass != $con_pass){
      echo "<script>alert('Confirm-Password Not Matching');</script>";
   }else{
    $project_id = mysqli_real_escape_string($conn, $_GET['project_id']);
    $project_id = trim($project_id);
    $project_id = str_replace(' ', '', $project_id);
    $encoded_project_id = urlencode($project_id);

    $sql2 = "UPDATE `crm_wallet` SET password = '$pass' WHERE unique_id = '$user_id'";
    $result2 = mysqli_query($conn, $sql2);
    echo '<script>alert("Password Updated Sucessfully.");
    window.location.href = "CRM.php?user_id=' . $user_id . '&project_id=' . $encoded_project_id . '";
    </script>';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>DigitalSpark CRM</title>
  <link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>

  <style>
      body{
            
            align-items: center;
            justify-content: center;
            background-color: #A4AED1;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; 
  
        }
    .navbar{
      
    }
    .container-fluid {
      perspective: 1000px;
      border-radius: 20px;
      
    }

    .card {
      position: relative;
      width: 40%;
      margin-left: 340px;
      margin-top: 170px;
      transform-style: preserve-3d;
      transition: transform 0.7s;
      border: none;
      background-color: red !important;
      
    }

    input{
            outline: none;
            border: 2px solid rgb(254,190,16);
            background: transparent;
            color: #fff;
            margin-top: 10px;
            font-size: 0.9rem;
            font-weight: 500; 
    }

    .flipped {
      transform: rotateY(180deg);
    }


    .card-inner {
      position: absolute;
      backface-visibility: hidden;
      border-radius: 20px;
      box-shadow: 0 25px 45px rgba(0, 0, 0, 0.25);
    }

    .card-front,
    .card-back {
      position: absolute;
      backface-visibility: hidden;
      border-radius: 20px;
    }

    .card-front{
      /* background: repeating-linear-gradient(#fff, #fff 3px, #efefef 0px, #efefef 9px); */
      background-color: rgb(255,255,255,0.8); 
    }

    .card-back {
      transform: rotateY(180deg);
      background-color: rgb(255,255,255,0.8); 
      width: 520px;
      border-radius: 20px;
    }
    .active{
            color: rgb(254,190,16);
        }

  </style>
</head>
<body>


  <div class="navbar navbar-expand-sm"  style="font-family: 'Timmana'">
    <div class="container-fluid">
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class="nav-link text-warning"  style="font-family: 'Timmana'" href="client-page.php">CRM</a>
          </li>
          <li class="nav-item active" style="margin-left: 50px; margin-top: 5px;">
            <i class="fa fa-share" style="font-size:15px"> 
            <?php
            $output1 .= "<a href='' class='text-dark' style='text-decoration: none; font-family: \"Timmana\"'>CRM Wallet</a>";
            echo $output1;
                     ?>
            </i>
          </li>
          <li class="nav-item" style="margin-left: 50px; margin-top: 5px;">
            <i class="fa fa-share" style="font-size:15px">
            <?php
         
         $output2 .= '<a href="payment.php?user_id=' . $user_id . '&project_id=' . $project_id . '" class="text-dark" style="text-decoration: none; font-family: \'Timmana\'">Confirm & Pay</a>';
         echo $output2;
                     ?>
          </i>
          
          </li>
        </ul>
    </div>
</div>

<div class="container-fluid w-50"  style="position: absolute; z-index: 4; margin-top: 130px; margin-left: 300px; font-family: 'Timmana'">
  <div class="alert alert-info alert-dismissible" id="instruction-container" style="display: none;">
    <header class="d-flex">
      <i class="fa fa-bullhorn" style="font-size:24px"></i>
    <strong class="mx-2">Instractions!</strong>.
    <a href="#" class="close" id="close-instructions" style="margin-left: 430px; text-decoration: none; font-size: 20px; margin-top: -6px;" data-dismiss="alert" aria-label="close"><i class="fa fa-close" style="font-size:20px;color: black;"></i></a>
    </header>
    <div class="mt-5">
      <ul class="mt-5" style="list-style-type: none;">
        <li class="d-flex">
          <i class="fa fa-share-square-o" style="font-size:20px"></i>
            <p class="px-3">Safe & Secure.Save your transection time.</p>
        </li>
        <li class="d-flex">
          <i class="fa fa-share-square-o" style="font-size:20px"></i>
            <p class="px-3">30-500 Dollar can add at a time.</p>
        </li>
        <li class="d-flex">
          <i class="fa fa-share-square-o" style="font-size:20px"></i>
            <p class="px-3">Can useable only this site</p>
        </li>
        <li class="d-flex">
          <i class="fa fa-share-square-o" style="font-size:20px"></i>
            <p class="px-3">You can purchase every item with this card</p>
        </li>
        <li class="d-flex">
          <i class="fa fa-share-square-o" style="font-size:20px"></i>
            <p class="px-3">Keep your password secret</p>
        </li>
    </ul>
    </div>
  </div>
</div>

  <div class="container-fluid" style="font-family: 'Timmana'; ">
    <div class="card" onmouseleave="toggleFlip(this)">
      <div class="card-inner">
        <div class="card-front">
          <header class="d-flex">
            <h4 class="mx-3 my-3" style="">CRM Wallet</h4>
            <button id="showAlertButton" style="border: none; background: transparent; margin-top: -30px; margin-left: -15px;" onclick="showAlert()"><i class="fa fa-question-circle" style="font-size:15px"></i></button>
            <img class="my-3" style="width: 15%; margin-left: 270px;" src="images/chip.png">
          </header>
          <div class="mx-3" style="margin-top: -20px;">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal">Add Balance</button>
          </div>
          <div class="mt-3 mx-3">
            <p style="font-size: 15px; "><b>Wallet Number</b></p>
            <p style="font-size: 30px; margin-top: -20px; "><?php echo $row['number']?></p>
          </div>

          <div class="p-2 mx-2" style="width: 70%;">
            <p style="width: 70%; font-size: 17px; "><?php echo $row2['name']?></p>
          </div>
          <div class="d-flex" style="margin-top: -50px; margin-left: 400px;">
            <p class="" style=" font-size: 17px; margin-right: 5px;"><b>Balance: </b></p>
            <span style="margin-right: 40px;"><b>$<?php echo $row['amount']?></b></span>
          </div>
        </div>
      </div>

        <div class="card-back"  style="font-family: 'Timmana'">
          <form method="post">
          <header class="d-flex">
            <h4 class=" my-3" style=" margin-left: 200px;">Set Password</h4>
          </header>
          <div class="mx-3 ">
            <label class="" style="margin-left: 180px;">Current Password</label>
            <i class="fa fa-question-circle" style="font-size:15px; margin-left: 2px;"
            data-bs-toggle="tooltip" data-bs-placement="top" 
            title="For the First time,We send initial Current Password to your email when you create account 'Check your mail-box'"></i>
            <input type="text" class="text-dark w-100" name="current">
           </div>
          <div class="mx-3 mt-1 d-flex" style="margin-top: -20px;">
           <label class="" style="margin-left: 70px; ">Password</label>
           <label class="" style="margin-left: 160px; ">Confirm-Password</label>
          </div>
          <div class="mt-1 d-flex">
            <input type="text" class="text-dark w-50 mx-3" name="pass" title="4 Digit Only">
            <input type="text" class="text-dark w-50 mx-3" name="con_pass" title="4 Digit Only">
          </div>

          <div class="p-2 mt-3" style="width: 70%;">
           <button type="submit" class="btn bg-warning" name="change" style="margin-left: 150px; width: 200px;"> Change </button>
          </div>
          </form>
        </div>
      </div>
        </div>
      </div>
    </div>
  </div>

          <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 100px; font-family: 'Timmana'">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Transfer Money To CRM Wallet</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post">
          <div class="form-group mt-3 d-flex">
              <label class="mx-2" style="">Account Number</label>
              <label style="margin-left: 130px; fon">Amount</label>
              </div>

              <div class="form-group mt-3 d-flex">
                  <input type="text" name="card_number" class="form-control"style="width:45%" pattern="[0-9 ]{8}"
                   placeholder="" title="Contain only 8 digit" required>
                  <input type="text" name="amount" class="form-control" style="margin-left: 40px; width: 45%;" pattern="^(?:[3-9][0-9]?|[1-4][0-9]{2}|500)$"
                   placeholder="30-500 dollar" title="minimum 30 dollar & maximum 500 dollar" required>
                  </div>

          <div class="form-group mt-3 d-flex">
              <label class="mx-2" style="">First Name</label>
              <label style="margin-left: 170px; ">Last Name</label>
              </div>

              <div class="form-group mt-3 d-flex">
                  <input type="text" name="first_name" class="form-control"style="width:45%" pattern="[A-Za-z ]{3,25}" placeholder="Enter Your Name"
                    title="Contain of lowercase or Uppercase minimum 3 characters" required>
                  <input type="text" name="last_name" class="form-control" style="margin-left: 40px; width: 45%;"  pattern="[A-Za-z ]{3,25}"
                   placeholder="Enter Your Name" title="Contain of lowercase or Uppercase minimum 3 characters" required>
                  </div>

                  <div class="form-group mt-3 d-flex">
                      <label class="mx-2" style="">Wallet Number</label>
                      <label style="margin-left: 150px; ">Security Code</label>
                      <i class="fa fa-question-circle" style="font-size:15px; margin-left: 10px; margin-top: 0px;"
                       data-bs-toggle="tooltip" data-bs-placement="top" 
                       title="4 Digit only."></i>
                      </div>

                      <div class="form-group mt-3 d-flex">
                          <input type="text" name="wallet_number" placeholder="" class="form-control"style="width:45%" 
                           pattern="[0-9 ]{3,8}" placeholder="" title=""
                           value="<?php echo $row['number']?>" readonly>
                          <input type="text" name="security" class="form-control" style="margin-left: 40px; width: 45%;" pattern="[0-9 .]{4}"
                          placeholder="" title="Contain only 4 digit" required>
                          </div>

                 <input class="btn btn-outline-primary w-50 mt-3" style="margin-left: 120px;" value="Transfer" name="transfer" type="submit">
                          
          </form>
          </div>
         
      </div>

    </div>
  </div>
</div>

  <script>
 function showAlert() {

    var alertContainer = document.getElementById("instruction-container");

  
    alertContainer.style.display = "block";

    
  }

      function toggleFlip(card) {
      card.classList.toggle('flipped');
    }

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>

     <!-- ICON -->
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>