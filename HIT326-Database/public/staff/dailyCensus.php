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

<?php $page_title = 'Daily Census Form'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content" >
  <div id="main-menu"></div>
<div class="wrapper">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <!-- facility name -->
      <div class="form-group <?php echo (!empty($facility_err)) ? 'has-error' : ''; ?>">
          <label>Facility Name</label>
          <input type="text" name="facility" class="form-control" value="<?php echo $facility; ?>">
          <span class="help-block"><?php echo $facility_err; ?></span>
      </div>


      <div class="form-group <?php echo (!empty($facility_err)) ? 'has-error' : ''; ?>">
      <label class="description" for="element_6">Facility Name </label>

      <select class="element select medium" id="element_6" name="element_6">
        <option value="" selected="selected"></option>
      <option value="1" >ASYASS</option>
      <option value="2" >SSE_Gap Road</option>
      <option value="3" >SSE_Yirra House - Female</option>
      <option value="4" >SSE_Yirra House - Male</option>

      </select>
      </div>


    <!-- date of census -->
      <div class="form-group <?php echo (!empty($date_of_census_err)) ? 'has-error' : ''; ?>">
          <label>Date of Census</label>
          <input type="text" name="date_of_census" class="form-control" value="<?php echo $date_of_census; ?>">
          <span class="help-block"><?php echo $date_of_census_err; ?></span>
      </div>

      <!-- young person first name -->
      <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
          <label>First Name</label>
          <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
          <span class="help-block"><?php echo $first_name_err; ?></span>
      </div>

     <!-- young person last name -->
     <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
         <label>last Name</label>
         <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
         <span class="help-block"><?php echo $last_name_err; ?></span>
     </div>

     <!-- young person alias -->
     <div class="form-group <?php echo (!empty($alias_err)) ? 'has-error' : ''; ?>">
         <label>Alias</label>
         <input type="text" name="alias" class="form-control" value="<?php echo $alias; ?>">
         <span class="help-block"><?php echo $alias_err; ?></span>
     </div>
     <!-- young person gender -->
     <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
         <label>Gender</label>
         <input type="text" name="gender" class="form-control" value="<?php echo $gender; ?>">
         <span class="help-block"><?php echo $gender_err; ?></span>
     </div>

     <!-- Facility date of entry table -->
       <div class="form-group <?php echo (!empty($date_of_entry_err)) ? 'has-error' : ''; ?>">
           <label>Date of Entry to Facility</label>
           <input type="text" name="date_of_entry" class="form-control" value="<?php echo $date_of_entry; ?>">
           <span class="help-block"><?php echo $date_of_entry_err; ?></span>
       </div>

       <!-- Electronic Monitoring table -->
<div class="form-group <?php echo (!empty($electric_monitoring_err)) ? 'has-error' : ''; ?>">
        <label>Electronic Monitoring </label>
           <input type="checkbox" id="Check[1]" name="Check[1]" value="A" />Yes
           <input type="checkbox" id="Check[1]" "Check[1]" value="B" />No <br />
           <span class="help-block"><?php echo $electric_monitoring_err; ?></span>
 </div>
 <!-- Electronic Monitoring table -->
<div class="form-group <?php echo (!empty($electric_monitoring_err)) ? 'has-error' : ''; ?>">
  <label>Electronic Monitoring </label>
     <input type="checkbox" id="Check[1]" name="Check[1]" value="A" />Yes
     <input type="checkbox" id="Check[1]" "Check[1]" value="B" />No <br />
     <span class="help-block"><?php echo $electric_monitoring_err; ?></span>
</div>
<!-- Electronic Monitoring table -->
<div class="form-group <?php echo (!empty($electric_monitoring_err)) ? 'has-error' : ''; ?>">
 <label>Electronic Monitoring </label>
    <input type="checkbox" id="Check[1]" name="Check[1]" value="A" />Yes
    <input type="checkbox" id="Check[1]" "Check[1]" value="B" />No <br />
    <span class="help-block"><?php echo $electric_monitoring_err; ?></span>
</div>


       <!-- Facility daily census comments table-->
       <div class="form-group <?php echo (!empty($daily_census_comments_err)) ? 'has-error' : ''; ?>">
           <label>Daily Census Comments </label>
           <input type="text" name="daily_census_comments" class="form-control" value="<?php echo $daily_census_comments; ?>">
           <span class="help-block"><?php echo $daily_census_comments_err; ?></span>
       </div>




      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
          <input type="reset" class="btn btn-default" value="Reset">
      </div>

  </form>
</div>
</div>

    <?php include(SHARED_PATH . '/staff_footer.php'); ?>
</div>
