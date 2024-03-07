<?php

include 'config.php';
$message = "";
session_start();
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM `developer` WHERE d_id='$user_id'";
$allData = mysqli_query($conn, $query);

$arrayData = mysqli_fetch_array($allData);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script></script>

  <style>
    .container {
      display: inline-block;


    }

    .image-container img {
      width: 140%;
      height: 300px;
      margin-left: -20px;

    }

    .image-profile {
      display: inline-block;
      margin-bottom: 150px;
    }

    .image-profile img {
      position: relative;
      width: 200px;
      height: 180px;
      margin-top: -30%;
      margin-left: 80px;
    }

    .dropdown {
      margin-left: 1000px;
      margin-top: -120px;
    }

    .naco {
      margin-left: 310px;
      margin-top: -245px;
    }

    .about {
      margin-top: 100px;

    }

    .message {
      margin-left: 1150px;
      margin-top: -60px;
    }

    .logout {
      margin-left: 1250px;
      margin-top: -40px;
    }

    .dropdown .btn {
      margin-left: -40px;

      margin-top: -63px;
      background-color: blueviolet;
    }

    body {
      background-color: #8cb0bc;
    }

    p {
      font-weight: bold;
      font-size: 25px;
    }

    .dropdown .dropdown-menu {
      background-color: skyblue;
    }

    .logout {
      position: absolute;
      right:9rem;
      top: 21.6rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="image-container">
    <?php
    echo '<img class="img-thumbnail" id="profile-image" style="object-fit:cover; margin-left:50px; width:150%" src="uploaded_img/'.$arrayData['d_cover'].'">'
      ?>
    </div>

    <div class="image-profile">
    <?php
      echo '<img class="img-thumbnail" id="profile-image" src="uploaded_img/'.$arrayData['d_profile'].'">'
      ?>
    </div>                           
    <div class="naco">
      <p class="name">
        Name:
        <?php echo $arrayData['d_name']; ?>
      </p>
      <p cass="contact">
        Mobile:
        <?php echo $arrayData['d_mobile']; ?>
      </p>
      <p>About:
        <?php echo $arrayData['d_skill']; ?>
      </p>
    </div>



  </div>

  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Update Profile
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="dev-profile-change.php">Update Profile Picture</a></li>
      <li><a class="dropdown-item" href="dev-cover-change.php">Update Cover Picture</a></li>
      <li><a class="dropdown-item" href="dev-details-change.php">Update details</a></li>

    </ul>
  </div>
  <div class="message">
  <button type="submit" class="btn btn-primary">
      <a href="dev-admin-chat.php" style="text-decoration: none; color: white;">Message</a>
    </button>
  </div>
  <div class="logout">
    <button type="submit" class="btn btn-primary">
      <a href="dev-logout.php?logout_id=<?php echo $arrayData['unique_id']; ?>" style="text-decoration: none; color: white;">logout</a>
    </button>

  </div>

  </button>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

</body>

</html>