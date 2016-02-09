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
$random=rand(1000,9999);	
$branch_name= strtoupper($_REQUEST['branch_name']);
$branch_code= ($_REQUEST['branch_code']);
$branch_address= ($_REQUEST['branch_address']);
$branch_ph= ($_REQUEST['branch_ph']);
$branch_email= ($_REQUEST['branch_email']);
$state_id= ($_REQUEST['state_id']);

$query_2= "INSERT INTO `audit_branch` (`branch_name`,`branch_code`,`branch_address`,`branch_ph`,`branch_email`,`state_id`) 
VALUES ('$branch_name','$branch_code','$branch_address','$branch_ph','$branch_email','$state_id')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'branch.php?insert'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			branch_name: {
				required: true
			},
			branch_code: {
				required: true
			},
			branch_address: {
				required: true
			},
			state_id: {
				required: true
			},
			
		 
		}, //end rules
		messages: {
			
			branch_name: {
				required: "<br /> Please Enter Branch Name."
			
			},
			branch_code: {
				required:  "<br /> Please Enter Branch Code."
			},
			branch_address: {
				required: "<br /> Please Enter Branch Address."
			
			},
			state_id: {
				required: "<br /> Please Select State."
			
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
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Branch Entry</p></td>
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
        <td width="137" height="35" align="left" valign="middle" class="master">Branch Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="branch_name" id="" class="rounded" value="" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Branch Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error"><input type="text" name="branch_code" id="branch_code" class="rounded" value="" /></td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle" class="master">Branch Address</td>
        <td height="60" align="left" valign="middle">:</td>
        <td height="60" align="left" valign="middle"><textarea name="branch_address" class="rounded1" id="address" ></textarea></td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle" class="master">Branch State</td>
        <td height="60" align="left" valign="middle">:</td>
        <td height="60" align="left" valign="middle"><span class="error">
          <select name="state_id" id="state_id" class="rounded1" style="height:30px;" onChange="getauditor(this.value);">
            <option value="">Select State</option>
            <?php 
		  $sel_state=mysql_query('select * from audit_states order by state_name asc');
		  while($fetch_state=mysql_fetch_array($sel_state))
		  {
		  ?>
            <option value="<?php echo $fetch_state['id'];?>"><?php echo $fetch_state['state_name'];?></option>
            <?php }?>
          </select>
        </span></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Branch Contact </td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="branch_ph" class="rounded" value=""/></td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Branch Email</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="branch_email" class="rounded" value=""/></td>
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
            <td><div style="overflow-y:scroll; height:900px;">
            <table width="980" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="194" height="40" align="center" bgcolor="#fff1ab" class="drive">Branch Name</td>
            <td width="194" align="center" bgcolor="#fff1ab" class="drive">Branch Code</td>
            <td width="249" height="40" align="center" bgcolor="#fff1ab" class="drive">Branch Address</td>
            <td width="134" height="40" align="center" bgcolor="#fff1ab" class="drive">Branch Contact</td>
            <td width="162" height="40" align="center" bgcolor="#fff1ab" class="drive">Branch Email</td>
            <td width="162" align="center" bgcolor="#fff1ab" class="drive">State</td>
            <td width="101" align="center" bgcolor="#fff1ab" class="drive">Update</td>
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
		  
$select_user = "SELECT * FROM `audit_branch` order by branch_id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['branch_id']; 
	$select_state = mysql_fetch_array(mysql_query("SELECT * FROM `audit_states` where id='".$row['state_id']."'"));
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="edit_branch.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['branch_name']; ?></td>
 <td align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['branch_code']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['branch_address']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['branch_ph']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['branch_email']; ?></td>
 <td align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $select_state['state_name']; ?></td>
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
