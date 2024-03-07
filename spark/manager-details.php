
<style>
      .text::-webkit-scrollbar { 
        display: none; 
 }
  </style>

<?php 


session_start(); 
include 'config.php'; 
$output2 ="";
if (isset($_POST['project_id'])) {
    $project_id = $_POST['project_id'];

    
    $query = mysqli_query($conn, "SELECT * FROM project WHERE id = '{$project_id}'");
    $row = mysqli_fetch_assoc($query);
 
    
    $dev1_id = $row['developer_1_id'];
    $dev2_id = $row['developer_2_id'];
    $dev3_id = $row['developer_3_id'];

    $sql2 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev1_id'");
    $dev1 = mysqli_fetch_assoc($sql2); 
    $sql3 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev2_id'");
    $dev2 = mysqli_fetch_assoc($sql3); 
    $sql4 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev3_id'");
    $dev3 = mysqli_fetch_assoc($sql4);
    
    if (isset($_POST['submit'])) {

      $status = $_POST['status'];
      $progress1 = $_POST['progressInput1'];
      $progress2 = $_POST['progressInput2']; // Corrected
      $progress3 = $_POST['progressInput3'];
      

      $sql5 ="UPDATE `project` SET status = '$status' , dev_1_pog = '$progress1' , dev_2_pog = '$progress2' ,
      dev_3_pog = '$progress3' WHERE id='$project_id'";      
        $result5 = mysqli_query($conn, $sql5);

        echo '<script>alert("Changes Done!");
             window.location.href = "manager.php";
             </script>';
    }

    // Return the details as JSON
    $output2 .=' 
  
    <form method="post" action="manager-submit.php?user_id='.$project_id.'">
     <div class="card col-md-12 mt-2 " style="height: 630px; margin-left: 0px; width: 800px; border-radius: 20px; background-color: rgba(52,71,103,.3); box-shadow: 0 2px 17px 0 rgba(0,0,0,.7);">
      <div class="text-light mt-3">
        <label class="text-light" style="text-decoration: underline;">Project Name</label>
        <p class="" style="margin-top: -5px;">'.$row['name'].'</p>
      </div>
      <div class="des text-light" style="margin-left: 250px; margin-top: -70px;">
        <label class="text-light" style="text-decoration: underline;" class="">Project-Requirements</label>
        <textarea style="height: 230px; background-color: rgb(0,0,0,0.6); border-color: rgb(0,0,0,0.6);" class="form-control w-100 text-light text" readOnly>

'.$row['des_1'].'
'.$row['des_2'].'
'.$row['des_3'].'
'.$row['des_4'].'
'.$row['des_5'].'
'.$row['des_6'].'
'.$row['des_7'].'
        
        </textarea>
      </div>
      <div class="col-md-3 text-light" style="margin-left: -15px; margin-top: -200px;">
        <label for="status" class="text-light" style="text-decoration: underline;">Status</label>
        <select class="form-select btn btn-outline-light" name="status" id="status" style="margin-top: -5px; value = '.$row['status'].'">
        <option '.(($row['status'] == 'Pending') ? 'selected' : '').'>Pending</option>
        <option '.(($row['status'] == 'On-Hold') ? 'selected' : '').'>On-Hold</option>
        <option '.(($row['status'] == 'Processing') ? 'selected' : '').'>Processing</option>
        <option '.(($row['status'] == 'Done') ? 'selected' : '').'>Done</option>
        </select>
    </div>
    <div class="star text-light" style="margin-top: -80px;">
      <label class="text-light" style="text-decoration: underline;">Start-Date</label>
      <p class="" style="margin-top: -10px;">'.$row['start'].'</p>
    </div>
    <div class="end text-light" style="margin-top: -10px;">
      <label class="text-light"style="text-decoration: underline;">End-Date</label>
      <p class="" style="margin-top: -10px;">'.$row['end'].'</p>
    </div>

      <label class="text-light" style="text-decoration: underline;">Set Work Activitices</label>
      <div class="card mt-2" style=" height: 300px; border-radius: 20px; background-color: rgb(0,0,0,0.6); ">

 
        <div class="profile d-flex text-light" style="margin-top: 60px; ">
          <div class="details" style="margin-left: 30px;">
              <img src="uploaded_img/'.$dev1['d_profile'].'" style="margin-left: 60px;">
              <p style="width: 200px; margin-left: 25px;">'.$row['developer_1'].'</p>
              <label for="progressInput" class="text-light" style="">Working:</label>
                <input type="number" class="btn btn-outline-light" id="progressInput-0" value="'.$row['dev_1_pog'].'" name="progressInput1" min="0" max="100" step="1" oninput="updateProgressBar(0)">
                <div class="progress mt-2" role="progressbar" aria-label="Profile progress bar" aria-valuenow="'.$row['dev_1_pog'].'" aria-valuemin="0" aria-valuemax="100" style="width: 180px;">
                <div id="progress-0" class="progress-bar progress-bar-striped text-light" style="width: '.$row['dev_1_pog'].'%; background-color: deeppink"></div>
            </div>
          </div>


    
          <div class="details" style="margin-left: 40px;">
              <img src="uploaded_img/'.$dev2['d_profile'].'" style="margin-left: 60px;">
              <p style="width: 200px; margin-left: 30px;">'.$row['developer_2'].'</p>
              <label for="progressInput-1" class="text-light"  style="">Working:</label>
              <input type="number" class="btn btn-outline-light" id="progressInput-1" value="'.$row['dev_2_pog'].'" name="progressInput2" min="0" max="100" step="1" oninput="updateProgressBar(1)">
              <div class="progress mt-2" role="progressbar" aria-label="Profile progress bar" aria-valuenow="'.$row['dev_2_pog'].'%" aria-valuemin="0" aria-valuemax="100" style="width: 180px;">
                  <div id="progress-1" class="progress-bar progress-bar-striped  text-light" style="width: '.$row['dev_2_pog'].'%; background-color: deeppink"></div>
              </div>
          </div>


      
          <div class="details" style="margin-left: 40px;">
              <img src="uploaded_img/'.$dev3['d_profile'].'" style="margin-left: 60px;">
              <p style="width: 200px; margin-left: 25px;">'.$row['developer_3'].'</p>
              <label for="progressInput-2" class="text-light"  style="">Working:</label>
              <input type="number" class="btn btn-outline-light" id="progressInput-2" value="'.$row['dev_3_pog'].'" name="progressInput3" min="0" max="100" step="1" oninput="updateProgressBar(2)">
              <div class="progress mt-2" role="progressbar" aria-label="Profile progress bar" aria-valuenow="'.$row['dev_3_pog'].'%" aria-valuemin="0" aria-valuemax="100" style="width: 180px;">
                  <div id="progress-2" class="progress-bar progress-bar-striped text-light" style="width: '.$row['dev_3_pog'].'%; background-color: deeppink"></div>
              </div>
          </div>
  
      <!-- end Profile-->
      </div>
          
     <input type="submit" class="btn btn-outline-light w-50" style="margin-top: 30px; margin-left: 180px;">     

        <!-- end card 2 -->
      </div>


    <!-- card end -->
     </div>

</form>
  

    
    ';

    echo $output2;
    
    
} else {
    // Handle the case where project_id is not set
    echo json_encode(['error' => 'Project ID not provided']);
}


?>

<script>
       function updateProgressBar(index) {
            // Get the input and progress bar elements
            var inputElement = document.getElementById('progressInput-' + index);
            var progressBarElement = document.getElementById('progress-' + index);

            // Get the value from the input element
            var value = inputElement.value;

            // Update the width of the progress bar
            progressBarElement.style.width = value + '%';

            // Update the aria-valuenow attribute for accessibility
            progressBarElement.setAttribute('aria-valuenow', value);
        }
    </script>