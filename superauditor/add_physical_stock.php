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
$query= "INSERT INTO `audit_physical_stock_info` (`audt_code`,`audt_id`,`branch_id`,`entry_date`,`audit_date`) 
VALUES ('".$_REQUEST['audt_code']."','".$_REQUEST['audt_id']."','".$_REQUEST['branch_id']."','".date('Y-m-d')."','".$_REQUEST['audit_date']."')";
$result= mysql_query($query) or die (mysql_error());

for($i=0,$j=0;$i<count($_REQUEST['asset_id']),$j<count($_REQUEST['ph_stock_qunatity']);$i++,$j++)
{
	$query1= "INSERT INTO `audit_physical_stock` (`audt_code`,`asset_id`,`ph_stock_qunatity`) 
VALUES ('".$_REQUEST['audt_code']."','".$_REQUEST['asset_id'][$i]."','".$_REQUEST['ph_stock_qunatity'][$j]."')";
    $result1= mysql_query($query1) or die (mysql_error());
	$ph_stock_id=mysql_insert_id();
	
	$sel_asset=mysql_fetch_array(mysql_query("select asset_prefix from audit_asset_type where asset_id='".$_REQUEST['asset_id'][$i]."'"));
	$sel_branch=mysql_fetch_array(mysql_query("select branch_code from audit_branch where branch_id='".$_REQUEST['branch_id']."'"));
	$asset_prefix=$sel_asset['asset_prefix'];
	$branch_code=$sel_branch['branch_code'];
	
	for($x=0,$y=0;$x<($_REQUEST['asset_id'][$i]),$y<($_REQUEST['ph_stock_qunatity'][$j]);$x++,$y++)
      {
		$barcode=$asset_prefix.$_REQUEST['asset_id'][$i].$branch_code.$_REQUEST['audt_code'].$x;
		$barcode_des=$asset_prefix."-".$_REQUEST['asset_id'][$i]."-".$branch_code."-".$_REQUEST['audt_code']."-".$x;
		
      	$query2= "INSERT INTO `audit_physical_stock_details` (`audt_code`,`ph_stock_id`,`asset_id`,`asset_barcode`,`barcode_details`) 
VALUES ('".$_REQUEST['audt_code']."','".$ph_stock_id."','".$_REQUEST['asset_id'][$i]."','".$barcode."','".$barcode_des."')";
    $result2= mysql_query($query2) or die (mysql_error());
      }
	
}

echo "<script> window.location= 'add_physical_stock.php?insert'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			audt_code: {
				required: true
			},
			audt_id: {
				required: true
			},
			branch_id: {
				required: true
			},
			audit_date: {
				required: true
			},
			
			
		 
		}, //end rules
		messages: {
			audt_code: {
				required: "<br /> Please Enter Audit Code."
			},
			audt_id: {
				required: "<br /> Please Select Auditor name."
			
			},
			branch_id: {
				required: "<br /> Please Select Branch Name."
			
			},
			audit_date: {
				required: "<br /> Please Enter Audit Date."
			
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
        <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    
    <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Add Physical Stock</p></td>
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
        <td height="35" align="left" valign="middle" class="master">Audit Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="audt_code" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Branch Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error">
        <select name="branch_id" id="branch_id" class="rounded1" style="height:30px;" onChange="getauditor(this.value);">
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
        <td height="35" align="left" valign="middle" class="master">Auditor Name</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error" id="getauditor">
        <select name="audt_id" id="audt_id" class="rounded1" style="height:30px;">
          <option value="">Select Auditor</option>
        </select></td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Audit Date</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="audit_date" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td colspan="3" align="left" valign="middle">
          <table id="maintable" width="700" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              <td width="158" height="40" align="center" bgcolor="#fff1ab" class="drive">Asset Type</td>
              <td width="194" height="40" align="center" bgcolor="#fff1ab" class="drive">Quantity</td>
              </tr>
            <tr>
              <td height="30" align="center" bgcolor="#FEEDE7" valign="middle" class="drive_txt">
                <select name="asset_id[]" id="asset_id" style="height:20px; width:160px;">
                  <option value="">Select Asset</option>
                  <?php 
		  $sel_asset=mysql_query('select * from audit_asset_type order by asset_name asc');
		  while($fetch_asset=mysql_fetch_array($sel_asset))
		  {
		  ?>
                  <option value="<?php echo $fetch_asset['asset_id'];?>"><?php echo $fetch_asset['asset_name'];?></option>
                  <?php }?>
                  </select></td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
              <input type="text" value="<?php echo $i ?>" name="ph_stock_qunatity[]" id="ph_stock_qunatity"/></td>
              </tr>
            </table>
          <div id="add_new" class="master">ADD NEW</div>
          <div id="remove" class="master" onClick="myDeleteFunction()">REMOVE</div>
          </td>
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
<script>
$("#add_new").click(function () { 
var i=1;
    $("#maintable").each(function () {
       i++;
        var tds = '<tr>';
        jQuery.each($('tr:last td', this), function () {
            tds += '<td height="30" align="center" valign="middle" bgcolor="#FEEDE7" class="drive_txt">' + $(this).html() + '</td>';
        });
        tds += '</tr>';
        if ($('tbody', this).length > 0) {
            $('tbody', this).append(tds);
        } else {
            $(this).append(tds);
        }
    });
});
$("#remove").click(function () { 
var rows = document.getElementById("maintable").getElementsByTagName("tr").length;
if(rows>2)
{
    document.getElementById("maintable").deleteRow(1);
}
});
</script>
</body>
</html>
