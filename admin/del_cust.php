<?php 

    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
     

?> 

<?php
$id= $_REQUEST['id'];

$query_2= "DELETE FROM `customer_details` WHERE `id`= '$id'";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'edit_cust.php?delete'; </script>";

?>

