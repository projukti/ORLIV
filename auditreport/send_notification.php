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
if (isset($_REQUEST['mode'])&&($_REQUEST['mode']=='up'))
{
$query= "UPDATE `audit_physical_stock` set `extra_stock_quantity`='".$_REQUEST['extra_stock_quantity']."',`notification_date`='".date('Y-m-d')."' WHERE `ph_stock_id`='".$_REQUEST['ph_stock_id']."'";
$result= mysql_query($query) or die (mysql_error());
echo "<script> window.location= 'send_notification.php?insert'; </script>";
}
?>
 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			extra_stock_quantity: {
				required: true,
				digits:true
			},
			
			
		 
		}, //end rules
		messages: {
			extra_stock_quantity: {
				required: "<br /> Please Enter Quantity.",
				digits: "<br /> Please Enter Only Digits."
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

<script>
function getauditor(id)
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
    document.getElementById("getauditor").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_auditor.php?id="+id,true);
xmlhttp.send();
}

</script>
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
        <td height="50" align="center">
        <?php 
		if(isset($_REQUEST['notify']))
		{
		$sel_ph_stock=mysql_fetch_array(mysql_query("select * from audit_physical_stock where ph_stock_id='".$_REQUEST['ph_stock_id']."'"));
		$sel_asset_name=mysql_fetch_array(mysql_query("select * from audit_asset_type where asset_id='".$sel_ph_stock['asset_id']."'"));	
		?>
        <form id="mkt" action="" method="post">
        <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Send Notification</p></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle" class="error"></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Audit Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <input type="text" name="audt_code" class="rounded" value="<?php echo $sel_ph_stock['audt_code'];?>" readonly/></td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Asset Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error">
        <input type="text" name="asset_id" id="asset_id" class="rounded1" style="height:30px;"  value="<?php echo $sel_asset_name['asset_name']?>" readonly></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Physical Stock</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error" id="getauditor">
        <input type="text" name="ph_stock_qunatity" id="ph_stock_qunatity" class="rounded1" style="height:30px;"  value="<?php echo $sel_ph_stock['ph_stock_qunatity'];?>" readonly></td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Extra Stock</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
          <input type="text" name="extra_stock_quantity" id="extra_stock_quantity" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">
        <input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" onclick="return confirm('Are You Notify Superauditor?');"/>
        <input type="hidden" name="mode" value="up" />
        <input type="hidden" name="ph_stock_id" value="<?php echo $_REQUEST['ph_stock_id'];?>" />
        </td>
      </tr>
      </table>
        </form>
        <?php 
		}
		else
		{
		?>
        <?php 
		$sel_info=mysql_fetch_array(mysql_query("select * from audit_physical_stock_info where audt_id='".$_SESSION['user']['audt_id']."'"));
		$sel_barnch=mysql_fetch_array(mysql_query("select * from audit_branch where branch_id='".$sel_info['branch_id']."'"));
		$sel_auditor=mysql_fetch_array(mysql_query("select * from audit_stock_auditor where audt_id='".$sel_info['audt_id']."'"));
		?>
    <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Assigned Physical Stock</p></td>
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
echo "<span class='succ'>Notification Sent successfully.</span>";
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
        <td height="35" align="left" valign="middle" class="master">Audit Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="audt_code" class="rounded" value="<?php echo $sel_info['audt_code'];?>" readonly/></td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Branch Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error">
        <input type="text" name="branch_id" id="branch_id" class="rounded1" style="height:30px;"  value="<?php echo $sel_barnch['branch_name'];?>" readonly></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Auditor Name</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error" id="getauditor">
        <input type="text" name="audt_id" id="audt_id" class="rounded1" style="height:30px;"  value="<?php echo $sel_auditor['audt_name'];?>" readonly></td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Audit Date</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <input type="text" name="audit_date" class="rounded" value="<?php echo $sel_info['audit_date'];?>" readonly/></td>
      </tr>
      <tr>
        <td colspan="3" align="left" valign="middle">
          <table id="maintable" width="700" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              <td width="185" height="40" align="center" bgcolor="#fff1ab" class="drive">Asset Type</td>
              <td width="204" height="40" align="center" bgcolor="#fff1ab" class="drive">Quantity</td>
              <td width="305" align="center" bgcolor="#fff1ab" class="drive">Send Notification For Extra Stock</td>
              </tr>
            <?php 
			  $sel_audt_details=mysql_query("select * from audit_physical_stock where audt_code='".$sel_info['audt_code']."'");
			  while($fetch_audt_details=mysql_fetch_array($sel_audt_details))
			  {
				  $sel_asset_name=mysql_fetch_array(mysql_query("select * from audit_asset_type where asset_id='".$fetch_audt_details['asset_id']."'"));
			  ?>
            <tr>
              <td height="30" align="center" bgcolor="#FEEDE7" valign="middle" class="drive_txt">
                <input type="text" name="asset_id" id="asset_id" style="height:20px; width:160px;" value="<?php echo $sel_asset_name['asset_name']?>" readonly="readonly"/>
                </td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <input type="text" value="<?php echo $fetch_audt_details['ph_stock_qunatity'] ?>" name="ph_stock_qunatity" id="ph_stock_qunatity" readonly="readonly"/></td>
              <td align="center" bgcolor="#FEEDE7" class="drive_txt">
              <?php if($fetch_audt_details['extra_stock_quantity']!=0){echo $fetch_audt_details['extra_stock_quantity'];  if($fetch_audt_details['approved']!='Y'){echo '<img src="image/cros.png" />';}else {echo '<img src="image/tick.png" />';}}else {?>
              <a href="send_notification.php?ph_stock_id=<?php  echo $fetch_audt_details['ph_stock_id'];?>&notify"><img src="image/send_b.png" /></a>
              <?php }?></td>
              </tr>
            <?php }?>
            </table>
          </td>
      </tr>
      </table>
      <?php }?>
 </td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center">&nbsp;</td>
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
