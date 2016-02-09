<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

?>
<?php
            $id=$_REQUEST['id'];
            $query_update= "UPDATE `material_costing` SET 
            `status`='1'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
			
			echo "<script type='text/javascript'> window.location= 'amt_rqst_status.php'; </script>";


?>