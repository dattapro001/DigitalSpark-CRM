<?php 
 include 'config.php';
 $message = "";
   session_start();
    if(isset($_SESSION['unique_id'])){
   $user_id = $_SESSION['unique_id'];
   $query ="SELECT * FROM `messages` WHERE incoming_msg_id='$user_id'";
   $allData = mysqli_query($conn,$query);
   $arrayData = mysqli_fetch_array($allData);
   
   if(isset($_POST['send_msg'])){
    $result= mysqli_query($conn,"SELECT * FROM `admin`");
    $data = mysqli_fetch_assoc($result);
    $outgoing_id = $data['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $sql =  mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
    VALUES ('{$incoming_id}', '{$outgoing_id}', '{$message}')") or die(mysqli_error($conn));
    
  }
}
//else{
//   header("location: ../login.php");
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
 
}
body{
  /* background-color:#2546B3; */
  background: #f7f7f7;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 0 10px;
 
  
}
.container{
   width: 1100px;
    height:650px;
    padding: 3%;
    margin-top: 40px;
    margin-bottom: 3%;
    border-radius: 100px 0px 100px 0;
    /* background: #0C173C; */
    background: #fff;
    box-shadow: 0px 10px 10px 10px #8585D5;
    /* display:none; */
    
  }

    .chat-area{
      width:100%;
      height: 100%;
      margin-top:-40px; 
    }
.chat-area header{
  display: flex;
  align-items: center;
  padding: 18px 30px;
  border-bottom:2px solid #C0E8F5;
  
}
.chat-area header .back-icon{
  color: black;
  font-size: 25px;
  margin-left:-20px;
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
  color:black;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size:1.5rem;
}
.chat-area .status{
  color:black;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size:1.1rem;
}
.chat-box{
  position: relative;
  min-height: 500px;
  max-height: 500px;
  border-color:blue;
  overflow-y: auto;
  padding: 10px 30px 20px 30px;
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
  margin: 15px 0;
}
.chat-box .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
  display: flex;
  
}
.chat-box .outgoing .details{
  margin-left: auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #00DE51;
  color: black;
  width: 380px;
  font-weight:bold;
  font-size:1.2rem;
  border-radius: 18px 18px 0 18px;
  box-shadow: 0px 5px 2px 5px rgb(7, 156, 12);
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
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: #25EAFF;
  color: #333;
  width: 380px;
  font-weight:bold;
  font-size:1.2rem;
  border-radius: 18px 18px 18px 0;
  box-shadow: 0px 5px 10px 5px #00799E;
}
.typing-area{
  padding: 18px 30px;
  display: flex;
  justify-content: space-between;
}
.typing-area input{
  height: 35px;
  width: calc(100% - 58px);
  font-size: 16px;
  padding: 0 13px;
  border: 4px solid #e6e6e6;
  outline: none;
  margin-top:-10px;
  border-radius: 5px 0 0 5px;
}
.typing-area button{
  color: #fff;
  width: 55px;
  height: 35px;
  margin-top:-10px;
  border: none;
  outline: none;
  background:rgb(92, 233, 170);
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
  pointer-events: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.3s ease;
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

        .settings-list {
            display: none;
            position: absolute;
            top: 50px;
            right: 10px;
            background: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        /* Style for the individual settings items */
        .settings-item {
            margin: 5px 0;
        }

        /* Style for the color input */
        .color-input {
            width: 60px;
        }


  </style>
  </head>
<body>
  <div class="container">
    <section class="chat-area">
      <header>
        <?php 
          $result= mysqli_query($conn,"SELECT * FROM `admin`");
          $data = mysqli_fetch_assoc($result);
        ?>
        <a href="dev-profile-1.php" class="back-icon"><ion-icon name="arrow-back"></ion-icon></a>
        <img src="uploaded_img/<?php echo $data['image']; ?>" alt="">
        <div class="details">
          <span><?php echo $data['name']?></span>
          <p class="status"><?php echo $data['active_status']; ?></p>

          <button class="settings-button" id="settingsButton"><ion-icon name="settings-outline"></ion-icon></button>
    <div class="settings-list" id="settingsList">
        <div class="settings-item">
            <label for="backgroundColor">Background Color:</label>
            <input type="color" id="backgroundColor" class="color-input">
        </div>
        <div class="settings-item">
            <label for="chatColor">Chat Color:</label>
            <input type="color" id="chatColor" class="color-input">
        </div>
        <!-- Add more settings items as needed -->
    </div>


        </div>
      </header>
      <div class="chat-box">
      <?php
        $outgoing_id = $data['unique_id'];
        $incoming_id = $user_id;
        $smg = "";
        $sql = "SELECT * FROM messages LEFT JOIN admin ON admin.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
          while($row = mysqli_fetch_assoc($query)){
              if($row['outgoing_msg_id'] === $outgoing_id){
                  $smg .= '<div class="chat outgoing">
                              <div class="details">
                                  <p>'. $row['msg'] .'</p>
                              </div>
                              </div>';
                              
              }else{
                  $smg .= '<div class="chat incoming">
                              <img src="uploaded_img/'.$row['image'].'" alt="">
                              <div class="details">
                                  <p>'. $row['msg'] .'</p>
                              </div>
                              </div>';
              }
          }
      }else{
          $smg .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
      }
      echo $smg;

      
      ?>
      </div>
      <form method="post" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden >
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
         <button type="submit" name="send_msg" value="" class="button"><ion-icon name="send"></ion-icon></button>

      </form>
    </section>
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
