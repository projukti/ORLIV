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
        <td height="50" align="center"><table width="1024" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="147" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="88" height="40" align="center" bgcolor="#fff1ab">Project Cost</td>
            <td width="139" height="40" align="center" bgcolor="#fff1ab">Completion</td>
            <td width="120" height="40" align="center" bgcolor="#fff1ab">Consult person</td>
            <td width="125" height="40" align="center" bgcolor="#fff1ab">Completed</td>
            <td width="86" align="center" bgcolor="#fff1ab">Update</td>
            <td width="98" align="center" bgcolor="#fff1ab">Download</td>
            <td width="94" align="center" bgcolor="#fff1ab">Delete</td>
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
$select_user = "SELECT * FROM `job_to_vendor`  order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$upload_file= $row['project_up']; 
	$approve_status= $row['approve_status'];
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
         
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['cost']?>/-</td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['completion_date']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['post_holder']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($approve_status==0){ ?>
   <a href="transfer_approve.php?id=<?php echo $id; ?>"><img src="image/tick.png" alt="" /></a>
   <?php }else { echo "Complete"; } ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>"><a href="job_post.php?id=<?php  echo $row['id']?>&amp;action=edit"><img src="image/update.png" height="25" width="70" /></a></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>"><a href="download_job.php?filename=<?php echo $upload_file; ?>"><img src="image/download.png" height="25" width="70" /></a></td>
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
