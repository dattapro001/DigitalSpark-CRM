
<?php 
  session_start();
  include "config.php";

   // Search query
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM manager WHERE name LIKE '%$search%' ORDER BY id DESC";
    $output = "";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) > 0){

        $outgoing_id = $_SESSION['unique_id'];
        $output = "";
        $function = "client";
        if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
        }elseif(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $manager_id = $row['unique_id'];
                $sql1 = "SELECT COUNT(*) as project_count FROM project WHERE manager_id = '$manager_id'";
                $result = mysqli_query($conn, $sql1);
                $row2 = mysqli_fetch_assoc($result);
                $project_count = $row2['project_count'];
    
                $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                        OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
                (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message ";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if(isset($row2['outgoing_msg_id'])){
                    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "<span style='color: yellow;font-size: 17px; '>You: </span>" : $you = "";
                }else{
                    $you = "";
                }
                ($row['active_status'] == "Offline") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
          
                $output .= '<div style=" display: flex; position: relative;align-items: center; cursor: pointer;
                padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px;
                padding-right: 15px; border-bottom-color: #fff; text-decoration: none; margin-left: 0px; margin-top: 5px;  ">
    
                            <div class="content" style="display: flex; align-items: center;">
                            <img src="uploaded_img/'. $row['profile'] .'" alt="" style="object-fit: cover; border-radius: 50%; height: 40px; width: 40px;">
                            <div class="details" style=" margin-left: 20px;">
    
                            <a href="admin-manager-chat.php?user_id='. $row['unique_id'] .'" style="text-decoration:none;"> 
                            <span class="" style="color: white; font-size: 18px;  ">'. $row['name'].'</a></span>
                            <p style="color: white; font-size: 17px;">'. $you . $msg .'</p>
                            </div>
                            </div>
                            <div class="status-dot d-flex" style="position: relative; margin-right: -110px;">
                            <button class="button '. $offline .' text-light" style="width: 55px; height:20px; border-radius: 10px; border: none;"><p class="justify-content-center align-item-center"
                             style="margin-left: -3px; margin-top: -5px; font-size: 17px;  ">'.$row['active_status'].'</p></button>
                            <p class="date text-light" style=" padding: 0px 200px; margin-left: 100px; font-size: 20px;  "><b>'.$project_count.'</b>
                            </p>
                           
                            </div>
                        </div>';
            }

        }
       
         
        
    }else{
        $output .= '<a class="text-warning " style="text-decoration: none; margin-left:300px;">No user found related to your search term</a>';
    }

    echo $output;
   
}
 
   ?>



