<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once 'psl_config.php';
include_once 'db_connect.php';
if(isset($_POST['submit'])){ 
if(preg_match("/[A-Z  | a-z]+/", filter_input(INPUT_POST,'last_name'))){
    $last_name_search = filter_input(INPUT_POST,'last_name');
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



$sql = "SELECT id, first_name, last_name, email, zip_code, school_attend, book_reading_promise, books_read FROM patrons_info WHERE last_name LIKE '%" .$last_name_search . "%'";

$result=mysqli_query($mysqli, $sql); 
while ($row =  mysqli_fetch_array($result)){
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$zip_code = $row['zip_code'];
$school_attend = $row['school_attend'];
$book_reading_promise = $row['book_reading_promise'];
$books_read = $row['books_read'];
$id=$row['id']; 

 echo "<ul>\n"; 
echo "<li>" . "<a  href=\"search.php?id=$id\">".$first_name ." " . $last_name .  " " . $email .  " " . $zip_code .  " " . $school_attend .  " " . $book_reading_promise .  " " . $books_read .  "</label></a></li>\n"; 
echo "</ul>"; 
}
}
else{ 
echo  "<p>Please enter a search query</p>"; 
} 
}
// close connection
mysqli_close($mysqli);
