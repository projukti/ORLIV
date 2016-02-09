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
if($_FILES["audt_photo"]["tmp_name"]!=''){		
$tmp_name=$_FILES['audt_photo']['tmp_name'];
$rand= rand(10000000, 99999999);
$target = "auditor/"; 
$target = $target .$rand. basename( $_FILES['audt_photo']['name']) ; 
move_uploaded_file($_FILES['audt_photo']['tmp_name'], $target); 
$audt_photo=$rand. basename( $_FILES['audt_photo']['name']);
}else{
$audt_photo= $_REQUEST['photo'];
}	
$query_update= "UPDATE `audit_stock_auditor` SET 
			`audt_name`='".$_REQUEST['audt_name']."',
			`branch_id`='".$_REQUEST['branch_id']."',
			`audt_address`='".$_REQUEST['audt_address']."',
			`audt_ph`='".$_REQUEST['audt_ph']."',
			`audt_email`='".$_REQUEST['audt_email']."',
			`username`='".$_REQUEST['username']."',
			`password`='".$_REQUEST['password']."',
			`audt_photo`='".$audt_photo."'
	    	 WHERE `audt_id`='".$_REQUEST['id']."'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'edit_stockauditor.php?edit&id=".$_REQUEST['id']."'; </script>";

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
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"><table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Stock Auditor Edit</p></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle" class="error">
<?php 
                            $id=$_REQUEST['id'];
                            $query="SELECT * FROM `audit_stock_auditor` where `audt_id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							$id=$row['audt_id'];
							$photo= $row['audt_photo'];
?>
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
?></td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Auditor Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="audt_name" id="" class="rounded" value="<?php echo $row['audt_name']; ?>" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Branch</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><select name="branch_id" id="branch_id" class="rounded1" style="height:30px;">
          <?php 
		  $sel_barnch=mysql_query('select * from audit_branch order by branch_name asc');
		  while($fetch_branch=mysql_fetch_array($sel_barnch))
		  {
		  ?>
          <option value="<?php echo $fetch_branch['branch_id'];?>" <?php if($fetch_branch['branch_id']==$row['branch_id']){echo 'Selected';}?>><?php echo $fetch_branch['branch_name'];?></option>
          <?php }?>
        </select></td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle" class="master">Auditor Address</td>
        <td height="60" align="left" valign="middle">:</td>
        <td height="60" align="left" valign="middle"><textarea name="audt_address" class="rounded1" id="branch_ph" ><?php echo $row['audt_address']; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Contact </td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="audt_ph" class="rounded" value="<?php echo $row['audt_ph']; ?>" ></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Email</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="audt_email" class="rounded" value="<?php echo $row['audt_email']; ?>"/></td>
      </tr>
            <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Photo</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
		<?php echo "<img src='auditor/$photo' border='0'  width='50' height='50'/>"; ?>
        <input type="file" name="audt_photo" />
        <input type="hidden" name="photo" value="<?php echo $photo; ?>"/>
        </td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Username </td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="username" class="rounded" value="<?php echo $row['username']; ?>" /></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Password</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="password" class="rounded" value="<?php echo $row['password']; ?>"/></td>
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
       </td>
      </tr>
      <tr>
        <td height="50" align="center">
          
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
