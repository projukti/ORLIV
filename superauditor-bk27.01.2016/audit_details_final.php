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
		$sel_info=mysql_fetch_array(mysql_query("select * from audit_physical_stock_info where audt_code='".$_REQUEST['audt_code']."'"));
		$sel_barnch=mysql_fetch_array(mysql_query("select * from audit_branch where branch_id='".$sel_info['branch_id']."'"));
		$sel_auditor=mysql_fetch_array(mysql_query("select * from audit_stock_auditor where audt_id='".$sel_info['audt_id']."'"));
		?>
    <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Final Stock</p></td>
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
        <td width="137" height="35" align="left" valign="middle" class="master">Branch Code</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error">
        <input type="text" name="branch_id" id="branch_id" class="rounded1" style="height:30px;"  value="<?php echo $sel_barnch['branch_code'];?>" readonly></td>
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
              <td width="204" height="40" align="center" bgcolor="#fff1ab" class="drive">Physical Stock</td>
              <td width="305" align="center" bgcolor="#fff1ab" class="drive"> Final Stock</td>
              </tr>
            <?php 
			  $sel_audt_details=mysql_query("select * from audit_physical_stock where audt_code='".$sel_info['audt_code']."'");
			  while($fetch_audt_details=mysql_fetch_array($sel_audt_details))
			  {
				 // $sel_asset_name=mysql_fetch_array(mysql_query("select * from audit_asset_type where asset_id='".$fetch_audt_details['asset_id']."'"));
				 $sel_asset_name=mysql_fetch_array(mysql_query("select * from audit_physical_stock where ph_stock_id='".$fetch_audt_details['ph_stock_id']."'"));
			  ?>
            <tr>
              <td height="30" align="center" bgcolor="#FEEDE7" valign="middle" class="drive_txt">
                <input type="text" name="asset_id" id="asset_id" style="height:20px; width:160px;" value="<?php echo $sel_asset_name['asset_type']?>" readonly/>
                </td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <input type="text" value="<?php if($fetch_audt_details['old_ph_stock_qunatity']==0){echo $fetch_audt_details['ph_stock_qunatity'];}else{echo $fetch_audt_details['old_ph_stock_qunatity'];} ?>" name="ph_stock_qunatity" id="ph_stock_qunatity" readonly/></td>
              <td align="center" bgcolor="#FEEDE7" class="drive_txt">
              <input type="text" value="<?php echo $fetch_audt_details['ph_stock_qunatity'] ?>" name="ph_stock_qunatity2" id="ph_stock_qunatity2" readonly/></td>
              </tr>
            <?php }?>
            </table>
          </td>
      </tr>
      </table>
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
