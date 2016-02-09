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
<?php
if (isset($_REQUEST['submit']))
{
$boq_quot_no= mysql_real_escape_string($_REQUEST['boq_quot_no']);
$amount= mysql_real_escape_string($_REQUEST['amount']);

  $query_pro= "UPDATE `job_info` SET 
				   `material_costing`='$amount'
                    WHERE `boq_quot_no`='$boq_quot_no'";
                    $query_exe_pro= mysql_query($query_pro) or die(mysql_error());		  

 echo "<script> window.location= 'costing_project.php?success'; </script>"; 
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
			boq_quot_no: {
				required: true
			},
			amount: {
				required: true,

			}
			
			
		 
		}, //end rules
		messages: {
			
			boq_quot_no: {
				required: "<br />Enter Quotation No."
			
			},
			amount: {
				required: "<br />Enter Amount."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->

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
        <td height="200" align="center">
    <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
        <table width="500" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td height="39" colspan="4" align="center" bgcolor="#fff1ab">Costing</td>
            </tr>
          <tr>
            <td colspan="4" align="center"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Recorded Successfully.</span>";
} 
if (isset($_REQUEST['error']))
{
echo "<span class='errors'>Selected Quantity is out of stock.</span>";
} ?></td>
            </tr>
               <tr>
                 <td width="223" height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Quotation No</td>
                 <td width="45" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td width="225" height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt"> 
                   <select name="boq_quot_no" id="boq_quot_no" class="rounded" style="width:215px; height:28px;" >
                     <option value="">Select Quotation No</option>
                     <?php
                 $sql = "SELECT * from `job_info`";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                     <option value="<?php echo $row['boq_quot_no']; ?>"><?php echo $row['boq_quot_no']; ?></option>
                     <?php } ?> 
                  </select></td>
               </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Amount</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt" ><input type="text" name="amount" id="amount" class="in_box" value="" /></td>
                </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                 <td height="40" colspan="2" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="image" src="image/submit.jpg" name="submit" id="submit" value="submit" /> </td>
               </tr>
             
          </table></form></td>
      </tr>
      <tr>
        <td height="320" align="center"><table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <div style="overflow-y:scroll; height:300px;">
    <table width="485" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="122" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="105" height="40" align="center" bgcolor="#fff1ab">Marketing Person</td>
            <td width="101" align="center" bgcolor="#fff1ab">Material Cost</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
$select_user = "SELECT * FROM `job_info` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $boq_quot_no= $row['boq_quot_no'];
	$holder_code=$row['holder_code'];
	$material_costing=$row['material_costing'];

?>
          <tr>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $boq_quot_no;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php  $user = "SELECT * FROM `marketing_details` Where `mkt_code`='$holder_code'";
$exe = mysql_query($user) or die (mysql_error());
$row1= mysql_fetch_array($exe);
echo $row1['mkt_name'];?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $material_costing;?></td>
 </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
        </div>
        </td>
  </tr>
</table>
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
