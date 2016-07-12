<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Function to calculate the number of Patrons' signed up based on age group
function patronssum() {
     global $patrons, $adults,$teens,$kids,$adults_counter,$teens_counter,$kids_counter;
     foreach ($patrons as $value) {
       if($value == $adults) {
            $adults_counter++;
          
       }elseif ($value == $teens) {
            $teens_counter++; 
           
       }elseif ($value == $kids) {
            $kids_counter++; 
         
       }
     }
return $adults_counter;
return $teens_counter;
return $kids_counter;

}


function completed_sr() {
     global $srcomplete, $completed_yes, $completed_no, $sr_complete_counter;
     foreach ($srcomplete as $value) {
       if($value == $completed_yes) {
            $sr_complete_counter++;
          
       }
     }
return $sr_complete_counter;

}