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
	
$tmp_name=$_FILES['audt_photo']['tmp_name'];
$rand= rand(10000000, 99999999);
$target = "auditor/"; 
$target = $target .$rand. basename( $_FILES['audt_photo']['name']) ; 
move_uploaded_file($_FILES['audt_photo']['tmp_name'], $target); 
$audt_photo=$rand. basename( $_FILES['audt_photo']['name']);

	
$query_2= "INSERT INTO `audit_stock_auditor` (`branch_id`,`audt_name`,`audt_address`,`audt_ph`,`audt_email`,`username`,`password`,`audt_photo`) 
VALUES ('".$_REQUEST['branch_id']."','".$_REQUEST['audt_name']."','".$_REQUEST['audt_address']."','".$_REQUEST['audt_ph']."','".$_REQUEST['audt_email']."','".$_REQUEST['username']."','".$_REQUEST['password']."','$audt_photo')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'stockauditor.php?insert'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			branch_id: {
				required: true
			},
			audt_name: {
				required: true
			},
			audt_address: {
				required: true
			},
			audt_ph: {
				required: true
			},
			audt_email: {
				required: true
			},
			audt_photo: {
				required: true
			},
			username: {
				required: true
			},
			password: {
				required: true
			},
			
			
		 
		}, //end rules
		messages: {
			
			branch_id: {
				required: "<br /> Please Select Branch."
			
			},
			audt_name: {
				required: "<br /> Please Enter Auditor Name."
			
			},
			audt_address: {
				required: "<br /> Please Enter Auditor Address."
			
			},
			audt_ph: {
				required: "<br /> Please Enter Auditor Ph."
			
			},
			audt_email: {
				required: "<br /> Please Enter Auditor Email."
			
			},
			audt_photo: {
				required: "<br /> Please Select Auditor Photo."
			},
			username: {
				required: "<br /> Please Enter Username."
			
			},
			password: {
				required: "<br /> Please Enter Password."
			
			},

			
			
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
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Stock Auditor Entry</p></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle" class="error"><?php
if (isset($_REQUEST['success']))
{
echo "Inserted successfully.";
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
if (isset($_REQUEST['error']))
{
echo "<span class='errors'>Out of Stock.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Auditor Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="audt_name" id="" class="rounded" value="" /></td>
      </tr>
       <tr>
        <td height="35" align="left" valign="middle" class="master">Branch</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <select name="branch_id" id="branch_id" class="rounded1" style="height:30px;">
          <option value="">Select Branch</option>
          <?php 
		  $sel_barnch=mysql_query('select * from audit_branch order by branch_name asc');
		  while($fetch_branch=mysql_fetch_array($sel_barnch))
		  {
		  ?>
          <option value="<?php echo $fetch_branch['branch_id'];?>"><?php echo $fetch_branch['branch_name'];?></option>
          <?php }?>
        </select></td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle" class="master">Auditor Address</td>
        <td height="60" align="left" valign="middle">:</td>
        <td height="60" align="left" valign="middle"><textarea name="audt_address" class="rounded1" id="address" ></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Contact </td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="audt_ph" class="rounded" value=""/></td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Email</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="audt_email" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Photo</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="file" name="audt_photo" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Username </td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="username" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Password</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="password" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
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
      <tr>
        <td height="50" align="center"><table width="1000" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div style="overflow-y:scroll; height:300px;">
            <table width="980" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="158" height="40" align="center" bgcolor="#fff1ab" class="drive">Auditor Name</td>
            <td width="102" height="40" align="center" bgcolor="#fff1ab" class="drive">Branch</td>
            <td width="194" height="40" align="center" bgcolor="#fff1ab" class="drive">Auditor Address</td>
            <td width="103" height="40" align="center" bgcolor="#fff1ab" class="drive">Auditor Contact</td>
            <td width="104" align="center" bgcolor="#fff1ab" class="drive">Auditor Email</td>
            <td width="114" height="40" align="center" bgcolor="#fff1ab" class="drive">Auditor Username</td>
            <td width="107" height="40" align="center" bgcolor="#fff1ab" class="drive">Auditor Email</td>
            <td width="87" align="center" bgcolor="#fff1ab" class="drive">Update</td>
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
$select_user = "SELECT * FROM `audit_stock_auditor` order by audt_id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
while ($row= mysql_fetch_array($exe_selectuser))
{ 
$fetch_branch = mysql_fetch_array(mysql_query("SELECT * from `audit_branch` where `branch_id`='".$row['branch_id']."'"));
$id= $row['audt_id']; 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="edit_stockauditor.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['audt_name']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $fetch_branch['branch_name']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['audt_address']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['audt_ph']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['audt_email']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['username']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['password']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="image" src="image/update.png" height="25" width="70" border="0" name="submit2" id="submit2" value="submit" /></td>
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
