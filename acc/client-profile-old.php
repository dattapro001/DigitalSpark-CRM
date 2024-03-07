<?php
include 'config.php';
$message = "";
session_start();
$user_id = $_SESSION['user_id'];
$query ="SELECT * FROM `details` WHERE id='$user_id'";
$allData = mysqli_query($conn,$query);

$arrayData = mysqli_fetch_array($allData);
 
// update Profile
if(isset($_POST['update_details'])){
    $update_name = $_POST['update_name'];
    $update_phone = $_POST['update_phone'];
    $update_country = $_POST['update_country'];
    $update_profession = $_POST['update_profession'];
    $skill1 = $_POST['skill1'];
    $skill2 = $_POST['skill2'];
    $skill3 = $_POST['skill3'];
    $update_bio = $_POST['bio'];

   // $email_pattern = "/(cse|eee|law)_\d{10}@lus\.ac\.bd/";

    $name_pattern = "/[A-Za-z ]+$/";
    $phone_pattern = "/(\+88)?-?01[3-9]\d{8}/";
    $country_pattern = "/[A-Za-z ]+$/";
    $profession_pattern = "/[A-Za-z ]+$/";
    $skill1_pattern = "/[A-Za-z ]+$/";
    $skill2_pattern = "/[A-Za-z ]+$/";
    $skill3_pattern = "/[A-Za-z ]+$/";
    $bio_pattern = "/[A-Za-z 0-9,.-]+$/";


    if(!preg_match($name_pattern,$update_name)){
        $message= "<div class='alert alert-danger' style='margin-top:-20px;'>Only Characters (Name Field)!</div>";
    }elseif(!preg_match($phone_pattern,$update_phone)){
        $message= "<div class='alert alert-danger' style='margin-top:-20px;'>Only Bangladeshi Phone Number!</div>";
    }elseif(!preg_match($country_pattern,$update_country)){
        $message= "<div class='alert alert-danger' style='margin-top:-20px;'>Only Characters (Country Field)!</div>";
    }elseif(!preg_match($profession_pattern,$update_profession)){
        $message= "<div class='alert alert-danger' style='margin-top:-20px;'>Only Characters (Profession Field)!</div>";  
    }elseif(!preg_match($skill1_pattern,$skill1)){
        $message= "<div class='alert alert-danger' style='margin-top:-20px;'>Only Characters (Interest Field)!</div>";
    }elseif(!preg_match($skill2_pattern,$skill2)){
        $message= "<div class='alert alert-danger' style='margin-top:-20px;'>Only Characters (Interest Field)!</div>";
    }elseif(!preg_match($skill3_pattern,$skill3)){
        $message= "<div class='alert alert-danger' style='margin-top:-20px;'>Only Characters (Interest Field)!</div>";
    }elseif(!preg_match($bio_pattern,$update_bio)){
        $message= "<div class='alert alert-danger' style='margin-top:-20px;'>Only Characters (Bio Field)!</div>";
    }else{
        mysqli_query($conn, "UPDATE `details` SET name = '$update_name' , bio = '$update_bio' , phone ='$update_phone' , country= '$update_country' , profession= '$update_profession',
         interest1 = '$skill1' , interest2 = '$skill2' , interest3 = '$skill3' WHERE id = '$user_id'") or die('query failed');
    //  echo "<script> alert('Details Updated Succesfully!!') </script>"; 
     header("Location: client-profile.php");
    }


     $update_image = $_FILES['update_image']['name'];
     $update_image_size = $_FILES['update_image']['size'];
     $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
     $update_image_folder = 'uploaded_img/'.$update_image;
   
     if(!empty($update_image)){
           $image_update_query = mysqli_query($conn, "UPDATE `details` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
           if($image_update_query){
              move_uploaded_file($update_image_tmp_name, $update_image_folder);
           }
        //    $message= "<div class='alert alert-success'>Details Updated Successfully !</div>";
           header("Location: client-profile.php");
        }
  }
  
//Update Password
if(isset($_POST['update_password'])){
    
    $old_pass = $_POST['old_pass']; 
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass =$_POST['confirm_pass'];

    $pass_Pattern = "/((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])).{6,20}/";

    if(!preg_match($pass_Pattern,$new_pass)){
        $message= "<div class='alert alert-danger' style='margin-top:-12px;'>Contain 1 Uppercase 1 Lowercase 1 Digit & 1 Special Characters!</div>";
    }elseif(!empty($current_pass) || !empty($new_pass) || !empty($confirm_pass)){
       if($current_pass != $old_pass){
          $message = "<div class='alert alert-danger' style='margin-top:-45px;'>old password not matched!</div>";
       }elseif($new_pass != $confirm_pass){
          $message = "<div class='alert alert-danger' style='margin-top:-45px;'>confirm password not matched!</div>";
       }else{
          mysqli_query($conn, "UPDATE `details` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
          echo "<script> alert('Password Updated Succesfully!!') </script>"; 
       }
    }
  
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.js">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  

  
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>DigitalSpark CRM</title>


  <style>
    
    body{
    
      }

:root{
  --white-color: #fff;
  --blue-color: #4070f4;
  --grey-color: #707070;
  --grey-color-light: #aaa;
}

.profile-img{
    text-align: center;
    
}
.profile-img img{
    width: 80%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -10%;
    width: 80%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h3{
    color: white;
}
.profile-head h5{
    color: white;
}
.input textarea {
  margin-top: 0px;
  width: 575px;
  height: 90px;
  outline: none;
  background: transparent;
  border: 1px solid #092c3e;
  padding: 10px;
  box-sizing: border-box;
  color: #fff;
  border-color:rgb(3, 125, 84);
}

.input textarea:hover {
  border-color: aqua;
}

 .update-button{
  margin-left: 370px;
  padding:30px 30px 4px;
  font-size: 17px;
  border-radius: 6px;
  border-bottom: 2px solid red;
  background: transparent;
  cursor: pointer;

  
}
.update-button:hover{
  border-bottom: 2px solid deeppink;
  transform: scale(0.97);
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head input{
    border:none;
    outline:none;
    border-bottom: 2px solid gainsboro;
    color: var(--blue-color)
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:4px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 20px;
    color: white;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work input{
    border: none;
   outline: none;
   border-bottom: 1px solid aqua;
   background: transparent;
   color: #fff;
   width: 180px;
   margin-top: 10px;
   font-size: 0.9rem;
   font-weight: 500;
}
.profile-tab label{
    margin-left:20px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 0.9rem;
    color:white;
}
.profile-tab input{
    border: none;
  outline: none;
  border-bottom: 1px solid aqua;
  background: transparent;
  color: #fff;
  width: 230px;
  margin-top: 10px;
  font-size: 0.9rem;
  font-weight: 500;

}
.icon{
    margin-left:-15px;
    color:aqua;
}
.logout label{
    position:absolute;
    color:white;
}
  </style>

  <script>
// image upload
$(document).ready(function() {
         $('#icon').change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
               $('#profile-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
         });
      });
  </script>

</head>
<body>
  <div class="card emp-profile">
                <div class="row">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">

                        <div class="profile-img">
                        <?php
                         if($arrayData['image'] == ''){
                           echo '<img src="img/user.jpeg">';
                           }else{
                              echo '<img class="img-fluid img-thumbnail" id="profile-image" src="uploaded_img/'.$arrayData['image'].'">';
                             }
                             ?>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="update_image" id="icon"/>
                            </div>
                         </div>
       

                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h3><?php echo $arrayData['name'];?></h3>
                                    <h5><?php echo $arrayData['profession'];?></h5>
                                    <div class="input">
                                    <textarea name="bio"><?php echo $arrayData['bio'];?></textarea>
                                    </div>  
                            <ul class="nav nav-tabs mt-2">
                                <li class="nav-item">
                                    <a class="nav-link active" id="" data-toggle="tab" href="#home">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="" data-toggle="tab" href="#password">Password</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="" data-toggle="tab" href="#logout">Logout</a>
                              </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>INTERREST</p>
                            <input type="text" name="skill1" class="file-control" value="<?php echo $arrayData['interest1'];?>" >
                             <ion-icon class="icon" name="create-outline"></ion-icon>
                             <input type="text" name="skill2" class="file-control" value="<?php echo $arrayData['interest2'];?>">
                             <ion-icon class="icon" name="create-outline"></ion-icon>
                             <input type="text" name="skill3" class="file-control" value="<?php echo $arrayData['interest3'];?>">
                             <ion-icon class="icon" name="create-outline"></ion-icon>
                             
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab">
                            <div class="tab-pane fade show active" id="home">
                            <?php echo $message;?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                              <input type="text" class="details" name="update_name" value="<?php echo $arrayData['name'];?>"><ion-icon class="icon" name="create-outline"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                              <input type="fixed" class="details" value="<?php echo $arrayData['email'];?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                              <input type="number" class="details" name="update_phone" value="<?php echo $arrayData['phone'];?>"><ion-icon class="icon" name="create-outline"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="details" name="update_country" value="<?php echo $arrayData['country'];?>"><ion-icon class="icon" name="create-outline"></ion-icon> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                              <input type="text" class="details" name="update_profession" value="<?php echo $arrayData['profession'];?>"><ion-icon class="icon" name="create-outline"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                          <input type="submit" class="update-button"  name="update_details" value="Update Details"/>
                                      </div>
                            </div>
                            <div class="tab-pane" id="password">
                            <?php echo $message;?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Old Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" name="old_pass" class="file-control" value="<?php echo $arrayData['password'];?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                              <label>Current Password</label>
                                          </div>
                                          <div class="col-md-6">
                                              <input type="password" name="current_pass" class="file-control" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}" 
                                              title="contain 1 digit 1 uppercase 1 lowercase 1 special charecter minimum 6 length"><ion-icon class="icon" name="create-outline"></ion-icon>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <label>New Password</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="new_pass" class="file-control" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}" 
                                            title="contain 1 digit 1 uppercase 1 lowercase 1 special charecter minimum 6 length"><ion-icon class="icon" name="create-outline"></ion-icon>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <label>Confirm New Password</label>
                                      </div>
                                      <div class="col-md-6">
                                          <input type="password" name="confirm_pass" class="file-control"  pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()]).{6,20}" 
                                          title="contain 1 digit 1 uppercase 1 lowercase 1 special charecter minimum 6 length"><ion-icon class="icon" name="create-outline"></ion-icon>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                    <input type="submit" class="update-button" value="Update Password" name="update_password"/>
                                </div>
                                </form>
                                    </div>

                                    <div class="tab-pane" class="logout" id="logout">
                                      <div class="row">
                                        <div class="col-md-6">
                                        <a href="client-logout.php?logout_id=<?php echo $arrayData['unique_id']; ?>" class="logout">Logout</a>
                                        <label> From : <?php echo $arrayData['name'];?> </label>
                                      </div>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- ICON -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>