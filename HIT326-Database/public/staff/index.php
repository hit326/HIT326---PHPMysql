<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
<?php require_once('../../private/initialize.php'); ?>


<div class="container">
<?php $page_title = 'Staff'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<div id="content">
  <div id="main-menu">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>

    <p>
        <a href="../Login_System/Reset_password.php" class="btn btn-secondary">Reset Your Password</a>
        <a href="../../private/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
        </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Step 1 - Create a Facility </h5>
              <p class="card-text">Facility is needed to populate inside daily Census form</p>
              <a href="facility/create_facility.php" class="btn btn-warning">Enter</a>
            </div>
          </div>
        </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Step 2 - Create young Person</h5>
        <p class="card-text">Young person must be in the facility before daily census can be completed and sent off</p>
        <a href="create_YP.php" class="btn btn-primary">Start</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Step 3 - Complete the Daily Census Form</h5>
        <p class="card-text"></p>
        <a href="dailyCensus.php" class="btn btn-success">Enter</a>
      </div>
    </div>
  </div>

          </div>
</div>

    <?php include(SHARED_PATH . '/staff_footer.php'); ?>
</div>
</div>
