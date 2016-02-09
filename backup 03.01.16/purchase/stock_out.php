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
$material_name= mysql_real_escape_string($_REQUEST['material_name']);
$qty= mysql_real_escape_string($_REQUEST['qty']);
$type= mysql_real_escape_string($_REQUEST['type']);
$boq_quot_no= mysql_real_escape_string($_REQUEST['boq_quot_no']);
$mkt_code= mysql_real_escape_string($_REQUEST['mkt_code']);
$on_date= mysql_real_escape_string($_REQUEST['on_date']);
$oper_code= mysql_real_escape_string($_REQUEST['oper_code']);

$arr1=explode("**",$type);

$realtype= $arr1[0]; 
$material_name= $arr1[1];

$q= "SELECT * FROM `material_stock` where `material_name`='$material_name' and `type`='$realtype'";
          $r= mysql_query($q) or die (mysql_error());
          $row= mysql_fetch_array($r);
		  $old_qty=$row['qty'];
		  
	if($old_qty >= $qty)
	{	
	$new_qty= $old_qty - $qty;
	
  $query_pro= "UPDATE `material_stock` SET 
				   `qty`='$new_qty'
                    WHERE `material_name`='$material_name' and `type`='$realtype'";
                    $query_exe_pro= mysql_query($query_pro) or die(mysql_error());		  

      
$query_2= "INSERT INTO `stock_out` (`material_name`,`qty`,`type`,`boq_quot_no`,`mkt_code`,`on_date`,`oper_code`) 
VALUES ('$material_name','$qty','$realtype','$boq_quot_no','$mkt_code','$on_date','$oper_code')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'stock_out.php?success'; </script>";
	}
	else{ echo "<script> window.location= 'stock_out.php?error'; </script>"; }
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
			material_name: {
				required: true
			},
			qty: {
				required: true
			},
			type: {
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
			
			material_name: {
				required: "<br />Enter Material Name."
			
			},
			qty: {
				required: "<br />Enter Quantity."
			
			},
			type: {
				required: "<br />Enter Type of Material."
			
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
<!-----------------------------Two drops-------------------->
<script>
function getdestination(id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("getdestination").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_transport.php?id="+id,true);
xmlhttp.send();
}
</script>
<script>
function getoperation(id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("getoperation").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_operation.php?id="+id,true);
xmlhttp.send();
}
</script>
<script>
function gettype(id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("gettype").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_material_type.php?id="+id,true);
xmlhttp.send();
}
</script>
<script>
function getavailavel(id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("getavailavel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","instant_qty.php?id="+id,true);
xmlhttp.send();
}
</script>
<!-----------------------------Two drops-------------------->
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
            <td height="39" colspan="4" align="center" bgcolor="#fff1ab">STOCK OUT</td>
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
                 <td width="223" height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Name Of Material </td>
                 <td width="45" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt">
                  <select name="material_name" id="material_name" class="rounded" style="width:215px; height:28px;" onchange="gettype(this.value)">
                <option value="">Select Material</option>
                 <?php
                 $sql = "SELECT DISTINCT material_name from `material_details`";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                <option value="<?php echo $row['material_name']; ?>"><?php echo $row['material_name']; ?></option>
                <?php } ?> 
                </select>
                </td>
                </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Type</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt" id="gettype"></td>
               </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Quantity</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td width="69" height="40" align="left" bgcolor="#FFFFFF" class="drive_txt"><input type="text" name="qty" id="qty" class="in_box" value="" style="width:60px;" /></td>
                 <td width="156" align="center" bgcolor="#FFFFFF" class="succ" id="getavailavel"></td>
               </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Date</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt"><input type="text" name="on_date" id="calendar" class="in_box" /></td>
               </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Quotation No</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt"> 
                 <select name="boq_quot_no" id="boq_quot_no" class="rounded" style="width:215px; height:28px;" onchange="getdestination(this.value);getoperation(this.value);">
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
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Marketing Person</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt" id="getdestination"></td>
                </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">Operating Person</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                 <td height="40" colspan="2" align="left" bgcolor="#FFFFFF" class="drive_txt" id="getoperation"></td>
               </tr>
               <tr>
                 <td height="40" align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                 <td align="center" bgcolor="#FFFFFF" class="drive_txt">&nbsp;</td>
                 <td height="40" colspan="2" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="image" src="image/submit.jpg" name="submit" id="submit" value="submit" /> </td>
                </tr>
             
          </table></form></td>
      </tr>
      <tr>
        <td height="320" align="center"><table width="870" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <div style="overflow-y:scroll; height:300px;">
    <table width="858" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="145" height="40" align="center" bgcolor="#fff1ab">Name Of Material</td>
            <td width="67" height="40" align="center" bgcolor="#fff1ab">Quantity</td>
            <td width="101" align="center" bgcolor="#fff1ab">Date</td>
            <td width="106" height="40" align="center" bgcolor="#fff1ab">Type</td>
            <td width="122" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="105" height="40" align="center" bgcolor="#fff1ab">Marketing Person</td>
            <td width="101" align="center" bgcolor="#fff1ab">Operation Person</td>
            <td width="100" align="center" bgcolor="#fff1ab">Delete</td>
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
$select_user = "SELECT * FROM `stock_out` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$material_name= $row['material_name']; 
	$qty=$row['qty'];
    $type=$row['type'];
    $boq_quot_no= $row['boq_quot_no'];
	$mkt_code=$row['mkt_code'];
	$oper_code=$row['oper_code'];
	$on_date=$row['on_date']; 
	
?>
          <tr>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $material_name;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $qty;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $on_date;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $type;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php echo $boq_quot_no;?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php $user = "SELECT * FROM `marketing_details` Where `mkt_code`='$mkt_code'";
$exe = mysql_query($user) or die (mysql_error());
$row1= mysql_fetch_array($exe);
echo $row1['mkt_name'];?></td>
 <td height="30" align="center" bgcolor="#99FFCC" class="drive_txt"><?php $ur = "SELECT * FROM `operation_details` Where `per_code`='$oper_code'";
$ex = mysql_query($ur) or die (mysql_error());
$row2= mysql_fetch_array($ex);
echo $row2['per_name'];?></td>
 <td height="30" align="center" bgcolor="#99FFCC"><img src="image/delete.png" /></td>
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
