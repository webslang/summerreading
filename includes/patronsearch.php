<?php
include_once 'psl_config.php';
include_once 'db_connect.php';


// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
   
if(filter_input(INPUT_POST,'last_name')){ 
if(preg_match("/[A-Z  | a-z]+/", filter_input(INPUT_POST,'last_name'))){
    $last_name_search = filter_input(INPUT_POST,'last_name');

$sql = "SELECT id, first_name, last_name, email, zip_code, school_attend, beginning_package, ending_package, book_reading_promise, tshirt_sizes, books_read FROM patrons_info WHERE last_name LIKE '%" .$last_name_search . "%'";

$result=mysqli_query($mysqli,$sql); 
} else { 
echo  "<p>Please enter a search query</p>"; 
}
}

?>

<div class="table-responsive col-md-10 col-md-offset-1">
<table class="table table-bordered" id="searchresults" >
<tr>
    <td colspan="8"><h2><strong>Search Results </strong></h2> </td>
</tr>

<tr>
<td align="center" ><strong>First Name</strong></td>
<td align="center" ><strong>Last Name</strong></td>
<td align="center" ><strong>Email</strong></td>
<td align="center" ><strong>School Attended</strong></td>
<td align="center" ><strong>Beginning Pack</strong></td>
<td align="center" ><strong>Ending Pack</strong></td>
<td align="center" ><strong>BRP</strong></td>
<td align="center" ><strong>T-Shirt Size</strong></td>
<td align="center" ><strong>Book's Read</strong></td>
<td align="center" ><strong>Update</strong></td>
</tr>

<?php
if (mysqli_num_rows($result) < 1){
    echo "<h1>No Matching Records!</h1>";
} else {
while ($row = mysqli_fetch_array($result)){
$id=$row['id']; 
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$zip_code = $row['zip_code'];
$school_attend = $row['school_attend'];
$beginning_package = $row['beginning_package'];
$ending_package = $row['ending_package'];
$book_reading_promise = $row['book_reading_promise'];
$tshirt_sizes = $row['tshirt_sizes'];
$books_read = $row['books_read'];
?>

<tr>
<td><?php echo $first_name; ?></td>
<td><?php echo $last_name; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $school_attend; ?></td>
<td><?php echo $beginning_package; ?></td>
<td><?php echo $ending_package; ?></td>
<td><?php echo $book_reading_promise; ?></td>
<td><?php echo $tshirt_sizes; ?></td>
<td><?php echo $books_read; ?></td>

<?php
// link to update.php and send value of id 
?>

<td align="center"><a href="staffuse2.php?id=<?php echo $id; ?>">update</a></td>
</tr>
 
<?php
} }
?>

</table>
</div>
<?php
// close connection
mysqli_close($mysqli);
