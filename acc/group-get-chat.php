<?php 
 session_start();
 if(isset($_SESSION['unique_id'])){
     include_once "config.php";
     $outgoing_id = mysqli_real_escape_string($conn, $_GET['user_id']);
     $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);


$smg = "";
$sql = "SELECT * FROM messages 
        LEFT JOIN admin ON admin.unique_id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = $outgoing_id AND incoming_msg_id = $incoming_id)
        OR (outgoing_msg_id = $incoming_id AND incoming_msg_id = $outgoing_id) 
        ORDER BY msg_id";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['outgoing_msg_id'] == $outgoing_id) {
            $smg .= '<div class="chat outgoing col-md-6 col-sm-1">
                        <div class="details">
                            <p>' . $row['msg'] . '</p>
                        </div>
                    </div>';
        } else {
            $smg .= '<div class="chat incoming col-md-6 col-sm-1">
                        <img src="uploaded_img/' . $row['image'] . '" alt="">
                        <div class="details">
                            <p>' . $row['msg'] . '</p>
                        </div>
                    </div>';
        }
    }
} else {
    $smg .= '<div class="text text-light">No messages are available. Once you send a message, it will appear here.</div>';
}

echo $smg;
 }else{
    header("location: ../login.php");
}
?>