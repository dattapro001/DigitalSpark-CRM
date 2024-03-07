<?php
    //Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
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

        $query = mysqli_query($conn, "SELECT * FROM suspend WHERE email = '$email'");
        $row = mysqli_fetch_assoc($query);

        move_uploaded_file($image_tmp_name,$image_folder);

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM details WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert' style='background-color: rgb(0, 255, 128);'>{$email} - This email address has been already exists.</div>";

        }elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ban WHERE email='{$email}'")) > 0){
            $msg = "<div class='alert' style='background-color: rgb(0, 255, 128);'>{$email} - This email address has been Parmanently Benned.</div>";
        
        }elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM suspend WHERE email='{$email}'")) > 0){
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been Suspended For next ".$row['suspend_date']."</div>";
        }else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO details (name, email, d_code, d_pass, d_profile, unique_id) VALUES ('{$name}', '{$email}', '{$code}', '{$password}', '{$image}' , '{$ran_id}')";
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
                        $mail->Password   = 'nbvj hies vxlt dxvx';                               //SMTP password
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
                    header("Location: otp.php");
                } else {
                    $msg = "<div class='alert alert-danger'style=' border-radius:5px 98px 5px 5px; width: 430px;'>Something wrong went.</div>";
                }
            } else {
                $msg = "<div class='alert' style='background-color: rgb(0, 255, 128); '>Password and Confirm Password do not match</div>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Links -->
    <link href='https://fonts.googleapis.com/css?family=Salsa' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Spicy Rice' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Squada One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Suez One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>
    <title>CRM</title>

    <style>
        input {
            border: none;
            outline: none;
            border-bottom: 2px solid rgb(2, 169, 105);
            width: 250px;
            background: transparent;
            color: rgb(0, 0, 0);
        }
        
        .log b:hover{
            color: rgb(6, 151, 79); 
        }

        .stop {
            transition: 0.3s;
            background-color: rgb(0, 255, 128);
        }

        .move {
            transform: translateX(180%);
        }
    </style>

        <script>
            function showPassword() {
        var passwordInput = document.getElementById("pass");
        var confirmPasswordInput = document.getElementById("con-pass");
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
    <img src="img/rego.svg" style="z-index: -1; position: fixed;  height: 750px; width: 1000px; margin-left: 400px;">
    <div class="" style=" z-index: 3; width: 650px; margin-left: 50px; height: 30px;"><b><?php echo $msg ?></b></div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img src="img/repo.svg" class="" style="width: 500px; height: 400px; margin-left: 600px; z-index: 0; margin-top: 150px;">
            </div>
            
            <div class="col-md-6">
            <form method="post" enctype="multipart/form-data">
                    <div class="container-fluid" style="margin-left: -690px; margin-top: -130px;">
                        <img src="img/avatar.svg" style="width: 100px; height: 100px; margin-left: 300px; margin-top: 150px;">
                        <p class=" mt-3" style="margin-left: 260px; font-size: 18px; font-family: 'Timmana'"><b>Developer </b> <a href="dev-login.php" style="text-decoration: none;" class="log text-dark"><b>Login</b></a> <b> / </b><a href="" class="text-dark" style="text-decoration: none; font-size: 18px;"><b style="color: rgb(6, 151, 79);">Register</b></a></p>
                        
                        <div class="input mt-2" style="margin-left: 220px;">

                         <div class="">
                           <label><i class="fa fa-user" style="position:absolute; margin-top: 0px; color: rgb(0, 255, 128);"><span class="mx-2 mt-2 text-dark" style="font-size: 16px; font-family: 'Timmana'">Name</span></i></label><br>
                           <input type="text" class="name" name="r_name" pattern="^[A-Za-z ]+$" title="Contain Only characters" required  >
                           </div>

                           <div class="mt-2">
                            <label><i class="fa fa-envelope" style="position:absolute; margin-top: 0px; color: rgb(0, 255, 128);"><span class="mx-2 mt-2 text-dark" style="font-size: 16px; font-family: 'Timmana'">Email</span></i></label><br>
                            <input type="text" class="email" name="r_email" pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$" title="e.g. mug001@gmail.com" required   >
                            </div>

                            <div class="mt-2">
                                <label><i class="fa fa-lock" style="position:absolute; margin-top: 0px; color: rgb(0, 255, 128);"><span class="mx-2 mt-2 text-dark" style=" font-size: 16px;font-family: 'Timmana'">Password</span></i></label><br>
                                <input type="password" class="pass" name="r_pass" id="pass" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}" title="contain 1 digit 1 uppercase 1 lowercase 1 special charecter
                                 minimum 6 length" required>
                                </div>

                                <div class="mt-2">
                                    <label><i class="fa fa-lock" style="position:absolute; margin-top: 0px; color: rgb(0, 255, 128);"><span class="mx-2 mt-2 text-dark" style=" font-size: 16px; font-family: 'Timmana'">Confirm-Password</span></i></label><br>
                                    <input type="password" class="" name="r_conpass" id="con-pass" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}" title="contain 1 digit 1 uppercase 1 lowercase 1 special charecter
                                    minimum 6 length" required>
                                    </div>

                                    <div class="mt-2">
                                        <label><i class="fa fa-file-text" style="position:absolute; margin-top: 0px; color: rgb(0, 255, 128);"><span class="mx-2 mt-2 text-dark" style="font-size: 16px;font-family: 'Timmana'">Profile-Image</span></i></label><br>
                                        <input  type="file" class="box mt-2" name="image"  accept="image/jpg, image/jpeg, image/png" required>
                                        </div>

                                        <div class="input">
                                            <div class="checkbox" style="margin-left: -120px;" >
                                            <label for="showPasswordCheckbox">
                                            <input type="checkbox"  id="showPasswordCheckbox" onclick="showPassword()">
                                            <span class="checkmark"></span>
                                             <span style="margin-left: -115px; font-size: 16px; font-family: 'Timmana'">Show Password</span>
                                            </label>
                                            </div>
                                            </div>

                            <div class="button">
                                <input type="submit" class="btn mt-1 stop" name="submit" id="submit" value="Register" style="border-radius: 20px; width: 100px; background-color: rgb(0, 255, 128); font-family: 'Timmana'">
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const moveBtn = document.getElementById("submit");
        const emailInput = document.querySelector(".email");
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
      moveBtn.style.background = "red";
           }
       else{
      button.target.classList.add("stop");
      moveBtn.style.background = "rgb(0, 255, 128);" ;
          }
      });
    </script>
</body>
</html>
