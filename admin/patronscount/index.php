<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start(); // Session starts here.
?>
<?php
include_once '../../includes/db_connect.php';
include_once '../../includes/functions.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TPL Summer Reading Admin Form</title>
                <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
                
<link href="../../css/custom.css" rel="stylesheet" type="text/css"/>
<link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/validationEngine.jquery.css" type="text/css" /> 
<script src="http://code.jquery.com/jquery-2.2.3.js"></script>
<script src=".../../js/languages/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="../../js/jquery.validationEngine.js" type="text/javascript"></script>


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
<div class="bootstrap-iso">
 <div class="container">
     <div class="row>">
     </div>
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="container"> 
           
            <span id="error">
 <!---- Initializing Session for errors --->
 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>
 </span>
           
           <form id="summerreading" class="form-container col-md-10 col-md-offset-1" name="summerreading" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
            <h4>Access Sign-up Form: <a href="http://srform.tuscaloosa-library.org/">Summer Reading Sign-up Form</a></h3>
               <h1>TPL - Summer Reading - Patron Count</h1> 
               <div class="form-group">
      <label class="control-label requiredField">
       View Branch Sign-up Stats
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="">
       <div class="radio">
        <label class="radio">
         <input name="branch" type="radio" value="Main Branch" class="validate[required]" checked/>
         Main Branch
        </label>
       </div>
        <div class="radio">
        <label class="radio">
         <input name="branch" type="radio" value="Weaver-Bolden" class="validate[required]" />
        Weaver-Bolden Branch
        </label> 
        </div>
           <div class="radio">
        <label class="radio">
         <input name="branch" type="radio" value="Brown" class="validate[required]" />
        Brown Branch
        </label>
       </div>
      </div>
     </div>
        
     <div class="form-group">
      <div>
          <input type="hidden" name="token" value="<?= md5(uniqid()) ?>"/>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
          
          <a  class="btn btn-primary" role="button" href="index.php">Reset</a>
      </div>
     </div>
       </div>
    </form>
            
                <div class="container">
           <?php
           if (htmlentities($_SERVER['REQUEST_METHOD']) == 'POST') {
               include __DIR__ . '\\..\\..\\includes\\patronscount.php';
           } 
           ?>
             
</div>
   </div>
  </div>
 </div>
</div>
   
    </body>
</html>
