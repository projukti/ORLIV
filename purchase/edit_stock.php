<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
$user=$_SESSION['user']['username'];

$select_user = "SELECT * FROM `purchase_details` Where `username`='$user'";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
$row= mysql_fetch_array($exe_selectuser);
    $pur_name= $row['pur_name']; 
	$pur_code= $row['pur_code'];
?>
<?php
if(isset($_REQUEST['submit']))
{
$id= $_REQUEST['id'];
$qty= $_REQUEST['qty'];

 $query_update= "UPDATE `material_stock` SET 
			`qty`='$qty'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

	echo "<script> window.location= 'view_stock.php?success'; </script>";

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
<!-----------------------------datepicker-------------------->
<link rel="stylesheet" type="text/css" href="codebase/dhtmlxcalendar.css">
<link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxcalendar_dhx_skyblue.css">
<script src="codebase/dhtmlxcalendar.js"></script>
<style>
#calendar,
#calendar2,
#calendar3,
#calendar4 {
	border: 1px solid #909090;
	font-size: 12px;
}
</style>
<script>
var myCalendar;
function doOnLoad() {
myCalendar = new dhtmlXCalendarObject(["calendar","calendar2","calendar3","calendar4","calendar5","calendar6","calendar7","calendar8"]);
}
</script>
<!-----------------------------datepicker-------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#drive").validate({
		rules: {
			qty: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			qty: {
				required: "<br />Enter Quantity."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<!----------------------phone no----------------------------->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
</SCRIPT>
<!----------------------phone no----------------------------->
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

        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="350" align="center">
          <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
            <table width="500" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
              <tr class="drive">
                <td height="39" colspan="3" align="center" bgcolor="#fff1ab">UPDATE STOCK</td>
                </tr>
              <tr>
                <td height="18" colspan="3" align="center">
    <?php 
	$id= $_REQUEST['id'];
	$sql="SELECT * FROM `material_stock` WHERE `id`='$id'";
          $result=mysql_query($sql) or die (mysql_error());
           $row1= mysql_fetch_array($result);
           $id=$row1['id'];
		   $material_name=$row1['material_name'];
           $qty=$row1['qty']; ?></td>
                </tr>
              <tr>
                <td width="223" height="50" align="center" bgcolor="#FFFFFF" class="drive_txt">Name Of Material </td>
                <td width="45" height="50" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td width="226" height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" valign="middle"><?php echo $material_name; ?></td>
                </tr>
              <tr>
                <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Quantity</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="40" align="left" bgcolor="#FFFFFF" class="drive_txt"><input type="text" name="qty" id="qty" class="in_box" value="<?php echo $qty; ?>" /></td>
              </tr>
              <tr>
                <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="image" src="image/submit.jpg" name="submit" id="submit" value="submit" /> </td>
              </tr>
              
          </table></form></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
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
