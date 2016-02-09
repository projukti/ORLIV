<?php 

require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

?> 
<?php

$id = $_REQUEST['id'];

$arr1=explode("**",$id);

$type= $arr1[0]; 
$material_name= $arr1[1];
//connect to the database

    $query="SELECT * FROM `material_stock` where `material_name`='$material_name' and `type`='$type'";
	$result=mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
echo  "Available-".$row['qty'];
}

?>