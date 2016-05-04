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

echo '<table width="400" border="0" cellspacing="1" cellpadding="0">';
echo ' <tr>';
echo '<td>';
echo '<table width="400" border="1" cellspacing="0" cellpadding="3">';
echo '<tr>';
echo '<td colspan="4"><strong>List data from mysql </strong> </td>';
echo '</tr>';

echo '<tr>';
echo '<td align="center"><strong>Name</strong></td>';
echo '<td align="center"><strong>Lastname</strong></td>';
echo '<td align="center"><strong>Email</strong></td>';
echo '<td align="center"><strong>Update</strong></td>';
echo '</tr>';




while ($row =  mysqli_fetch_array($result)){
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$zip_code = $row['zip_code'];
$school_attend = $row['school_attend'];
$book_reading_promise = $row['book_reading_promise'];
$books_read = $row['books_read'];
$id=$row['id']; 

echo '<tr>';
echo '<td>$first_name</td>';
echo '<td>$last_name</td>';
echo '<td>$email</td>';

// link to update.php and send value of id 
echo "<td align="center"><a href="update.php?id=echo $rows['$id'];">update</a></td>";
echo '</tr>';
}
}
else{ 
echo  "<p>Please enter a search query</p>"; 
} 
}
// close connection
mysqli_close($mysqli);
