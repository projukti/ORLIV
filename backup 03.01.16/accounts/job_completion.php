<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
$user=$_SESSION['user']['username'];

if(isset($_POST['update'])){
	$j_id=$_REQUEST['id'];
	$submitted=$_REQUEST['submitted'];
	$pay_deliver=$_REQUEST['pay_deliver'];
	
	$up="update job_info set 
		submitted='$submitted',
		pay_deliver='$pay_deliver'
		where id='$j_id'";
		mysql_query($up)or die(mysql_error());
		
	echo "<script type='text/javascript'> window.location= 'job_completion.php'; </script>";	
		
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
        <td align="center"><table width="950" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <div style="overflow-y:scroll; height:600px;">
    <table width="1000" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="90" height="40" align="center" bgcolor="#fff1ab">Job Type</td>
            <td width="102" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="138" height="40" align="center" bgcolor="#fff1ab">Customer Name</td>
            <td width="112" height="40" align="center" bgcolor="#fff1ab">Completion Date</td>
            <td width="120" height="40" align="center" bgcolor="#fff1ab">Marketing Person</td>
            <td width="114" align="center" bgcolor="#fff1ab">Uploaded</td>
            <td width="82" align="center" bgcolor="#fff1ab">Approve From Marketing</td>
            <td width="74" align="center" bgcolor="#fff1ab">Bill Submitted</td>
            <td width="64" align="center" bgcolor="#fff1ab">Payment Delivered</td>
            <td width="91" align="center" bgcolor="#fff1ab">Update</td>
            </tr>
          <tr>
            <td colspan="10" align="center">&nbsp;</td>
            </tr>
           
          <?php
		  
$select_user = "SELECT * FROM `job_info` Where `approve_status`=1 and `accept_status`=1 order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$job_type= $row['job_type']; 
	$boq_quot_no=$row['boq_quot_no'];
    $cust_name=$row['cust_name'];
    $completion_date= $row['completion_date'];
	$post_holder=$row['post_holder'];
	$project_up=$row['project_up'];
	$completion_report=$row['completion_report'];
	$ok_complete=$row['ok_complete'];
	$completion_report=$row['completion_report'];
	$s=$row['submitted'];
	$p=$row['pay_deliver'];

	
?> <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">  
          <tr>  
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $job_type; ?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $boq_quot_no; ?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $cust_name; ?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $completion_date; ?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php echo $post_holder; ?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><a href="download_comp_report.php?filename=<?php echo $completion_report; ?>"><?php echo $completion_report; ?></a></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt">
   <?php if($ok_complete==0){ echo "Not Approve"; }else { echo "Approve"; } ?>
</td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php if($ok_complete!=0){?><input type="checkbox" name="submitted" id="submitted" value="1"<?php if($s=='1'){echo "checked";}else{}?> /><?php }?></td>
 <td height="30" align="center" bgcolor="#FFFFFF" class="drive_txt"><?php if($ok_complete!=0){?><input type="checkbox" name="pay_deliver" id="pay_deliver" value="1"<?php if($p=='1'){echo "checked";}else{}?> /><?php }?></td>
 <td height="30" align="center" bgcolor="#FFFFFF"><input type="hidden" name="id" value="<?php echo $id;?>" /><input type="image" src="image/update.png" height="25" width="70" name="update" value="update" onClick="return confirm('Are you sure?');"/></td>
          </tr> 
        </form>
         <?php } ?> 
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
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
