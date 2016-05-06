<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '/includes/psl_config.php';
include_once '/includes/db_connect.php';

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
   

// get value of id that sent from address bar
$id = filter_input(INPUT_GET,'id');

// Retrieve data from database 
$sql="SELECT id, first_name, last_name, email, zip_code, school_attend, book_reading_promise, books_read FROM patrons_info WHERE id='$id'";
$result = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($result)) {
$id=$row['id']; 
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$zip_code = $row['zip_code'];
$school_attend = $row['school_attend'];
$book_reading_promise = $row['book_reading_promise'];
$books_read = $row['books_read'];
}
?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<form name="form1" method="post" action="includes/updatepatron_ac.php">
<td>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td colspan="3"><strong>Update data in mysql</strong> </td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="center"><strong>First Name</strong></td>
<td align="center"><strong>Last Name</strong></td>
<td align="center"><strong>Email</strong></td>
<td align="center"><strong>Zip Code</strong></td>
<td align="center"><strong>School Attended</strong></td>
<td align="center"><strong>BRP</strong></td>
<td align="center"><strong>Book's Read</strong></td>
</tr>



<tr>
<td align="center">
    <input name="first_name" type="text" id="first_name" value="<?php echo $first_name; ?>" size="15" disabled="true">
</td>
<td align="center">
<input name="last_name" type="text" id="last_name" value="<?php echo $last_name; ?>" size="15" disabled="true">
</td>
<td>
<input name="email" type="text" id="email" value="<?php echo $email; ?>" size="15" disabled="true">
</td>
<td>
<input name="zip_code" type="text" id="zip_code" value="<?php echo $zip_code; ?>" size="15" disabled="true">
</td>
<td>
<input name="school_attend" type="text" id="school_attend" value="<?php echo $school_attend; ?>" size="15" disabled="true" disabled="true">
</td>
<td>
<input name="book_reading_promise" type="text" id="book_reading_promise" value="<?php echo $book_reading_promise; ?>" size="15" disabled="true">
</td>
<td>
<input name="books_read" type="text" id="books_read" value="<?php echo $books_read; ?>" size="15">
</td>
<td>&nbsp;</td>
<td>
<input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
</td>
<tr>
<td align="center">
<input type="submit" name="Submit" value="Submit">
</td>
</tr>
<td>&nbsp;</td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<?php
// close connection 
mysqli_close($mysqli);
