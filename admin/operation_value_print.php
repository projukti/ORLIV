 <?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

?><?php 
$from_date= $_REQUEST['from_date']; 
$to_date= $_REQUEST['to_date']; 
$oper_code= $_REQUEST['oper_code']; 

$sql2 = "SELECT * from `operation_details` Where `per_code`='$oper_code'";
$rs2 = mysql_query($sql2);
$row2 = mysql_fetch_array($rs2);
$per_name = $row2['per_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;  }
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 36px;
}
.style7 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; }
.style8 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style9 {
	font-size: 10px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>

<script language="JavaScript">
function printPage() {
if(document.all) {
document.all.divButtons.style.visibility = 'hidden';
window.print();
document.all.divButtons.style.visibility = 'visible';
} else {
document.getElementById('divButtons').style.visibility = 'hidden';
window.print();
document.getElementById('divButtons').style.visibility = 'visible';
}
}
</script>
</head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="60" colspan="15" align="left" valign="middle"><span class="style4">Orliv <span class="style8">Project Costing Report</span></span></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle"><span class="style3">Date</span></td>
    <td width="10" height="60" align="center" valign="middle">&nbsp;</td>
    <td width="70" height="60" align="left" valign="middle" class="style7"><?php echo $from_date; ?></td>
    <td width="10" height="60" align="center" valign="middle">&nbsp;</td>
    <td width="70" height="60" align="center" valign="middle"><span class="style3">To</span></td>
    <td width="10" height="60" align="center" valign="middle">&nbsp;</td>
    <td width="70" height="60" align="center" valign="middle" class="style7"><?php echo $to_date; ?></td>
    <td width="10" height="60" align="center" valign="middle">&nbsp;</td>
    <td height="60" colspan="3" align="right" valign="middle" class="style7"><span class="style3">Operating Person</span></td>
    <td width="10" height="60" align="center" valign="middle">:</td>
    <td height="60" colspan="3" align="left" valign="middle" class="style8"><?php echo $per_name; ?></td>
  </tr>
  <tr>
    <td height="10" colspan="15" align="center" valign="middle" class="style3"><span class="style9">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span></td>
  </tr>
  <tr>
    <td width="60" height="60" align="center" valign="middle" class="style3"><span class="style3">Quotation No</span></td>
    <td width="10" height="60" align="center" valign="middle" class="style3">|<br />
      |<br />
      |</td>
    <td width="70" height="60" align="center" valign="middle" class="style3"><span class="style3">Completion Date</span></td>
    <td width="10" height="60" align="center" valign="middle" class="style3">|<br />
|<br />
|</td>
    <td height="60" colspan="3" align="center" valign="middle" class="style3"><span class="style3">Marketing Person</span></td>
    <td width="10" height="60" align="center" valign="middle" class="style3">|<br />
      |<br />
    |</td>
    <td width="70" height="60" align="center" valign="middle" class="style3"><span class="style3">Conveyance Cost</span></td>
    <td width="10" height="60" align="center" valign="middle" class="style3">|<br />
|<br />
|</td>
    <td width="60" height="60" align="center" valign="middle" class="style3"><span class="style3">Material Cost</span></td>
    <td width="10" height="60" align="center" valign="middle" class="style3">|<br />
|<br />
|</td>
    <td width="50" height="60" align="center" valign="middle" class="style3"><span class="style3">Misc Cost</span></td>
    <td width="10" height="60" align="center" valign="middle" class="style3">|<br />
|<br />
|</td>
    <td width="80" height="60" align="center" valign="middle" class="style3"><span class="style3">Total Project Cost</span></td>
  </tr>
  <tr>
    <td height="10" colspan="15" align="center" valign="middle" class="style9">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
   <?php
$select_user = "SELECT * FROM `job_info` Where completion_date between '$from_date'and '$to_date' and operating_person_code='$oper_code' and completion_report <> '' order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$boq_quot_no= $row['boq_quot_no']; 
    $completion_date= $row['completion_date'];
    $post_holder= $row['post_holder'];
	$consult_operating_person= $row['consult_operating_person'];
	$cost= $row['cost'];
	$material_costing= $row['material_costing'];
	
$query_2= "SELECT SUM(amount) as amount FROM `miscellaneous` WHERE `boq_quot_no`='$boq_quot_no'";
$result_2= mysql_query($query_2) or die(mysql_error());
$row_2= mysql_fetch_array($result_2);
$misc_amount= $row_2['amount'];
			
$query_4= "SELECT * FROM `convence_oper` WHERE `boq_quot_no`='$boq_quot_no'";
$result_4= mysql_query($query_4) or die(mysql_error());
while($row_4= mysql_fetch_array($result_4))
{
$convence[]=$row_4['amount']-$row_4['refund'];
}
	 
?>
  <tr>
    <td width="60" height="50" align="center" valign="middle" class="style7"><span class="style7"><?php echo $boq_quot_no; ?></span></td>
    <td width="10" height="50" align="center" valign="middle" class="style7"><span class="style3">
|</span></td>
    <td width="70" height="50" align="center" valign="middle" class="style7"><?php echo $completion_date; ?></td>
    <td width="10" height="50" align="center" valign="middle" class="style7"><span class="style3">
|</span></td>
    <td height="50" colspan="3" align="center" valign="middle" class="style7"><?php echo $post_holder; ?></td>
    <td width="10" height="50" align="center" valign="middle" class="style7"><span class="style3">
    |</span></td>
    <td width="70" height="50" align="center" valign="middle" class="style7"><?php echo array_sum($convence); ?></td>
    <td width="10" height="50" align="center" valign="middle" class="style7"><span class="style3">
|</span></td>
    <td width="60" height="50" align="center" valign="middle" class="style7"><?php echo $material_costing; ?></td>
    <td width="10" height="50" align="center" valign="middle" class="style7"><span class="style3">
|</span></td>
    <td width="50" height="50" align="center" valign="middle" class="style7"><?php echo $misc_amount; ?></td>
    <td width="10" height="50" align="center" valign="middle" class="style7"><span class="style3">
|</span></td>
    <td width="80" height="50" align="center" valign="middle" class="style8"><?php echo $cost; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="15" align="left" valign="middle" class="style7"><div id="divButtons" name="divButtons">
          <input type="button" value = "Print this page" onclick="printPage()" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" />
        </div></td>
  </tr>
</table>
</body>
</html>
