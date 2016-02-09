<?php 
    require("connection.php");      
    if(empty($_SESSION['user'])) 
    { 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    } 	
    $user=$_SESSION['user']['username'];
	
	if((isset($_REQUEST['mode']))&&($_REQUEST['mode']=='add'))
	{
		$sel=mysql_query("select * from `audit_physical_stock_details` WHERE `asset_barcode`='".$_REQUEST['asset_barcode']."' and `verify`='Y'");
		$num=mysql_num_rows($sel);
		if($num==0)
		{
		$query_update= "UPDATE `audit_physical_stock_details` SET `verify`='Y' WHERE `asset_barcode`='".$_REQUEST['asset_barcode']."'";
        $qu_up= mysql_query($query_update) or die(mysql_error());
		header("Location: stock_verify.php?s"); 
		}
		else
		{
		header("Location: stock_verify.php?e"); 	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORLIV</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/multiple-select.css" />
<script>
window.onload = function() {
var input = document.querySelector('#barcode');
input.addEventListener('input', function(){
  if(document.getElementById("barcode").value.length>=7)
  {	
  document.forms['barcode_form'].submit();
   }
})};
</script>
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

<body>
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
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center">
        <form action="" method="post" name="barcode_form" id="barcode_form" enctype="multipart/form-data"> 
         <input type="hidden" name="mode" value="add" /> 
    <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Verify Stock</p></td>
        </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td width="21" height="35" align="left" valign="middle">&nbsp;</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><?php
if (isset($_REQUEST['s']))
{
echo "<span class='succ'>Stock Vefified Successfully.</span>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>One record deleted successfully.</span>";
}
if (isset($_REQUEST['e']))
{
echo "<span class='errors'>Stock Already Updated</span>";
}
?>
</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Asset Barcode</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <input type="text" name="asset_barcode" id="barcode" class="rounded" value=""  autofocus="autofocus" autocomplete="off"/></td>
      </tr>
      </table>
</form></td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center">&nbsp;</td>
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
