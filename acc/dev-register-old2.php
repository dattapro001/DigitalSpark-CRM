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
        $ran_id = rand(time(), 100000000);
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = "uploaded_img/".$image;

        move_uploaded_file($image_tmp_name,$image_folder);

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM developer WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger' style=' border-radius:5px 98px 5px 5px;'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO developer (name, email, d_code, d_pass, d_profile, unique_id) VALUES ('{$name}', '{$email}', '{$code}', '{$password}', '{$image}' , '{$ran_id}')";
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
                    $msg = "<div class='alert alert-danger'style=' border-radius:5px 98px 5px 5px; width: 430px;'>Something wrong went.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger' style=' border-radius:5px 98px 5px 5px; width: 430px;'>Password and Confirm Password do not match</div>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
          body {
            margin: 0;
            padding: 0;
            background: url('images/dev-reg-bg.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .card{
            background: rgba(255, 255, 255, 0);
            box-shadow: 0px 0px 20px 2px #7c7a7a;
            backdrop-filter: blur(20px);
            border-radius: 20px 98px 21px 94px;
            margin-top: 70px; 
            margin-left: 100px; 
            width: 880px; 
            height: 520px;
        }
        label{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
        }
        .input input{
            border:none;
            outline:none;
            border-bottom: 2px solid white;
            width: 250px;
            background: transparent;
            color:white;
            }
          .stop{
        transition: 0.3s;
        }

       .move{
    
        transform: translateX(210%);
     
        }
        .Register a{
            text-decoration: solid;
        }
        .Register a:hover{
            color: rgb(0, 255, 217);
            text-decoration: solid;
            font-size: 1.2rem;
        }
    </style>

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
</head>
<body>
    <div class="container-fluid" style="position: relative;">
        <div class="col-md-12">
            <div class="container col-md-12">
                <div class="row">
                    <!-- Blue background for the text side with rounded right border -->
                    <div class="col-md-6 aqua-bg">
                           <div class="card" style="">
                     <div class="row">
                    <div class="col-md-8" style=" margin-left: -4px; margin-top: -16px; height: 520px;
                     width: 298px;border-radius: 5px 0px 0px 5px;">
                            <h3 class=" mx-4 mt-4 text-light" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Registration</h3>
                           
                             <img src="images/dev-reg-1.png" class="" style="margin-top: 40px;
                             height: 400px; width: 400px;">
                    </div>
                    <div class="col-md-6" style="margin-top: 70px; margin-left: 100px;">
                    <div class="d-flex" style=" width: 460px; height:100px; margin-top:-65px;">
                       <p> 
                        <?php echo $msg; ?>
                       </p>
                       </div>
                        <form class="" method="post" enctype="multipart/form-data" style="position:fixed;">
                        <div class="input mt-3">
                         <label><b>Name:</b></label>
                        <input style="margin-left: 144px;" type="text" class=" name" id="r_name" name="r_name" placeholder="Enter Your Name"
                        title="Contain of lowercase and number minimum 5 characters" required>
                        </div>
                        <div class="input mt-3">
                        <label class=""><b>Email:</b></label>
                        <input style="margin-left: 148px;" type="email" class="email" id="r_email"  name="r_email" placeholder="Enter Your Email" title="example 'mug007@gmail.com'" required>
                        </div>
                        <div class="input mt-3">
                         <label class=""><b>Password:</b></label>
                         <input style="margin-left: 120px;" type="password" class="pass" id="r_pass" name="r_pass" placeholder="Enter Your Password"
                         title="contain 1 digit 1 uppercase 1 lowercase 1 special characters minimum 6 length" required>
                        </div>
                        <div class="input mt-3">
                        <label class=""><b>Confirm-Password:</b></label>
                        <input style="margin-left: 53px;" type="password"  id="r_conpass" name="r_conpass" placeholder="Confirm Your Password"
                         title="contain 1 digit 1 uppercase 1 lowercase 1 special characters minimum 6 length" type="password" required>
                        </div>
                        <div class="input mt-3">   
                        <label class=""><b>Upload Your Image</b></label>
                        <input style="margin-left: 52px;" type="file" class="box" name="image"  accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <div class="input mt-3">
                        <div class="checkbox" style="margin-left: -120px;" >
                        <label for="showPasswordCheckbox">
                        <input type="checkbox"  id="showPasswordCheckbox" onclick="showPassword()">
                        <span class="checkmark"></span>
                         <b style="margin-left: -115px;">Show Password</b>
                        </label>
                        </div>
                        </div>

                        <div class="button mt-4">
                        <input name="submit" class="btn stop" style="background-color: white; width: 140px;" id="submit" value="Register" type="submit"/>
                        </div>
                        <div class="Register mt-5" style="margin-left: 300px ;">
                            <p class="text-light">Have an account! <a href="dev-login.php">Login</a>.</p>
                           </div> 
                           </form>
                    </div>
                  </div>
                  </div>
                        
                    </div>

                    <!-- White background for the image side -->
                    <div class="col-md-8">
                      

                        </div>
                    </div>
                </div>
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
        moveBtn.style.background = "rgb(255, 255, 255,0.7)";
             }
         else{
        button.target.classList.add("stop");
        moveBtn.style.background = "green"
            }
        });
         </script>
      
</body>
</html>