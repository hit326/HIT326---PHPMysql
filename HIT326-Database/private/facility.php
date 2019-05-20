<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$facility = $region = "";
$facility_err = $region_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate facility name
    if(empty(trim($_POST["facility"]))){
        $facility_err = "Please enter a facility.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_facility FROM facility WHERE facility_name = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_facility);

            // Set parameters
            $param_facility = trim($_POST["facility"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $facility_err = "This facility is already created.";
                } else{
                    $facility = trim($_POST["facility"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate region
    if(empty(trim($_POST["region"]))){
        $region_err = "Please enter a region.";
    } else{
        $region = trim($_POST["region"]);
    }



    // Check input errors before inserting in database
    if(empty($facility_err) && empty($region_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO facility (facility_name, region) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_facility, $param_region);

            // Set parameters
            $param_facility = $facility;
            $param_region = $region;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to home page
                header("location: ../../index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
