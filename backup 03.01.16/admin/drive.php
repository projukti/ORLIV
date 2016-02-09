<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
?>
<?php
if (isset($_REQUEST['submit']))
{
$marketing= mysql_real_escape_string($_REQUEST['marketing']);
$operation= mysql_real_escape_string($_REQUEST['operation']);
$purchase= mysql_real_escape_string($_REQUEST['purchase']);
$accounts= mysql_real_escape_string($_REQUEST['accounts']);

$rand= rand(1000,9999);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$target1 = "drive/"; 	
	$target1 = $target1 .$rand. basename( $_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $target1);
	$file= $rand.basename($_FILES['file']['name']);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$query_2= "INSERT INTO `drive` (`upload_file`, `marketing`, `operation`, `purchase`, `accounts`, `post`) VALUES ('$file', '$marketing', '$operation', '$purchase', '$accounts', 'Admin')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'drive.php?insert'; </script>";

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
    

	$("#drive").validate({
		rules: {

			file: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			file: {
				required: "<br /> Please Enter Image."
			
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
        <td><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        <form action="" method="post" name="drive" id="drive" enctype="multipart/form-data"> 
        <table width="900" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="265" height="40" align="center" bgcolor="#fff1ab" class="drive">Upload File</td>
            <td width="91" height="40" align="center" bgcolor="#fff1ab">&nbsp;</td>
            <td width="101" height="40" align="center" bgcolor="#fff1ab" class="drive">Marketing</td>
            <td width="110" height="40" align="center" bgcolor="#fff1ab" class="drive">Operation</td>
            <td width="104" height="40" align="center" bgcolor="#fff1ab" class="drive">Purchase</td>
            <td width="107" height="40" align="center" bgcolor="#fff1ab" class="drive">Accounts</td>
            <td width="112" align="center" bgcolor="#fff1ab" class="drive">Save</td>
          </tr>
          <tr>
            <td height="60" align="right"><input type="file" name="file" id value=""/></td>
            <td height="60" align="center" class="drive_txt">Access To</td>
            <td height="60" align="center"><input type="checkbox" name="marketing" id="marketing" value="1"/></td>
            <td height="60" align="center"><input type="checkbox" name="operation" id="operation" value="1"/></td>
            <td height="60" align="center"><input type="checkbox" name="purchase" id="purchase" value="1"/></td>
            <td height="60" align="center"><input type="checkbox" name="accounts" id="accounts" value="1"/></td>
            <td height="60" align="center"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
          </tr>
          </table>
          </form>
          </td>
      </tr>
      <tr>
        <td height="20" align="center"><?php
if (isset($_REQUEST['success']))
{
echo "Inserted successfully.";
}
if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>File Inserted Successfully.</span>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data Updated Successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>File Deleted Successfully.</span>";
}

?></td>
      </tr>
      <tr>
        <td height="50" align="center"><table width="900" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="207" height="40" align="center" bgcolor="#fff1ab" class="drive">File</td>
            <td width="83" height="40" align="center" bgcolor="#fff1ab" class="drive">Marketing</td>
            <td width="82" height="40" align="center" bgcolor="#fff1ab" class="drive">Operation</td>
            <td width="75" height="40" align="center" bgcolor="#fff1ab" class="drive">Purchase</td>
            <td width="81" height="40" align="center" bgcolor="#fff1ab" class="drive">Accounts</td>
            <td width="135" height="40" align="center" bgcolor="#fff1ab" class="drive">Update</td>
            <td width="108" align="center" bgcolor="#fff1ab" class="drive">Download</td>
            <td width="118" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
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
$select_user = "SELECT * FROM `drive` Where `post`='Admin' order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$upload_file= $row['upload_file']; 
	$marketing=$row['marketing'];
    $operation=$row['operation'];
    $purchase= $row['purchase'];
	$accounts=$row['accounts'];
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="drive_update.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $upload_file; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="checkbox" name="marketing" id="marketing" value="1" <?php if($marketing>0) { echo "checked"; } else {}  ?>/></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="checkbox" name="operation" id="operation" value="1" <?php if($operation>0) { echo "checked"; } else {}  ?>/></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="checkbox" name="purchase" id="purchase" value="1" <?php if($purchase>0) { echo "checked"; } else {}  ?>/></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="checkbox" name="accounts" id="accounts" value="1" <?php if($accounts>0) { echo "checked"; } else {}  ?>/></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="image" src="image/update.png" height="25" width="70" border="0" name="submit" id="submit" value="submit" /></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><a href="download_demo.php?filename=<?php echo $upload_file; ?>"><img src="image/download.png" height="25" width="70" /></a></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><a href="file_delete.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
 </form>
          </tr>
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
        </table></td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
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
