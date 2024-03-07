<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = $_POST['f_email'];
    $code = rand(1111,9999);

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM details WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE details SET code='{$code}' WHERE email='{$email}'");

        if ($query) {        
            echo "<div style='display: none;'>";
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'rontheboss00797@gmail.com';                     //SMTP username
                $mail->Password   = 'uxjumadnkqvsauvi';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; 

                //Recipients
                $mail->setFrom('rontheboss00797@gmail.com');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'DigitalSpark CRM';
                $mail->Body    = 'Here is the verification link <b><a href="http://localhost/acc/change-password.php?reset='.$code.'">http://localhost/acc/change-password.php?reset='.$code.'</a></b>';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";        
            $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
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
    <title>DigitalSpark CRM</title>
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
            background: rgb(3,33,93);
            background: linear-gradient(90deg, rgba(3,33,93,1) 31%, rgba(109,9,121,1) 100%, rgba(0,212,255,1) 100%); 
        }
        form{
            background: #fff;
            padding : 15px;
            box-shadow: 0px 0px 10px 0px;
            border-radius : 10px;
            width:880px;
            height: 400px;
            background-color:rgb(251, 246, 252);
            position: relative;
            display:flex;
            margin-left: -190px;
            margin-top: 160px;
            background-color: rgba(32, 22, 22, 0.251);
            color: white;
        }
        img{
            width: 400px;
            height: 390px;
            margin-top: -10px;
            margin-left:-12px;
            position:relative;
            border-radius:10px;
        
        }
        .btn-outline-primary{
            color: yellowgreen;
        }
        .button .btn{
            margin-top: 230px;
            margin-left: -400px;  
            border-color:black;
            color:chartreuse;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 20px;
            width: 170px;
        }
        .mb-3{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            margin-top:-70px;
            margin-left: 20px;
            width: 400px
        }
        .mb-3 h2{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width:300px;
            margin-top: 70px;
            margin-left: 100px;
        }
        .mb-3 p{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width:300px;
            margin-top: 10px;
            font-size: 10px
        }
        .login{
            margin-top: 330px;
            margin-left: -250px;  
        }
        .login p{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 1.3rem;
        }
        .login a{
            text-decoration: solid;
        }
        .login a:hover{
            color: green;
            text-decoration: solid;
            font-size: 1.3rem;
        }
        .input2{
            margin-left: -400px;
            margin-top: 140px;
            width: 400px;
        }
        .login a{
            text-decoration: solid;
        }
        .login a:hover{
            color: green;
            text-decoration: solid;
            font-size: 1.4rem;
        }
        .input2 input{
            border-color: rgb(152, 105, 118);
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118);
            width:250px;
            background: transparent;
            color:white;
        }
        .input2 h6{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: aqua;
            font-size: 1.3rem;
        }


         form input[type="submit"]:hover{
         cursor: pointer;
         justify-content: center;
         content: "No Cheating!";
         
         }
        .stop{
        transition: 0.2s;
        }

       .move{
    
        transform: translateX(150%);
     
        } 

    </style>
</head>
<body>
   
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-4 col-md-6 col-sm-12">
            <form action="" method="post">
                    <img src="images/client-forgot-password.jpg"> 
                    <div class="mb-3">
                    <h2>Forgot Password</h2>
                    <p> 
                    <?php echo $msg; ?>
                    </p>
                    </div>
                       <div class="input2">
                        <h6><b>Email:</b></h6> 
                         <input type="email" class="email" id="l_email"  name="f_email" placeholder="Enter Your Email"
                          title="example 'mug007@gmail.com'" required>
                        </div>
                        <div class="button">
                            <input name="submit" class="btn btn-outline-primary stop" id="submit" value="Send Reset Link" type="submit"/>
                             </div>
                             <div class="login">
                                <p>Back To!<a href="login.php">Login</a></p>
                               </div> 
                    </form>
                </div>
           </div>
       </div>

       <script>
        const moveBtn = document.getElementById("submit");
        const button = document.querySelector("button");

        const emailInput= document.querySelector(".email");

        moveBtn.addEventListener('mouseover',(button)=>{  
        let email = emailInput.value;

        let emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

         let validate = emailRegex.test(email) 

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