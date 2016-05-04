<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once 'psl_config.php';
include_once 'db_connect.php';
if(filter_input(INPUT_POST,'last_name')){ 
if(preg_match("/[A-Z  | a-z]+/", filter_input(INPUT_POST,'last_name'))){
    $last_name_search = filter_input(INPUT_POST,'last_name');
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT id, first_name, last_name, email, zip_code, school_attend, book_reading_promise, books_read FROM patrons_info WHERE last_name LIKE '%" .$last_name_search . "%'";

$result=mysqli_query($mysqli, $sql); 
} else { 
echo  "<p>Please enter a search query</p>"; 
}
?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" border="1" cellspacing="0" cellpadding="3">
<tr>
<td colspan="4"><strong>List data from mysql </strong> </td>
</tr>

<tr>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Lastname</strong></td>
<td align="center"><strong>Email</strong></td>
<td align="center"><strong>Update</strong></td>
</tr>


while ($row = mysqli_fetch_array($result)){
$id=$row['id']; 
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$zip_code = $row['zip_code'];
$school_attend = $row['school_attend'];
$book_reading_promise = $row['book_reading_promise'];
$books_read = $row['books_read'];


<tr>
<td><?php echo $first_name; ?></td>
<td><?php  echo $last_name; ?></td>
<td><?php  echo $email; ?></td>
<td><?php  echo $zip_code; ?></td>
<td><?php  echo $book_reading_promise ?></td>
<td><?php echo $books_read; ?></td>

// link to update.php and send value of id 
<td align="center"><a href="patrons_update.php?id=<?php  echo $id; ?>">update</a></td>
</tr>
 

}

</table>
</td>
</tr>
</table>
// close connection

mysqli_close($mysqli);
