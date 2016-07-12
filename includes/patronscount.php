<?php
include_once 'psl_config.php';
include_once 'db_connect.php';
include_once 'functions.php';

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
       $registeredpatrons = mysqli_num_rows($result)
               
       ?>

      <?php 
    
      
         while ($row = mysqli_fetch_array($result)) {
 $patrons[] = $row[2];
 $srcomplete[] = $row[9];

}

$adults = "Adult Program";
$teens = "Teen Program";
$kids = "Kids Program";
$completed_yes = "yes";
$completed_no = "no";

$adults_counter = 0;
$teens_counter = 0;
$kids_counter = 0;
$sr_complete_counter = 0;
    

    ?>
       <?php
    if($branch === "Main Branch") {
        echo "<h2>The Main Branch Currently Has: <strong class=\"heading-success\">$registeredpatrons</strong> Patrons Signed Up</h2>";
// Call Patrons' Sum Function
        echo  "<h3>The Main Branch Currently Has: <strong class=\"heading-success\">". patronssum($adults_counter) ."</strong> Adults Signed Up</h3>";
        echo  "<h3>The Main Branch Currently Has: <strong class=\"heading-success\">". $teens_counter ."</strong> Teens Signed Up</h3>";
        echo "<h3>The Main Branch Currently Has: <strong class=\"heading-success\">". $kids_counter ."</strong> Children Signed Up</h3>";
        echo "<h3>The Main Branch Currently Has: <strong class=\"heading-success\">". completed_sr($sr_complete_counter)."</strong> Patrons That Have Completed Sign Up</h3>";
       
 }  elseif ($branch === "Weaver-Bolden") {
        echo "<h2>The Weaver Bolden Branch Currently Has: <strong class=\"heading-success\">$registeredpatrons</strong> Patrons Signed Up</h2>";
         
        echo  "<h3>The Weaver Bolden Branch Currently Has: <strong class=\"heading-success\">". patronssum($adults_counter) ."</strong> Adults Signed Up</h3>";
        echo  "<h3>The Weaver Bolden Branch Currently Has: <strong class=\"heading-success\">". $teens_counter ."</strong> Teens Signed Up</h3>";
        echo  "<h3>The Weaver Bolden Branch Currently Has: <strong class=\"heading-success\">". $kids_counter ."</strong> Children Signed Up</h3>";
        echo  "<h3>The Weaver Bolden Branch Currently Has: <strong class=\"heading-success\">". completed_sr($sr_complete_counter)."</strong> Patrons That Have Completed Sign Up</h3>";
 } elseif ($branch === "Brown") {
    echo "<h2>The Brown Branch Currently Has: <strong class=\"heading-success\">$registeredpatrons</strong> Patrons Signed Up</h2>";    
         
    echo  "<h3>The Brown Branch Currently Has: <strong class=\"heading-success\">". patronssum($adults_counter) ."</strong> Adults Signed Up</h3>";
    echo  "<h3>The Brown Branch Currently Has: <strong class=\"heading-success\">". $teens_counter ."</strong> Teens Signed Up</h3>";
    echo  "<h3>The Brown Branch Currently Has: <strong class=\"heading-success\">". $kids_counter ."</strong> Children Signed Up</h3>";
    echo  "<h3>The Brown Branch Currently Has: <strong class=\"heading-success\">". completed_sr($sr_complete_counter)."</strong> Patrons That Have Completed Sign Up</h3>";
 }
?>


</table>
</div>
<?php
// close connection
mysqli_close($mysqli);
