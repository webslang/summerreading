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


$sql = "INSERT INTO patrons_info (created, branch, program_reg_for, first_name, last_name, email, zip_code, school_attend, grade_level, book_reading_promise, how_did_you_hear, tshirt_sizes)
        VALUES ('$date_created', '$branch', '$program_reg_for', '$first_name', '$last_name', '$email', '$zip_code', '$school_attend', '$grade_level', '$book_reading_promise', '$how_did_you_hear_multiple', '$tshirt_sizes')";

if(mysqli_query($mysqli, $sql)){
    echo "Records added successfully.";
    header("Refresh: 5; url= ../index.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

// close connection
mysqli_close($mysqli);
