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
$visited_date= mysql_real_escape_string($_REQUEST['visited_date']);
$cust_code= mysql_real_escape_string($_REQUEST['cust_code']);
$visited_by= mysql_real_escape_string($_REQUEST['visited_by']);
$job_type= mysql_real_escape_string($_REQUEST['job_type']);
$next_date= mysql_real_escape_string($_REQUEST['next_date']);
$boq_quot= mysql_real_escape_string($_REQUEST['boq_quot']);
$boq_quot_no= mysql_real_escape_string($_REQUEST['boq_quot_no']);
$order_date= mysql_real_escape_string($_REQUEST['order_date']);
$po_no= mysql_real_escape_string($_REQUEST['po_no']);
$consult_operating_person= mysql_real_escape_string($_REQUEST['consult_operating_person']);
$cost= mysql_real_escape_string($_REQUEST['cost']);
$completion_date= mysql_real_escape_string($_REQUEST['completion_date']);
$user= mysql_real_escape_string($_REQUEST['user']);

$sql2 = "SELECT * from `customer_details` Where `cust_code`='$cust_code'";
$rs2 = mysql_query($sql2);
$row2 = mysql_fetch_array($rs2);
$cust_name = $row2['customer_name'];

$sql5 = "SELECT * from `marketing_details` Where `username`='$user'";
$rs5 = mysql_query($sql5);
$row5 = mysql_fetch_array($rs5);
$mkt_name = $row5['mkt_name'];
$mkt_code = $row5['mkt_code'];

$arr1=explode("*",$consult_operating_person);

$oper_code= $arr1[0]; 
$oper_name= $arr1[1];


$rand= rand(1000,9999);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$target1 = "projects/"; 	
	$target1 = $target1 .$rand. basename( $_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $target1);
	$file= $rand.basename($_FILES['file']['name']);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$query_2= "INSERT INTO `job_info` (`visited_date`, `cust_name`, `cust_code`, `visited_by`, `job_type`, `next_date`,`boq_quot`, `boq_quot_no`, `order_date`, `po_no`, `consult_operating_person`,`operating_person_code`, `project_up`, `cost`, `completion_date`,`post`, `post_holder`, `holder_code`) 
VALUES ('$visited_date', '$cust_name', '$cust_code', '$visited_by', '$job_type', '$next_date','$boq_quot', '$boq_quot_no', '$order_date', '$po_no', '$oper_code', '$oper_name', '$file', '$cost', '$completion_date', 'Marketing', '$mkt_name', '$mkt_code')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'job_info.php?insert'; </script>";

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

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#drive").validate({
		rules: {

			visited_date: {
				required: true
			},
			cust_code: {
				required: true
			},
			visited_by: {
				required: true
			},
			job_type: {
				required: true
			},
			next_date: {
				required: true
			},
			boq_quot: {
				required: true
			},
			boq_quot_no: {
				required: true
			},
			order_date: {
				required: true
			},
			po_no: {
				required: true
			},
			consult_operating_person: {
				required: true
			},
			file: {
				required: true
			},
			cost: {
				required: true
			},
			completion_date: {
				required: true
			},
			
			
		 
		}, //end rules
		messages: {
			
			visited_date: {
				required: "<br />Enter Visited Date."
			
			},
			cust_code: {
				required: "<br />Enter Customer Code."
			
			},
			visited_by: {
				required: "<br />Enter Name."
			
			},
			job_type: {
				required: "<br />Enter Job Type."
			
			},
			next_date: {
				required: "<br />Enter Next Date."
			
			},
			boq_quot: {
				required: "<br />Select Yes/No."
			
			},
			boq_quot_no: {
				required: "<br />Please Quotation No."
			
			},
			order_date: {
				required: "<br />Enter Order Date."
			
			},
			po_no: {
				required: "<br />Enter PO No."
			
			},
			consult_operating_person: {
				required: "<br />Enter Operating Person nmae."
			
			},
			file: {
				required: "<br />Enter Quotation File."
			
			},
			cost: {
				required: "<br />Enter Quotation Value."
			
			},
			completion_date: {
				required: "<br />Enter Completion Date."
			
			},
			
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
        <td height="20" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center"><table width="1225" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="147" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="110" height="40" align="center" bgcolor="#fff1ab">File</td>
            <td width="88" height="40" align="center" bgcolor="#fff1ab">Project Cost</td>
            <td width="139" height="40" align="center" bgcolor="#fff1ab">Completion</td>
            <td width="120" height="40" align="center" bgcolor="#fff1ab">Consult person</td>
            <td width="125" height="40" align="center" bgcolor="#fff1ab">Approve</td>
            <td width="113" align="center" bgcolor="#fff1ab">Accepted</td>
            <td width="86" align="center" bgcolor="#fff1ab">Update</td>
            <td width="98" align="center" bgcolor="#fff1ab">Download</td>
            <td width="94" align="center" bgcolor="#fff1ab">Delete</td>
            <td width="91" align="center" bgcolor="#fff1ab">Mail </td>
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
$select_user = "SELECT * FROM `job_info`  order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$upload_file= $row['project_up']; 
	$approve_status= $row['approve_status'];
	$accept_status= $row['accept_status'];
$completion_date= $row['completion_date'];
$present_date= date("Y-m-d");
	$diff_date = "SELECT DATEDIFF('$completion_date','$present_date') AS DiffDate";
	$c_date = mysql_query($diff_date) or die (mysql_error());
	$row_date= mysql_fetch_array($c_date); 
	$count_day= $row_date['DiffDate']; 
	if($count_day>2){ $colour="#00FF99"; } elseif($count_day<=2 && $count_day>=0){ $colour="#FFCC33"; }else{ $colour="#FF0000"; }
	 
?>
          <tr>
            <td align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['boq_quot_no']?></td>
      <form name="drive" id="drive" method="post" action="mailsent.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $upload_file; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['cost']?>/-</td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['completion_date']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['consult_operating_person']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($approve_status==0){ ?>
              <a href="transfer_approve.php?id=<?php echo $id; ?>"><img src="image/tick.png" alt="" /></a>
              <?php }else { echo "Assigned"; } ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($accept_status==0){ echo "Not Accepted"; }else { echo "Accepted"; } ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>"><a href="job_info.php?id=<?php  echo $row['id']?>&amp;action=edit"><img src="image/update.png" height="25" width="70" /></a></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>"><a href="download_job.php?filename=<?php echo $upload_file; ?>"><img src="image/download.png" height="25" width="70" /></a></td>
 <td align="center" bgcolor="<?php echo $colour; ?>"><a href="job_delete.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>"><a href="mailsent.php?id=<?php echo $id;?>"><img src="image/send_b.png" height="25" width="70" border="0" /></a></td>
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
