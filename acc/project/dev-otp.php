<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
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
  <title>OTP Panel</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: rgb(2,0,36);
      background: linear-gradient(90deg, rgba(2,0,36,1) 34%, rgba(9,9,121,1) 62%, rgba(0,212,255,1) 100%);
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
            background-color:rgb(251, 246, 252);
            position: relative;
            margin-left: 10px;
            margin-top: 95px;
            background-color: rgba(32, 22, 22, 0.251);
            color: white;
        }
        .otp-container h2{
            font-size: 16.5px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
        
    }
    .OPT-wrapper header{
        font-size: 100px;
        padding: 0px 160px;
        border-color: bisque;
        
    }
    .OPT-wrapper h4{
        padding: 0px 70px;
    
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        
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
    }
    .verify-button {  
      padding: 10px 30px;/*  bottom and right  */
      font-size: 16px;
      border-radius: 5px;
      border: 3px solid #ccc;
      cursor: pointer;
      margin: 20px 40px;
      font-size: 20px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
    
  <div class="otp-container">
      
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
                  <h4><b>Enter 4 Digit OTP Code</b></h4>
                  
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
