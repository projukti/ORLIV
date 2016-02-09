<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
$user=$_SESSION['user']['username'];

$select_user = "SELECT * FROM `operation_details` Where `username`='$user'";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
$row= mysql_fetch_array($exe_selectuser);
    $per_name= $row['per_name']; 
	$per_code= $row['per_code'];
?>

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

<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#drive").validate({
		rules: {
			material_name: {
				required: true
			},
			qty: {
				required: true
			},
			type: {
				required: true
			},
			boq_quot_no: {
				required: true
			},
			mkt_code: {
				required: true,

			}
			
			
		 
		}, //end rules
		messages: {
			
			material_name: {
				required: "<br />Enter Material Name."
			
			},
			qty: {
				required: "<br />Enter Quantity."
			
			},
			type: {
				required: "<br />Enter Type of Material."
			
			},
			boq_quot_no: {
				required: "<br />Enter Quotation No."
			
			},
			mkt_code: {
				required: "<br />Select Marketing Person."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<!-----------------------------Two drops-------------------->
<script>
function getdestination(id)
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
    document.getElementById("getdestination").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_transport.php?id="+id,true);
xmlhttp.send();
}
</script>
<!-----------------------------Two drops-------------------->
</head>

<body topmargin="0" onload="doOnLoad();">
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
        
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><table width="870" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
              <div style="overflow-y:scroll; height:600px;">
                <table width="858" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
                  <tr class="drive">
                    <td width="162" height="40" align="center" bgcolor="#fff1ab">Name Of Material</td>
                    <td width="93" height="40" align="center" bgcolor="#fff1ab">Quantity</td>
                    <td width="113" height="40" align="center" bgcolor="#fff1ab">Type</td>
                    <td width="96" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
                    <td width="136" height="40" align="center" bgcolor="#fff1ab">Marketing Person</td>
                    <td width="80" align="center" bgcolor="#fff1ab">Accept</td>
                    <td width="81" align="center" bgcolor="#fff1ab">Deliveted</td>
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
$select_user = "SELECT * FROM `material_request` Where `accept`=1 AND `delivered`=1 order by m_id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $m_id= $row['m_id']; 
	$material_name= $row['material_name']; 
	$qty=$row['qty'];
    $type=$row['type'];
    $boq_quot_no= $row['boq_quot_no'];
	$mkt_code=$row['mkt_code'];
	$accept=$row['accept'];
	$delivered=$row['delivered'];
	$present_date=$row['present_date']; 
	
	$accept=$row['accept'];
	$delivered=$row['delivered'];
	
 if($accept==1 && $delivered==1){ $colour="#FFCC99"; }else{ $colour="#8FF376"; }
?>
                  <tr>
                    <form name="drive" id="drive" method="post" action="approve_job.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
                      <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $material_name;?></td>
                      <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $qty;?></td>
                      <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $type;?></td>
                      <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php echo $boq_quot_no;?></td>
                      <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php  $user = "SELECT * FROM `marketing_details` Where `mkt_code`='$mkt_code'";
$exe = mysql_query($user) or die (mysql_error());
$row1= mysql_fetch_array($exe);
echo $row1['mkt_name'];?></td>
                      <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($accept==1){ echo "Accepted."; } ?></td>
                      <td height="30" align="center" bgcolor="<?php echo $colour; ?>" class="drive_txt"><?php if($delivered==1){ echo "Delivered."; }else{ echo "No"; } ?></td>
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
                </div>
              </td>
            </tr>
  </table>
  </td>
      </tr>
      <tr>
        <td height="20" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
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
