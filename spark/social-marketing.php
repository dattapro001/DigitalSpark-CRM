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


$sm =  mysqli_query($conn, "SELECT * FROM s_marketing WHERE 1");
$sm1 = mysqli_fetch_assoc($sm);
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

        body::-webkit-scrollbar { 
        display: none; 
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
            max-height: calc(100% - 40px); /* Adjust as needed */
        }
        .scrollable-content::-webkit-scrollbar {
            width: 6px; /* Adjust as needed */
        }

        .scrollable-content::-webkit-scrollbar-thumb {
            background-color: transparent; /* Adjust as needed */
        }

    
    </style>

</head>

<body style="background-color: #d03989;">
    <div class="container-fluid d-flex" style="position: relative; font-family:'Timmana';">
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row">

                    <div class="col-md-6 p-3">
                        <h3 class="mt-3 mx-2 w-100 text-warning">Social Media Marketing</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 13px;">Social media marketing is the process of creating content for social media platforms to promote your products and/or services, build community with your target audience, and drive traffic to your business.
                        </p>
                    </div>

                    <div class="col-md-6 p-3 mt-3">
                        <img src="images/Social_img1.png" class="" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-6 p-3" style="margin-top: -20px;">
                        <img src="images/Social_img2.png" class="mx-1" style="width: 180px; height: 170px;">
                        <h6 class="text-warning mt-2" style="margin-left: 10px;">How Social Media Marketing Works</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: 10px;"> Social media marketing is the process of creating content for social media platforms to promote your products and/or services. 
                    </div>

                    <div class="col-md-6 p-3" style="margin-top: -20px;">
                        <h6 class="text-warning" style="margin-left: -10px;">Why Is Social Media Marketing So Powerful?</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: -10px;">The power of SMM is driven by the unparalleled capacity of social media in three core marketing areas: connection, interaction, and customer data.
                        Social media platforms have a vast user base, allowing businesses to reach a global audience. This widespread reach enables companies to connect with potential customers on a large scale.
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row scrollable-content">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mt-4 mx-2 w-100 text-warning">Benefits of Social Media Marketing</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">Social media is important in marketing because consumers often use the platforms to seek information about a brand and shop its products or services. 
                        </p>
                    </div>
                    <div class="col-md-6"> 
                        <img src="images/Social_img3.png" class="mt-5" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12"> 
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">1. Increase your brand awareness.</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Due to the sheer amount of people on social media, you're missing out on the potential to reach thousands, and even millions, if you don't have a presence.</li>
                                   
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">2. Generate leads and boost conversions.</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Promoting and sharing your products on social media is a simple way to improve lead generation, boost conversions, and increase sales because you're advertising to people who have opted to engage with you by following your account.</li>
                                
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">3. Foster relationships with your customers.</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">By connecting and engaging with your social media followers, you'll be able to build lasting relationships between them and your business. </li>
                               
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
                        <h3 class="mt-4 mx-2 w-100 text-warning">Marketing Price Details</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 14px;">Social media marketing is the process of gaining website traffic through social media sites.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src="images/Social_img4.png" class="mt-2" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12">
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">BASIC</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">- 250 USD Monthly</li>
                                    <li style="font-size: 12px;">- Best for Startups</li>
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px;padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">ADVANCED</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">- 500 USD Monthly</li>
                                    <li style="font-size: 12px;">- Best for Small Business</li>
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px;padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">ENTERPRISE</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">- 900 USD Monthly</li>
                                    <li style="font-size: 12px;">- Best for Large Business</li>
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
                        $query = mysqli_query($conn, "SELECT * FROM project WHERE client_id = '$unique_id' AND unique_id = '{$sm1['unique_id']}'");
                        $result = mysqli_fetch_assoc($query);
                        $output8 = "";

                        if (!empty($result['unique_id']) == 2227 && !empty($result['client_id']) == $unique_id_to_check) {
                            $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$result['unique_id'].'" class="mx-5 btn btn-outline-warning" style="">Payment</a>';
                        } else {
                            $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$sm1['unique_id'].'" class="mx-5 btn btn-outline-warning" style="">Payment</a>';
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
