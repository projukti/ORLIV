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
$marketing= mysql_real_escape_string($_REQUEST['marketing']);	
$operation= mysql_real_escape_string($_REQUEST['operation']);	
$purchase= mysql_real_escape_string($_REQUEST['purchase']);	
$accounts= mysql_real_escape_string($_REQUEST['accounts']);	

/////////////////////////////////////////////////////
	  	  	
			$query_update= "UPDATE `drive` SET 
			`marketing`='$marketing',
			`operation`='$operation',
			`purchase`='$purchase',
			`accounts`='$accounts'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

			echo "<script type='text/javascript'> window.location= 'drive.php?update'; </script>";

ob_flush();

?>