<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
}
?>


<?php require_once('../../../private/facility.php'); ?>
<?php require_once('../../../private/create_YPsql.php'); ?>
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('calendar/classes/tc_calendar.php'); ?>

<?php $page_title = 'Entry Form'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div class="container">
<div class="wrapper">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <!-- facility name -->
      <div class="form-group <?php echo (!empty($facility_err)) ? 'has-error' : ''; ?>">
          <label>Facility Name</label>
          <input type="text" name="facility" class="form-control" value="<?php echo $facility; ?>">
          <span class="help-block"><?php echo $facility_err; ?></span>
      </div>
      <!-- facility region -->
        <div class="form-group <?php echo (!empty($region_err)) ? 'has-error' : ''; ?>">
            <label>Region </label>
            <input type="text" name="region" class="form-control" value="<?php echo $region; ?>">
            <span class="help-block"><?php echo $region_err; ?></span>
        </div>

        <!-- YP first_name  -->
          <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
              <label>First Name</label>
              <input type="text" name="f_name" class="form-control" value="<?php echo $f_name; ?>">
              <span class="help-block"><?php echo $first_name_err; ?></span>
          </div>


          <!-- YP last_name  -->
            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                <label>Last Name</label>
                <input type="text" name="l_name" class="form-control" value="<?php echo $l_name; ?>">
                <span class="help-block"><?php echo $last_name_err; ?></span>
            </div>

            <!-- YP alias  -->
            <div class="form-group <?php echo (!empty($alias_err)) ? 'has-error' : ''; ?>">
                <label>Alias </label>
                <input type="text" name="alias" class="form-control" value="<?php echo $alias; ?>">
                <span class="help-block"><?php echo $alias_err; ?></span>
            </div>

              <!-- YP DOB  -->
             <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                <label>Date of Birth</label>
                <?php
                $myCalendar = new tc_calendar("date1", true);
                $myCalendar->setIcon("calendar/images/iconCalendar.gif");
                $myCalendar->setDate(date('d'), date('m'), date('Y'));
                $myCalendar->setPath("calendar/");
                $myCalendar->setYearInterval(1960, 2025);
                $myCalendar->dateAllow('1900-01-01', '2025-03-01');
                $cscript = $myCalendar->getScript();
                echo($cscript);
                ?>
                <span class="help-block"><?php echo $dob_err; ?></span>
             </div>

          <!-- Aboriginal Status -->
              <div class="form-group <?php echo (!empty($aboriginal_status_err)) ? 'has-error' : ''; ?>">
                <label>Aboriginal Status </label>
                <input type="text" name="aboriginal_status" class="form-control" value="<?php echo $aboriginal_status; ?>">
                <span class="help-block"><?php echo $aboriginal_status_err; ?></span>
              </div>

            <!-- YP Gender At birth-->
              <div class="form-group <?php echo (!empty($gender_at_birth_err)) ? 'has-error' : ''; ?>">
                <label>Gender At Birth </label>
                <input type="text" name="gender_at_birth" class="form-control" value="<?php echo $gender_at_birth; ?>">
                <span class="help-block"><?php echo $gender_at_birth_err; ?></span>
              </div>
              <!-- YP Gender as Identified-->
              <div class="form-group <?php echo (!empty($gender_as_identified_err)) ? 'has-error' : ''; ?>">
                <label>Gender As Identified </label>
                <input type="text" name="gender_as_identified" class="form-control" value="<?php echo $gender_as_identified; ?>">
                <span class="help-block"><?php echo $gender_as_identified_err; ?></span>
              </div>

                <!-- YP Interpreter required-->
              <div class="form-group <?php echo (!empty($interpreter_err)) ? 'has-error' : ''; ?>">
                <label>Interpreter Required?</label>
                <input type="text" name="interpreter" class="form-control" value="<?php echo $interpreter; ?>">
                <span class="help-block"><?php echo $interpreter_err; ?></span>
              </div>

                <!-- YP Cultural Identity language Group-->
              <div class="form-group <?php echo (!empty($language_group_err)) ? 'has-error' : ''; ?>">
                <label>Cultural Identity language Group </label>
                <input type="text" name="language_group" class="form-control" value="<?php echo $language_group; ?>">
                <span class="help-block"><?php echo $language_group_err; ?></span>
              </div>
                  <!-- YP consent-->
              <div class="form-group <?php echo (!empty($consent_err)) ? 'has-error' : ''; ?>">
                <label for="young_person_consent">Young Person Consent</label>
              <input type="checkbox" name="young_person_consent[]" value="yes" id="young_person_consent_0" />yes
                <input type="checkbox" name="young_person_consent[]" value="no" id="young_person_consent_1" />no
                <span class="help-block"><?php echo $consent_err; ?></span>
              </div>

      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
      </div>
  </form>
</div>
    <?php include(SHARED_PATH . '/staff_footer.php'); ?>
</div>
