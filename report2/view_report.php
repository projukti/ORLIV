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

<?php
$sql = "select id,state_name from audit_states where id=28";
$result = mysql_query($sql);

$total_result = mysql_num_rows($result);
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
		$sel_info=mysql_fetch_array(mysql_query("select * from audit_physical_stock_info where audt_id='".$_SESSION['user']['audt_id']."'"));
		$sel_barnch=mysql_fetch_array(mysql_query("select * from audit_branch where branch_id='".$sel_info['branch_id']."'"));
		$sel_auditor=mysql_fetch_array(mysql_query("select * from audit_stock_auditor where audt_id='".$sel_info['audt_id']."'"));
		?>
        <form action="report.php" method="post" name="form1" target="_blank">
    <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Search &amp; Download Report</p></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle" class="error">
<?php
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
        <td height="35" align="left" valign="middle" class="master">Select State</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <!--<input type="text" name="audt_code" class="rounded" value="<?php echo $sel_info['audt_code'];?>" readonly/>-->
        <select name="state_name" id="state_name">
        	<option value="">Select State</option>
            <?php				
				if($total_result > 0)
				{
					while($result_arr = mysql_fetch_array($result, MYSQL_ASSOC)) {
					?>
						<option value="<?php echo $result_arr['id']; ?>"><?php echo $result_arr['state_name']; ?></option>
			<?php	}
				}
			?>
        </select>
        </td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Select Branch</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error">
       <!--<input type="text" name="branch_id" id="branch_id" class="rounded1" style="height:30px;"  value="<?php echo $sel_barnch['branch_name'];?>" readonly>-->
       <select name="branch_name1" id="branch_name1">
       		<option value="">Select Branch</option>
       </select>
       <span id="branch_name"></span>
       </td>
        </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">
        <!--<a href="send_notification.php?ph_stock_id=<?php  echo $fetch_audt_details['ph_stock_id'];?>&amp;notify"><img src="image/send_b.png" alt="" /></a>-->
        <input type="submit" id="download" value="Download" />
        </td>
      </tr>
      </table>
      	</form>
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


<script type="application/javascript" src="js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		
		$("#branch_name").hide();
		$("#state_name").change(function(){
		
			stateID = $(this).val();
			
			if(stateID == "")
			{
			$("#branch_name").hide();	
			}
			$.ajax({
				type: "POST",
				url: "branch_generate.php",
				async: false,
				data: {state:stateID},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
						$("#branch_name1").hide();
						$("#branch_name").show();
                        $('#branch_name').html(data);
				}
			})
		});
		
		
		

		});
</script>
</body>
</html>
