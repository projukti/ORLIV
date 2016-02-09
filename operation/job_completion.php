<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
$user=$_SESSION['user']['username'];

?>
<?php
if (isset($_REQUEST['submit']))
{
$id= mysql_real_escape_string($_REQUEST['id']);

$rand= rand(1000,9999);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$target1 = "../marketing/completion_report/"; 	
	$target1 = $target1 .$rand. basename( $_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $target1);
	$file= $rand.basename($_FILES['file']['name']);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$query_2= "update `job_info` set `completion_report`='$file' where id='$id' ";
		$qu_up= mysql_query($query_2) or die(mysql_error());
		
		echo "<script> window.location= 'job_completion.php?update'; </script>";

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
    <table width="935" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="112" height="40" align="center" bgcolor="#fff1ab">Job Type</td>
            <td width="178" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="97" height="40" align="center" bgcolor="#fff1ab">Customer Name</td>
            <td width="104" height="40" align="center" bgcolor="#fff1ab">Completion Date</td>
            <td width="98" height="40" align="center" bgcolor="#fff1ab">Marketing Person</td>
            <td width="103" align="center" bgcolor="#fff1ab">Uploaded</td>
            <td width="115" align="center" bgcolor="#fff1ab">Report</td>
            <td width="117" align="center" bgcolor="#fff1ab">&nbsp;</td>
            </tr>
          <tr>
            <td colspan="8" align="center">&nbsp;</td>
            </tr>
           
          <?php
$sql5 = "SELECT * from `operation_details` Where `username`='$user'";
$rs5 = mysql_query($sql5);
$row5 = mysql_fetch_array($rs5);
$per_code = $row5['per_code'];
		  
$select_user = "SELECT * FROM `job_info` Where `operating_person_code`='$per_code' and `approve_status`=1 and `accept_status`=1 order by id DESC";
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
	
	$present_date= date("Y-m-d");
	
	$diff_date = "SELECT DATEDIFF('$completion_date','$present_date') AS DiffDate";
	$c_date = mysql_query($diff_date) or die (mysql_error());
	$row_date= mysql_fetch_array($c_date); 
	$count_day= $row_date['DiffDate']; 
	if($count_day>2){ $colour="#00FF99"; } elseif($count_day<=2 && $count_day>=0){ $colour="#FFCC33"; }else{ $colour="#FF0000"; }
?> <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">  
          <tr>  
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $job_type; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $boq_quot_no; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $cust_name; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $completion_date; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $post_holder; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $completion_report; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt error"><input name="id" type="hidden" value="<?php echo $id; ?>" /><input type="file" name="file" id="file" value="" style="width:90px;"/></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>"><input type="image" src="image/update.png" name="submit" id="submit" value="submit" /></td>
          </tr> 
        </form>
         <?php } ?> 
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
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
