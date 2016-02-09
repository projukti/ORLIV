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
			$refund=$_REQUEST['refund'];
            $query_update= "UPDATE `convence_oper` SET 
            `refund`='$refund'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
			
			echo "<script type='text/javascript'> window.location= 'convence_refund.php'; </script>";


?>