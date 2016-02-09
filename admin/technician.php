<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<?php
if (isset($_REQUEST['submit']))
{
$customer_name= mysql_real_escape_string($_REQUEST['customer_name']);
$job_type= mysql_real_escape_string($_REQUEST['job_type']);
$location= mysql_real_escape_string($_REQUEST['location']);
$address= mysql_real_escape_string($_REQUEST['address']);
$contact_person= mysql_real_escape_string($_REQUEST['contact_person']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$assigned= mysql_real_escape_string($_REQUEST['assigned']);


$query_2= "INSERT INTO `customer_details` (`customer_name`,`job_type`,`location`,`address`,`contact_person`,`contact`,`assigned`) 
VALUES ('$customer_name','$job_type','$location','$address','$contact_person','$contact','$assigned')";
$result_2= mysql_query($query_2) or die (mysql_error());
echo "<script> window.location= 'customer_entry.php?insert'; </script>";

}
?>
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			mkt_name: {
				required: true
			},
			mkt_code: {
				required: true
			},
			address: {
				required: true
			},
			blood_group: {
				required: true
			},
			contact: {
				required: true
			},
			photo: {
				required: true
			},
			area: {
				required: true
			},
			salary: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			mkt_name: {
				required: "<br /> Please Enter Name."
			
			},
			mkt_code: {
				required: "<br /> Please Enter Code."
			
			},
			address: {
				required: "<br /> Please Enter Address."
			
			},
			blood_group: {
				required: "<br /> Please Enter Blood Group."
			
			},
			contact: {
				required: "<br /> Please Enter Contact."
			
			},
			photo: {
				required: "<br /> Please Enter Image."
			
			},
			area: {
				required: "<br /> Please Enter Area."
			
			},
			salary: {
				required: "<br /> Please Enter Salary."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
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
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
    <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data">
    
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Technician Master</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error">&nbsp;</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Person Name</td>
        <td width="21" height="35" align="center" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="mkt_name" id="" class="rounded" value="" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Code</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="mkt_code" class="rounded" value=""/></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Address</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Blood Group</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="blood_group" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Photo</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="file" name="photo" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="area" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Salary</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="salary" name="salary" class="rounded" value=""/></td>
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
