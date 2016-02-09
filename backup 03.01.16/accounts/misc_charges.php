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
$remarks= mysql_real_escape_string($_REQUEST['remarks']);
$amount= mysql_real_escape_string($_REQUEST['amount']);
$boq_quot_no= mysql_real_escape_string($_REQUEST['boq_quot_no']);
$on_date= mysql_real_escape_string($_REQUEST['on_date']);
      
$query_2= "INSERT INTO `miscellaneous` (`boq_quot_no`,`on_date`,`amount`,`remarks`) 
VALUES ('$boq_quot_no','$on_date','$amount','$remarks')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'misc_charges.php?success'; </script>";

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
			remarks: {
				required: true
			},
			amount: {
				required: true
			},
			boq_quot_no: {
				required: true
			},
			on_date: {
				required: true,

			}
			
			
		 
		}, //end rules
		messages: {
			
			remarks: {
				required: "<br />Enter Remarks."
			
			},
			amount: {
				required: "<br />Enter Amount."
			
			},
			boq_quot_no: {
				required: "<br />Enter Quotation No."
			
			},
			on_date: {
				required: "<br />Select Date."
			
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
        <td height="350" align="center">
    <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
        <table width="500" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td height="39" colspan="4" align="center" bgcolor="#fff1ab">Miscellaneous Charges</td>
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
                 <td width="223" height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Date</td>
                 <td width="45" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td width="225" height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt"><input type="text" name="on_date" id="calendar" class="in_box" /></td>
               </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Quotation No</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt"> 
                 <select name="boq_quot_no" id="boq_quot_no" class="rounded" style="width:215px; height:28px;">
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
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt"><input type="text" name="amount" id="amount" class="in_box" /></td>
                </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Remarks</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt"><textarea name="remarks" id="remarks" class="in_box" style="height:60px;"></textarea></td>
               </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                 <td height="40" colspan="2" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="image" src="image/submit.jpg" name="submit" id="submit" value="submit" /> </td>
                </tr>
             
          </table></form></td>
      </tr>
      <tr>
        <td height="320" align="center"><table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <div style="overflow-y:scroll; height:300px;">
    <table width="635" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="91" align="center" bgcolor="#fff1ab">Date</td>
            <td width="138" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="117" height="40" align="center" bgcolor="#fff1ab">Amount</td>
            <td width="167" align="center" bgcolor="#fff1ab">Remarks</td>
            <td width="121" align="center" bgcolor="#fff1ab">Delete</td>
            </tr>
          <tr>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
            </tr>
          <?php
$select_user = "SELECT * FROM `miscellaneous` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
    $boq_quot_no= $row['boq_quot_no'];
	$amount=$row['amount'];
	$remarks=$row['remarks'];
	$on_date=$row['on_date']; 
	
?>
          <tr>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $on_date;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $boq_quot_no;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $amount;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $remarks;?></td>
 <td height="30" align="center" bgcolor="#99FFCC"><img src="image/delete.png" /></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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
