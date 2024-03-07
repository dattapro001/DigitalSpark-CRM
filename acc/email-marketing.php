<?php 
include "config.php";
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: index.php");
  die();
}
$output ="";
$unique_id = $_SESSION['unique_id'];
$query ="SELECT * FROM `messages` WHERE incoming_msg_id='$unique_id'";
$query = mysqli_query($conn, "SELECT * FROM project WHERE client_id = '$unique_id'");
$result = mysqli_fetch_assoc($query);

$em =  mysqli_query($conn, "SELECT * FROM e_marketing WHERE 1");
$em1 = mysqli_fetch_assoc($em);
$admin =  mysqli_query($conn, "SELECT * FROM admin WHERE 1");
$admindata = mysqli_fetch_assoc($admin);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>DigitalSpark CRM</title>
    <link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>


    <style>
       body{
            
            align-items: center;
            justify-content: center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; 
  
        }

    

        @keyframes flowWave {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }
        .scrollable-content {
            overflow-y: auto;
            max-height: calc(100% - 40px); 
        }
        .scrollable-content::-webkit-scrollbar {
            width: 6px; 
        }

      

    
    </style>

</head>

<body style="background-color: rgb(255, 0, 0, 0.8)">
    <div class="container-fluid d-flex" style="position: relative; font-family:'Timmana';">
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row">

                    <div class="col-md-6 p-3">
                        <h3 class="mt-3 mx-2 w-100 text-warning">Email Marketing</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 13px;">Email marketing is a type of direct digital marketing method that uses emails to engage with a business's audiences
                        </p>
                    </div>

                    <div class="col-md-6 p-3 mt-3">
                        <img src="images\Email_img1.png" class="" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-6 p-3" style="margin-top: -50px;">
                        <img src="images\Email_img2.png" class="mx-1" style="width: 180px; height: 170px;">
                    </div>

                    <div class="col-md-6 p-3" style="margin-top: -30px;">
                        <h6 class="text-warning" style="margin-left: -20px;">Why You Need Email Marketing Services</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: -20px;">Email marketing keeps your brand in front of your subscribers and increases their likelihood to convert into a customer or repeat customer.
                        <h6 class="text-warning" style="margin-left: -20px;">Email Automation</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: -20px;">Email marketing automation will make your life easier. Email automation is exactly what it sounds like. Emails will be sent out automatically on behalf of your business. 
                    </div>
                    <div class="col-md-6" style="margin-top: -150px;">

                        <h6 class=" mx-2 w-100 text-warning">Make Sure Your Emails Are Reaching Your Audience</h6>
                        <p class="mx-2 w-100" style="font-size: 13px;">Businesses often get caught up in email open rates to measure the effectiveness of their campaigns. However, an email can’t be opened if it never reaches the intended person.
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row scrollable-content">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mt-4 mx-2 w-100 text-warning" style="font-size: 20px;">What Are The Benefits Of Getting Our Email Marketing Services?</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">Email marketing is important for small businesses because it's a marketing workhorse. Not only does it help you to keep in touch with those that want to hear from you — keeping you top of mind — but it also allows you to educate your readers, drive traffic, conduct surveys, share updates, make announcements, etc.
                        </p>
                    </div>
                    <div class="col-md-6"> 
                        <img src="images\Email_img3.png" class="mt-5" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12"> 
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Build your credibility</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">More often than not, if users receive emails from unknown senders or with vague subject lines, they will see them as spam messages.</li>
                                   
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Build your Email List</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Whatever type of business you may have- B2C, B2B, eCommerce, service-based, or even non-profit organizations, growing a list of the right people will be beneficial for you.</li>
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Generate Sales & Conversions</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Did you know that email generates up to $37 billion for retail stores annually? That’s how much email influences consumers to buy products.</li>
                                  
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Better Design, Better Brand Recognition</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Signing up for drag and drop email editors is quite enticing. After all, one doesn’t need to have expert designing or coding skills to use their drop editor. </li>
                                
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Track & Optimize Email campaigns</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">One of the best things about digital marketing is that almost every task involved can be tracked and measured real-time.</li>
                                    
                                </ul>
                            </li>
                    
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
      </div>

        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mt-4 mx-2 w-100 text-warning">Price Details</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">Email marketing costs vary widely depending on the platforms you use, the number of subscribers you have, the complexity of your campaigns, and whether you work with an agency or manage your email marketing yourself.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src="images\Email_img4.png" class="mt-2" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12">
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 18px;">Email Marketing Pricing</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 15px;">Mailchimp: $87-$299/month</li>
                                    <li style="font-size: 15px;">Constant Contact: $105-$180/month</li>
                                    <li style="font-size: 15px;">Campaign Monitor: $89-$249/month</li>
                                    <li style="font-size: 15px;">GetResponse: $65-$163/month</li>
                                    <li style="font-size: 15px;">ActiveCampaign: $139-$424/month</li>
                                    <li style="font-size: 15px;">Keap: Starting at $289-$449/month</li>
                                </ul>
                            </li>
                        
                          
                        </ul>
                </div>
                        <div class="col-md-6">
                    <?php 
                     echo '<a href="client-admin-chat.php?user_id='.$admindata['unique_id'].'"" class="mx-5 btn btn-outline-warning">Admin</a>';
                     ?>
                    </div>                    
                    <div class="col-md-6">
                    <?php

                        $unique_id_to_check = mysqli_real_escape_string($conn, $unique_id);
                        $query = mysqli_query($conn, "SELECT * FROM project WHERE client_id = '$unique_id' AND unique_id = '{$em1['unique_id']}'");
                        $result = mysqli_fetch_assoc($query);
                        $output8 = "";

                        if (!empty($result['unique_id']) == 2229 && !empty($result['client_id']) == $unique_id_to_check) {
                            $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$result['unique_id'].'" class="mx-5 btn btn-outline-warning" style="">Payment</a>';
                        } else {
                            $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$em1['unique_id'].'" class="mx-5 btn btn-outline-warning" style="">Payment</a>';
                        }

                        echo $output8;

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
