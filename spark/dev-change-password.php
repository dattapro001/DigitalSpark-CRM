<?php

$msg = "";

include 'config.php';

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM developer WHERE d_code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password =  $_POST['c_pass'];
            $confirm_password = $_POST['c_conpass'];

            if ($password === $confirm_password) {
                $query = mysqli_query($conn, "UPDATE developer SET d_pass='{$password}', d_code='' WHERE d_code='{$_GET['reset']}'");

                if ($query) {
                    echo "<script> alert('Password Changed Succesfully. Login Now!!') </script>"; 
                    echo "<script>location.href='dev-login.php'</script>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Reset Link do not match.</div>";
    }
} else {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>DigitalSpark CRM</title>
    <link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>

    <script>
            function showPassword() {
      var passwordInput = document.getElementById("c_pass");
      var confirmpasswordInput = document.getElementById("c_conpass");
      if (document.getElementById("showPasswordCheckbox").checked) {
        confirmpasswordInput.type = "text";
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
        confirmpasswordInput.type="password";
      }
    }

    </script>
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
        form{
            background: #fff;
            padding : 15px;
            box-shadow: 0px 0px 10px 0px;
            border-radius : 10px;
            width:800px;
            height: 400px;
            position: relative;
            display:flex;
            margin-left: -180px;
            margin-top: 90px;
            background-color: rgba(32, 22, 22, 0.5);
            color: white;
            font-family:'Timmana';
        }
        img{
            width: 350px;
            height: 390px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius:10px;
            position:relative;
        
        }
        .btn-outline-primary{
            color: yellowgreen;
        }
        .button .btn{
            margin-top: 20px;
            margin-left: 20px;  
            border-color:black;
            color: palevioletred;
            font-family:'Timmana';
            font-size: 20px;
        }
        .mb-3{
            font-family:'Timmana';
            width:270px;
            margin-top:-20px
        }
        .mb-3 h2{
            font-family:'Timmana';
            width:300px;
            margin-top: 10px;
            margin-left:100px;
        }
        .mb-3 p{
            font-family:'Timmana';
            width:300px;
            margin-top: 10px;
            font-size: 10px
        }
        .input2{
            margin-left: -260px;
            margin-top: 110px;
            width: 320px;
            font-family:'Timmana';
        }
        .input4{
            margin-top: 180px;
            margin-left: -320px;
            width: 320px;
            font-family:'Timmana';
        }
        .input5{
            margin-top: 250px;
            margin-left: -320px;
            font-family:'Timmana'; 
        }
        .login{
            margin-top: 10px;
            margin-left: 100px;  
            font-family:'Timmana';
        }
        .login p{
            font-family:'Timmana';f;
            font-size: 1.2rem;
        }
        .login a{
            text-decoration: solid;
            font-family:'Timmana';
        }
        .login a:hover{
            color:  palevioletred;
            text-decoration: solid;
            font-size: 1.3rem;
            font-family:'Timmana';
        }
        .input2 input{
            border-color: rgb(152, 105, 118);
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118);
            width:250px;
            background: transparent;
            color:white;
            font-family:'Timmana';
        }
        .input4 input{
            border-color: rgb(152, 105, 118);
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118);
            width:250px;
            background: transparent;
            color:white;
            font-family:'Timmana';
        }
        .input5 a {
            text-decoration:none;
            font-family:'Timmana';
        }
        .input2 h6{
            font-family:'Timmana';
            color: palevioletred;
        }
        .input4 h6{
            font-family:'Timmana';;
            color:  palevioletred;
        }
        .input5 .checkbox{
            font-family:'Timmana';
            color:  palevioletred;
        }


      
        .stop{
        transition: 0.3s;
        }

       .move{
    
        transform: translateX(220%);
     
        } 

    </style>
</head>
<body>
   
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-4 col-md-6 col-sm-12">
            <form action="" method="post">
                    <img src="images/dev-cng-bg.png"> 
                    <div class="mb-3">
                    <h2>Change Password</h2>
                    <p style="font-family:'Timmana'; font-size: 13px;"> 
                    <?php echo $msg; ?>
                    </p>
                    </div>
                       <div class="input2">
                        <h6><b>Password:</b></h6> 
                         <input type="email" class="pass" id="c_pass"  name="c_pass" placeholder="Enter Your Email" value=""
                          title="example 'mug007@gmail.com'" required>
                        </div>
                        <div class="input4">   
                            <h6> <b>Confirm-Password:</b></h6>
                           <input type="password" class="conpass" id="c_conpass" name="c_conpass" placeholder="Enter Your Confirm Password" 
                           title="contain 1 digit 1 uppercase 1 lowercase 1 special characters minimum 6 length" type="password" required>
                           </div>
                        <div class="input5">
                            <div class="checkbox">
                        <label for="showPasswordCheckbox">
                        <input type="checkbox"  id="showPasswordCheckbox" onclick="showPassword()">
                        <span class="checkmark"></span>
                         <b>Show Password</b>
                        </label>
                        </div>
                        <div class="button">
                        <input name="submit" class="btn btn-outline-primary stop" id="submit" value="Change" type="submit"/>
                         </div>
                       <div class="login">
                        <p>Back To! <a href="dev-login.php">Login</a>.</p>
                       </div> 
                    </form>
                </div>
           </div>
       </div>

       <script>
        const moveBtn = document.getElementById("submit");
        const button = document.querySelector("button");

        const passwordInput= document.querySelector(".pass");
        const confirmpasswordInput = document.querySelector(".conpass");

        moveBtn.addEventListener('mouseover',(button)=>{  
        let password = passwordInput.value;
        let confirmpassword = confirmpasswordInput.value;

        let passRegex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}/
        let conpassRegex  = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}/;

         let validate = passRegex.test(password) && conpassRegex.test(confirmpassword)

        if(!validate){ 
      button.target.classList.toggle("move");
      moveBtn.style.background = "DarkMagenta";
           }
       else{
      button.target.classList.add("stop");
      moveBtn.style.background = "gold";
          }
      });
       </script>
</body>
</html>