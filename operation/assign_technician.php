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
$boq_quot_no= mysql_real_escape_string($_REQUEST['boq_quot_no']);
$completion_date= mysql_real_escape_string($_REQUEST['completion_date']);
$area= mysql_real_escape_string($_REQUEST['area']);
$concat_tech_code = implode(',', $_POST['tech_code']);
      
	  $query_2= "INSERT INTO `technician_assign` (`boq_quot_no`,`completion_date`,`area`,`tech_code`) 
VALUES ('$boq_quot_no','$completion_date','$area','$concat_tech_code')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'assign_technician.php?insert'; </script>";

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
    

	$("#mkt").validate({
		rules: {
			boq_quot_no: {
				required: true
			},
			completion_date: {
				required: true
			},
			area: {
				required: true
			},
			service: {
				required: true
			},
			expense: {
				required: true
			}
		 
		}, //end rules
		messages: {
			
			boq_quot_no: {
				required: "<br />Enter Quotation No."
			
			},
			completion_date: {
				required: "<br /> Please Enter Completion Date."
			
			},
			area: {
				required: "<br /> Please Enter Area."
			
			},
			service: {
				required: "<br /> Please check."
			
			},
			expense: {
				required: "<br /> Please check."
			
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
xmlhttp.open("POST","ajax_date.php?id="+id,true);
xmlhttp.send();
}
</script>
<!-----------------------------Two drops-------------------->

</head>

<body>
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    
    <table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="5" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Assign Technician</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" colspan="3" align="left" valign="middle" class="error"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}
if (isset($_REQUEST['insert']))
{	
echo "<span class='succ'>Assigned successfully.</span>";
echo "<script type='text/javascript' language='Javascript'>window.open('http://localhost/orliv/operation/sheet/convene_sheet_maintenance.pdf');</script>";
echo "<script type='text/javascript' language='Javascript'>window.open('http://localhost/orliv/operation/sheet/ORLIVSERVICE_CALLREPORT_PROJECT_2.pdf');</script>";
echo "<script type='text/javascript' language='Javascript'>window.open('http://localhost/orliv/operation/sheet/ORLIVSERVICE_CALLREPORT_PROJECT.pdf');</script>";
echo "<script type='text/javascript' language='Javascript'>window.open('http://localhost/orliv/operation/sheet/convene_sheet_project.pdf');</script>";
echo "<script type='text/javascript' language='Javascript'>window.open('http://localhost/orliv/operation/sheet/expense_sheet_project_material.pdf');</script>";
echo "<script type='text/javascript' language='Javascript'>window.open('http://localhost/orliv/operation/sheet/expense_sheet_project_misc.pdf');</script>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>One record deleted successfully.</span>";
}
if (isset($_REQUEST['error']))
{
echo "<span class='errors'>Invalid Image File.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="219" height="35" align="left" valign="middle" class="master">Quotation No</td>
        <td width="31" height="35" align="left" valign="middle">:</td>
        <td width="215" height="35" align="left" valign="middle" class="error">
        <select name="boq_quot_no" id="boq_quot_no" class="rounded" style="width:215px; height:28px;" onchange="getdestination(this.value)">
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
        <td width="63" align="left" valign="middle" class="master">Date</td>
        <td width="272" align="left" valign="middle" class="error" id="getdestination">&nbsp;</td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" colspan="3" align="left" valign="middle"><select name="area" id="area" class="in_box"  style="height:25px; width:215px;">
                  <option value=""> Select Location</option>
                  <?php
$sql4 = "SELECT * from `location_name` group by location";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
                  <option value="<?php echo $row4['location']; ?>"<?php if(isset($resrow['location'])) if($row4['location']==$resrow['location']) echo 'selected';?>
                  
                  
                  ><?php echo $row4['location']; ?></option>
                  <?php } ?>
                </select></td>
        </tr>
      <tr>
        <td align="left" valign="middle" class="master">Technicians</td>
        <td align="left" valign="middle">:</td>
        <td colspan="3" align="left" valign="middle" bgcolor="#E4E4E4" style="background-color:#E4E4E4; padding:5px; font-family:Verdana, Geneva, sans-serif; border:1px solid #999999; border-radius:15px;">
        <?php 
		$result = mysql_query("SELECT * FROM technician_details group by tech_name") or die(mysql_error()); 
		while($tier = mysql_fetch_array( $result )) 
             { $tech_code=$tier['tech_code']; $tech_name=$tier['tech_name']; 
			 ?>
        <table width="260" border="0" cellspacing="0" cellpadding="0" align="left">
          <tr>
            <td width="31" align="center" ><input type="checkbox" name="tech_code[]" value="<?php echo $tech_code; ?>"></td>
            <td width="119" align="left" style="padding-left:20px;"><?php echo $tech_name; ?></td>
          </tr>
        </table>
        <?php }  ?>
        </td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Expense Sheet</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" colspan="3" align="left" valign="middle"><input type="checkbox" name="expense" id="expense" ></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Service Call Report</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" colspan="3" align="left" valign="middle"><input type="checkbox" name="service" id="service" /></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle" class="master">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" colspan="3" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" colspan="3" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form></td>
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
