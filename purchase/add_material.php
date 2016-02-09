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
$material_name= mysql_real_escape_string($_REQUEST['material_name']);
$type= mysql_real_escape_string($_REQUEST['type']);

$query_2= "INSERT INTO `material_details` (`material_name`,`type`) VALUES ('$material_name','$type')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'add_material.php?insert'; </script>";

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

			type: {
				required: true
			},
			material_name: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			type: {
				required: "<br />Enter Location Name."
			
			},
			material_name: {
				required: "<br />Enter Material Name."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
  <!-----------------------------selectbox with inputbox-------------------->	
  <script language="javascript" type="text/javascript">
     function DropDownTextToBox(objDropdown, strTextboxId) {
        document.getElementById(strTextboxId).value = objDropdown.options[objDropdown.selectedIndex].value;
        DropDownIndexClear(objDropdown.id);
        document.getElementById(strTextboxId).focus();
    }
    function DropDownIndexClear(strDropdownId) {
        if (document.getElementById(strDropdownId) != null) {
            document.getElementById(strDropdownId).selectedIndex = -1;
        }
    }
</script>


   <!-----------------------------selectbox with inputbox-------------------->	

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
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        <form action="" method="post" name="drive" id="drive" enctype="multipart/form-data"> 
        <table width="500" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td height="40" colspan="3" align="center" bgcolor="#fff1ab" class="drive">Material Details</td>
            </tr>
          <tr>
            <td width="173" height="60" align="center" class="drive_txt">Material Name</td>
            <td width="50" height="60" align="center" class="drive_txt">:</td>
            <td width="275" height="60" align="left" valign="middle"><div style="position: relative;">
          <!--[if lte IE 6.5]><div class="select-free" id="dd3"><div class="bd" ><![endif]-->
          <input name="material_name" type="text" id="TextboxExample" tabindex="2"
        onchange="DropDownIndexClear('DropDownExTextboxExample');" class="in_box" style="width: 180px;
        position: absolute; top: -10px; left: 0px; z-index: 2;" />
          <!--[if lte IE 6.5]><iframe></iframe></div></div><![endif]-->
          <select name="material_name" id="DropDownExTextboxExample" tabindex="1000"
        onchange="DropDownTextToBox(this,'TextboxExample');" style="position: absolute;
        top: -8px; left: 1px; z-index: 1; width: 212px;">
                 <?php
                 $sql = "SELECT * from `material_details`";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                <option value="<?php echo $row['material_name']; ?>"><?php echo $row['material_name']; ?></option>
                <?php } ?> 
            </select>
          <script language="javascript" type="text/javascript">
        //Since the first <option> will be preselected the IndexClear function must fire once to clear that out.
        DropDownIndexClear("DropDownExTextboxExample");
    </script>
  </div></td>
          </tr>
          <tr>
            <td height="40" align="center" class="drive_txt">Type</td>
            <td height="40" align="center" class="drive_txt">:</td>
            <td height="40" align="left"><input type="text" name="type" id="type"  class="in_box" /></td>
          </tr>
          <tr>
            <td height="60" colspan="2" align="center">&nbsp;</td>
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
echo "<span class='succ'>Data Inserted Successfully.</span>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data Updated Successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>Deleted Successfully.</span>";
}

?></td>
      </tr>
      <tr>
        <td height="50" align="center"><table width="550" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="218" height="40" align="center" bgcolor="#fff1ab" class="drive">Material  Name</td>
            <td width="219" align="center" bgcolor="#fff1ab" class="drive">Type</td>
            <td width="111" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
          </tr>
          <tr>
            <td colspan="2" align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php
$select_user = "SELECT * FROM `material_details` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$material_name=$row['material_name'];
	$type=$row['type'];
	 
?>
          <tr>
     
 <td height="35" align="center" valign="middle" bgcolor="#FEEDE7" class="drive_txt"><?php echo $material_name; ?></td>
 <td height="35" align="center" valign="middle" bgcolor="#FEEDE7" class="drive_txt"><?php echo $type; ?></td>
 <td height="35" align="center" valign="middle" bgcolor="#FEEDE7"><a href="location_del.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
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
