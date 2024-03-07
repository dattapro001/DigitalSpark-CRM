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

        $sql = "SELECT * FROM admin WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);
         
        //user identify
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['unique_id'] = $row['unique_id'];
            $_SESSION['SESSION_EMAIL'] = $email;
            header("Location: admin-page.php");

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('images/admin-log-bg.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .card{
            margin-top: 160px;
            margin-left: 260px;
            width: 700px; 
            height: 340px; 
            background: rgba(255, 255, 255, 0);
            box-shadow: 0px 0px 25px 2px #7c7a7a;
            backdrop-filter: blur(70px);
            border-radius: 20px 98px 21px 94px;
        }
        label{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
            font-size: 16px;
        }
        .input input{
            border:none;
            outline:none;
            border-bottom: 2px solid rgb(1, 1, 1);
            width: 250px;
            background: transparent;
            color:white;
           
        }
        .stop{
        transition: 0.3s;
        }
       .move{
        transform: translateX(180%);
        } 
    </style>
    <title>DigitalSpark CRM</title>
</head>
<body>
    <!-- Your content goes here -->
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                    <h3 class="mx-3 text-light" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Admin</h3>
                          <img src="images/admin-1.png" style="height: 320px; margin-top:-20px; width: 350px;">
                    </div>
                    <div class="col-md-6">
                    <div class="d-flex" style="height: 70px; margin-top: 20px;">
                       <p> 
                        <?php echo $msg; ?>
                       </p>
                       </div>
                        <form method="post" style="margin-top: -10px; position:fixed;">
                            <div class="input mt-5">
                                <label class="" style=""><b>Email</b></label><br>
                                <input type="email" class="email" id="l_email" name="l_email" placeholder="Enter Your Email" title="example 'mug007@gmail.com'">
                            </div>
                            <div class="input mt-2">
                                <label class=""><b>Password</b><br>
                                    <input type="password" class="pass" id="l_password" name="l_password" placeholder="Enter Your Password"
                                    title="contain 1 digit 1 uppercase 1 lowercase 1 special characters minimum 6 length" required>
                                </label>
                            </div>
                            <div class="button mt-4">
                                <input name="submit" class="btn btn-outline-primary text-light stop" id="submit" value="Login" type="submit"
                                style="background-color: rgb(7, 64, 83); width: 90px;"/>
                            </div>
                        </form>
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
    
            moveBtn.addEventListener('mouseover',(button)=>{  
            let email = emailInput.value;
            let password = passwordInput.value;
    
            let emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
            let passRegex  = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}/;
    
             let validate = emailRegex.test(email) && passRegex.test(password)
    
            if(!validate){ 
          button.target.classList.toggle("move");
          moveBtn.style.background = "rgb(7, 64, 83,0.1)";
               }
           else{
          button.target.classList.add("stop");
          moveBtn.style.background = "rgb(2, 127, 71)"
              }
          });
           </script>
</body>
</html>