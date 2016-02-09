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
if (isset($_REQUEST['action'])&&($_REQUEST['action']=='accept'))
{
$fetch_physical_stock=mysql_fetch_array(mysql_query("select * from audit_physical_stock where ph_stock_id='".$_REQUEST['ph_stock_id']."'"));
$fetch_max_barcode=mysql_fetch_array(mysql_query("select barcode_details from audit_physical_stock_details where ph_stock_id='".$_REQUEST['ph_stock_id']."' order by id desc"));
$fetch_physical_stock_info=mysql_fetch_array(mysql_query("select * from audit_physical_stock_info where audt_code='".$fetch_physical_stock['audt_code']."'"));
$ph_stock_qunatity=$fetch_physical_stock['ph_stock_qunatity']+$fetch_physical_stock['extra_stock_quantity'];
$old_ph_stock_qunatity=$fetch_physical_stock['ph_stock_qunatity'];

$query= "UPDATE `audit_physical_stock` set `ph_stock_qunatity`='".$ph_stock_qunatity."',`old_ph_stock_qunatity`='".$old_ph_stock_qunatity."',`approved`='Y' WHERE `ph_stock_id`='".$_REQUEST['ph_stock_id']."'";
$result= mysql_query($query) or die (mysql_error());

	$ph_stock_id=$_REQUEST['ph_stock_id'];
	
	$sel_asset=mysql_fetch_array(mysql_query("select asset_prefix from audit_asset_type where asset_id='".$fetch_physical_stock['asset_id']."'"));
	$sel_branch=mysql_fetch_array(mysql_query("select branch_code from audit_branch where branch_id='".$fetch_physical_stock_info['branch_id']."'"));
	$asset_prefix=$sel_asset['asset_prefix'];
	$branch_code=$sel_branch['branch_code'];
	
	$ex_barcode=explode("-",$fetch_max_barcode['barcode_details']);
	$pre=$ex_barcode['3']+1;
    $max=$ex_barcode['3']+$fetch_physical_stock['extra_stock_quantity'];
	for($x=$pre;$x<=$max;$x++)
      {
		$barcode=$ex_barcode[0].$ex_barcode[1].$ex_barcode[2].$x;
		$barcode_des=$ex_barcode[0]."-".$ex_barcode[1]."-".$ex_barcode[2]."-".$x;
		
      	$query2= "INSERT INTO `audit_physical_stock_details` (`audt_code`,`ph_stock_id`,`asset_barcode`,`barcode_details`,`is_audit`) 
VALUES ('".$fetch_physical_stock['audt_code']."','".$ph_stock_id."','".$barcode."','".$barcode_des."','Y')";
    $result2= mysql_query($query2) or die (mysql_error());
      }

echo "<script> window.location= 'notfication.php?insert'; </script>";
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
        <td height="50" align="center"><table width="100%" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="95" align="center" bgcolor="#fff1ab">Audit No</td>
            <td width="177" height="40" align="center" bgcolor="#fff1ab">Branch's Name</td>
            <td width="146" height="40" align="center" bgcolor="#fff1ab">Auditor's Name</td>
            <td width="120" height="40" align="center" bgcolor="#fff1ab">Asset's Name</td>
            <td width="88" height="40" align="center" bgcolor="#fff1ab">Extra Stock</td>
            <td width="322" align="center" bgcolor="#fff1ab">Accept &amp; Create Barcode/View Barcode</td>
            <td width="64" align="center" bgcolor="#fff1ab">Details</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
$select_user = "SELECT * FROM `audit_physical_stock` where extra_stock_quantity!='0'  order by notification_date DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
while ($row= mysql_fetch_array($exe_selectuser))
{ 
$fetch_audit_details=mysql_fetch_array(mysql_query("select * from audit_physical_stock_info where audt_code='".$row['audt_code']."'"));
$fetch_asset_name=mysql_fetch_array(mysql_query("select * from audit_asset_type where asset_id='".$row['asset_id']."'"));
$fetch_auditor_name=mysql_fetch_array(mysql_query("select * from audit_stock_auditor where audt_id='".$fetch_audit_details['audt_id']."'"));
$fetch_branch_name=mysql_fetch_array(mysql_query("select * from audit_branch where branch_id='".$fetch_audit_details['branch_id']."'"));
	if($row['approved']=='Y'){ $colour='#00FF99'; }else{ $colour='#FF6666'; }
	 
?>
          <tr>
            <td align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['audt_code']?></td> 
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $fetch_branch_name['branch_name']; ?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $fetch_auditor_name['audt_name']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['asset_type']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $row['extra_stock_quantity']?></td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt">
   <?php if($row['approved']!='Y'){?>  
    <a href="notfication.php?ph_stock_id=<?php  echo $row['ph_stock_id']?>&amp;action=accept" onclick="return confirm('Are you sure to accept this notification?')">Accept & Create Barcode</a>
   <?php }else {?>
   <a href="barcode_list_new.php?audt_code=<?php  echo $row['audt_code']?>" target="_blank">View Barcode</a>
   <?php }?>
   </td>
 <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt">
 <?php if($row['approved']!='Y'){?> 
 <a href="audit_details.php?audt_code=<?php echo $row['audt_code']; ?>" target="_blank">Details</a>
 <?php }else {?>
 <a href="audit_details_final.php?audt_code=<?php  echo $row['audt_code']?>" target="_blank">Details</a>
 <?php }?>
 </td>
          </tr>
          <tr>
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
