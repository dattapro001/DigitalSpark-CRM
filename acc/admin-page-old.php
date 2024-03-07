
<?php 
include 'config.php';
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: admin-login.php");
  die();
}
include('admin-header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
      <div class="col-lg-5 col-sm-5">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-dark text-center  position-absolute">
      <i class="material-icons ">weekend</i>
    </div>
    <div class="text-end pt-1">
      <p>Bookings</p>
      <h4>281</h4>
    </div>
  </div>
  <div class="card-footer">
    <p>55% than the last week</p>
  </div>
</div>

        <div class="card  mb-2">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-dark text-center  position-absolute">
      <i class="material-icons">leaderboard</i>
    </div>
    <div class="text-end pt-1">
      <p>Today's Users</p>
      <h4>2,300</h4>
    </div>
  </div>


  <div class="card-footer p-3">
    <p>3% than last month</p>
  </div>
</div>

      </div>
      <div class="col-lg-5 col-sm-5 mt-4">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2 ">
    <div class="icon icon-lg icon-shape bg-gradient-success text-center position-absolute">
      <i class="material-icons">store</i>
    </div>
    <div class="text-end pt-1">
      <p>Revenue</p>
      <h4>34k</h4>
    </div>
  </div>

 
  <div class="card-footer p-3">
    <p>1% than yesterday</p>
  </div>
</div>

        <div class="card">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-info  text-center position-absolute">
      <i class="material-icons">person_add</i>
    </div>
    <div class="text-end pt-1">
      <p>Followers</p>
      <h4>+91</h4>
    </div>
  </div>


  <div class="card-footer p-3">
    <p>Just updated</p>
  </div>
</div>

      </div>
    </div>
        </div>
    </div>
</div>
<?php include('admin-linechart.php'); ?>

