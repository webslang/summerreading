<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start(); // Session starts here.

include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
   

// get value of id that sent from address bar
$id = filter_input(INPUT_GET,'id');

// Retrieve data from database 
$sql="SELECT id, first_name, last_name, email, zip_code, school_attend, beginning_package, ending_package, book_reading_promise, tshirt_sizes, books_read FROM patrons_info WHERE id='$id'";
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
$tshirt_sizes = $row['tshirt_sizes'];
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
                
<link href="../css/custom.css" rel="stylesheet" type="text/css"/>
<link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" /> 
<script src="http://code.jquery.com/jquery-2.2.3.js"></script>
<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="../js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="../js/custom.js" type="text/javascript"></script>


<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
    
<!-- HTML Form (wrapped in a .bootstrap-iso div) --> 
   
 <script> 
    $(document).ready(function(){ 
        $("#summerreading").validationEngine(); 
    }); 
</script>

<script type='text/javascript'>
$(function(){
     $('#bp').onkeyup(function(){
          if ($(this).val() == '') {
               $('.enableOnInput').prop('disabled', false);
          }
     });
});
</script>

<script type='text/javascript'>
$(function(){
     $('#ep').onkeyup(function(){
          if ($(this).val() == '') {
               $('.enableOnInput').prop('disabled', false);
          }
     });
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
           <form id="summerreading" class="form-container col-md-10 col-md-offset-1" name="summerreading" action="../includes/updatepatron_ac.php" method="post" >
               <h1>TPL - Summer Reading - Patron Lookup</h1> 
              <div class="table-responsive ">
     <table class=" table-condensed">
         <tr>
<td align="center" class="table-bordered"><strong>First Name</strong></td>
<td align="center" class="table-bordered"><strong>Last Name</strong></td>
<td align="center" class="table-bordered"><strong>Email</strong></td>
<td align="center" class="table-bordered"><strong>School Attended</strong></td>
<td align="center" class="table-bordered" ><strong>Beginning Pack</strong></td>
<td align="center" class="table-bordered"><strong>Ending Pack</strong></td>
<td align="center" class="table-bordered"><strong>BRP</strong></td>
<td align="center" class="table-bordered"><strong>T-Shirt Size</strong></td>
<td align="center" class="table-bordered"><strong>Books Read</strong></td>


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
<input name="school_attend" type="text" id="school_attend" value="<?php echo $school_attend; ?>" size="12" disabled="true">
</td>
<td class="table-bordered" >
    <select name="beginning_package" id="beginning_package" class='selectClass'>

  <option value="yes" <?php if($beginning_package == "yes" ){ echo "selected"; }?>>yes</option>
  <option value="no" <?php if($beginning_package == "no" ){ echo "selected"; }?>>no</option>
    
    </select>
</td>
<td class="table-bordered">
   <select name="ending_package" id="ending_package" class='selectClass' >

  <option value="yes" <?php if($ending_package == "yes" ){ echo "selected"; }?>>yes</option>
  <option value="no" <?php if($ending_package == "no" ){ echo "selected"; }?>>no</option>
    
    </select>
</td>
<td class="table-bordered">
<input name="book_reading_promise" type="text" id="book_reading_promise" value="<?php echo $book_reading_promise; ?>" size="1" disabled="true">
</td>

<td class="table-bordered">
    <input name="tshir_sizes" type="text" id="tshir_sizes" value="<?php echo $tshirt_sizes; ?>"  size="12" disabled="true">
</td>
<td class="table-bordered">
    <input name="books_read" type="text" id="books_read" value="<?php echo $books_read; ?>"  size="2" >
</td>
<td style="display:none;">
<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
</td>
  </tr>

</table>
                  <br>
      <div class="form-group">
      <div>
   
           
          
          <input type="hidden" name="token" value="<?= md5(uniqid()) ?>"/>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
     <a  class="btn btn-primary enableOnInput" role="button" href="index.php">Reset</a>
      </div>
     </div>                 
               </div>
    </form>

</div>
   </div>
  </div>
 </div>
</div>
   
    </body>
</html>