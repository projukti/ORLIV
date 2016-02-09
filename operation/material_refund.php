<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
$user=$_SESSION['user']['username'];

$select_user = "SELECT * FROM `operation_details` Where `username`='$user'";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
$row= mysql_fetch_array($exe_selectuser);
    $per_name= $row['per_name']; 
	$per_code= $row['per_code'];
?>
<?php
if(isset($_REQUEST['submit']))
{
            $m_id=$_REQUEST['m_id'];
			$refund=$_REQUEST['refund'];
			
            $query_update= "UPDATE `material_request` SET 
            `refund`='$refund'
			 WHERE `m_id`='$m_id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
			
			echo "<script type='text/javascript'> window.location= 'material_refund.php'; </script>";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORLIV</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />


<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
</style>

<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#drive").validate({
		rules: {
			refund: {
				required: true
			}
	
		 
		}, //end rules
		messages: {
			
			refund: {
				required: "<br />Enter Quantity."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
</head>

<body topmargin="0" onload="doOnLoad();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th height="60" align="center" valign="middle"><?php include_once("header.php"); ?></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="1024" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
      <tr>
        <td><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>

        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><table width="870" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <div style="overflow-y:scroll; height:300px;">
    <table width="858" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="180" height="40" align="center" bgcolor="#fff1ab">Name Of Material</td>
            <td width="103" height="40" align="center" bgcolor="#fff1ab">Quantity</td>
            <td width="125" height="40" align="center" bgcolor="#fff1ab">Type</td>
            <td width="96" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="146" height="40" align="center" bgcolor="#fff1ab">Marketing Person</td>
            <td width="67" align="center" bgcolor="#fff1ab">Refunded</td>
            <td width="98" align="center" bgcolor="#fff1ab">Refund Material</td>
            <td width="32" align="center" bgcolor="#fff1ab">&nbsp;</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
$select_user = "SELECT * FROM `material_request` Where `oper_code`='$per_code' and `accept`=1 and `delivered`=1 order by m_id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $m_id= $row['m_id']; 
	$material_name= $row['material_name']; 
	$qty=$row['qty'];
    $type=$row['type'];
    $boq_quot_no= $row['boq_quot_no'];
	$mkt_code=$row['mkt_code'];
	$accept=$row['accept'];
	$delivered=$row['delivered'];
	$present_date=$row['present_date']; 
	$refund=$row['refund'];

	
?><form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">    
          <tr>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="hidden" name="m_id" value="<?php echo $m_id;?>" /><?php echo $material_name;?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $qty;?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $type;?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $boq_quot_no;?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php $user = "SELECT * FROM `marketing_details` Where `mkt_code`='$mkt_code'";
$exe = mysql_query($user) or die (mysql_error());
$row1= mysql_fetch_array($exe);
echo $row1['mkt_name'];?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $refund;?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="text" name="refund" id="refund" placeholder="0" class="in_box" style="width:50px;" /></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="image" src="image/go_b.png" width="30" height="30" name="submit" id="submit" value="submit" /></td>
          </tr>
           </form>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
        </div>
        </td>
  </tr>
</table>
</td>
      </tr>
      <tr>
        <td height="20" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle"><?php include_once("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
