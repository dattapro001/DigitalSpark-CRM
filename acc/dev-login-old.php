<?php
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: welcome.php");
        die();
    }

    include 'config.php';
    $msg="";
    
   

    if (isset($_POST['submit'])) {
        $email = $_POST['l_email'];
        $password = $_POST['l_password'];

        $sql = "SELECT * FROM developer WHERE d_email='{$email}' AND d_pass='{$password}'";
        $result = mysqli_query($conn, $sql);
         
        //user identify
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['d_id'];
            $_SESSION['unique_id'] = $row['unique_id'];
            $_SESSION['SESSION_EMAIL'] = $email;
            $status = "Active";
            $sql2 = mysqli_query($conn, "UPDATE details SET active_status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            header("Location:dev-profile-1.php");

        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
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
    <title>Document</title>
    <script>
            function showPassword() {
      var passwordInput = document.getElementById("r_pass");
      if (document.getElementById("showPasswordCheckbox").checked) {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }

    </script>
    <style>
        body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 34%, rgba(9,9,121,1) 62%, rgba(0,212,255,1) 100%);
        }
        form{
            background: #fff;
            padding : 15px;
            box-shadow: 0px 0px 10px 0px;
            border-radius : 10px;
            width:800px;
            height: 400px;
            background-color:rgb(251, 246, 252);
            position: relative;
            display:flex;
            margin-left: -150px;
            margin-top: 180px;
            background-color: rgba(32, 22, 22, 0.251);
            color: white;
        }
        img{
            width: 360px;
            height: 395px;
            margin-top: -12px;
            margin-left:-12px;
            position:relative;
        
        }
        .btn-outline-primary{
            color: yellowgreen;
        }
        .button .btn{
            margin-top: 290px;
            margin-left: -120px;  
            border-color:black;
            color:chartreuse;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 20px;
        }
        .mb-3{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width:270px;
            margin-top:-20px
        }
        .mb-3 h2{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width:300px;
            margin-top: 10px;
            margin-left:100px;
        }
        .mb-3 p{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width:300px;
            margin-top: 10px;
            font-size: 10px
        }
        .input2{
            margin-left: -270px;
            margin-top: 110px;
            width: 265px;
        }
        .input3{
            margin-top: 180px;
            margin-left: -264px;
            width: 265px;
        }
        .input5{
            margin-top: 250px;
            margin-left: -260px; 
        }
        .login{
            margin-top: 350px;
            margin-left: -120px;  
        }
        .login p{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 1.2rem;
        }
        .login a{
            text-decoration: solid;
        }
        .login a:hover{
            color: green;
            text-decoration: solid;
            font-size: 1.3rem;
        }
        .input2 input{
            border:none;
            outline:none;
            border-bottom: 2px solid darkgoldenrod;
            width: 250px;
            background: transparent;
            color:white;
            margin-left:10px;
             }
        .input3 input{
            border:none;
            outline:none;
            border-bottom: 2px solid darkgoldenrod;
            width: 250px;
            background: transparent;
            color:white;
            margin-left:10px;
        }
        .input5 a {
            text-decoration:none;
            margin-left:10px;
        }
        .input2 h6{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: yellowgreen;
            margin-left:10px;
        }
        .input3 h6{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: yellowgreen;
            margin-left:10px;
        }
        .input5 .checkbox{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: yellowgreen;
            margin-left:10px;
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
            <form action="
            " method="post">
                    <img src="images/dev-login.jpg"> 
                    <div class="mb-3">
                    <h2>Login</h2>
                    <p> 
                    <?php echo $msg; ?>
                    </p>
                    </div>
                       <div class="input2">
                        <h6><b>Email:</b></h6> 
                         <input type="email" class=" email" id="l_email"  name="l_email" placeholder="Enter Your Email" title="example 'mug007@gmail.com'"required>
                        </div>
                       <div class="input3">
                        <h6><b>Password:</b></h6> 
                        <input type="password" class="pass" id="l_password" name="l_password" placeholder="Enter Your Password"
                         title="contain 1 digit 1 uppercase 1 lowercase 1 special characters minimum 6 length" required>
                         </div>   
                        <div class="input5">
                       <h6><b> <a href="dev-forgot-password.php">Forgot Password</a></b></h6>
                        </div>
                        <div class="button">
                        <input name="submit" class="btn btn-outline-primary stop" id="submit" value="Login" type="submit"/>
                         </div>
                       <div class="login">
                        <p>Don't Have Account? <a href="dev-register.php">Register</a>.</p>
                       </div> 
                    </form>
                </div>
           </div>
       </div>

       <script>
        const moveBtn = document.getElementById("submit");
        const button = document.querySelector("button")
        const emailInput= document.querySelector(".email");
        const passwordInput = document.querySelector(".pass");

        moveBtn.addEventListener('mouseover',(button)=>{  
        let email = emailInput.value;
        let password = passwordInput.value;

        let emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        let passRegex  = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}/;

         let validate = emailRegex.test(email) && passRegex.test(password)

        if(!validate){ 
      button.target.classList.toggle("move");
      moveBtn.style.background = "DarkMagenta";
           }
       else{
      button.target.classList.add("stop");
      moveBtn.style.background = "green"
          }
      });
       </script>
</body>
</html>