<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'psl_config.php';
include_once 'db_connect.php';

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$date_created = date('Y-m-d H:i:s');
$branch = filter_input(INPUT_POST, 'branch', FILTER_SANITIZE_STRING);
$program_reg_for = filter_input(INPUT_POST,'program_reg_for', FILTER_SANITIZE_STRING);
$first_name = filter_input(INPUT_POST,'first_name', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST,'last_name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_STRING);
$school_attend = filter_input(INPUT_POST,'school_attend', FILTER_SANITIZE_STRING);
$beginning_package = filter_input(INPUT_POST,'beginning_package', FILTER_SANITIZE_STRING);
$ending_package = filter_input(INPUT_POST,'ending_package', FILTER_SANITIZE_STRING);
$grade_level = filter_input(INPUT_POST, 'grade_level', FILTER_SANITIZE_STRING);
$book_reading_promise = filter_input(INPUT_POST, 'book_reading_promise', FILTER_SANITIZE_NUMBER_INT);
$how_did_you_hear = filter_input(INPUT_POST, 'how_did_you_hear', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
$tshirt_sizes = filter_input(INPUT_POST, 'tshirt_sizes', FILTER_SANITIZE_STRING);
$books_read = filter_input(INPUT_POST, 'books_read', FILTER_SANITIZE_STRING);
$how_did_you_hear_multiple = "";

foreach ($how_did_you_hear as $how_did_you_hear_temp) {
   $how_did_you_hear_multiple .= $how_did_you_hear_temp.","; 
   
$sql = "INSERT INTO patrons_info (created, branch, program_reg_for, first_name, last_name, email, zip_code, school_attend, beginning_package, ending_package, grade_level, book_reading_promise, how_did_you_hear, tshirt_sizes, books_read)
        VALUES ('$date_created', '$branch', '$program_reg_for', '$first_name', '$last_name', '$email', '$zip_code', '$school_attend', '$beginning_package', '$ending_package', '$grade_level', '$book_reading_promise', '$how_did_you_hear_multiple', '$tshirt_sizes', '$books_read')";
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
                

<link href="../css/custom.css" rel="stylesheet" type="text/css"/>
<link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" /> 
<script src="http://code.jquery.com/jquery-2.2.3.js"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>


<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
    
<!-- HTML Form (wrapped in a .bootstrap-iso div) --> 
   
 <script> 
    $(document).ready(function(){ 
        $("#summerreading").validationEngine(); 
    }); 
</script>
    </head>
    <body class="sports-bg">
     
<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container">
     <div class="row>">
     </div>
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
       <div class="container">
            <?php
        // put your code here
            if(mysqli_query($mysqli, $sql)){
    echo "<h1>Registration Is Complete!</h1>";
    echo "<p>Thank you for registering. Please visit a service desk to pick-up your prizes.</p>";
    echo '<h3>click here to:<a href="../index.php">submit new entry</a></h3>';
    header("Refresh: 5; url= ../index.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

// close connection
mysqli_close($mysqli);
    ?>    
           
   </div>
  </div>
 </div>
</div>
   
    </body>
</html>



