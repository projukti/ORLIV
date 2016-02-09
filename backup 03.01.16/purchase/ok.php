<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

?>
<?php
            $m_id=$_REQUEST['m_id'];
            $query_update= "UPDATE `material_request` SET 
            `ok`=1
			 WHERE `m_id`='$m_id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
			
			echo "<script type='text/javascript'> window.location= 'refund_material.php'; </script>";


?>