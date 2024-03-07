<?php 
include "config.php";
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: index.php");
  die();
}
$output ="";
$unique_id = $_SESSION['unique_id'];


$seo =  mysqli_query($conn, "SELECT * FROM seo WHERE 1");
$seo1 = mysqli_fetch_assoc($seo);
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
            background: #A4AED1;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; 
  
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

<body style="background-color: #08a0e9;">
    <div class="container-fluid d-flex" style="position: relative; font-family:'Timmana';">
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="wave-layer"></div>
                <div class="row">

                    <div class="col-md-6 p-3">
                        <h3 class="mt-3 mx-2 w-100 text-warning">Search Engine Optimization</h3> 
                        <p class="mt-3 mx-2 w-100" style="font-size: 13px;">
                            Search engine optimization (SEO) is the procedure of facilitating your customers connect with your business online.
                        </p>
                    </div>

                    <div class="col-md-6 p-3">
                        <img src="images/SEO_img1.png" class="" style="width: 150px; height: 200px; margin-top: -30px;">
                    </div>
                    <div class="col-md-6 p-3" style="margin-top: -70px;">
                        <img src="images/SEO_img2.png" class="mx-1" style="width: 180px; height: 170px;">
                        <h6 class="text-warning" style="margin-left: 10px;">How SEO Works?</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: 10px;">Is the practice of optimizing a website to improve its visibility on search engines like Google.
                         The goal is to increase the quantity and quality of organic (non-paid) traffic to a website.SEO involves various strategies and techniques, both on-page and off-page,
                          to enhance a site's relevance and authority in the eyes of search engines.</p>
                    </div>

                    <div class="col-md-6 p-3" style="margin-top: -100px;">
                        <h6 class="text-warning" style="margin-left: -30px;">Why is SEO So Important?</h6>
                        <p class=" w-100" style="font-size: 13px; margin-left: -20px;">SEO is important because it improves your website's visibility in search engines, increases credibility, attracts targeted traffic, enhances user experience, and provides a cost-effective way to compete online.
                        <h6 class="text-warning" style="margin-left: -10px;">How can SEO help my business to grow</h6>
                        <p class=" w-100" style="font-size: 12px; margin-left: -10px;">SEO helps your business rank on top of Search Engines like Google. Once your website appears on the first page of Google that means most users will click through your website. When a person reaches your website then eventually depending on your sales strategies will buy your product or services or may even become a long lasting customer.
                    </div>
                    
                   
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row scrollable-content">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mt-4 mx-2 w-100 text-warning">Why SEO Is Important for Business</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">SEO is important for businesses because it helps you attain visibility for search queries organically. This helps you earn rankings rather than having to pay for them with pay-per-click (PPC) ads. 
                        </p>
                    </div>
                    <div class="col-md-6"> 
                        <img src="images/SEO_img3.png" class="mt-5" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12"> 
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">Organic Search Is a Good Source of Website Traffic</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">- Organic search is often one of the highest sources of traffic for companies. And sometimes, SEO traffic is the primary source. </li>
                                 
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">SEO Is Cost-Effective</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">- SEO is usually a more cost-effective way to drive traffic compared to channels like paid social. </li>
                                   
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;"> SEO Complements Paid Marketing Efforts</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">- There’s clearly a connection between PPC and SEO. 
                                        This could be because you simply occupy more real estate on SERPs. 
                                    </li>
                               
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: 10px; border-bottom: 2px solid rgb(254,190,16); padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">SEO Is a Scalable Growth Channel </h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px;">- SEO is one of the few truly scalably customer acquisition channels. 
Think of SEO as a continuous cycle where your action (creating content) drives an output (rankings, traffic, and customer acquisition).
                                    </li>
                               
                                </ul>
                            </li>
                        
                            
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
      </div>

        <div class="container">
            <div class="card mt-2 text-light" style="height: 630px; height: 630px; background-color: rgb(0,0,0, 0.7); border-color: rgb(254,190,16)">
                <div class="row scrollable-content">
                    <div class="col-md-6">
                        <h3 class="mt-4 mx-2 w-100 text-warning">SEO pricing</h3>
                        <p class="mt-3 mx-2 w-100" style="font-size: 12px;">Are you looking for affordable SEO Packages? DigitalSpark offers affordable SEO packages for small to large size businesses.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src="images/SEO_img4.png" class="mt-2" style="width: 150px; height: 200px;">
                    </div>
                    <div class="col-md-12">
                        <ul style="list-style-type: none; padding: 0;">
                            <li class="w-100" style="margin-left: 10px; padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px; padding-left: 10px;">How much does SEO cost?</h4>
                                <ul style="list-style-type: none; padding-left: 20px;">
                                    <li style="font-size: 12px; margin-left: -25px; padding-left: 15px;"> On average, SEO costs $2500 – $7500 per month, $50 – $100 per hour, and $1000 – $5000 per project in 2024. How much you pay for SEO will depend on factors unique to your business, like your size, goals, and more.</li>
                                
                            <li class="w-100" style="margin-left: -10px; padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">How much does SEO cost per month?</h4>
                                <ul style="list-style-type: none; padding-left: 0px;">
                                    <li style="font-size: 12px;">On average, SEO costs $2500 – $7500 per month (48% of respondents). How much you pay for SEO will depend on your company’s size, with smaller businesses spending less than larger companies, which often coordinates with an organization’s SEO needs.</li>
                                   
                                </ul>
                            </li>
                        
                            <li class="w-100" style="margin-left: -10px;padding: 10px 0;">
                                <h4 class="text-warning" style="font-size: 13px;">How much does SEO cost per project?</h4>
                                <ul style="list-style-type: none; padding-left: 0px;">
                                    <li style="font-size: 12px; margin-right: 20px;">On average, SEO costs $1000 – $5000 per project (51.92% of respondents), though some businesses pay upwards of $10,000. How much your SEO project costs will depend on the project’s scope, timeline, and requirements.</li>
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
                    $query = mysqli_query($conn, "SELECT * FROM project WHERE client_id = '$unique_id' AND unique_id = '{$seo1['unique_id']}'");
                    $result = mysqli_fetch_assoc($query);
                    $output8 = "";

                    if (!empty($result['unique_id']) == 2225 && !empty($result['client_id']) == $unique_id_to_check) {
                        $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$result['unique_id'].'" class="mx-5 btn btn-outline-warning" style="">Payment</a>';
                    } else {
                        $output8 .= '<a href="payment.php?user_id='.$_SESSION['unique_id'].'&project_id='.$seo1['unique_id'].'" class="mx-5 btn btn-outline-warning" style="">Payment</a>';
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
