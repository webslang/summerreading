<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start(); // Session starts here.

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
   

// get value of id that sent from address bar
$id = filter_input(INPUT_GET,'id');

// Retrieve data from database 
$sql="SELECT id, first_name, last_name, email, zip_code, school_attend, beginning_package, ending_package, book_reading_promise, books_read FROM patrons_info WHERE id='$id'";
$result = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($result)) {
$id=$row['id']; 
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$zip_code = $row['zip_code'];
$school_attend = $row['school_attend'];
$beginning_package = $row['beginning_package'];
$ending_package = $row['ending_package'];
$book_reading_promise = $row['book_reading_promise'];
$books_read = $row['books_read'];
}




// close connection 
mysqli_close($mysqli);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
                
<link href="css/custom.css" rel="stylesheet" type="text/css"/>
<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" /> 
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
        <?php
        // put your code here
    ?>
<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso sports-bg">
 <div class="container">
     <div class="row>">
     </div>
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="container ">
      
            <span id="error">
 <!---- Initializing Session for errors --->
 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>
 </span>
           <form id="summerreading" class="form-container col-md-10 col-md-offset-1" name="summerreading" action="includes/updatepatron_ac.php" method="post" >
               <h1>TPL - Summer Reading - Patron Lookup</h1> 
              <div class="table-responsive ">
     <table class=" table-condensed">
         <tr>
<td align="center" class="table-bordered"><strong>First Name</strong></td>
<td align="center" class="table-bordered"><strong>Last Name</strong></td>
<td align="center" class="table-bordered"><strong>Email</strong></td>
<td align="center" class="table-bordered"><strong>Zip Code</strong></td>
<td align="center" class="table-bordered"><strong>School Attended</strong></td>
<td align="center" class="table-bordered" ><strong>Beginning Pack</strong></td>
<td align="center" class="table-bordered"><strong>Ending Pack</strong></td>
<td align="center" class="table-bordered"><strong>BRP</strong></td>
<td align="center" class="table-bordered"><strong>Book's Read</strong></td>
         </tr>
  <tr>
      <td align="center" class="table-bordered">
    <input name="first_name" type="text" id="first_name" value="<?php echo $first_name; ?>" size="12" disabled="true">
</td>
<td align="center" class="table-bordered">
<input name="last_name" type="text" id="last_name" value="<?php echo $last_name; ?>" size="12" disabled="true">
</td>
<td class="table-bordered">
<input name="email" type="text" id="email" value="<?php echo $email; ?>" size="12" disabled="true">
</td>
<td class="table-bordered">
<input name="zip_code" type="text" id="zip_code" value="<?php echo $zip_code; ?>" size="8" disabled="true">
</td>
<td class="table-bordered">
<input name="school_attend" type="text" id="school_attend" value="<?php echo $school_attend; ?>" size="12" disabled="true">
</td>
<td class="table-bordered">
<input name="beginning_package" type="text" id="beginning_package" value="<?php echo $beginning_package; ?>" size="5">
</td>
<td class="table-bordered">
<input name="ending_package" type="text" id="ending_package" value="<?php echo $ending_package; ?>" size="5">
</td>
<td class="table-bordered">
<input name="book_reading_promise" type="text" id="book_reading_promise" value="<?php echo $book_reading_promise; ?>" size="5" disabled="true">
</td>
<td class="table-bordered">
    <input name="books_read" type="text" id="books_read" value="<?php echo $books_read; ?>"  size="5">
</td>
<td style="display:none;">
<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
</td>
<tr>
 <td align="center" style="border:none;">
   <input type="hidden" name="token" value="<?= md5(uniqid()) ?>"/>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
</td>   
    
</table>
               </div>
    </form>

</div>
   </div>
  </div>
 </div>
</div>
   
    </body>
</html>