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
$tech_name= mysql_real_escape_string($_REQUEST['tech_name']);
$tech_code= mysql_real_escape_string($_REQUEST['tech_code']);
$address= mysql_real_escape_string($_REQUEST['address']);
$blood_group= mysql_real_escape_string($_REQUEST['blood_group']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$area= mysql_real_escape_string($_REQUEST['area']);
$id= mysql_real_escape_string($_REQUEST['id']);

$query_update= "UPDATE `technician_details` SET 
			`tech_name`='$tech_name',
			`tech_code`='$tech_code',
			`address`='$address',
			`blood_group`='$blood_group',
			`contact`='$contact',
			`area`='$area'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'technician_master.php?update'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			tech_name: {
				required: true
			},
			tech_code: {
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
			file: {
				required: true
			},
			area: {
				required: true
			}
		 
		}, //end rules
		messages: {
			
			tech_name: {
				required: "<br /> Please Enter Name."
			
			},
			tech_code: {
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
			file: {
				required: "<br /> Please Enter Image."
			
			},
			area: {
				required: "<br /> Please Enter Area."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<!--//////////////popup///////////////////-->
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=500,width=700');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>
<!--/////////////////////////////////-->
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">EDIT MARKETING DETAILS</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error">
<?php 
                            $id=$_REQUEST['id'];
                            $query="SELECT * FROM `technician_details` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							$photo= $row['photo'];
							$tech_name= $row['tech_name'];
							$tech_code= $row['tech_code'];
							$address= $row['address'];
							$blood_group= $row['blood_group'];
							$contact= $row['contact'];
							$area= $row['area'];

?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Employee Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="tech_name" id="tech_name" class="rounded" value="<?php echo $tech_name; ?>" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="tech_code" class="rounded" value="<?php echo $tech_code; ?>" readonly/></td>
        </tr>
      <tr>
        <td height="65" align="left" valign="middle" class="master">Address</td>
        <td height="65" align="left" valign="middle">:</td>
        <td height="65" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ><?php echo $address; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Blood Group</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="blood_group" class="rounded" value="<?php echo $blood_group; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="rounded" value="<?php echo $contact; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Photo</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><a href="all_img.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "technician_details";?>" onClick="return popitup('all_img.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "technician_details";?>')">
		<?php echo "<img src='../admin/technician/$photo' border='0'  width='50' height='50'/>"; ?>
        </a></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="area" class="rounded" value="<?php echo $area; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Address Proof</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <a href="file_upload.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "technician_details";?>" onClick="return popitup('file_upload.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "technician_details";?>')" style="text-decoration:none; color:#09C; font-weight:700;">Upload New</a> &nbsp;&nbsp;<span style="color:#09C; font-weight:700;">|</span>&nbsp;&nbsp;
        <a href="download.php?download_file=<?php echo $row['add_prove'];?>" style="text-decoration:none; color:#09C; font-weight:700;"><?php echo $row['add_prove']; ?></a></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Voter ID Proof</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <a href="file_upload_2.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "technician_details";?>" onClick="return popitup('file_upload_2.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "technician_details";?>')" style="text-decoration:none; color:#09C; font-weight:700;">Upload New</a> &nbsp;&nbsp;<span style="color:#09C; font-weight:700;">|</span>&nbsp;&nbsp;
        <a href="download.php?download_file=<?php echo $row['voter_id'];?>" style="text-decoration:none; color:#09C; font-weight:700;"><?php echo $row['voter_id']; ?></a>
        </td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="hidden" name="id" value="<?php echo $id ?>" /><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form>

       </td>
      </tr>
      <tr>
        <td height="50" align="center">
          <?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}
if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}

if (isset($_REQUEST['edit']))
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
