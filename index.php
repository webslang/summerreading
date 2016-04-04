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

<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
    
<!-- HTML Form (wrapped in a .bootstrap-iso div) --> 
   
    
    
    </head>
    <body>
        <?php
        // put your code here
    ?>
<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="container">
       <form action="includes/formprocessing.php" method="post">
     <div class="form-group">
      <label class="control-label requiredField">
       What branch are you using to register?
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="">
       <div class="radio">
        <label class="radio">
         <input name="branch" type="radio" value="Main Branch"/>
         Main Branch
        </label>
       </div>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField">
       Which program are you registering for?
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="">
       <div class="radio">
        <label class="radio">
         <input name="program_reg_for" type="radio" value="Kids Program"/>
         Kids Program
        </label>
       </div>
       <div class="radio">
        <label class="radio">
         <input name="program_reg_for" type="radio" value="Teen Program"/>
         Teen Program (rising 6th grader)
        </label>
       </div>
       <div class="radio">
        <label class="radio">
         <input name="program_reg_for" type="radio" value="Adult Program"/>
         Adult Program
        </label>
       </div>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="first_name">
       First Name
       <span class="asteriskField">
        *
       </span>
       
      </label>
      <span class="help-block" id="hint_first_name">
       First Name Only
      </span>
      <input class="form-control" id="name" name="first_name" placeholder="John..." type="text"/>
     </div>
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
      <input class="form-control" id="name" name="last_name" placeholder="Doe..." type="text"/>
     </div>
        
     <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Email
       <span class="asteriskField">
        *
       </span>
      </label>
      <span class="help-block" id="hint_email">
       Adult or child's email address
      </span>   
      <input class="form-control" id="email" name="email" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="zip_code">
       Zip Code
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="zip_code" name="zip_code" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="school_attend">
       What school do you attend?
       <span class="asteriskField">
        *
       </span>
      </label>
      <span class="help-block" id="hint_school_attend">
       N/A if registering for the Adult Program
      </span>
      <input class="form-control" id="school_attend" name="school_attend" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="grade_level">
       Grade (fall 2015)
       <span class="asteriskField">
        *
       </span>
      </label>
      <span class="help-block" id="hint_grade_level">
       Please select one of the following options
      </span>
      <select class="select form-control" id="grade_level" name="grade_level">
       <option value="">
      
       </option>       
       <option value="Preschool">
        Preschool
       </option>
       <option value="Kindergarten">
        Kindergarten
       </option>
       <option value="1st grade">
        1st grade
       </option>
       <option value="2nd grade">
        2nd grade
       </option>
       <option value="3rd grade">
        3rd grade
       </option>
       <option value="4th grade">
        4th grade
       </option>
       <option value="5th grade">
        5th grade
       </option>
       <option value="Middle School">
        Middle School
       </option>
       <option value="High School">
        High School
       </option>
       <option value="College">
        College
       </option>
       <option value="Adult (N/A)">
        Adult (N/A)
       </option>
       <option value="Not in school yet">
        Not in school yet
       </option>
      </select>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="book_reading_promise">
       How many books do you promise to read or listen to this summer?
       <span class="asteriskField">
        *
       </span>
      </label>
      <span class="help-block" id="hint_book_reading_promise">
       Please count movies if you are registering for the Adult Program
      </span>
      <input class="form-control" id="book_reading_promise" name="book_reading_promise" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField">
       How did you hear about the Tuscaloosa Public Library's Summer Reading Program?
       <span class="asteriskField">
        *
       </span>
      </label>
             <span class="help-block" id="hint_how_did_you_hear">
        Please select all that apply
       </span>
      <div class=" ">
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="Newspaper"/>
         Newspaper
        </label>
       </div>
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="Radio"/>
         Radio
        </label>
       </div>
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="TPL website"/>
         TPL website
        </label>
       </div>
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="Social Media (Facebook, Twitter, Instagram)"/>
         Social Media (Facebook, Twitter, Instagram)
        </label>
       </div>
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="TPL staff"/>
         TPL staff
        </label>
       </div>
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="Participated in the past"/>
         Participated in the past
        </label>
       </div>
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="Through my child's school"/>
         Through my child's school
        </label>
       </div>
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="From other TPL patrons (word of mouth)"/>
         From other TPL patrons (word of mouth)
        </label>
       </div>
       <div class="checkbox">
        <label class="checkbox">
         <input name="how_did_you_hear" type="checkbox" value="Other"/>
         Other
        </label>
       </div>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="tshirt_sizes">
       Please select your preferred t-shirt size
       <span class="asteriskField">
        *
       </span>
      </label>
      <span class="help-block" id="hint_grade_level">
       (t-shirt sizes are not guaranteed)
      </span>
      <select class="select form-control" id="grade_level" name="tshirt_sizes">
       <option value="">
       
       </option>
       <option value="Youth Small">
        Youth Small
       </option>
       <option value="Youth Medium">
        Youth Medium
       </option>
       <option value="Youth Large">
        Youth Large
       </option>
       <option value="Adult Small">
        Adult Small
       </option>
       <option value="Adult Medium">
        Adult Medium
       </option>
       <option value="Adult Large">
        Adult Large
       </option>
       <option value="Adult X-large">
        Adult X-large
       </option>
       <option value="Adult XX-large">
       Adult XX-large
       </option>
       <option value="Adult XXX-large">
        Adult XXX-large
       </option>
      </select>
     </div>
     <div class="form-group">
      <div>
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
