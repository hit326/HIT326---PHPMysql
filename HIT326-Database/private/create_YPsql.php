<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$f_name = $l_name = $alias = $dob = $aboriginal_status = $gender_at_birth = $gender_as_identified = $interpreter = $language_group = $young_person_consent = "";
$first_name_err = $last_name_err = $alias_err = $dob_err = $aboriginal_status_err = $gender_at_birth_err = $gender_as_identified_err = $interpreter_err = $language_group_err = $consent_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate first name
    if(empty(trim($_POST["f_name"]))){
        $first_name_err = "Please enter a first name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_young_person FROM young_person WHERE f_name = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_f_name);

            // Set parameters
            $param_f_name = trim($_POST["f_name"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $first_name_err = "This person is already created.";
                } else{
                    $f_name = trim($_POST["f_name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate last name
    if(empty(trim($_POST["l_name"]))){
        $last_name_err = "Please enter a last_name.";
    } else{
        $l_name = trim($_POST["l_name"]);
    }
    // Validate alias
    if(empty(trim($_POST["alias"]))){
        $alias_err = "Please enter an alias.";
    } else{
        $alias = trim($_POST["alias"]);
    }


    // Validate dob

    // Validate aboriginal_status
    if(empty(trim($_POST["aboriginal_status"]))){
        $aboriginal_status_err = "Please enter an aboriginal status.";
    } else{
        $aboriginal_status = trim($_POST["aboriginal_status"]);
    }
    // Validate gender_at_birth
    if(empty(trim($_POST["gender_at_birth"]))){
        $gender_at_birth_err = "Please enter a gender at birth.";
    } else{
        $gender_at_birth = trim($_POST["gender_at_birth"]);
    }
    // Validate gender_as_identified
    if(empty(trim($_POST["gender_as_identified"]))){
        $gender_as_identified_err = "Please enter a gender as identified.";
    } else{
        $gender_as_identified = trim($_POST["gender_as_identified"]);
    }
    // Validate $interpreter
    if(empty(trim($_POST["interpreter"]))){
        $interpreter_err = "Please enter yes or no.";
    } else{
        $interpreter = trim($_POST["interpreter"]);
    }
    // Validate $language_group
    if(empty(trim($_POST["language_group"]))){
        $language_group_err = "Please enter a language group.";
    } else{
        $language_group = trim($_POST["language_group"]);
    }
    // Validate $consent

        $young_person_consent = $_POST['young_person_consent'];





    // Check input errors before inserting in database
    if(empty($first_name_err) && empty($last_name_err) && empty($alias_err) && empty($dob_err) && empty($aboriginal_status_err) && empty($gender_at_birth_err) && empty($gender_as_identified_err) && empty($interpreter_err) && empty($language_group_err) && empty($consent_err) ){

        // Prepare an insert statement
        $sql = "INSERT INTO young_person (f_name, l_name, alias, dob, ab_status, gender, gender_identified, interpreter_required, cultural_id, consent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'ssssssssss', $param_fname, $param_lname, $param_alias, $param_dob, $param_ab_status, $param_gender, $param_gender_id, $param_interpreter_required, $param_cultural_id, $param_consent);

            // Set parameters
            $param_fname = $f_name;
            $param_lname = $l_name;
            $param_alias = $alias;
            $param_dob = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
            $param_ab_status = $aboriginal_status;
            $param_gender = $gender_at_birth;
            $param_gender_id = $gender_as_identified;
            $param_interpreter_required = $interpreter;
            $param_cultural_id = $language_group;
            $param_consent = $young_person_consent;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to home page
                header("location: ../index.php");
            } else{
                echo "Something went wrong. Please try again later";
            }
        }


        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
