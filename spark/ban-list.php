<?php 
  //Import PHPMailer classes into the global namespace
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
include 'config.php';
$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
$function = $_GET['action'];
$query = mysqli_query($conn, "SELECT * FROM details WHERE unique_id = '$user_id'");
$row = mysqli_fetch_assoc($query);

$query2 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$user_id'");
$row2 = mysqli_fetch_assoc($query2);

   //Load Composer's autoloader
   require 'vendor/autoload.php';
   $msg = "";
   $msg2 = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    $action = $_POST['action'];
    $whom = $_POST['function'];


    if($whom == "client"){ 

    if($action == "ban"){
        $sql = "INSERT INTO ban (name, email, reason, status, date, function) VALUES ('{$name}', '{$email}', '{$text}', '{$action}', (DATE(CURRENT_TIMESTAMP)), '{$whom}')";
        $result = mysqli_query($conn, $sql);
        $deleteQuery = "DELETE FROM `details` WHERE unique_id = '$user_id'";
        $done = mysqli_query($conn, $deleteQuery);

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
                $mail->Body    = 'For '.$text.' Your Account has been parmanently Banned From our website';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo '<script> alert("Successfully Banned.");
             window.location.href = "admin-page.php";
              </script>';
        } else {
            $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
        }
       }else if($action == 'suspend'){
        $day = $_POST['day'];
        $sql2 = "INSERT INTO suspend (name, email, reason, suspend_date, status, date, function, unique_id) VALUES ('{$name}', '{$email}', '{$text}', '{$day}', '{$action}', (DATE(CURRENT_TIMESTAMP)), '{$whom}', '{$user_id}')";
        $result2 = mysqli_query($conn, $sql2);
        $query = mysqli_query($conn, "UPDATE details SET status='suspend' , suspend_date='$day' WHERE unique_id='{$user_id}'");
        if ($result2) {
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
                $mail->Body    = 'For '.$text.'  Your Account has been Suspended For next '.$day.'';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo '<script> alert("Successfully Suspended.");
               window.location.href = "admin-page.php";
              </script>';
        } else {
            $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
        }
    }

}elseif($whom == "developer"){

    if($action == "ban"){
        $sql = "INSERT INTO ban (name, email, reason, status, date, function) VALUES ('{$name}', '{$email}', '{$text}', '{$action}', (DATE(CURRENT_TIMESTAMP)), '{$whom}')";
        $result = mysqli_query($conn, $sql);
        $deleteQuery = "DELETE FROM `developer` WHERE unique_id = '$user_id'";
        $done = mysqli_query($conn, $deleteQuery);

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
                $mail->Body    = 'For '.$text.' Your Account has been parmanently Banned From our website';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo '<script> alert("Successfully Banned.");
             window.location.href = "admin-page.php";
              </script>';
        } else {
            $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
        }
       }else if($action == 'suspend'){
        $day = $_POST['day'];
        $sql2 = "INSERT INTO suspend (name, email, reason, suspend_date, status, date, function, unique_id) VALUES ('{$name}', '{$email}', '{$text}', '{$day}', '{$action}', (DATE(CURRENT_TIMESTAMP)), '{$whom}', '{$user_id}')";
        $result2 = mysqli_query($conn, $sql2);
        $query = mysqli_query($conn, "UPDATE developer SET status='suspend' , suspend_date='$day' WHERE unique_id='{$user_id}'");
        if ($result2) {
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
                $mail->Body    = 'For '.$text.'  Your Account has been Suspended For next '.$day.' .';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo '<script> alert("Successfully Suspended.");
               window.location.href = "admin-page.php";
              </script>';
        } else {
            $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
        }
    }

}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>DigitalSpark CRM</title>

    <!-- Font Links -->
<link href='https://fonts.googleapis.com/css?family=Salsa' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>

    <style>
         body{
            
            align-items: center;
            justify-content: center;
            background: url('images/view-bg.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; 
            font-family: 'Timmana' !important;
  
        }

        body::-webkit-scrollbar { 
        display: none; 
        } 
    </style>
</head>
<body>
    <div class="container-fluid">
    <header class="" style="width: 1350px; display: flex;background-color: rgb(0,0,0, 0.9); border-color:rgb(254,190,16); margin-left: -20px;">
            <a href="admin-page.php" style="text-decoration: none;"> <h6 class="mx-3 mt-3 text-warning"><b style="font-family: 'Timmana'">CRM</b></h6></a>
                    <h5 class="mx-3 text-light" style="margin-top: 17px;font-family: 'Timmana'; font-size: 20px; ">Ban List</h5>
        </header>
        <div class="col-md-12">
            <div class="row" style="font-family: 'Timmana'; ">
                <div class="card mt-2 " style="height: 620px;background-color: rgb(0,0,0, 0.8); border-color:rgb(254,190,16); border-radius: 20px;">
                    <div class="row">
                <div class="col-md-6">
                    <div class="w3-container" style="cursor: pointer;">
                        <h3 class="text-warning mt-3"><p style="font-family: 'Timmana';">Client Issues</p></h3>
                        <div class="w3-bar text-light" style="border-radius:10px; background-color:rgb(0,0,0,0.5)">
                            <div class="w3-bar-item text-light"><span class="text-warning">Using fake credentials:</span>You have used a fake name, profile picture & other details thats why we delete your DigitalSpark CRM account.
                            </div>
                          </div>
                          <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(255, 47, 0,0.5);">
                            <div class="w3-bar-item text-light"><span class="text-warning">Admin Dignity:</span>Unprofessional behavior is never appreciated
                             in our workplace. You should carefull on your behavior.</div>
                          </div>
                          <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(251, 255, 0,0.7);">
                          <div class="w3-bar-item"><span>Illegal Activities:</span>Involvement in illegal or prohibited activities according to local laws or the CRM platform's guidelines.
                          </div>
                          </div>
                          <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(0, 157, 255,0.7);">
                              <div class="w3-bar-item text-light"><span class="text-warning">Data Breach or Unauthorized Access:</span>Attempting to access or breach data without proper authorization.</div>
                          </div>
                          <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(255, 0, 123,0.5);">
                          <div class="w3-bar-item text-light"><span class="text-warning">Multiple Account Violations:</span>Creating and using multiple accounts in violation of the platform's terms.
                          </div>
                          </div>
                          <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(26, 255, 0,0.5);">
                          <div class="w3-bar-item text-light"><span class="text-warning">Violation of Community Guidelines:</span>Breaking specific rules and guidelines established by the CRM platform for user behavior.
                          </div>
                          </div>
                          <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(254,190,16,0.6);">
                          <div class="w3-bar-item text-light"><span class="text-dark">Inappropriate Content:</span>Uploading or sharing content that is inappropriate, offensive, or goes against community standards.
                          </div>
                          </div>
                          <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(0, 220, 255,0.5)">
                              <div class="w3-bar-item text-light"><span class="text-warning">Misuse of Intellectual Property:</span>Unauthorized use or distribution of copyrighted material or intellectual property.</div>
                          </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="w3-container" style="cursor: pointer; margin-left: -15px; ">
                            <h3 class="text-warning mt-3"><p style="font-family: 'Timmana' ">Developer Issues</p></h3>
                            <div class="w3-bar" style="border-radius:10px; background-color:rgb(0,0,0,0.5)">
                                <div class="w3-bar-item text-light"><span class="text-warning">Code of Conduct Violations:</span>Engaging in behavior that goes against the established code of conduct for developers on the CRM platform.
                                </div>
                              </div>
                              <div class="w3-bar  mt-2" style="border-radius:10px; background-color:rgb(255, 47, 0,0.5);">
                              <div class="w3-bar-item text-light"><span class="text-warning">Failure to Keep Software Updated:</span>Neglecting to update and maintain developed software, leading to compatibility issues.
                              </div>
                              </div>
                              <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(251, 255, 0,0.7);">
                              <div class="w3-bar-item"><span>Failure to Address User Complaints:</span>Ignoring or failing to address user complaints or issues related to the developed applications.
                              </div>
                              </div>
                              <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(0, 157, 255,0.7);">
                              <div class="w3-bar-item text-light"><span class="text-warning">Inadequate Documentation:</span>Failure to provide accurate and comprehensive documentation for the developed applications.
                              </div>
                              </div>
                              <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(255, 0, 123,0.5);">
                              <div class="w3-bar-item text-light"><span class="text-warning">Failure to Meet Quality Standards:</span>Developing applications that consistently fail to meet quality standards set by the platform.
                              </div>
                              </div>
                              <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(26, 255, 0,0.5)">
                              <div class="w3-bar-item text-light"><span class="text-warning">Security Vulnerabilities:</span>Creating applications with security vulnerabilities or failing to address identified security issues promptly.
                              </div>
                              </div>
                              <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(254,190,16,0.6);">
                              <div class="w3-bar-item text-light"><span class="text-dark">Non-Compliance with API Usage Policies:</span>Violating the platform's policies regarding the use of APIs or other development tools.
                              </div>
                              </div>
                              <div class="w3-bar mt-2" style="border-radius:10px; background-color:rgb(0, 220, 255,0.5)">
                              <div class="w3-bar-item text-light"><span class="text-warning">Unauthorized Access or Data Handling:</span>Attempting to access data or perform actions without proper authorization.
                              </div>
                              </div>
                        </div>
                    </div>
                </div>
             </div>
                </div>
                <div class="col-md-6 mt-3" style="margin-left: 335px; height: 500px;">
                    <div class="row">
                        <div class="card" style="height: 470px; width: 600px; border-radius: 20px; background-color: rgb(0,0,0, 0.8); border-color:rgb(254,190,16); font-family:">
                            <div class="col-md-12">
                                <form method="post">
                                    <div class="row">
                                        <label class="mt-5 text-warning" style="margin-left: 35px;">Email:</label>
                                        <?php
                                            if ($function == "client") {
                                                $emailValue = $row['email'];
                                            } else {
                                                $emailValue = $row2['email'];
                                            }

                                            $inputHtml = '<input type="text" class="form-control mx-5 text-light" name="email" style="width: 480px;background-color: rgb(0,0,0, 0.7); border-color:rgb(254,190,16);" value="' . htmlspecialchars($emailValue) . '" readonly>';
                                            echo $inputHtml;
                                            ?>
                                        
                                    </div>
                                    <div class="row">
                                        <label class="mt-1 text-warning" style="margin-left: 35px;">Name:</label>
                                        <?php
                                            if ($function == "client") {
                                                $nameValue = $row['name'];
                                            } else {
                                                $nameValue = $row2['name'];
                                            }

                                            $inputHtml = '<input type="text" class="form-control mx-5 text-light" style="width: 480px; background-color: rgb(0,0,0, 0.7); border-color:rgb(254,190,16);" name="name" value="' . htmlspecialchars($nameValue) . '" readonly>';
                                            echo $inputHtml;
                                            ?>
                                    </div>
                                    <div class="row">
                                        <label class="mt-1 text-warning" style="margin-left: 35px;">Selected Issue:</label>
                                        <textarea type="text" class="form-control  mx-5 text-light" name="text" style="width: 480px; background-color: rgb(0,0,0, 0.7); border-color:rgb(254,190,16);" id="selectedIssue" readonly></textarea>
                                    </div>
                                    <div class="row" style="display: none;">
                                    <input type="text" class="form-control w-75 mx-5 text-warning" name="function" style="width: 480px; background-color: rgb(0,0,0, 0.7); border-color:rgb(254,190,16);" value="<?php echo $function; ?>"  readonly>
                                    </div>
                                        <div class="row">
                                            <label class="mt-2 text-warning" style="margin-left: 35px;">Action:</label>
                                            <div class="col-md-6">
                                                <div class="form-check " style="margin-left:120px;">
                                                    <input class="form-check-input text-warning" type="radio" name="action" style="background-color: rgb(0,0,0, 0.7); border-color:rgb(254,190,16);" value="ban">
                                                    <label class="form-check-label d-block text-warning">Parmanently Ban</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="action" style="background-color: rgb(0,0,0, 0.7); border-color:rgb(254,190,16);" value="suspend">
                                                    <label class="form-check-label d-block text-warning">Suspend</label>
                                                </div>
                                            </div>
                                    <div class="row" id="daysInput" style="display: none; margin-left:200px;">
                                        <label class="mt-1 text-light" style="margin-left: -12px;">Select Unsuspend Date:</label>
                                        <input type="date" class="form-control w-25  text-light" name="day" style="background-color: rgb(0,0,0, 0.7); border-color:rgb(254,190,16);" id="suspendDays" placeholder="days">
                                    </div>
                                    </div>
                                    <div class="row d-flex" style="position: sticky;">
                                        <div class="" style="margin-left: 50px; margin-top:20px;">
                                            <input type="submit" class="btn btn-outline-warning w-75 " id="submit" name="submit" value="Take Action">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Handle change events on radio buttons
            $("input[name='action']").change(function() {
                // Show/hide the days input based on the selected action
                var selectedAction = $("input[name='action']:checked").val();
                if (selectedAction === "suspend") {
                    $("#daysInput").show();
                } else {
                    $("#daysInput").hide();
                }
            });

            // Handle click events on bar items
            $(".w3-bar-item").click(function() {
                // Get the text of the clicked bar item
                var selectedIssueText = $(this).text().trim();
                
                // Update the textarea with the selected issue
                $("#selectedIssue").val(selectedIssueText);
            });
        });
    
    </script>
</body>
</html>
