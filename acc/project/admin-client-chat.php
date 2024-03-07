<?php 
 include 'config.php';
 $message = "";
   session_start();
    if(isset($_SESSION['unique_id'])){
   $unique_id = $_SESSION['unique_id'];
   $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
  
   $query ="SELECT * FROM `messages` WHERE incoming_msg_id='$unique_id'";
   $allData = mysqli_query($conn,$query);
   $arrayData = mysqli_fetch_array($allData);
   

   if(isset($_POST['send_msg'])){
    $outgoing_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $sql =  mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
    VALUES ('{$incoming_id}', '{$outgoing_id}', '{$message}')") or die(mysqli_error($conn));
    
  }
}else{
  header("location: ../login.php");
}

?>
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>DigitalSpark CRM</title>
<head>
<style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
 
}
body {
            margin: 0;
            padding: 0;
            background: url('images/chat-bg.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
.card{
    width: 900px;
    height:550px;
    padding: 3%;
    margin-top: 40px;
    margin-bottom: 3%;
    border-radius: 10px 10px 10px 10px;
    margin-left: 180px;
    background: rgb(255,20,147,0.5);
    /* background: rgba(255, 255, 255, 0);
            box-shadow: 0px 0px 15px 2px #7c7a7a;
            backdrop-filter: blur(60px); */
    
    
  }

    .chat-area{
      width:100%;
      height: 100%;
      margin-top:-40px; 
    }
.chat-area header{
  display: flex;
  align-items: center;
  margin-top:20px;
  border-bottom:2px solid #C0E8F5;
  
}
.chat-area header .back-icon{
  color: white;
  font-size: 25px;
  margin-left:-10px;
}
.chat-area header img{
  height: 45px;
  width: 45px;
  margin: 0 15px;
  border-radius:20px;
}
.chat-area header .details span{
  font-size: 17px;
  font-weight: 500;
  color:white;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size:1.5rem;
}
.chat-area .status{
  color:white;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size:1.1rem;
}
.chat-box{
  position: relative;
  height: 410px;
  width: 850px;
  border-color:blue;
  overflow-y: auto;

  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);            
             
}
.chat-box::-webkit-scrollbar { 
  display: none; 
 } 
.chat-box .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
 
}
.chat-box .chat{
  margin: 15px 0px -20px;
}
.chat-box .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
  display: flex;
  margin-left: 400px;
}
.chat-box .outgoing .details{
  margin-left: auto;
}
.outgoing .details p{
  background: rgb(255,255,255,0.5);
  color: white;
  font-weight:bold;
  font-size:1rem;
  border-radius: 18px 18px 0 18px;
  
}
.chat-box .incoming{
  display: flex;
  align-items: flex-end;
}
.chat-box .incoming img{
  height: 35px;
  width: 30px;
  border-radius: 20px;
}
.chat-box .incoming .details{

  margin-left: 10px;
}
.incoming .details p{
  background: rgb(255,255,255,0.5);
  color: white;
  font-weight:bold;
  font-size:1rem;
  border-radius: 18px 18px 18px 0;
 
}
.typing-area{
  padding: 18px 30px;
  display: flex;
  justify-content: space-between;
  z-index: 2;
}
.typing-area input{
  height: 35px;
  width: calc(100% - 40px);
  font-size: 16px;
  padding: 0 13px;
  border: 4px solid #e6e6e6;
  outline: none;
  margin-top:0px;
  border-radius: 5px 0 0 5px;
}
.typing-area button{
  color: #fff;
  width: 55px;
  height: 35px;
  margin-top: 0px;
  margin-left: 5px;
  border: none;
  outline: none;
  background:rgb(92, 233, 170);
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
  pointer-events: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.3s ease;
  z-index: 2;
}
.typing-area .button.active{
  opacity: 1;
  pointer-events: auto;
  background:rgb(0, 137, 128);
}


.chat-area header .settings-button{
  color: black;
  font-size: 25px;
  margin-left: auto;
  cursor: pointer;
  position: absolute;
  top: 110px; /* Adjust the top position as needed */
  right: 320px; /* Adjust the right position as needed */
  border:none;
  color: red;
  z-index: 1;
}

.dropdown {
            position: absolute;
            top: 10px;
            right: 10px;
            background: white;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }


  </style>
  </head>
<body>
  <div class="container-fluid">
    <div class="col-md-6">
      <div class="card">
    <section class="chat-area">
      <header>
          <?php
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM details WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $data = mysqli_fetch_assoc($sql);
          }
        ?>

        <a href="admin-page.php" class="back-icon"><ion-icon name="arrow-back"></ion-icon></a>
        <img src="uploaded_img/<?php echo $data['image']; ?>" alt="">
        <div class="details">
          <span><?php echo $data['name']?></span>
          <p class="status"><?php echo $data['active_status']; ?></p>
         
          <div class="dropdown">
          <button type="" style="border:none;"  class="" data-bs-toggle="dropdown">
          <ion-icon style="color: deeppink; font-size: 20px;" name="settings-outline"></ion-icon>
          </button>
          <ul class="dropdown-menu" style="background-color: rgb(255,20,147,0.6);">
          <li><a class="dropdown-item drop-item text-info" href="login.php"><b>Profile Details</b></a></li>
          </ul>
          </div>


        </div>
      </header>
      <div class="chat-box">
      <?php
        $outgoing_id = $data['unique_id'];
        $incoming_id = $unique_id;
        $smg = "";
        $sql = "SELECT * FROM messages LEFT JOIN admin ON admin.unique_id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
          while($row = mysqli_fetch_assoc($query)){
              if($row['outgoing_msg_id'] === $outgoing_id){
                  $smg .= '<div class="chat outgoing col-md-6 col-sm-1">
                              <div class="details">
                                  <p>'. $row['msg'] .'</p>
                              </div>
                              </div>';
                              
              }else{
                  $smg .= '<div class="chat incoming col-md-6 col-sm-1">
                              <img src="uploaded_img/'.$row['image'].'" alt="">
                              <div class="details">
                                  <p>'. $row['msg'] .'</p>
                              </div>
                              </div>';
              }
          }
      }else{
          $smg .= '<div class="text text-light">No messages are available. Once you send message they will appear here.</div>';
      }
      echo $smg;

      
      ?>
      </div>
       </section>
       <form method="post" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $unique_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
         <button type="submit" name="send_msg" value="" class="button"><ion-icon name="send"></ion-icon></button>
      </form>
      </div>
    </div>
  </div>

  <script>
const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".button"),
chatBox = document.querySelector(".chat-box");

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

const settingsButton = document.getElementById('settingsButton');
        const settingsList = document.getElementById('settingsList');

        settingsButton.addEventListener('click', () => {
            // Toggle the visibility of the settings list
            if (settingsList.style.display === 'block') {
                settingsList.style.display = 'none';
            } else {
                settingsList.style.display = 'block';
            }
        });

        // You can add event listeners to handle changes in color settings
        const backgroundColorInput = document.getElementById('backgroundColor');
        const chatColorInput = document.getElementById('chatColor');

        backgroundColorInput.addEventListener('input', (event) => {
            const backgroundColor = event.target.value;
            // Update the background color of your chat area or container
            document.body.style.backgroundColor = backgroundColor;
        });

        chatColorInput.addEventListener('input', (event) => {
            const chatColor = event.target.value;
            // Update the chat text color
            // You would apply this color to your chat text elements
            // Example: document.querySelector('.chat-text').style.color = chatColor;
        });

  
  </script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
