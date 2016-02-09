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
if (isset($_REQUEST['submit']))
{
$amount= mysql_real_escape_string($_REQUEST['amount']);
$pur_name= mysql_real_escape_string($_REQUEST['pur_name']);
$pur_code= mysql_real_escape_string($_REQUEST['pur_code']);
$on_date= mysql_real_escape_string($_REQUEST['on_date']);
$material= mysql_real_escape_string($_REQUEST['material']);
      
$query_2= "INSERT INTO `material_costing` (`on_date`,`amount`,`material`,`pur_name`,`pur_code`) 
                                   VALUES ('$on_date','$amount','$material','$pur_name','$pur_code')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'amount_requests.php?success'; </script>";
	
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
<!-----------------------------datepicker-------------------->
<link rel="stylesheet" type="text/css" href="codebase/dhtmlxcalendar.css">
<link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxcalendar_dhx_skyblue.css">
<script src="codebase/dhtmlxcalendar.js"></script>
<style>
#calendar,
{
	border: 1px solid #909090;
	font-size: 12px;
}
</style>
<script>
var myCalendar;
function doOnLoad() {
myCalendar = new dhtmlXCalendarObject(["calendar"]);
}
</script>
<!-----------------------------datepicker-------------------->

<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#drive").validate({
		rules: {

			amount: {
				required: true
			},
			on_date: {
				required: true,

			},
			material: {
				required: true,

			}
			
			
		 
		}, //end rules
		messages: {
			

			amount: {
				required: "<br />Enter amount."
			
			},
			on_date: {
				required: "<br />Select Date."
			
			},
			material: {
				required: "<br />Enter Material."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->

</head>

<body topmargin="0"  onload="doOnLoad();">
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
        <td height="20" align="center"><table width="620" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div style="overflow-y:scroll; height:300px;">
    <table width="600" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="159" height="40" align="center" bgcolor="#fff1ab">Name Of Material</td>
            <td width="103" align="center" bgcolor="#fff1ab">Date</td>
            <td width="84" align="center" bgcolor="#fff1ab">Amount</td>
            <td width="70" align="center" bgcolor="#fff1ab">Status</td>
            </tr>
          <tr>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
            </tr>
          <?php
		  
$select_user = "SELECT * FROM `material_costing` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
	$material= $row['material']; 
	$on_date=$row['on_date'];
    $amount=$row['amount'];
	$status=$row['status'];
	$id=$row['id'];
	
?>
          <tr> 

 <td height="20" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $material;?></td>
 <td height="20" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $on_date;?></td>
 <td height="20" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $amount;?></td>
 <td height="20" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php if($status>0){ echo "Delivered"; }else{ ?><a href="amt_apv.php?id=<?php echo $id; ?>"><img src="image/tick.png" alt="" /></a><?php }?></td>
 </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
        <?php } ?>  
        </table>
    </div></td>
  </tr>
</table>
</td>
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
