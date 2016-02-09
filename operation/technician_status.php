<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
    $user=$_SESSION['user']['username'];
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
    

	$("#date").validate({
		rules: {
			from_date: {
				required: true
			},
			to_date: {
				required: true
			},
			area: {
				required: true
			}
		 
		}, //end rules
		messages: {
			
			from_date: {
				required: "<br />Select Date."
			
			},
			to_date: {
				required: "<br />Select Date."
			
			},
			area: {
				required: "<br />Select Area."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#tech").validate({
		rules: {
			tech_code: {
				required: true
			}
		 
		}, //end rules
		messages: {
			
			tech_code: {
				required: "<br />Select Technician."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>

<!----------------------validation----------------------------->
<!-----------------------------datepicker-------------------->
<link rel="stylesheet" type="text/css" href="codebase/dhtmlxcalendar.css">
<link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxcalendar_dhx_skyblue.css">
<script src="codebase/dhtmlxcalendar.js"></script>
<style>
#calendar,
#calendar2,
{
	border: 1px solid #909090;
	font-size: 12px;
}
</style>
<script>
var myCalendar;
function doOnLoad() {
myCalendar = new dhtmlXCalendarObject(["calendar","calendar2"]);
}
</script>
<!-----------------------------datepicker-------------------->

</head>

<body onload="doOnLoad();">
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
        <td colspan="2"><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="511" align="center"><form action="" method="post" name="date" id="date" enctype="multipart/form-data"> 
    
    <table width="400" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Search By Completion Date</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td width="246" height="18" align="left" valign="middle" class="error">
		<?php
if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}
if (isset($_REQUEST['delete']))
{
echo "<span class='succ'>Deleted successfully.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="134" height="35" align="left" valign="middle" class="master">From Date</td>
        <td width="20" height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error"><input type="text" name="from_date" id="calendar" class="in_box"  /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">To Date</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="to_date" id="calendar2" class="in_box"  /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><select name="area" id="area" class="in_box"  style="height:25px; width:215px;">
                  <option value=""> Select Location</option>
                  <?php
$sql4 = "SELECT * from `location_name` group by location";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
                  <option value="<?php echo $row4['location']; ?>"<?php if(isset($resrow['location'])) if($row4['location']==$resrow['location']) echo 'selected';?>
                  
                  
                  ><?php echo $row4['location']; ?></option>
                  <?php } ?>
                </select></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form></td>
        <td width="511" align="center"><form action="" method="post" name="tech" id="tech" enctype="multipart/form-data"> 
    
    <table width="400" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Search By Technician</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td width="235" height="18" align="left" valign="middle" class="error">
		<?php
if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="154" height="35" align="left" valign="middle" class="master">Technician Name</td>
        <td width="11" height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error">
         <select name="tech_code" id="tech_code" class="rounded" style="width:215px; height:28px;">
                <option value="">Select Technician</option>
                 <?php $sql = "SELECT * from `technician_details`";
                       $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                <option value="<?php echo $row['tech_code']; ?>"><?php echo $row['tech_name']." | ".$row['tech_code']; ?></option>
                <?php } ?> 
                </select></td>
        </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit1" id="submit1" value="submit1" /></td>
        </tr>
      </table>
</form></td>
      </tr>
      <tr>
        <td height="25" colspan="2" align="center"> 
		<?php if(isset($_REQUEST['submit'])) { $from_date= $_REQUEST['from_date']; $to_date= $_REQUEST['to_date']; $area= $_REQUEST['area']; ?>
        <table width="900" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr class="drive">
            <td width="111" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
            <td width="125" align="center" bgcolor="#fff1ab">Completion date</td>
            <td width="133" align="center" bgcolor="#fff1ab">Area</td>
            <td width="176" align="center" bgcolor="#fff1ab">Technician Code</td>
            <td width="194" align="center" bgcolor="#fff1ab">Technician Name</td>
            <td width="78" height="40" align="center" bgcolor="#fff1ab">Status</td>
            <td width="73" align="center" bgcolor="#fff1ab">Delete</td>
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
		  
$select_user = "SELECT * FROM `technician_assign` Where completion_date between '$from_date'and '$to_date' and `area`='$area' order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
	$id=$row['id'];
	$status=$row['status'];
	$code=explode(",",$row['tech_code']);
	$code1=$row['tech_code'];
	
	 
	
	 
	
   
?>
          <tr> 
 <td height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $row['boq_quot_no']; ?></td>
 <td align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $row['completion_date']; ?></td>
 <td align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $row['area']; ?></td>
 <td align="center" bgcolor="#CCFFFF" class="drive_txt"><?php for ($i = 0; $i < count($code); $i++){ echo $code[$i]."<br>";} ?></td>
 <td align="center" bgcolor="#CCFFFF" class="drive_txt">
 <?php for ($i = 0; $i < count($code); $i++){
		 $tech_n=mysql_fetch_array(mysql_query("select * from technician_details where tech_code='$code[$i]'"));
		 $tech_name=$tech_n['tech_name'];
		 echo $tech_name."<br>";
	 }?>
	 </td>
 <td height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php if($status==0){ ?><a href="approve_req.php?id=<?php echo $id; ?>"><img src="image/tick.png" alt="" /></a><?php }else { echo "Complete"; } ?></td>
 <td align="center" bgcolor="#CCFFFF" class="drive_txt"><a href="assign_del.php?id=<?php echo $id; ?>"><img src="image/cros.png" alt="" /></a></td>
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
        <?php } ?></td>
      </tr>
      <tr>
        <td height="25" colspan="2" align="center"> 
		<?php if(isset($_REQUEST['submit1'])) { $tech_code= $_REQUEST['tech_code']; ?>
		<table width="900" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
		  <tr class="drive">
		    <td width="109" height="40" align="center" bgcolor="#fff1ab">Quotation No</td>
		    <td width="126" align="center" bgcolor="#fff1ab">Completion date</td>
		    <td width="133" align="center" bgcolor="#fff1ab">Area</td>
		    <td width="178" align="center" bgcolor="#fff1ab">Technician Code</td>
		    <td width="197" align="center" bgcolor="#fff1ab">Technician Name</td>
		    <td width="77" height="40" align="center" bgcolor="#fff1ab">Status</td>
		    <td width="70" align="center" bgcolor="#fff1ab">Delete</td>
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
		  
$select_user = "SELECT * FROM technician_assign WHERE tech_code LIKE '%" . $tech_code . "%'";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
	$id=$row['id'];
	$status=$row['status'];
   
?>
		  <tr>
		    <td height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $row['boq_quot_no']; ?></td>
		    <td align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $row['completion_date']; ?></td>
		    <td align="center" bgcolor="#CCFFFF" class="drive_txt"><?php echo $row['area']; ?></td>
		    <td align="center" bgcolor="#CCFFFF" class="drive_txt"><?php for ($i = 0; $i < count($code); $i++){ echo $code[$i]."<br>";} ?></td>
		    <td align="center" bgcolor="#CCFFFF" class="drive_txt">
            <?php for ($i = 0; $i < count($code); $i++){
		 		$tech_n=mysql_fetch_array(mysql_query("select * from technician_details where tech_code='$code[$i]'"));
		 		$tech_name=$tech_n['tech_name'];
		 		echo $tech_name."<br>";
		 		}?>
            </td>
		    <td height="30" align="center" bgcolor="#CCFFFF" class="drive_txt"><?php if($status==0){ ?>
		      <a href="approve_req.php?id=<?php echo $id; ?>"><img src="image/tick.png" alt="" /></a>
		      <?php }else { echo "Complete"; } ?></td>
		    <td align="center" bgcolor="#CCFFFF" class="drive_txt"><a href="assign_del.php?id=<?php echo $id; ?>"><img src="image/cros.png" alt="" /></a></td>
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
		  </table>		<?php } ?></td>
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
