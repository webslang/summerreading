<?php
include_once 'psl_config.php';
include_once 'db_connect.php';


// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
   
if(filter_input(INPUT_POST,'branch')){ 
if(preg_match("/[A-Z  | a-z]+/", filter_input(INPUT_POST,'branch'))){
    $branch = filter_input(INPUT_POST,'branch');
    $program_reg_for = "Adult Program";

$sql = "SELECT id, branch, program_reg_for, first_name, last_name, email, zip_code, school_attend, beginning_package, ending_package, book_reading_promise, books_read FROM patrons_info WHERE branch LIKE '%" .$branch . "%'";

$result=mysqli_query($mysqli,$sql);

} else { 
echo  "<p>Please enter a search query</p>"; 
}
}

?>

<div class="table-responsive col-md-10 col-md-offset-1">

       <?php
       $registeredpatrons = mysqli_num_rows($result);
       ?>

       <?php
       if($branch == "Main Branch") {
           
        echo "<h2>The Main Branch Currently Has: <strong class=\"heading-success\">$registeredpatrons</strong> Patrons Signed Up</h2>";

while ($row = mysqli_fetch_assoc($result)) {
 $patrons = $row;

 
}

if ($patron[2] = "Adult Program") {
    
   echo arr_sum($patron[2]);
} 

 print_r (array_values($patrons));
    
  
       }
       
       elseif ($branch === "Weaver-Bolden") {
       echo "<h2>The Weaver Bolden Branch Currently Has: <strong class=\"heading-success\">$registeredpatrons</strong> Patrons Signed Up</h2>";
         
       }
         
       elseif ($branch === "Brown") {
       echo "<h2>The Brown Branch Currently Has: <strong class=\"heading-success\">$registeredpatrons</strong> Patrons Signed Up</h2>";    
        
       }
       ?>


</table>
</div>
<?php
// close connection
mysqli_close($mysqli);
