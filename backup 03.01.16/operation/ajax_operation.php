<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
?>
      
<input type="text" name="oper_code" id="oper_code" class="in_box" value="<?php $sql=mysql_query("select * from job_info where boq_quot_no like '%".$_REQUEST['id']."%'"); $res=mysql_fetch_array($sql); echo $res['operating_person_code'] ?>" readonly="readonly" />