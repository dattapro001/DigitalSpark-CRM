<?php 
 session_start();
 if(isset($_SESSION['unique_id'])){
     include_once "config.php";
     $outgoing_id = $_SESSION['unique_id'];
     $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

     $query1 =  mysqli_query($conn, "SELECT * FROM manager WHERE unique_id = '$incoming_id'");
     $row1= mysqli_fetch_assoc($query1);

     $query2 =  mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$incoming_id'");
     $row2= mysqli_fetch_assoc($query2);

      
     if ($row1 !== null && $incoming_id == $row1['unique_id']) {

        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

        $sql = "SELECT * FROM messages 
        LEFT JOIN manager ON manager.unique_id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
       $query = mysqli_query($conn, $sql);

       $smg = "";


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
                                <img src="uploaded_img/' . $row['d_profile'] . '" alt="">
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

     }elseif ($row2 !== null && $incoming_id == $row2['unique_id']) {

        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

        $sql = "SELECT * FROM messages 
        LEFT JOIN developer ON developer.unique_id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
       $query = mysqli_query($conn, $sql);

       $smg = "";


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
                                <img src="uploaded_img/' . $row['d_profile'] . '" alt="">
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

     }




 }else{
    header("location: ../login.php");
}
?>