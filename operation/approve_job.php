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
			$accept=$_REQUEST['accept'];
            $query_update= "UPDATE `job_info` SET 
            `accept_status`='$accept'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
			
			echo "<script type='text/javascript'> window.location= 'job_info.php'; </script>";


?>