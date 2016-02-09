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
$customer_name= mysql_real_escape_string($_REQUEST['customer_name']);
$location= mysql_real_escape_string($_REQUEST['location']);
$address= mysql_real_escape_string($_REQUEST['address']);
$contact_person= mysql_real_escape_string($_REQUEST['contact_person']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$assigned= mysql_real_escape_string($_REQUEST['assigned']);
$cust_code= mysql_real_escape_string($_REQUEST['cust_code']);
$id= mysql_real_escape_string($_REQUEST['id']);
$cat_job_type = implode(',', $_POST['job_type']);

$query_update= "UPDATE `customer_details` SET 
			`customer_name`='$customer_name',
			`cust_code`='$cust_code',
			`address`='$address',
			`job_type`='$cat_job_type',
			`location`='$location',
			`contact_person`='$contact_person',
			`contact`='$contact',
			`assigned`='$assigned'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'edit_cust.php?edit'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script> 
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			customer_name: {
				required: true
			},
			ms: {
				required: true
			},
    		address: {
				required: true
			},
			contact_person: {
				required: true
			},
			contact: {
				required: true
			},
			assigned: {
				required: true
			},
			
			
		 
		}, //end rules
		messages: {
			
			customer_name: {
				required: "<br /> Please Entry Customer name."
			
			},
			ms: {
				required: "<br /> Please Entry Job type."
			
			},
			address: {
				required: "<br /> Please Enter Address."
			
			},
			contact_person: {
				required: "<br /> Please Enter Contact person."
			
			},
			contact: {
				required: "<br /> Please Enter Contact no."
			
			},
			assigned: {
				required: "<br /> Please Enter Name."
			
			},
			
			
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
    <link rel="stylesheet" href="css/multiple-select.css" />

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
        <?php if (isset($_REQUEST['update'])) { ?>
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"><table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Customer Entry</p></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle" class="error">
<?php 
                            $id=$_REQUEST['id'];
                            $query="SELECT * FROM `customer_details` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							$customer_name= $row['customer_name'];
							$cust_code= $row['cust_code'];
							$address= $row['address'];
							$location= $row['location'];
							$contact_person= $row['contact_person'];
							$contact= $row['contact'];
							$assigned= $row['assigned'];
							$job_type= $row['job_type'];
							$id=$row['id'];
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Customer Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="customer_name" id="" class="rounded" value="<?php echo $customer_name; ?>" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Customer Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error"><input type="text" name="cust_code" class="rounded" value="<?php echo $cust_code; ?>" readonly/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Job type</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
         <select name="job_type[]" id="ms" multiple="multiple" class="rounded"  style="height:30px; width:200px;">
               <?php
$sql4 = "SELECT * from `job_type` group by job";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
            <option value="<?php echo $row4['job']; ?>"><?php echo $row4['job']; ?></option>
            <?php } ?>
              </select>
<script src="js/jquery.multiple.select.js"></script>
<script>
    $(function() {
        $('#ms').multipleSelect();
    });
</script>
        </td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Location</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="location" class="rounded" value="<?php echo $location; ?>" ></td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle" class="master">Address</td>
        <td height="60" align="left" valign="middle">:</td>
        <td height="60" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ><?php echo $address; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact Person</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact_person" class="rounded" value="<?php echo $contact_person; ?>"/></td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="rounded" value="<?php echo $contact; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Person Assigned</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><select name="assigned" class="rounded" style="height:30px; width:200px;">
         <option value="<?php echo $assigned; ?>"><?php echo $assigned; ?></option>
               <?php
$sql4 = "SELECT * from `marketing_details` group by mkt_name";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
            <option value="<?php echo $row4['mkt_code']; ?>"><?php echo $row4['mkt_name']; ?></option>
            <?php } ?>
        </select></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form>
         <?php } ?>
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
if (isset($_REQUEST['unblock']))
{
echo "<span class='succ'>Customer Unblocked.</span>";
}
if (isset($_REQUEST['block']))
{
echo "<span class='errors'>Customer Blocked.</span>";
}
?>
        </td>
      </tr>
      <tr>
        <td height="50" align="center"><table width="1024" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div style="overflow-y:scroll; height:300px;">
            <table width="1010" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="148" height="40" align="center" bgcolor="#fff1ab" class="drive"> Name</td>
            <td width="99" height="40" align="center" bgcolor="#fff1ab" class="drive">Code</td>
            <td width="178" height="40" align="center" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="109" height="40" align="center" bgcolor="#fff1ab" class="drive">Contact Person</td>
            <td width="84" height="40" align="center" bgcolor="#fff1ab" class="drive">Contact no</td>
            <td width="113" align="center" bgcolor="#fff1ab" class="drive">Job Type</td>
            <td width="76" height="40" align="center" bgcolor="#fff1ab" class="drive">Assigned</td>
            <td width="82" align="center" bgcolor="#fff1ab" class="drive">Block</td>
            <td width="55" align="center" bgcolor="#fff1ab" class="drive">Update</td>
            <td width="53" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
            </tr>
          <tr>
            <td colspan="10" align="center">&nbsp;</td>
            </tr>
          <?php
		  
$select_user = "SELECT * from `customer_details` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$customer_name= $row['customer_name']; 
	$cust_code=$row['cust_code'];
    $address=$row['address'];
    $contact_person= $row['contact_person'];
	$contact=$row['contact'];
    $assigned=$row['assigned'];
	$job_type= $row['job_type'];
	$status= $row['status'];
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $customer_name; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $cust_code; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $address; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $contact_person; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $contact; ?></td>
 <td align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $job_type; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $assigned; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php if($status == 0) { ?><a href="block.php?block_id=<?php echo $id;?>"><img src="image/block.png" height="20" width="20" /></a><?php } else { ?><a href="block.php?unblock_id=<?php echo $id;?>"><img src="image/unblock.png" height="20" width="20" /></a><?php } ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="image" src="image/update.png" height="20" width="55" border="0" name="update" id="update" value="update" /></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="del_cust.php?id=<?php echo $id;?>"><img src="image/delete.png" height="20" width="55" /></a></td>
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
            <td colspan="2">&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
            </div></td>
          </tr>
        </table></td>
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
