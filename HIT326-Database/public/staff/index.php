<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>

<div class="container">
<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<div id="content">
  <div id="main-menu">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    
    <p>
        <a href="../Login_System/Reset_password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="../../private/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>  
        </div>
      <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Referral Form</h5>
        <p class="card-text">Start a new Referral form when a young person causes an offence.</p>
        <a href="#" class="btn btn-primary">Start</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Accomodation Facility Area</h5>
        <p class="card-text">For staff at accomodation facilites. Included is Census form and Exit Form. </p>
        <a href="#" class="btn btn-secondary">Enter</a>
      </div>
    </div>
  </div>

      
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Business Intelligence</h5>
        <p class="card-text">Connected to Power Bi</p>
        <a href="#" class="btn btn-success">Enter</a>
      </div>
    </div>
  </div>
          </div>
</div>

    <?php include(SHARED_PATH . '/staff_footer.php'); ?>
</div>
</div>


