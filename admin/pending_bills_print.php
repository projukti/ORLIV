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
.style10 {
	font-size: 10px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style11 {font-size: 10px; font-family: Arial, Helvetica, sans-serif; }
.style7 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; }
.style8 {font-size: 11px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
-->
</style>
</head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="60" colspan="9" align="left" valign="middle"><span class="style4">Orliv</span></td>
  </tr>
  <tr>
    <td height="40" colspan="9" align="left" valign="middle"><table width="500" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="60" height="40" align="center" valign="middle" class="style3">Date</td>
        <td width="160" height="40" align="center" valign="middle" class="style3"><?php echo $from_date; ?></td>
        <td width="60" height="40" align="center" valign="middle" class="style3">to</td>
        <td width="60" height="40" align="center" valign="middle" class="style3">Date</td>
        <td width="160" height="40" align="center" valign="middle" class="style3"><?php echo $to_date; ?></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td height="10" colspan="9" align="center" valign="middle" class="style10">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td width="120" height="40" align="center" valign="middle" class="style3"><span class="style3">Quotation No</span></td>
    <td width="10" height="40" align="center" valign="middle" class="style3">|<br />
      |<br />
    |</td>
    <td width="70" height="40" align="center" valign="middle" class="style3"><span class="style3">Completion Date</span></td>
    <td width="10" height="40" align="center" valign="middle" class="style3">|<br />
|<br />
|</td>
    <td width="120" height="40" align="center" valign="middle" class="style3"><span class="style3">Marketing Person</span></td>
    <td width="10" height="40" align="center" valign="middle" class="style3">|<br />
|<br />
|</td>
    <td width="120" height="40" align="center" valign="middle" class="style3"><span class="style3">Operating Person</span></td>
    <td width="10" height="40" align="center" valign="middle" class="style3">|<br />
|<br />
|</td>
    <td width="130" height="40" align="center" valign="middle" class="style3"><span class="style3">Total Project Cost</span></td>
  </tr>
  <tr>
    <td height="10" colspan="9" align="center" valign="middle" class="style11"><span class="style10">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span></td>
  </tr>
  <?php
$select_user = "SELECT * FROM `job_info` Where completion_date between '$from_date'and '$to_date' and completion_report <>'' and ok_complete != 1 order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$boq_quot_no= $row['boq_quot_no']; 
    $completion_date= $row['completion_date'];
    $post_holder= $row['post_holder'];
	$consult_operating_person= $row['consult_operating_person'];
	$cost= $row['cost'];
	
	 
?>
  <tr>
    <td height="40" align="center" valign="middle" class="style3"><span class="style7"><?php echo $boq_quot_no; ?></span></td>
    <td height="40" align="center" valign="middle" class="style3">
|</td>
    <td height="40" align="center" valign="middle" class="style3"><span class="style7"><?php echo $completion_date; ?></span></td>
    <td height="40" align="center" valign="middle" class="style3">
|</td>
    <td height="40" align="center" valign="middle" class="style3"><span class="style7"><?php echo $post_holder; ?></span></td>
    <td height="40" align="center" valign="middle" class="style3">
|</td>
    <td height="40" align="center" valign="middle" class="style3"><span class="style7"><?php echo $consult_operating_person; ?></span></td>
    <td height="40" align="center" valign="middle" class="style3">
|</td>
    <td height="40" align="center" valign="middle" class="style8"><?php echo $cost; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="9" align="center" valign="middle" class="style3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
