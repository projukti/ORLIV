<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
?>
      
<input type="text" name="mkt_code" id="mkt_code" class="in_box" value="<?php $sql=mysql_query("select * from job_info where boq_quot_no like '%".$_REQUEST['id']."%'"); $res=mysql_fetch_array($sql); echo $res['holder_code'] ?>" readonly="readonly" />