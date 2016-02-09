 <?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

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
    <td height="60" colspan="6" align="left" valign="middle"><span class="style4">Orliv <span class="style8">Chalan Copy</span></span></td>
    <td height="60" colspan="3" align="right" valign="middle" class="style8"><strong>Registered Office</strong><br />
      <span class="style9">Fartabad, Garia<br />
      Kolkata - 700084<br />
    West Bengal, India</span></td>
  </tr>
  <tr>
    <td height="10" colspan="9" align="center" valign="middle" class="style3"><span class="style9">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span></td>
  </tr>
  <tr>
    <td width="140" height="60" align="center" valign="middle" class="style3"><span class="style3">Quotation No</span></td>
    <td width="14" height="60" align="center" valign="middle" class="style3">|<br />
      |<br />
      |</td>
    <td height="60" colspan="3" align="center" valign="middle" class="style3">Material Name</td>
    <td width="24" height="60" align="center" valign="middle" class="style3">|<br />
      |<br />
    |</td>
    <td width="144" height="60" align="center" valign="middle" class="style3"><span class="style3">Material Type</span></td>
    <td width="9" height="60" align="center" valign="middle" class="style3">|<br />
|<br />
|</td>
    <td width="93" height="60" align="center" valign="middle" class="style3">Quantity</td>
  </tr>
  <tr>
    <td height="10" colspan="9" align="center" valign="middle" class="style9">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  
   <?php

if(isset($_REQUEST['submit']))
{
	$checkbox1 = $_POST['chk1'];
for ($i=0; $i<sizeof($checkbox1);$i++) {
$id="$checkbox1[$i]";


	
$query= "select * from `material_request` where `m_id`='$id'" ;
$result= mysql_query($query) or die (mysql_error());
$count= mysql_num_rows($result);
if ($count > 0)
while($row= mysql_fetch_array($result))
	{
	$boq_quot_no= $row['boq_quot_no'];
	$material_name= $row['material_name'];
	$type= $row['type'];
    $qty= $row['qty'];
?>
  <tr>
    <td width="140" height="50" align="center" valign="middle" class="style7"><?php echo $boq_quot_no; ?></td>
    <td width="14" height="50" align="center" valign="middle" class="style7"><span class="style3">
    |</span></td>
    <td height="50" colspan="3" align="center" valign="middle" class="style7"><?php echo $material_name; ?></td>
    <td width="24" height="50" align="center" valign="middle" class="style7"><span class="style3">
    |</span></td>
    <td width="144" height="50" align="center" valign="middle" class="style7"><?php echo $type; ?></td>
    <td width="9" height="50" align="center" valign="middle" class="style7"><span class="style3">
|</span></td>
    <td height="50" align="center" valign="middle" class="style7"><?php echo $qty; ?></td>
  </tr>
  <?php } } } ?>
  <tr>
    <td colspan="9" align="right" valign="middle" class="style8">Signature</td>
  </tr>
  <tr>
    <td colspan="9" align="left" valign="middle" class="style7"><div id="divButtons" name="divButtons">
          <input type="button" value = "Print this page" onclick="printPage()" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" />
        </div></td>
  </tr>
</table>
</body>
</html>
