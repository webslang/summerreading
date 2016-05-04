<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
                
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
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
    <body>
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
       <div class="container">
           <form id="summerreading" class="form-container" name="summerreading" action="<?php list_patron() ?>" method="post" >
     <h1>TPL - Summer Reading - Books Read</h1>  
     <div class="form-group ">
      <label class="control-label requiredField" for="last_name">
       Last Name
       <span class="asteriskField">
        *
       </span>
       
      </label>
      <span class="help-block" id="hint_last_name">
       Last Name Only
      </span>
      <input class="form-control validate[required]" id="name" name="last_name" placeholder="Doe..." type="text"/>
     </div>
        
     <div class="form-group">
      <div>
          <input type="hidden" name="token" value="<?= md5(uniqid()) ?>"/>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
       </div>
    </form>

   </div>
  </div>
 </div>
</div>
   
    </body>
</html>
