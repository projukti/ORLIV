<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 

     
?> 
<?php

			if(isset($_REQUEST['block_id'])=='')
             {
			$unblock_id=$_REQUEST['unblock_id'];
			
            $query_update= "UPDATE `customer_details` SET 
            `status`='0'
			 WHERE `id`='$unblock_id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
			
			echo "<script type='text/javascript'> window.location= 'edit_cust.php?unblock'; </script>";
            } 
			else
			 {
             $block_id=$_REQUEST['block_id'];
			
            $query_update= "UPDATE `customer_details` SET 
            `status`='1'
			 WHERE `id`='$block_id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
			
			echo "<script type='text/javascript'> window.location= 'edit_cust.php?block'; </script>";
              }

?>