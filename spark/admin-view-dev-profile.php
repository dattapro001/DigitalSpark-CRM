<?php
    include 'config.php';

    $message = "";
      session_start();
    if(isset($_SESSION['unique_id'])){
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $fetchQuery = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$user_id'");
    $arrayData = mysqli_fetch_array($fetchQuery);

    $sql = "SELECT * FROM project WHERE id = $id " ;
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    $dev_id1 = $row['developer_1_id'];
    $dev_id2 = $row['developer_2_id'];
    $dev_id3 = $row['developer_3_id'];
    $manager_id = $row['manager_id'];
    $project_id = $row['unique_id'];
  
  }else{
    header("Location : index.php");
  }
  ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script></script>
  <title>DigitalSpark CRM</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href='https://fonts.googleapis.com/css?family=Salsa' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Spicy Rice' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Squada One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Suez One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>

  <style>

body {
            margin: 0;
            padding: 0;
            height: 300px;
            background: url('images/view-bg.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: 'Timmana' !important;
        }
    
        .container {
  width: 70%; 
  height: 140%; 
  border-radius: 50%;
  overflow: hidden; 
  position: relative; 
  margin-top: 2%;
  margin-left: 15%;
}

img {
  object-fit: cover;
  width: 100%; 
  height: 100%; 
  position: absolute;
  left: 0;
  border: 2px solid; 
}

  
.ket::-webkit-scrollbar { 
        display: none; 
 }
</style>


</head>

<body class="ket">
<header class="" style="width: 1350px; display: flex; background-color: rgb(0,0,0,0.9); border-color: white;; margin-left: -20px">
<a href="admin-project-view.php?user_id=<?php echo $project_id ?>&dev1=<?php echo $dev_id1 ?>&dev2=<?php echo $dev_id2 ?>&dev3=<?php echo $dev_id3 ?>
&manager=<?php echo  $manager_id  ?>&id=<?php echo $id  ?>" style="text-decoration: none;"> 
<h6 class=" mx-4 mt-2 text-warning" style="font-family: 'Timmana'; "><b>CRM</b></h6>
</a>
<h5 class="mx-3 text-light mt-2" style="font-family: 'Timmana'">Developer profile</h5>
</header>
  <div class="row mt-2">
    <div class="col-lg-12">
    <div class="card ket" style="font-family: 'Timmana'; height: 600px; width: 1100px; margin-left: 110px; border-radius: 20px; background-color: rgb(0,0,0,0.8); border: 4px solid rgb(254,190,16);  overflow-y: auto;">

      <form method="post" enctype="multipart/form-data">
      <div class="row">

      <div class="col-md-6">

      <div class="container">
      <img class="border-outline-primary " src="uploaded_img\<?php echo $arrayData['d_profile'] ?>" alt="">
      </div>
     

     

 <!-- col-md-6 -->
      </div>

      <div class="col-md-6">
             
             <div class="text-light">
             <p class="mt-2 text-warning" style="font-size: 17px;"><?php echo $arrayData['d_skill'] ?></p>
             <h4><?php echo $arrayData['name'] ?></h4>
             <textarea class="form-control text-light ket" id="txt" type="text" name="text" style="width: 473px; height:150px; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);" readonly><?php echo $arrayData['d_bio'] ?></textarea>
             </div>
      </div>


      <div class="text-light mx-2 col-md-12 text-center" style="position: relative; margin-top: 120px;">
                  <hr class="my-2 bg-light" style="">
                  <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px;">Basic Information</span>
      </div>

      <div class="col-md-12 mt-4">
        <div class="card text-light" style="margin-left: 195px; height: 170px; width: 700px; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);" readonly>
          <div class="row">
          <div class="col-md-6 mt-4 mx-4 " style="width: 370px;">
            <label class="text-warning">Email:  </label>     <?php echo $arrayData['email'] ?><br>
            <label class="mt-3 text-warning">Phone:  </label>     <?php echo $arrayData['d_mobile'] ?><br>
            <label class="mt-3 text-warning">Country:  </label>   <?php echo $arrayData['d_country'] ?>
          </div>

          <div class="col-md-6 mt-5 mx-5 " style="width:200px">
          <label class="text-warning">Join Date :  </label>     <?php echo $arrayData['date'] ?><br>
            <label class="mt-3 text-warning">Unique-ID:  </label>     <?php echo $arrayData['unique_id'] ?><br>
          </div>
          </div>
       </div>
      </div>



      <div class="text-light mx-2 col-md-12 text-center mt-5" style="position: relative;">
                  <hr class="my-2 bg-light" style="">
                  <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px;">What I DO</span>
      </div>

      <div class="col-md-6 mt-2">
             

             <div class="text-light mx-1 mt-2">
              <textarea class="form-control mt-4 text-light ket" id="txt" type="text" name="skill_1" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);" readonly><?php echo $arrayData['skill_1'] ?></textarea>
             </div>

              <div class="text-light mx-1 mt-4">
              <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="skill_2" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);" readonly><?php echo $arrayData['skill_2'] ?></textarea>
             </div>
      </div>

      <div class="col-md-6">
             
      <header class="text-light" style="text-decoration: underline; opacity: 0;"><h5> What I Do </h5></header>

               <div class="text-light mx-1">
                <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="skill_3" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);" readonly><?php echo $arrayData['skill_3'] ?></textarea>
               </div>

                <div class="text-light mx-1 mt-4">
                <textarea class="form-control mt-2 text-light ket" id="txt" type="text" name="skill_4" style="height: 80px ; background-color: rgb(0,0,0,0.8); border-color: rgb(254,190,16);" readonly><?php echo $arrayData['skill_4'] ?></textarea>
               </div>
        </div>

        <div class="text-light mx-1 mt-5" style="opacity: 0;">
        </div>


 <!-- row -->
 </div>

 </form>
<!-- card end -->
</div>
      
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>


</body>

</html>