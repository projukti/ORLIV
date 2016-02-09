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

$sql="delete from `job_to_vendor` where `id`='$id'";
mysql_query($sql) or die(mysql_error());
//header("location:techMaster.php");
echo "<script type='text/javascript'> window.location= 'vendor_job_status.php?delete'; </script>";
ob_flush();
?>