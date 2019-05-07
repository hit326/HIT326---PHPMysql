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

<?php $page_title = 'Staff'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<div id="content">
  <div id="main-menu">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="../Login_System/Reset_password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="../../private/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
