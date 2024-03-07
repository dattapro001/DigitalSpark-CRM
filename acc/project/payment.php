<?php 
  include "config.php";
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("Location: index.php");
    die();
  }
  $unique_id = $_SESSION['unique_id'];

$output1 = "";
$output2 = "";
$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

$query1 =  mysqli_query($conn, "SELECT * FROM crm_wallet WHERE unique_id = '$user_id'");
$row2= mysqli_fetch_assoc($query1);
$query =  mysqli_query($conn, "SELECT * FROM pay_info WHERE unique_id = '$user_id'");
$row = mysqli_fetch_assoc($query);
$addressAdded = !empty("SELECT * FROM pay_info WHERE unique_id = '$user_id'");


if (isset($_POST['add_submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $country = $_POST['country'];


    $name_pattern = "/[A-Za-z .]{3,25}/";
    $email_pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/";
    $address_pattern = "/[A-Za-z .]{3,25}/";
    $city_pattern = "/[A-Za-z .]{3,20}/";
    $postal_pattern = "/[0-9 .]{3,20}/";
    $country_pattern = "/[A-Za-z .]{3,20}/";
   

    if(!preg_match($name_pattern,$name)){
    
     }
     else if(!preg_match($email_pattern,$email)){

     } 
      else if(!preg_match($address_pattern,$address)){
        
     }
     else if(!preg_match($city_pattern,$city)){
        
     }
     else if(!preg_match($postal_pattern,$postal)){
        
     }
     else if(!preg_match($country_pattern,$country)){
        
     }
     else{
        $sql2 ="UPDATE `pay_info` SET name = '$name' , email = '$email' , country= '$country' ,
         address = '$address', city= '$city', postal = '$postal' WHERE unique_id='$user_id'";
        $result2 = mysqli_query($conn, $sql2);
     }

     $addressAdded = true;
   
}


if (isset($_POST['edit_submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $country = $_POST['country'];


    $name_pattern = "/[A-Za-z .]{3,25}/";
    $email_pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/";
    $address_pattern = "/[A-Za-z .]{3,25}/";
    $city_pattern = "/[A-Za-z .]{3,20}/";
    $postal_pattern = "/[0-9 .]{3,20}/";
    $country_pattern = "/[A-Za-z .]{3,20}/";
   

    if(!preg_match($name_pattern,$name)){
    
     }
     else if(!preg_match($email_pattern,$email)){

     } 
      else if(!preg_match($address_pattern,$address)){
        
     }
     else if(!preg_match($city_pattern,$city)){
        
     }
     else if(!preg_match($postal_pattern,$postal)){
        
     }
     else if(!preg_match($country_pattern,$country)){
        
     }
     else{
        $sql2 ="UPDATE `pay_info` SET name = '$name' , email = '$email' , country= '$country' ,
         address = '$address', city= '$city', postal = '$postal' WHERE unique_id='$user_id'";
        $result2 = mysqli_query($conn, $sql2);
     }

     $addressAdded = true;
   
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
    <title>Payment</title>

    <style>
        .active {
            color: rgb(0, 255, 17);
        }

         /* Edit conten */
         .hide-content {
            display: none;
        }

        .show-conten {
            display: inline-block;
        }
        
        /* Edit Button */
        .hide-button {
            display: none;
        }

        .show-button {
            display: inline-block;
        }

    </style>
</head>

<body>
    

    <div class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;" href="client-page.php">CRM</a>
                </li>
                <li class="nav-item" style="margin-left: 50px; margin-top: 5px;">
                    <i class="fa fa-share" style="font-size:15px" style="font-family: Georgia, 'Times New Roman', Times, serif;"> 
                     <?php
                     $output1 .= '<a href="CRM.php?user_id='.$_SESSION['unique_id'].'" class="text-dark" style="text-decoration: none;">CRM Wallet</a>';
                     echo $output1;
                     ?>
                   </i>
                </li>
                <li class="nav-item active" style="margin-left: 50px; margin-top: 5px;">
                    <i class="fa fa-share" style="font-size:15px" style="font-family: Georgia, 'Times New Roman', Times, serif;">
                    <?php
                     $output2 .= '<a href="" class="text-dark" style="text-decoration: none;">Confirm & Pay</a>';
                     echo $output2;
                     ?>
                  </i>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="container mt-4 ml-4" style="z-index: 1;">
                    <div class="card mx-4" style="width: 100%;">
                        <header class="">
                            <h4 class="mx-2 my-2" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Billing Information</h4>
                        </header>
                        <div class="p-3 d-flex">

                        <?php
                            if (empty($row['address'])) {
                                echo '<p>Your invoice will be issued according to the details listed here.</p>';
                                echo '<button type="button" class="btn btn-outline-dark w-25 h-25 ml-3"data-bs-toggle="modal" data-bs-target="#add-address"> 
                                Add Address </button>';
                            } else {
                            echo '<p class="w-75">' . $row['address'] . $row['postal'] . $row['city'] . '</p>';
                            echo '<button type="button" class="btn btn-outline-dark w-25 h-25 ml-3"data-bs-toggle="modal" data-bs-target="#edit-address"
                            style="margin-right: 30px; "> Edit</button>';
                             }
                            ?>

                        </div>
                        
                        <div class="p-3">
                              <?php
                              if (empty($row['name'])) {
                               
                            } else {
                                echo '<h4 style="font-size: 20px;">'.$row['name'].'</h4>';
                                echo '<h4 style="font-size: 17px;">'.$row['country'].'</h4>';
                             }
                              
                              ?>
                        </div>
                    </div>
                </div>

                <div class="card mt-4 mx-5 " style="width: 92.2%;">
                    <header class="" style="">
                        <h4 class="mx-2 my-2" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Payment</h4>
                    </header>
                    <div class="p-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="cardSwitch">
                            <label class="form-check-label" style="font-family: ‘Aclonica’; font-size: 18px;" for="cardSwitch">Cards</label>
                        </div>
                        
                        <div id="cardDetailsContainer" style="display: none;">
                        <form id="cardDetailsForm">
                            <div class="form-group mt-3 d-flex">
                                <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Card / Account Number</label>
                                <label style="margin-left: 110px; font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Amount</label>
                            </div>

                            <div class="form-group mt-3 d-flex">
                                <input type="text" class="form-control" style="width:45%">
                                <input type="text" class="form-control" style="margin-left: 40px; width: 45%;">
                            </div>

                            <div class="form-group mt-3 d-flex">
                                <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">First Name</label>
                                <label style="margin-left: 200px; font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Last Name</label>
                            </div>

                            <div class="form-group mt-3 d-flex">
                                <input type="text" class="form-control" style="width:45%">
                                <input type="text" class="form-control" style="margin-left: 40px; width: 45%;">
                            </div>

                            <div class="form-group mt-3 d-flex">
                                <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Service Fee</label>
                                <i class="fa fa-question-circle" style="font-size:15px; margin-left: 10px; margin-top: 4px;"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="It helps us to operate our platform and offer 24/7 customer support for your order"></i>
                                <label style="margin-left: 170px; font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Security Code</label>
                                <i class="fa fa-question-circle" style="font-size:15px; margin-left: 10px; margin-top: 4px;"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="The Three to Five Digit of Code back or front on your card."></i>
                            </div>

                            <div class="form-group mt-3 d-flex">
                                <input type="text" placeholder="$4.00" class="form-control" style="width:45%" readonly>
                                <input type="text" class="form-control" style="margin-left: 40px; width: 45%;">
                            </div>

                        </form>
                    </div>
                    </div>

                    <div class="p-3 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="crmSwitch" checked>
                            <label class="form-check-label" style="font-family: ‘Aclonica’; font-size: 18px;" for="crmSwitch">CRM Wallet</label>
                            <i class="fa fa-question-circle" style="font-size:15px; margin-left: 5px; margin-top: 4px;"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Easiest Way to Make payment.Go to navbar and check your CRM Wallet"></i>
                        </div>
                        
                        <div id="crmDetailsContainer">
                        <form id="crmDetailsForm">
                            <div class="form-group mt-3 d-flex">
                                <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Wallet Number</label>
                                <label style="margin-left: 130px; font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Amount</label>
                            </div>

                            <div class="form-group mt-3 d-flex">
                                <input type="text" class="form-control" style="width:45%" value="<?php echo $row2['number']?>" readonly>
                                <input type="text" class="form-control" style="margin-left: 40px; width: 45%;">
                            </div>

                            <div class="form-group mt-3 d-flex">
                                <label style="font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Service Fee</label>
                                <i class="fa fa-question-circle" style="font-size:15px; margin-left: 10px; margin-top: 4px;"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="It helps us to operate our platform and offer 24/7 customer support for your order"></i>
                                <label style="margin-left: 180px; font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;"">Security Code</label>
                                <i class="fa fa-question-circle" style="font-size:15px; margin-left: 10px; margin-top: 4px;"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="The Three to Five Digit of Code back or front on your card."></i>
                            </div>

                            <div class="form-group mt-3 d-flex">
                                <input type="text" placeholder="$4.00" class="form-control" style="width:45%" readonly>
                                <input type="text" class="form-control" style="margin-left: 40px; width: 45%;">
                            </div>

                          </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="container-fluid d-flex">
                    <div class="card" style="width: 70%; margin-left: 50px; margin-top: 20px;">
                        <header>
                            <div class="p-3 d-flex">
                                <img src="images/webb.webp" class=" w-25 h-25">
                                <p class="p-2" style="margin-top: -15px;">
                                    I will do unique and modern business logo I will do unique and modern
                                </p>
                            </div>
                        </header>

                        <div class="p-3 ">
                            <p class="" style="font-size: 20px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                Product Details
                            </p>

                            <ul style="list-style-type: none;">
                                <li class="mt-3 d-flex">
                                    <i class="fa fa-check" style="font-size:20px"></i>
                                    <p class="px-3">Unlimited revisions</p>
                                </li>
                                <li class="mt-3 d-flex">
                                    <i class="fa fa-check" style="font-size:20px"></i>
                                    <p class="px-3">2 concepts included</p>
                                </li>
                                <li class="mt-3 d-flex">
                                    <i class="fa fa-check" style="font-size:20px"></i>
                                    <p class="px-3">Logo transparency</p>
                                </li>
                                <li class="mt-3 d-flex">
                                    <i class="fa fa-check" style="font-size:20px"></i>
                                    <p class="px-3">Vector file</p>
                                </li>
                                <li class="mt-3 d-flex">
                                    <i class="fa fa-check" style="font-size:20px"></i>
                                    <p class="px-3">Printable file</p>
                                </li>
                                <li class="mt-3 d-flex">
                                    <i class="fa fa-check" style="font-size:20px"></i>
                                    <p class="px-3">Include 3D mockup</p>
                                </li>
                                <li class="mt-3 d-flex">
                                    <i class="fa fa-check" style="font-size:20px"></i>
                                    <p class="px-3">Include source file</p>
                                </li>
                            </ul>
                        </div>

                        <div class="p- d-flex ">
                            <label class="mx-2" style="font-size: 20px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Total Amount</label>
                            <span style="margin-left: 170px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 20px;">$34.00</span>
                        </div>

                        <div class="p-3 d-flex">
                            <label class="" style="font-size: 15px; margin-left: -7px; font-family: Impact, Haettenschweiler, 'Arial Narrow', sans-serif;">Total Delivery Time</label>
                            <span style="margin-left: 170px; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 15px;">2 days</span>
                        </div>

                        <div class="p-3">
                            <button type="submit" class="btn-lg btn btn-outline-dark w-100">Confirm & Pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- add-address Modal -->
    <div class="modal" id="add-address">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 50px;">
                <div class="modal-header">
                    <h4 class="modal-title">Billing Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control"
                            pattern="[A-Za-z ]{3,25}" placeholder="Enter Your Name"
                          title="Contain of lowercase or Uppercase minimum 3 characters" required>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" 
                            pattern="[A-Za-z]{3,15}" placeholder="Enter Your Name"
                          title="Contain of lowercase and Uppercase minimum 3 characters" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control"
                             pattern="[A-Za-z0-9. = / >]{3,25}" placeholder="Enter Your Name"
                            title="Contain of lowercase and number minimum 5 characters" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control"
                            pattern="[A-Za-z ]{3,15}" placeholder="Enter Your Name"
                            title="Contain of lowercase and Uppercase minimum 3 characters" required>
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" name="postal" class="form-control"
                            pattern="[0-9 ]{3,15}" placeholder="Enter Your Name"
                          title="Contain only number minimum 3 characters" required>
                        </div>
                        <div class="form-group mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" onclick="toggleEmailInput()">
                                <label class="form-check-label" for="flexCheckChecked">
                                    I want to get invoices via email.
                                </label>
                            </div>
                            <div class="form-group mt-2" id="emailInputSection" style="display: none;">
                            <div class="form-group mt-2">
                                <label>Enter Your Email</label>
                                <input type="email" name="email" class="form-control"
                                pattern="^[a-z0-9]+@[a-z]+.[a-z]+$" placeholder="Enter Your Name"
                                title="name01@gmail.com">
                            </div>
                          </div>
                        </div>
                        <input class="btn btn-outline-primary btn-lg float-right" value="submit"  name="add_submit" type="submit">
                    </form>
                </div>
                
                <!-- data-bs-dismiss="modal" -->
            </div>
        </div>
    </div>


    <!-- edit-address Modal -->
    <div class="modal" id="edit-address">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 50px;">
                <div class="modal-header">
                    <h4 class="modal-title">Billing Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control"
                            pattern="[A-Za-z ]{3,25}" placeholder="Enter Your Name"
                          title="Contain of lowercase or Uppercase minimum 3 characters"
                          value="<?php echo $row['name']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" 
                            pattern="[A-Za-z]{3,15}" placeholder="Enter Your Name"
                          title="Contain of lowercase and Uppercase minimum 3 characters"
                          value="<?php echo $row['country']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control"
                             pattern="[A-Za-z0-9. = / >]{3,25}" placeholder="Enter Your Name"
                            title="Contain of lowercase and number minimum 5 characters"
                            value="<?php echo $row['address']?>" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control"
                            pattern="[A-Za-z ]{3,15}" placeholder="Enter Your Name"
                            title="Contain of lowercase and Uppercase minimum 3 characters"
                            value="<?php echo $row['city']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" name="postal" class="form-control"
                            pattern="[0-9 ]{3,15}" placeholder="Enter Your Name"
                          title="Contain of lowercase and Uppercase minimum 3 characters"
                          value="<?php echo $row['postal']?>" required>
                        </div>
                        <div class="form-group mt-4">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="EditflexCheckChecked" onclick="toggleEditEmailInput()">
                                <label class="form-check-label" for="flexCheckChecked">
                                    I want to get invoices via email.
                                </label>
                            </div>
                            <div class="form-group mt-2" id="EditemailInputSection" style="display: none;">
                            <div class="form-group mt-2">
                                <label>Enter Your Email</label>
                                <input type="email" name="email" class="form-control"
                                pattern="^[a-z0-9]+@[a-z]+.[a-z]+$" placeholder="Enter Your Name"
                                title="name01@gmail.com"  value="<?php echo $row['email']?>">
                            </div>
                          </div>
                        </div>
                        <input payment.php" class="btn btn-outline-primary btn-lg float-right" value="Update"  name="edit_submit" type="submit">
                    </form>
                </div>
                
                <!-- data-bs-dismiss="modal" -->
            </div>
        </div>
    </div>

    <script>

        //add-address Check box section
        function toggleEmailInput() {
      var emailInputSection = document.getElementById("emailInputSection");
      var checkbox = document.getElementById("flexCheckChecked");

      if (checkbox.checked) {
        emailInputSection.style.display = "block";
      } else {
        emailInputSection.style.display = "none";
      }
    }


      //edit-address Check box section
      function toggleEditEmailInput() {
      var EditemailInputSection = document.getElementById("EditemailInputSection");
      var Editcheckbox = document.getElementById("EditflexCheckChecked");

      if (Editcheckbox.checked) {
        EditemailInputSection.style.display = "block";
      } else {
        EditemailInputSection.style.display = "none";
      }
    }

        //checkbox Section
    function toggleVisibility(checkbox, containerId, otherCheckboxId, otherContainerId) {
    const containerElement = document.getElementById(containerId);
    const otherCheckbox = document.getElementById(otherCheckboxId);
    const otherContainerElement = document.getElementById(otherContainerId);

    containerElement.style.display = checkbox.checked ? 'block' : 'none';
    otherCheckbox.checked = !checkbox.checked;
    otherContainerElement.style.display = checkbox.checked ? 'none' : 'block';
   }

    document.getElementById('cardSwitch').addEventListener('change', function () {
    toggleVisibility(this, 'cardDetailsContainer', 'crmSwitch', 'crmDetailsContainer');
    });

     document.getElementById('crmSwitch').addEventListener('change', function () {
    toggleVisibility(this, 'crmDetailsContainer', 'cardSwitch', 'cardDetailsContainer');
    });

        // Tooltip Section
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

</body>

</html>