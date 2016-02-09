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
$superauditor_name= mysql_real_escape_string($_REQUEST['superauditor_name']);
$superauditor_code= mysql_real_escape_string($_REQUEST['superauditor_code']);
$address= mysql_real_escape_string($_REQUEST['address']);
$blood_group= mysql_real_escape_string($_REQUEST['blood_group']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$area= mysql_real_escape_string($_REQUEST['area']);
$salary= mysql_real_escape_string($_REQUEST['salary']);
$username= mysql_real_escape_string($_REQUEST['username']);
$password= mysql_real_escape_string($_REQUEST['password']);
$email= mysql_real_escape_string($_REQUEST['email']);
$id= mysql_real_escape_string($_REQUEST['id']);
if($_FILES["file"]["tmp_name"]!=''){		
$tmp_name=$_FILES['file']['tmp_name'];
$rand= rand(10000000, 99999999);
$target = "superauditor/"; 
$target = $target .$rand. basename( $_FILES['file']['name']) ; 
move_uploaded_file($_FILES['file']['tmp_name'], $target); 
$photo=$rand. basename( $_FILES['file']['name']);
}else{
$photo= $_REQUEST['photo'];
}

 $query_update= "UPDATE `superauditor_details` SET 
			`superauditor_name`='$superauditor_name',
			`superauditor_code`='$superauditor_code',
			`address`='$address',
			`blood_group`='$blood_group',
			`contact`='$contact',
			`area`='$area',
			`salary`='$salary',
			`username`='$username',
			`password`='$password',
			`photo`='$photo',
			`email`='$email'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'superauditor.php?edit'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			superauditor_name: {
				required: true
			},
			superauditor_code: {
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
			area: {
				required: true
			},
			salary: {
				required: true
			},
			username: {
				required: true
			},
			password: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
			
		 
		}, //end rules
		messages: {
			
			superauditor_name: {
				required: "<br /> Please Enter Name."
			
			},
			superauditor_code: {
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
			area: {
				required: "<br /> Please Enter Area."
			
			},
			salary: {
				required: "<br /> Please Enter Salary."
			
			},
			username: {
				required: "<br />Enter Username."
			
			},
			password: {
				required: "<br />Enter Password."
			
			},
			email: {
				required: "<br />Enter Email.",
			    email: "Enter Valid Email."
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
        <?php if (isset($_REQUEST['update'])) { ?>
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">EDIT SUPER AUDITOR DETAILS</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error">
<?php 
                            $id=$_REQUEST['id'];
                            $query="SELECT * FROM `superauditor_details` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							$photo= $row['photo'];
							$superauditor_name= $row['superauditor_name'];
							$superauditor_code= $row['superauditor_code'];
							$address= $row['address'];
							$blood_group= $row['blood_group'];
							$contact= $row['contact'];
							$area= $row['area'];
							$salary= $row['salary'];
							$username= $row['username'];
							$password= $row['password'];
							$email= $row['email'];
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Employee Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="superauditor_name" id="superauditor_name" class="rounded" value="<?php echo $superauditor_name; ?>" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="superauditor_code" class="rounded" value="<?php echo $superauditor_code; ?>" readonly/></td>
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
        <td height="35" align="left" valign="middle">
		<?php echo "<img src='superauditor/$photo' border='0'  width='50' height='50'/>"; ?>
        <input type="file" name="file" />
        <input type="hidden" name="photo" value="<?php echo $photo; ?>"/>
        </td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="area" class="rounded" value="<?php echo $area; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Salary</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="salary" class="rounded" value="<?php echo $salary; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Email</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="email" class="rounded" value="<?php echo $email; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Username</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="username" class="rounded" value="<?php echo $username; ?>" readonly/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Password</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="password" class="rounded" value="<?php echo $password; ?>" /></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Address Proof</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <a href="file_upload.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "superauditor_details";?>" onClick="return popitup('file_upload.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "superauditor_details";?>')" style="text-decoration:none; color:#09C; font-weight:700;">Upload New</a> &nbsp;&nbsp;<span style="color:#09C; font-weight:700;">|</span>&nbsp;&nbsp;
        <a href="download.php?download_file=<?php echo $row['add_prove'];?>" style="text-decoration:none; color:#09C; font-weight:700;"><?php echo $row['add_prove']; ?></a></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Voter ID Proof</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <a href="file_upload_2.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "superauditor_details";?>" onClick="return popitup('file_upload_2.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "superauditor_details";?>')" style="text-decoration:none; color:#09C; font-weight:700;">Upload New</a> &nbsp;&nbsp;<span style="color:#09C; font-weight:700;">|</span>&nbsp;&nbsp;
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
?>
        </td>
      </tr>
      <tr>
        <td height="50" align="center"><span style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">SUPER AUDITOR DETAILS</span></td>
      </tr>
      <tr>
        <td height="50" align="center">
        <table width="1000" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div style="overflow-y:scroll; height:300px;">
            <table width="1000" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="86" height="40" align="center" bgcolor="#fff1ab" class="drive"> Name</td>
            <td width="68" height="40" align="center" bgcolor="#fff1ab" class="drive">Code</td>
            <td width="97" height="40" align="center" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="107" height="40" align="center" bgcolor="#fff1ab" class="drive">Contact No</td>
            <td width="182" align="center" bgcolor="#fff1ab" class="drive">Voter ID Proof</td>
            <td width="176" align="center" bgcolor="#fff1ab" class="drive">Address Proof</td>
            <td width="98" height="40" align="center" bgcolor="#fff1ab" class="drive">Last Login IP</td>
            <td width="94" height="40" align="center" bgcolor="#fff1ab" class="drive">Last Login Date</td>
            <td width="80" align="center" bgcolor="#fff1ab" class="drive">Update</td>
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
            <td align="center">&nbsp;</td>
            </tr>
          <?php
		  
$select_user = "SELECT * from `superauditor_details` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$superauditor_name= $row['superauditor_name']; 
	$superauditor_code=$row['superauditor_code'];
    $address=$row['address'];
    $contact= $row['contact'];
	$user_ip=$row['user_ip'];
	$last_login_date=$row['last_login_date'];
	
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $superauditor_name; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $superauditor_code; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $address; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $contact; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <a href="download.php?download_file=<?php echo $row['add_prove'];?>"><?php echo $row['add_prove']; ?></a>
 </td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <a href="download.php?download_file=<?php echo $row['voter_id'];?>"><?php echo $row['voter_id']; ?></a>
 </td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $user_ip; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $last_login_date; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="image" src="image/update.png" height="25" width="70" border="0" name="update" id="update" value="update" /></td>
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
