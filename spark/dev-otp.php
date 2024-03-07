<?php

session_start();

if (isset($_SESSION['unique_id'])) {
    header("Location: index.php");
    die();
}

include 'config.php';
$msg = "<div class='alert alert-warning' style='border-radius:10px;'>We've send OTP Code on your email address.</div>";

if (isset($_POST['verify'])) {
$otp_input = $_POST['otp_input'];
$sql = "SELECT * FROM developer WHERE d_code='{$otp_input}'";


$result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result)) {
     echo "<script> alert('Account Verify Succesfully. Login Now!!') </script>"; 
     $query = mysqli_query($conn, "UPDATE developer SET d_code='' WHERE d_code='{$otp_input}'");
     echo "<script>location.href='dev-login.php'</script>";
}  else{
    $msg = "<div class='alert alert-danger'>Oops! You've entered Wrong otp. Try Again</div>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- For icon -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <title>DigitalSpark CRM</title>
  <link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>
  <style>
      body {
            margin: 0;
            padding: 0;
            background: url('img/man-bg1.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    :root{
      --persian-rose: hsl(328, 100%, 59%);
    }
    form{
            background: #fff;
            padding : 15px;
            box-shadow: 0px 0px 10px 0px;
            border-radius : 40px;
            width:420px;
            height: 440px;
            position: relative;
            margin-left: 10px;
            margin-top: 95px;
            background-color: rgba(32, 22, 22, 0.251);
            color: white;
            font-family:'Timmana';
        }
        .otp-container h2{
            font-size: 16.5px;
            font-family:'Timmana';
            margin-top:-5px;
        }
      
    .OPT-wrapper{
        background-color:var(--persian-rose);
        margin-top: -10px;
        margin-left: -15px;
        width: 420px;
        height: 372px;
        border-radius: 40px;
        position: absolute;
        font-family:'Timmana';
        
    }
    .OPT-wrapper header{
        font-size: 100px;
        padding: 0px 160px;
        border-color: bisque;
        
    }
    .OPT-wrapper h4{
        padding: 0px 70px;
    
        font-family:'Timmana';
        
    }
    .otp-input {
      width: 100px;
      height: 40px;
      font-size: 20px;
      outline: none;
      border: 1px solid #ccc;
      border-radius: 5px;
      border-color: rgb(209, 231, 6);
      margin-top: 40px;
      margin-left:0px;
      font-family:'Timmana';
    }
    .verify-button {  
      padding: 10px 30px;/*  bottom and right  */
      font-size: 16px;
      border-radius: 5px;
      border: 3px solid #ccc;
      cursor: pointer;
      margin: 20px 40px;
      font-size: 20px;
      font-family:'Timmana';
    }
    .stop{
        transition: 0.4s;
        }

       .move{
        transform: translateX(220%);
     
        } 
  </style>
</head>
<body>
    
  <div class="otp-container" style="margin-left: 400px;">
      
    <form action="" method="post">
        <h2>
        <b> 
        <?php echo $msg; ?>
  </b>
        </h2>
        <div class="OPT-wrapper">
            <header>
                <i class="bx bxs-check-shield"></i>
              </header>
                  <h4 class="mx-4"><b>Enter 4 Digit OTP Code</b></h4>
                  
        <div class="row justify-content-center">
        <input type="text" class="otp-input number" name="otp_input" maxlength="4">
        </div>
        <input type="submit" name="verify" id="submit" class="btn btn-outline-warning verify-button stop"  value="Verify"/>
    </div>
    </form>
  </div>
  <script>
        const moveBtn = document.getElementById("submit");
        const inputs = document.querySelector(".input"),
              button = document.querySelector("button");

        const numberInput= document.querySelector(".number");
      

        moveBtn.addEventListener('mouseover',(button)=>{  
        let number = numberInput.value;

        let numberRegex = /^[0-9]{4}$/;

         let validate = numberRegex.test(number)

        if(!validate){ 
      button.target.classList.toggle("move");
      
           }
       else{
      button.target.classList.add("stop");
      moveBtn.style.background = "green"
          }
      });
       </script>

</body>
</html>
