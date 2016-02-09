<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
?>
<?php
if (isset($_POST['submit']))
	{	
$quot_name= mysql_real_escape_string($_REQUEST['quot_name']);	

$query_update= "UPDATE `invoice_name` SET `quot_name`='$quot_name' WHERE `id`='1'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
			
echo "<script> window.location= 'invoice_name.php?update'; </script>";

}

if (isset($_POST['ven_submit']))
	{	
$quot_name= mysql_real_escape_string($_REQUEST['quot_name']);	

$query_update= "UPDATE `invoice_name` SET `quot_name`='$quot_name' WHERE `id`='2'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'invoice_name.php?update'; </script>";

}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORLIV</title>
<link href="login.css" rel="stylesheet" type="text/css" />
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
    

	$("#drive1").validate({
		rules: {

			quot_name: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			quot_name: {
				required: "<br />Enter Quotation Name."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#drive").validate({
		rules: {

			quot_name: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			quot_name: {
				required: "<br />Enter Quotation Name."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->

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
        <td colspan="2"><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="center" class="succ"><?php

	
	if (isset($_REQUEST['update']))
	{
	echo "Data updated successfully.";
	}

    ?></td>
        </tr>
      <tr>
        <td width="528" height="50" align="center"><form action="" method="post" name="drive1" id="drive1" enctype="multipart/form-data"> 
        <table width="380" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td height="40" colspan="2" align="center" bgcolor="#fff1ab" class="drive">New Quotation (Please dont Use '-' )</td>
            </tr>
          <tr>
            <td width="265" height="60" align="center"><input type="text" name="quot_name" id="quot_name"  class="rounded" value="<?php
				 $sql4 = "SELECT * from `invoice_name` WHERE `id`='1'";
$rs4 = mysql_query($sql4);
$row4 = mysql_fetch_array($rs4); echo $row4['quot_name']; ?>"  /></td>
            <td width="112" height="60" align="center"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
          </tr>
          </table>
          </form></td>
        <td width="494" align="center"><form action="" method="post" name="drive" id="drive" enctype="multipart/form-data"> 
        <table width="380" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td height="40" colspan="2" align="center" bgcolor="#fff1ab" class="drive">Vendor Quotation (Please dont Use '-' )</td>
            </tr>
          <tr>
            <td width="265" height="60" align="center"><input type="text" name="quot_name" id="quot_name"  class="rounded" value="<?php
				 $sql4 = "SELECT * from `invoice_name` WHERE `id`='2'";
$rs4 = mysql_query($sql4);
$row4 = mysql_fetch_array($rs4); echo $row4['quot_name']; ?>" /></td>
            <td width="112" height="60" align="center"><input type="image" src="image/submit.jpg" border="0" name="ven_submit" id="ven_submit" value="ven_submit" /></td>
          </tr>
          </table>
          </form></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
        
          </td>
      </tr>
      <tr>
        <td height="20" colspan="2" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" colspan="2">&nbsp;</td>
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
