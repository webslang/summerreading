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
   // get value of id that sent from address bar
$id = filter_input(INPUT_POST,'id');
$books_read = filter_input(INPUT_POST,'books_read');

// Update Patrons Info in Database 
$sql="UPDATE patrons_info SET books_read='$books_read' WHERE id='$id'";
$result = mysqli_query($mysqli, $sql);


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
   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
       <div class="container">
            <?php
        // put your code here
// if successfully updated. 
if($result){
echo "<h1>Update Complete!</h1>";
echo "<br>";
echo "<p>The patron's record has been successfully updated.";
echo "<br>";
echo "<h3>Click Here:<a href='../staffuse.php'>return to patron's record search.</a></h3>";
}

else {
echo "ERROR";
};
    ?>    
           
   </div>
  </div>
 </div>
</div>
   
    </body>
</html>
