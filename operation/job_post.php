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
$vendor_code= mysql_real_escape_string($_REQUEST['vendor_code']);
$job_type= mysql_real_escape_string($_REQUEST['job_type']);
$boq_quot_no= mysql_real_escape_string($_REQUEST['boq_quot_no']);
$order_date= mysql_real_escape_string($_REQUEST['order_date']);
$po_no= mysql_real_escape_string($_REQUEST['po_no']);
$cost= mysql_real_escape_string($_REQUEST['cost']);
$completion_date= mysql_real_escape_string($_REQUEST['completion_date']);
$user= mysql_real_escape_string($_REQUEST['user']);
$project_details=mysql_real_escape_string($_REQUEST['project_details']);

$sql2 = "SELECT * from `vendor_details` Where `vendor_code`='$vendor_code'";
$rs2 = mysql_query($sql2);
$row2 = mysql_fetch_array($rs2);
$vendor_name = $row2['vendor_name'];

$sql5 = "SELECT * from `operation_details` Where `username`='$user'";
$rs5 = mysql_query($sql5);
$row5 = mysql_fetch_array($rs5);
$mkt_name = $row5['per_name'];
$mkt_code = $row5['per_code'];


$rand= rand(1000,9999);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$target1 = "projects/"; 	
	$target1 = $target1 .$rand. basename( $_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $target1);
	$file= $rand.basename($_FILES['file']['name']);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($_REQUEST['id']!='')
{


		if(empty($_FILES['file']['name']))
		{
		$query_2= "update `job_to_vendor`  set  `vendor_name`='$vendor_name', `vendor_code`='$vendor_code', `job_type`='$job_type', `boq_quot_no`='$boq_quot_no', `order_date`='$order_date', `po_no`='$po_no', `cost`= '$cost', `completion_date`= '$completion_date',`post`='Operation', `post_holder`='$mkt_name', `holder_code`='$mkt_code',`project_details`='$project_details'  where id='".$_REQUEST['id']."' ";
		$result_2= mysql_query($query_2) or die (mysql_error());
		
		}
		else
		{
		
		$query_2= "update `job_to_vendor`  set  `vendor_name`='$vendor_name', `vendor_code`='$vendor_code', `job_type`='$job_type', `boq_quot_no`='$boq_quot_no', `order_date`='$order_date', `po_no`='$po_no', `project_up`='$file',`cost`= '$cost', `completion_date`= '$completion_date',`post`='Operation', `post_holder`='$mkt_name', `holder_code`='$mkt_code', `project_details`='$project_details'  where id='".$_REQUEST['id']."' ";
		$result_2= mysql_query($query_2) or die (mysql_error());
		
		
		}
		
		echo "<script> window.location= 'vendor_job_status.php?update'; </script>";

}
else
{


/*$query_2= "INSERT INTO `job_info` (`visited_date`, `cust_name`, `cust_code`, `visited_by`, `job_type`, `next_date`,`boq_quot`, `boq_quot_no`, `order_date`, `po_no`, `consult_operating_person`,`operating_person_code`, `project_up`, `cost`, `completion_date`,`post`, `post_holder`, `holder_code`) 
VALUES ('$visited_date', '$cust_name', '$cust_code', '$visited_by', '$job_type', '$next_date','$boq_quot', '$boq_quot_no', '$order_date', '$po_no', '$oper_name', '$oper_code', '$file', '$cost', '$completion_date', 'Operation', '$mkt_name', '$mkt_code')";
*/


 $query_2= "insert into `job_to_vendor`  set  `vendor_name`='$vendor_name', `vendor_code`='$vendor_code', `job_type`='$job_type', `boq_quot_no`='$boq_quot_no', `order_date`='$order_date', `po_no`='$po_no',`project_up`='$file', `cost`= '$cost', `completion_date`= '$completion_date',`post`='Operation', `post_holder`='$mkt_name', `holder_code`='$mkt_code', `project_details`='$project_details'  ";


$result_2= mysql_query($query_2) or die ($query_2.mysql_error());
echo "<script> window.location= 'vendor_job_status.php?insert'; </script>";

}



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
    if(document.getElementById('project_up').value!=''){

	$("#drive").validate({
	
	
		rules: {

			visited_date: {
				required: true
			},
			vendor_code: {
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
			/*file: {
			    //alert(document.getElementById('project_up').value)
				required: true
			},*/
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
			vendor_code: {
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
			cost: {
				required: "<br />Enter Quotation Value."
			
			},
			completion_date: {
				required: "<br />Enter Completion Date."
			
			},
			
		} //end messages
		
	}); //end validate
	}
	else
	{
	
	$("#drive").validate({
	
	
		rules: {

			visited_date: {
				required: true
			},
			vendor_code: {
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
			vendor_code: {
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
			cost: {
				required: "<br />Enter Quotation Value."
			
			},
			completion_date: {
				required: "<br />Enter Completion Date."
			
			},
			
		} //end messages
		
	}); //end validate
	
	}
	
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

<?php
if(isset($_REQUEST['action'])=='edit')
{
$sqledit=mysql_query("select * from job_info where id='".$_REQUEST['id']."'" );
$resrow=mysql_fetch_array($sqledit);
}
?>
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
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        <form action="" method="post" name="drive" id="drive" enctype="multipart/form-data">
          <table width="650" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="75" align="center"><table width="650" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
              <tr>
                <td height="40" colspan="3" align="center" bgcolor="#fff1ab">JOB</td>
              </tr>
              <tr>
                <td height="40" colspan="3" align="center" class="job_txt"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}
if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>One record deleted successfully.</span>";
}

?></td>
                </tr>
              <tr>
                <td width="255" height="40" align="left" class="job_txt">Vendor Name</td>
                <td width="69" align="center">:</td>
                <td width="320" height="40" align="left" class="error"><select name="vendor_code" id="vendor_code" class="rounded_job" style="height:35px; width:266px;" >
                  <option value=""> Select Customer Name</option>
                  <?php
$sql4 = "SELECT * from `vendor_details` group by vendor_name";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
                  <option value="<?php echo $row4['vendor_code']; ?>"<?php if(isset($resrow['vendor_code'])) if($resrow['vendor_code']==$row4['vendor_code']) echo 'selected' ?>><?php echo $row4['vendor_name']; ?></option>
                  <?php } ?>
                  </select>
                  <input name="action" type="hidden" value="<?php if(isset($_REQUEST['action'])) echo $_REQUEST['action']; ?>" />
                  <input name="id" type="hidden" value="<?php if(isset($_REQUEST['id'])) echo $_REQUEST['id']; ?>" /></td>
              </tr>
              <tr>
                <td height="40" align="left" class="job_txt">Job Type</td>
                <td align="center">:</td>
                <td height="40" align="left" class="error"><select name="job_type" id="job_type" class="rounded"  style="height:35px; width:266px;">
                  <option value=""> Select Job Type</option>
                  <?php
$sql4 = "SELECT * from `job_type` group by job";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
                  <option value="<?php echo $row4['job']; ?>"<?php if(isset($resrow['job_type'])) if($row4['job']==$resrow['job_type']) echo 'selected';?>
                  
                  
                  ><?php echo $row4['job']; ?></option>
                  <?php } ?>
                  </select></td>
              </tr>
              <tr>
                <td height="40" align="left" class="job_txt">Quotation No</td>
                <td align="center">:</td>
                <td height="40" align="left" class="error"><input type="text" name="boq_quot_no" id="boq_quot_no" class="rounded_job" value="<?php if(isset($resrow['boq_quot_no'])) { echo $resrow['boq_quot_no']; } else {  $r = mysql_query("SELECT * FROM job_to_vendor ORDER BY id DESC LIMIT 1") ;
		  $row8= mysql_fetch_array($r);
		  $boq_quot_no=$row8['boq_quot_no'];
		  
		  $sql4 = "SELECT * from `invoice_name` WHERE `id`='2'";
          $rs4 = mysql_query($sql4);
          $row4 = mysql_fetch_array($rs4);
		  $quot_name=$row4['quot_name']; 
		  
		  $array1=explode("-",$boq_quot_no);
		  $invo_name= $array1[0];
		  $no= $array1[1];
		
		  $new_no=$no+1; 
		  if($quot_name==$invo_name)
		  {
		 $cr_no=$invo_name.'-'.$new_no;
          echo $cr_no;
		  }else
		  {
			   $cr_no=$quot_name.'-1';
          echo $cr_no;
		  } } ?>" /></td>
              </tr>
              <tr>
                <td height="40" align="left" class="job_txt">Order Date</td>
                <td align="center">:</td>
                <td height="40" align="left" class="error"><input type="text" name="order_date" id="calendar3" class="rounded_job" value="<?php if(isset($resrow['order_date'])) echo $resrow['order_date']?>" /></td>
              </tr>
              <tr>
                <td height="40" align="left" class="job_txt">PO No</td>
                <td align="center">:</td>
                <td height="40" align="left" class="error"><input type="text" name="po_no" id="po_no" class="rounded_job" value="<?php if(isset($resrow['po_no'])) echo $resrow['po_no']?>" /></td>
              </tr>
              <tr>
                <td height="40" align="left" class="job_txt">Project Details</td>
                <td align="center">:</td>
                <td height="40" align="left" class="error">
                <textarea name="project_details" id="project_details" class="rounded1" style="width:250px;"><?php if(isset($resrow['project_details'])) echo $resrow['project_details'];?></textarea>
                
                </td>
              </tr>
              <tr>
                <td height="40" align="left" class="job_txt">Project Upload</td>
                <td align="center">:</td>
                <td height="40" align="left" class="error"><input type="file" name="file" id="id" value=""/>
                  
                  <input name="project_up" id="project_up" type="hidden" value="<?php if(isset($resrow['project_up'])) echo $resrow['project_up']; ?>" />
                  
                  
                  </td>
              </tr>
              <tr>
                <td height="40" align="left" class="job_txt">Project Cost</td>
                <td align="center">:</td>
                <td height="40" align="left" class="error"><input type="text" name="cost" id="cost" class="rounded_job" value="<?php if(isset($resrow['cost'])) echo $resrow['cost']?>" /></td>
              </tr>
              <tr>
                <td height="40" align="left" class="job_txt">Completion Date</td>
                <td align="center">:</td>
                <td height="40" align="left" class="error"><input type="text" name="completion_date" id="calendar4" class="rounded_job" value="<?php if(isset($resrow['completion_date'])) echo $resrow['completion_date']?>" /></td>
              </tr>
              <tr>
                <td height="40" align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td height="40" align="center"><input type="hidden" name="user" value="<?php echo $user; ?>" /><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
              </tr>
            </table></td>
          </tr>
          </table>
        </form>
          </td>
      </tr>
      <tr>
        <td height="20" align="center">&nbsp;</td>
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
