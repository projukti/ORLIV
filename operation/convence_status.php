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

</head>

<body topmargin="0">
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
        <td height="320" align="center"><table width="870" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <div style="overflow-y:scroll; height:400px;">
    <table width="850" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="105" align="center" bgcolor="#fff1ab">Date</td>
            <td width="115" height="40" align="center" bgcolor="#fff1ab">Amount</td>
            <td width="133" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="135" height="40" align="center" bgcolor="#fff1ab">Operation Code</td>
            <td width="142" align="center" bgcolor="#fff1ab">Operation Person</td>
            <td width="97" align="center" bgcolor="#fff1ab">Approve</td>
            <td width="113" align="center" bgcolor="#fff1ab">Delete</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
$select_user = "SELECT * FROM `convence_oper` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 

    $amount=$row['amount'];
    $boq_quot_no= $row['boq_quot_no'];
	$oper_code=$row['oper_code'];
	$oper_name=$row['oper_name'];
	$on_date=$row['on_date']; 
	$status=$row['status'];
	if($status!=0){ $colour="#99FFCC"; $stat="Delivered"; }else{ $colour="#FF9966"; $stat="Not Approve"; }	
?>
          <tr>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $on_date;?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $amount;?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $boq_quot_no;?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $oper_code;?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $oper_name;?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $stat;?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>"><img src="image/delete.png" /></td>
          </tr>
          <tr>
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
