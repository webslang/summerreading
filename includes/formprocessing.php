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
$zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_NUMBER_INT);
$school_attend = filter_input(INPUT_POST,'school_attend', FILTER_SANITIZE_STRING);
$grade_level = filter_input(INPUT_POST, 'grade_level', FILTER_SANITIZE_STRING);
$book_reading_promise = filter_input(INPUT_POST, 'book_reading_promise', FILTER_SANITIZE_NUMBER_INT);
$how_did_you_hear = filter_input(INPUT_POST, 'how_did_you_hear', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
$tshirt_sizes = filter_input(INPUT_POST, 'tshirt_sizes', FILTER_SANITIZE_STRING);
$how_did_you_hear_multiple = "";

foreach ($how_did_you_hear as $how_did_you_hear_temp) {
   $how_did_you_hear_multiple .= $how_did_you_hear_temp.","; 
   
$sql = "INSERT INTO patrons_info (created, branch, program_reg_for, first_name, last_name, email, zip_code, school_attend, grade_level, book_reading_promise, how_did_you_hear, tshirt_sizes)
        VALUES ('$date_created', '$branch', '$program_reg_for', '$first_name', '$last_name', '$email', '$zip_code', '$school_attend', '$grade_level', '$book_reading_promise', '$how_did_you_hear_multiple', '$tshirt_sizes')";
}

if(mysqli_query($mysqli, $sql)){
    echo "Records added successfully.";
    header("Location: ../index.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

// close connection
mysqli_close($mysqli);

