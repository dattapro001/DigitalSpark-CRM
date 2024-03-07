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
                $mail->Password   = 'uxjumadnkqvsauvi';                               //SMTP password
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
                $mail->Password   = 'uxjumadnkqvsauvi';                               //SMTP password
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

}else{

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
                $mail->Password   = 'uxjumadnkqvsauvi';                               //SMTP password
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
                $mail->Password   = 'uxjumadnkqvsauvi';                               //SMTP password
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
    <title>DigitalSpark CRM</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="w3-container" style="cursor: pointer;">
                        <h3><b>Clients Issues</b></h3>
                        <div class="w3-bar w3-black" style="border-radius:10px;">
                            <div class="w3-bar-item"><b>Using fake credentials:</b>You have used a fake name, profile picture & other details thats why we delete your DigitalSpark CRM account.
                            </div>
                          </div>
                          <div class="w3-bar w3-red mt-2" style="border-radius:10px;">
                            <div class="w3-bar-item"><b>Admin Dignity:</b>Unprofessional behavior is never appreciated
                             in our workplace.</div>
                          </div>
                          <div class="w3-bar w3-yellow mt-2" style="border-radius:10px;">
                          <div class="w3-bar-item"><b>Illegal Activities:</b>Involvement in illegal or prohibited activities according to local laws or the CRM platform's guidelines.
                          </div>
                          </div>
                          <div class="w3-bar w3-blue mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Data Breach or Unauthorized Access:</b>Attempting to access or breach data without proper authorization.</div>
                          </div>
                          <div class="w3-bar w3-pink mt-2" style="border-radius:10px;">
                          <div class="w3-bar-item"><b>Multiple Account Violations:</b>Creating and using multiple accounts in violation of the platform's terms.
                          </div>
                          </div>
                          <div class="w3-bar w3-green mt-2" style="border-radius:10px;">
                          <div class="w3-bar-item"><b>Violation of Community Guidelines:</b>Breaking specific rules and guidelines established by the CRM platform for user behavior.
                          </div>
                          </div>
                          <div class="w3-bar w3-orange mt-2" style="border-radius:10px;">
                          <div class="w3-bar-item"><b>Inappropriate Content:</b>Uploading or sharing content that is inappropriate, offensive, or goes against community standards.
                          </div>
                          </div>
                          <div class="w3-bar w3-teal mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Misuse of Intellectual Property:</b>Unauthorized use or distribution of copyrighted material or intellectual property.</div>
                          </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="w3-container" style="cursor: pointer">
                            <h3><b>Developers Issues</b></h3>
                            <div class="w3-bar w3-black" style="border-radius:10px;">
                                <div class="w3-bar-item"><b>Code of Conduct Violations:</b>Engaging in behavior that goes against the established code of conduct for developers on the CRM platform.
                                </div>
                              </div>
                              <div class="w3-bar w3-red mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Failure to Keep Software Updated:</b>Neglecting to update and maintain developed software, leading to compatibility issues.
                              </div>
                              </div>
                              <div class="w3-bar w3-yellow mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Failure to Address User Complaints:</b>Ignoring or failing to address user complaints or issues related to the developed applications.
                              </div>
                              </div>
                              <div class="w3-bar w3-blue mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Inadequate Documentation:</b>Failure to provide accurate and comprehensive documentation for the developed applications.
                              </div>
                              </div>
                              <div class="w3-bar w3-pink mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Failure to Meet Quality Standards:</b>CDeveloping applications that consistently fail to meet quality standards set by the platform.
                              </div>
                              </div>
                              <div class="w3-bar w3-green mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Security Vulnerabilities:</b>Creating applications with security vulnerabilities or failing to address identified security issues promptly.
                              </div>
                              </div>
                              <div class="w3-bar w3-orange mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Non-Compliance with API Usage Policies:</b>Violating the platform's policies regarding the use of APIs or other development tools.
                              </div>
                              </div>
                              <div class="w3-bar w3-teal mt-2" style="border-radius:10px;">
                              <div class="w3-bar-item"><b>Unauthorized Access or Data Handling:</b>Attempting to access data or perform actions without proper authorization.
                              </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5" style="margin-left: 400px; height: 500px;">
                    <div class="row">
                        <div class="card" style="height: 470px; width: 500px; border-radius: 20px;">
                            <div class="col-md-12">
                                <form method="post">
                                    <div class="row">
                                        <label class="mt-5" style="margin-left: 35px;"><b>Email:</b></label>
                                        <?php
                                            if ($function == "client") {
                                                $emailValue = $row['email'];
                                            } else {
                                                $emailValue = $row2['email'];
                                            }

                                            $inputHtml = '<input type="text" class="form-control w-75 mx-5" name="email" value="' . htmlspecialchars($emailValue) . '" readonly>';
                                            echo $inputHtml;
                                            ?>
                                        
                                    </div>
                                    <div class="row">
                                        <label class="mt-1" style="margin-left: 35px;"><b>Name:</b></label>
                                        <?php
                                            if ($function == "client") {
                                                $nameValue = $row['name'];
                                            } else {
                                                $nameValue = $row2['name'];
                                            }

                                            $inputHtml = '<input type="text" class="form-control w-75 mx-5" name="name" value="' . htmlspecialchars($nameValue) . '" readonly>';
                                            echo $inputHtml;
                                            ?>
                                    </div>
                                    <div class="row">
                                        <label class="mt-1" style="margin-left: 35px;"><b>Selected Issue:</b></label>
                                        <textarea type="text" class="form-control w-75  mx-5" name="text" id="selectedIssue" readonly></textarea>
                                    </div>
                                    <div class="row" style="display: none;">
                                    <input type="text" class="form-control w-75 mx-5" name="function" value="<?php echo $function; ?>"  readonly>
                                    </div>
                                        <div class="row mt-3">
                                            <label class="mt-1" style="margin-left: 35px;"><b>Action:</b></label>
                                            <div class="col-md-6">
                                                <div class="form-check mt-2" style="margin-left:70px;">
                                                    <input class="form-check-input" type="radio" name="action" value="ban">
                                                    <label class="form-check-label d-block">Parmanently Ban</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" name="action" value="suspend">
                                                    <label class="form-check-label d-block">Suspend</label>
                                                </div>
                                            </div>
                                    <div class="row" id="daysInput" style="display: none; margin-left:160px;">
                                        <label class="mt-1" style="margin-left: -20px;"><b>Select Unsuspend Date:</b></label>
                                        <input type="date" class="form-control w-25 mx-3" name="day" id="suspendDays" placeholder="days">
                                    </div>
                                    </div>
                                    <div class="row d-flex" style="position: sticky;">
                                        <div class="" style="margin-left: 50px; margin-top:40px;">
                                            <input type="submit" class="btn btn-outline-dark w-75 text-danger" id="submit" name="submit" value="Take Action">
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
