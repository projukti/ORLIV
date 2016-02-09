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
        <td height="180" align="center">
          <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
            <table width="500" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
              <tr class="drive">
                <td height="39" colspan="3" align="center" bgcolor="#fff1ab">VIEW AND UPDATE STOCK</td>
                </tr>
              <tr>
                <td colspan="3" align="center"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Stock Updated Successfully.</span>";
} ?></td>
                </tr>
              <tr>
                <td width="223" height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Name Of Material </td>
                <td width="45" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td width="226" height="40" align="left" bgcolor="#FFFFFF" class="drive_txt"><select name="material_name" id="material_name" class="in_box" style="height:30px;">
                <option value="all">All</option>
                  <?php
                 $sql = "SELECT * from `material_stock`";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                  <option value="<?php echo $row['material_name']; ?>"><?php echo $row['material_name']; ?></option>
                  <?php } ?> 
                  </select></td>
                </tr>
              <tr>
                <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="image" src="image/submit.jpg" name="submit" id="submit" value="submit" /> </td>
                </tr>
              
          </table></form></td>
      </tr>
      <tr>
        <td align="center">
        <?php
if(isset($_REQUEST['submit']))
{ ?>
        <table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left">
    
    <?php $material_name= mysql_real_escape_string($_REQUEST['material_name']);

if($material_name=='all') { ?>
    <div style="overflow-y:scroll; height:300px;">
    <table width="480" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="241" height="40" align="center" bgcolor="#fff1ab">Name Of Material</td>
            <td width="93" align="center" bgcolor="#fff1ab">Type</td>
            <td height="40" colspan="2" align="center" bgcolor="#fff1ab">Quantity</td>
            </tr>
          <tr>
            <td colspan="2" align="center">&nbsp;</td>
            <td colspan="2" align="center">&nbsp;</td>
            </tr>
          <?php
		  
$select_user = "SELECT * FROM `material_stock` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
	$material_name= $row['material_name']; 
	$qty=$row['qty'];
	$type=$row['type'];
    $id=$row['id'];
?>
          <tr> 
 <td height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $material_name;?></td>
 <td height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $type;?></td>
 <td width="76" height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $qty;?></td>
 <td width="63" align="center" bgcolor="#CCFFFF" class="drive_txt"><a href="edit_stock.php?id=<?php echo $id; ?>"><img src="image/edit.png" alt="" /></a></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
    </div>
 <?php } else { ?>
    <table width="480" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="344" height="40" align="center" bgcolor="#fff1ab">Name Of Material</td>
            <td height="40" colspan="2" align="center" bgcolor="#fff1ab">Quantity</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td colspan="2" align="center">&nbsp;</td>
            </tr>
          <?php
		  
$select_user = "SELECT * FROM `material_stock` Where `material_name`='$material_name'";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
	$material_name= $row['material_name']; 
	$qty=$row['qty'];
	$id=$row['id'];
	
?>
          <tr> 
 <td height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $material_name;?></td>
 <td width="69" height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $qty;?></td>
 <td width="61" align="center" bgcolor="#CCFFFF" class="drive_txt"><a href="edit_stock.php?id=<?php echo $id; ?>"><img src="image/edit.png" alt="" /></a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
<?php } ?>
  </td>
  </tr>
</table>
<?php } ?>
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
