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
$query3 =  mysqli_query($conn, "SELECT * FROM details WHERE unique_id = '$unique_id'");
$result = mysqli_fetch_assoc($query3);

$ppc =  mysqli_query($conn, "SELECT * FROM ppc WHERE 1");
$ppc1 = mysqli_fetch_assoc($ppc);
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

<body style="background-color: rgb(254,190,16)">
    <div class="container-fluid d-flex" style="position: relative; font-family:'Timmana';">
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row">

                    <div class="col-md-6 p-3">
                        <h3 class="mt-3 mx-2 w-100 text-warning">Pay Per Click Advertising</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">
                            Pay-per-click advertising is a paid online advertising approach that allows your company to display ads all over the internet. Your business can be promoted in search results, websites, and even social media platforms. Text, graphics, and even video can be used in PPC adverts.
                        </p>
                    </div>

                    <div class="col-md-6 p-3 ">
                        <img src="images\PPC_img1.png" class="mt-2" style="width: 150px; height: 180px; padding-bottom: 10px;">
                    </div>
                    <div class="col-md-6 p-3" style="margin-top: 20px;">
                        <img src="images\PPC_img2.png" class="mx-1" style="width: 180px; height: 170px;">
                    </div>

                    <div class="col-md-6 p-3" style="margin-top: -100px;">
                        <h6 class="text-warning" style="margin-left: -30px;">Why is PPC Important?</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: -30px;">Organic SEO takes months to show results. PPC is a high-value method of presenting your products and services to the right kind of audience at the right time.
                        <h6 class="text-warning" style="margin-left: -30px;">What is Pay-Per-Click ad network?</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: -30px;">An ad network is a platform that allows your adverts to be delivered to users. An example of an ad network is Google Ads (formerly known as Google AdWords). You’ll utilize an ad network like Google Advertising, Facebook Ads, or Microsoft Advertising to develop PPC ads.
                    </div>
                 
                 
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row scrollable-content">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-4 mx-2 w-100 text-warning">Why Should You Invest In PPC Packages?</h4>
                        <p class="mt-3 mx-2 w-100" style="font-size: 13px;">Pay-per-click (PPC) advertising is a highly effective way to reach your target audience and drive traffic to your website.    
                        </p>
                    </div>
                    <div class="col-md-6"> 
                        <img src="images\PPC_img3.png" class="mt-5" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12"> 
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Budget Control</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">There is absolutely no minimum investment required to create a Google Ads account or run a Google Ads campaign. </li>
                            
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Scalability</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">You can either scale up or scale down on the basis of the performance of your Google Ads Marketing campaign.</li>
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Analytics</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">You can thoroughly analyse the success of your Google ads campaign with the help of analytic tools.</li>
                                 
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Intent</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">Audience with an Intent is likely to search on Google. Therefore, it provides a platform that gets you connected directly to the target audience through Google ads marketing</li>
                                
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
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">PPC pricing can vary depending on various factors, like your industry or ad network.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src="images\PPC_img4.png" class="mt-2" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12">
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: -10px; padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px; padding-left: 30px;">How much does PPC cost?</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px; margin-right: 10px; padding-left: 25px;"> On average, PPC costs $500 – $1500 per month, $50 – $100 per hour, and $500 – $2500 per project in 2024. How much you pay for SEO will depend on factors unique to your business, like your size, goals, and more.</li>
                        
                            <li class="w-100" style="margin-left: 5px;padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">How much does PPC cost per month?</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px; margin-right: 10px;">On average, PPC costs $500 – $2500 per month. How much you pay for PPC will depend on your company’s size, with smaller businesses spending less than larger companies, which often coordinates with an organization’s PPC needs.</li>
                                   
                                </ul>
                            </li>
                        
                           
                            <li class="w-100" style="margin-left: 5px;padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">How much does PPC cost per project?</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px; margin-right: 10px;">On average, SEO costs $1000 – $5000 per project, though some businesses pay upwards of $1000. How much your PPC project costs will depend on the project’s scope, timeline, and requirements.</li>
                                  
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
                       
                       $output8 = ""; 
                       $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$ppc1['unique_id'].'" class="mx-5 btn btn-outline-warning" >Payment</a>';
                   

                       echo $output8;

               
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
