<?php 
include "config.php";
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: index.php");
  die();
}
$output ="";
$unique_id = $_SESSION['unique_id'];
$query = mysqli_query($conn, "SELECT * FROM project WHERE client_id = '$unique_id'");
$result = mysqli_fetch_assoc($query);

$cm =  mysqli_query($conn, "SELECT * FROM c_marketing WHERE 1");
$cm1 = mysqli_fetch_assoc($cm);
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
            max-height: calc(100% - 40px); 
        }
        .scrollable-content::-webkit-scrollbar {
            width: 6px; 
        }

    

    
    </style>

</head>

<body style="background-color: rgb(128, 0, 128, 0.7)">
    <div class="container-fluid d-flex" style="position: relative; font-family:'Timmana';">
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row">

                    <div class="col-md-6 p-3">
                        <h3 class=" mx-2 w-100 text-warning">Content Marketing</h3>
                        <p class=" mx-2 w-100" style="font-size: 13px;">Content is the foundation of communication between a company
                            and potential buyers. It is not just a set of words but a science of presenting ideas to influence conscious and unconscious thought processes. 
                        </p>
                    </div>

                    <div class="col-md-6 p-3 mt-3">
                        <img src="images\Content_img1.png" class="" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-6 p-3" style="margin-top: -60px;">
                        <img src="images\Content_img2.png" class="mx-1" style="width: 180px; height: 170px;">
                        <h6 class=" mx-2 w-100 text-warning">Content marketing and SEO</h6>
                        <p class="mx-2 w-100" style="font-size: 13px;">Organizations use content marketing to educate and nurture audiences. And creating helpful content that also leverages search engine optimization (SEO) best practices gives them the best chance of maximizing visibility in search results.
                        </p>
                    </div>

                    <div class="col-md-6 p-3" style="margin-top: -60px;">
                        <h6 class="text-warning" style="margin-left: -20px;">Why is content marketing important?</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: -20px;">Content marketing is a go-to tactic that’s proven to work. Also, it provides a competitive advantage. Take a look at what the data says about content marketing: 
                            Businesses with blogs get 67% more leads than other companies.
                        <h6 class="text-warning" style="margin-left: -10px;">How content marketing works</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: -10px;">Your business can use content marketing to attract leads, make a case for your product or service when someone is researching what to buy, and close sales.
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row scrollable-content">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mt-4 mx-2 w-100 text-warning">Benefits of Content Marketing</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">Strategic content marketing has a proven track record of helping businesses grow brand awareness.
                        </p>
                    </div>
                    <div class="col-md-6"> 
                        <img src="images\Content_img3.png" class="mt-2" style="width: 200px; height: 250px;">
                    </div>
                    <div class="col-md-12"> 
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16);   padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 14px;">1. Increases Conversions</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Great content gives people the information they need to make the next step toward buying.</li>
                                   
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16);  padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 14px;">2. Strengthens Customer Relationships</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Content marketing is all about consistently attracting and engaging with customers.</li>
                               
                            </li>
                        
                            <li class="w-100" style="margin-left: -18px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 14px;">3. Grows Brand Awareness</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">For newer companies, one of the biggest benefits of content marketing is that it ensures potential new customers see your business.</li>
                                    
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: -18px; padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 14px;">4. Increases Website Traffic</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">SEO-driven content brings more potential customers to your website.</li>
                        
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
                        <h3 class="mt-4 mx-2 w-100 text-warning">Content Marketing Pricing</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">Content marketing costs anywhere from $500 – $1000 per month on average in 2024.
                    </div>
                    <div class="col-md-6">
                        <img src="images\Content_img4.png" class="mt-2" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12">
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">How much does content marketing cost per month?</h4>
                                <ul style="list-style-type: none; padding-left: 12px;">
                                    <li style="font-size: 12px;">Content marketings costs between $500 – $1000 per month on average in 2024.</li>
                                    
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px;padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">How much does a content audit cost?</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">A content audit costs $100 – $500 on average.</li>
                            
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px;padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">How much does website content cost?</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Website content costs $250 – $1000 per month on average. </li>
                                  
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
                        $query = mysqli_query($conn, "SELECT * FROM project WHERE client_id = '$unique_id' AND unique_id = '{$cm1['unique_id']}'");
                        $result = mysqli_fetch_assoc($query);
                        $output8 = "";

                        if (!empty($result['unique_id']) == 2228 && !empty($result['client_id']) == $unique_id_to_check) {
                            $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$result['unique_id'].'" class="mx-5 btn btn-outline-warning" style="">Payment</a>';
                        } else {
                            $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$cm1['unique_id'].'" class="mx-5 btn btn-outline-warning" style="">Payment</a>';
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
