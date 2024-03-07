<?php 
  session_start();
  include "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f7f7f7;
  padding: 0 10px;
}
.img{

 width : 1590px;
 height: 800px;
 margin-left:-5px;
 position: absolute;
 border-radius:20px;
 display:flex;
 z-index: 1;
 
}

.wrapper{
  background: #fff;
  width: 1200px;
  margin-top:20px;
  margin-right:-200px;
  border-radius: 16px;
  box-shadow: 0px 10px 10px 10px #8585D5;
  background-color: white;
  z-index: 2;
}

  .users{
  padding: 25px 30px;
}
.users header,
.users-list a{
  display: flex;
  align-items: center;
  padding-bottom: 20px;
  border-bottom: 1px solid #e6e6e6;
  justify-content: space-between;
}
.wrapper img{
  object-fit: cover;
  border-radius: 50%;
}
.users header img{
  height: 50px;
  width: 50px;
}
.back-icon{
  color:white;
  font-size: 1.5rem;
  padding: 20px;
}
:is(.users, .users-list) .content{
  display: flex;
  align-items: center;
}
:is(.users, .users-list) .content .details{
  color: #fff;
  margin-left: 20px;
}
:is(.users, .users-list) .details span{
  font-size: 18px;
  font-weight: 500;
  
}
.users .search{
  margin: 20px 0;
  display: flex;
  position: relative;
  align-items: center;
  justify-content: space-between;
}
.users .search .text{
  font-size: 18px;
  color:black;
}
.users .search input{
  position: absolute;
  height: 42px;
  width: calc(100% - 50px);
  font-size: 16px;
  padding: 0 200px;
  margin-left: -670px;
  margin-top:-20px;
  border: 1px solid #e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.2s ease;
}
.users .search input.show{
  opacity: 1;
  pointer-events: auto;
}
.users .search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: black;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.2s ease;
}
.users .search button.active{
  background: black;
  color: #fff;
}
.search button.active i::before{
  content: '\f00d';
}
.users-list{
  max-height: 350px;
  overflow-y: auto;
}
:is(.users-list, .chat-box)::-webkit-scrollbar{
  width: 0px;
}
.users-list a{
  padding-bottom: 10px;
  margin-bottom: 15px;
  padding-right: 15px;
  border-bottom-color: #f1f1f1;
}
.users-list a:last-child{
  margin-bottom: 0px;
  border-bottom: none;
}
.users-list a img{
  height: 40px;
  width: 40px;
}
.users-list a .details p{
  color: black;
}
.users-list a .status-dot{
  font-size: 12px;
  color: #468669;
  padding-left: 10px;
}
.users-list a .status-dot.offline{
  color: #ccc;
}

@media screen and (max-width: 450px) {
  .form, .users{
    padding: 20px;
  }
  .form header{
    text-align: center;
  }
  .form form .name-details{
    flex-direction: column;
  }
  .form .name-details .field:first-child{
    margin-right: 0px;
  }
  .form .name-details .field:last-child{
    margin-left: 0px;
  }

  .users header img{
    height: 45px;
    width: 45px;
  }
  .users header .logout{
    padding: 6px 10px;
    font-size: 16px;
  }
  :is(.users, .users-list) .content .details{
    margin-left: 15px;
  }

  .users-list a{
    padding-right: 10px;
  }
}

  </style>
</head>

<body>
  
<div class="card d-flex" style="margin-left: 200px; position: absolute; z-index: 3;
 background-color: deeppink; width: 1150px; height: 100px; margin-top: -440px; border-radius: 10px;">
 <a href="admin-page.php" class="back-icon" style="text-decoration: none;">
 <ion-icon class="" style="color: black;" name="arrow-back"></ion-icon> Client Table</a>
   </div>

  <div class="wrapper">
      
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
        </div>

      </header>
      <div class="search">
        <span class="text">Select a client to start chat</span>
        <form>
        <input type="text" name="search" id="search" placeholder="Enter name to search...">
          </form>
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list" id="search-results">
        <?php    

        $outgoing_id = $_SESSION['unique_id'];
        $sql = "SELECT * FROM details WHERE NOT unique_id = {$outgoing_id} ORDER BY id DESC";
        $query = mysqli_query($conn, $sql);
        $output = "";
        if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
        }elseif(mysqli_num_rows($query) > 0){

          while($row = mysqli_fetch_assoc($query)){
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($row2['incoming_msg_id'])){
                ($outgoing_id == $row2['incoming_msg_id']) ? $you = "You: " : $you = "";
                echo $you;
            }else{
                $you = "";
            }
            ($row['active_status'] == "Offline now") ? $offline = "offline" : $offline = "";
            ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
      
            $output .= '<a href="admin-client-chat.php?user_id='. $row['unique_id'] .'">
                        <div class="content">
                        <img src="uploaded_img/'. $row['image'] .'" alt="">
                        <div class="details">
                            <span class="" style="color: black;">'. $row['name'].'</span>
                            <p>'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>';
        }

        }
       
         echo $output;

   
  ?>

      </div>
    </section>
  </div>

  <script>

const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

$(document).ready(function() {
    $('#search').on('input', function() {
        var query = $(this).val();

        if (query != '') {
            $.ajax({
                url: 'admin-client-search.php',
                method: 'GET',
                data: { search: query },
                success: function(data) {
                    $('#search-results').html(data);
                }
            });
        } else {
            $('#search-results').html('');
        }
    });
});
  </script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
