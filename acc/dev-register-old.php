

<?php
    //Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: welcome.php");
        die();
    }

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    include 'config.php';
    $msg = "";

    if (isset($_POST['submit'])) {
        $name = $_POST['r_name'];
        $email = $_POST['r_email'];
        $password = $_POST['r_pass'];
        $confirm_password = $_POST['r_conpass'];
        $code = rand(1111,9999);
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = "uploaded_img/".$image;

        move_uploaded_file($image_tmp_name,$image_folder);

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM developer WHERE d_email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO developer (d_name, d_email, d_code, d_pass, d_profile) VALUES ('{$name}', '{$email}', '{$code}', '{$password}', '{$image}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
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
                        $mail->Body    = 'Your OTP Code is: '.$code.'';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    header("Location: dev-otp.php");
                } else {
                    $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
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
      var confirmPasswordInput = document.getElementById("r_conpass");
      if (document.getElementById("showPasswordCheckbox").checked) {
        passwordInput.type = "text";
        confirmPasswordInput.type = "text";
      } else {
        passwordInput.type = "password";
        confirmPasswordInput.type = "password";
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
            width:900px;
            height: 600px;
            background-color:rgb(251, 246, 252);
            position: relative;
            display:flex;
            margin-left: -190px;
            margin-top:50px;
            background-color: rgba(32, 22, 22, 0.251);
            color: white;
        }
        img{
            width: 500px;
            height: 590px;
            margin-top: -10px;
            margin-left: -10px;
            position:relative;
            border-radius:10px;
        
        }
        .btn-outline-primary{
            color: rgb(103, 12, 128);
        }
        .button .btn{
            margin-top: 500px;
            margin-left: -130px;  
            border-color: rgb(174, 7, 221);;
            color:aqua;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 20px;
        }
        .mb-3{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width:300px;
            margin-top:-35px
        }
         h2{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width:300px;
            margin-top: 25px;
            margin-left:100px;
        }
        .mb-3 p{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width:300px;
            margin-top: 10px;
            font-size: 10px
        }
        .input1{
            margin-left: -300px;
            margin-top: 130px;
            width: 270px;
            
        }
        .input2{
            margin-left: -268px;
            margin-top: 195px;
            width: 270px;
        }
        .input3{
            margin-top: 265px;
            margin-left: -270px;
            width: 270px;
        }
        .input4{
            margin-top: 335px;
            margin-left: -270px;
            width: 270px;
        }
        .input5{
            margin-top: 400px;
            margin-left: -270px;
            width: 270px;
        }
        .input6{
            margin-top: 470px;
            margin-left: -270px; 
        }
        .login{
            margin-top: 550px;
            margin-left: -70px;  
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
        .input1 input{
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118);
            width: 250px;
            background: transparent;
            color:white; 
            margin-left:10px;
        }
        .input2 input{
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118);
            width: 250px;   
            background: transparent;
            color:white;
            margin-left:10px;
              }
        .input3 input{
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118);
            width: 250px;
            background: transparent;
            color:white;
            margin-left:10px;
                 }
        .input4 input{
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118);
            width: 250px; 
            background: transparent;
            color:white;
            margin-left:10px;       
         }
         .input5 input{
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118);
            width: 250px; 
            background: transparent;
            color:white;
            margin-left:10px;       
         }
        .input6 input{
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(152, 105, 118); 
            background: transparent;
            color:white;
            margin-left:10px;     
          }
        .input1 h6{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:aqua;
            margin-left:10px;
        }
        .input2 h6{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:aqua;
            margin-left:10px;
        }
        .input3 h6{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:aqua;
            margin-left:10px;
        }
        .input4 h6{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:aqua;
            margin-left:10px;
        }
        .input5 h6{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:aqua;
            margin-left:10px;
        }
        .input6 .checkbox{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:aqua;
            margin-left:10px;
        }


         form input[type="submit"]:hover{
         cursor: pointer;
         justify-content: center;
         content: "No Cheating!";
         
         }
        .stop{
        transition: 0.3s;
        }

       .move{
    
        transform: translateX(200%);
     
        } 

    </style>
</head>
<body>
   
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-4 col-md-6 col-sm-12">
            <form action="" method="post" enctype="multipart/form-data">
                    <img src="images/dev-register.jpg"> 
                    <div class="mb-3">
                    <h2>Register</h2>
                    <p> 
                    <?php echo $msg; ?>
                    </p>
                    </div>
                        <div class="input1">
                        <h6><b>Name:</b></h6> 
                        <input type="text" class=" name" id="r_name" name="r_name" placeholder="Enter Your Name"
                         title="Contain of lowercase and number minimum 5 characters" required>
                        </div>
                       <div class="input2">
                        <h6><b>Email:</b></h6> 
                         <input type="email" class=" email" id="r_email"  name="r_email" placeholder="Enter Your Email"
                           title="example 'mug007@gmail.com'" required>
                        </div>
                       <div class="input3">
                        <h6><b>Password:</b></h6> 
                        <input type="password" class="pass" id="r_pass" name="r_pass" placeholder="Enter Your Password" 
                         title="contain 1 digit 1 uppercase 1 lowercase 1 special characters minimum 6 length" type="password" required>
                         </div>   
                        <div class="input4">   
                         <h6> <b>Confirm-Password:</b></h6>
                        <input type="password"  id="r_conpass" name="r_conpass" placeholder="Confirm Your Password"
                         title="contain 1 digit 1 uppercase 1 lowercase 1 special characters minimum 6 length" type="password" required>
                        </div>
                        <div class="input5">   
                         <h6> <b>Upload Your IMage</b></h6>
                        <input type="file" class="box" name="image"  accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <div class="input6">
                            <div class="checkbox">
                        <label for="showPasswordCheckbox">
                        <input type="checkbox"  id="showPasswordCheckbox" onclick="showPassword()">
                        <span class="checkmark"></span>
                         <b>Show Password</b>
                        </label>
                        </div>
                        </div>
                        <div class="button">
                        <input name="submit" class="btn btn-outline-primary stop" id="submit" value="Register" type="submit"/>
                         </div>
                       <div class="login">
                        <p>Have an account! <a href="dev-login.php">Login</a>.</p>
                       </div> 
                    </form>
                </div>
           </div>
       </div>

       <script>
        const moveBtn = document.getElementById("submit");
        const button = document.querySelector("button");

        const emailInput= document.querySelector(".email");
        const passwordInput = document.querySelector(".pass");
        const nameInput  = document.querySelector(".name");

        moveBtn.addEventListener('mouseover',(button)=>{
        let name = nameInput.value;    
        let email = emailInput.value;
        let password = passwordInput.value;

        let nameRegex = /^[A-Za-z ]+$/ ;
        let emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        let passRegex  = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}/;

         let validate = emailRegex.test(email) && passRegex.test(password) && nameRegex.test(name)

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