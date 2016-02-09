<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
$user=$_SESSION['user']['username'];

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

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#date").validate({
		rules: {
			from_date: {
				required: true
			},
			to_date: {
				required: true
			}
		 
		}, //end rules
		messages: {
			
			from_date: {
				required: "<br />Select Date."
			
			},
			to_date: {
				required: "<br />Select Date."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
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
        <td height="150" align="center">
        <form action="" method="post" name="date" id="date" enctype="multipart/form-data"> 
    
    <table width="400" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Search By Completion Date</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td width="246" height="18" align="left" valign="middle" class="error">
		<?php
if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}
if (isset($_REQUEST['delete']))
{
echo "<span class='succ'>Deleted successfully.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="134" height="35" align="left" valign="middle" class="master">From Date</td>
        <td width="20" height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error"><input type="text" name="from_date" id="calendar" class="in_box"  /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">To Date</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="to_date" id="calendar2" class="in_box"  /></td>
        </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form>
        </td>
      </tr>
      <tr>
        <td height="20" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center">
        <?php if(isset($_REQUEST['submit'])) { $from_date= $_REQUEST['from_date']; $to_date= $_REQUEST['to_date']; ?>
        <table width="1225" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="108" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="149" height="40" align="center" bgcolor="#fff1ab">File</td>
            <td width="101" height="40" align="center" bgcolor="#fff1ab">Project Cost</td>
            <td width="102" height="40" align="center" bgcolor="#fff1ab">Completion</td>
            <td width="132" height="40" align="center" bgcolor="#fff1ab">Operation Person</td>
            <td width="122" align="center" bgcolor="#fff1ab">Marketing Person</td>
            <td width="90" height="40" align="center" bgcolor="#fff1ab">Approve</td>
            <td width="79" align="center" bgcolor="#fff1ab">Accepted</td>
            <td width="122" align="center" bgcolor="#fff1ab">Bill_submitted</td>
            <td width="123" align="center" bgcolor="#fff1ab">Payment_deliver</td>
            <td width="83" align="center" bgcolor="#fff1ab">Delete</td>
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
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
$select_user = "SELECT * FROM `job_info` Where completion_date between '$from_date'and '$to_date' order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$upload_file= $row['project_up']; 
	$approve_status= $row['approve_status'];
	$accept_status= $row['accept_status'];
$completion_date= $row['completion_date'];
$post_holder= $row['post_holder'];
$present_date= date("Y-m-d");
	$diff_date = "SELECT DATEDIFF('$completion_date','$present_date') AS DiffDate";
	$c_date = mysql_query($diff_date) or die (mysql_error());
	$row_date= mysql_fetch_array($c_date); 
	$count_day= $row_date['DiffDate']; 
	$s=$row['submitted'];
	$p=$row['pay_deliver'];
	if($row['ok_complete']==0) { if($count_day>2){ $colour="#00FF99"; } elseif($count_day<=2 && $count_day>=0){ $colour="#FFCC33"; }else{ $colour="#FF0000"; } } else { $colour="#FFF"; }
	 
?>
          <tr>
            <td align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['boq_quot_no']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><a href="download_job.php?filename=<?php echo $upload_file; ?>"><?php echo $upload_file; ?></a></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['cost']?>/-</td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['completion_date']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['consult_operating_person']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $post_holder; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($approve_status==0){ echo "Not Assigned"; }else { echo "Assigned"; } ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($accept_status==0){ echo "Not Accepted"; }else { echo "Accepted"; } ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($s==1){ echo "Yes"; }else { echo "No"; } ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($p==1){ echo "Yes"; }else { echo "No"; } ?></td>
 <td align="center" bgcolor="<?php echo $colour; ?>"><a href="job_delete.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>

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
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
        <?php } ?></td>
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
