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
$tech_name= mysql_real_escape_string($_REQUEST['tech_name']);
$tech_code= mysql_real_escape_string($_REQUEST['tech_code']);
$address= mysql_real_escape_string($_REQUEST['address']);
$blood_group= mysql_real_escape_string($_REQUEST['blood_group']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$area= mysql_real_escape_string($_REQUEST['area']);

$tmp_name=$_FILES['file1']['tmp_name'];
$rand= rand(1000, 9999);
$target = "../admin/id_prove/"; 
$target = $target .$rand. basename( $_FILES['file1']['name']) ; 
move_uploaded_file($_FILES['file1']['tmp_name'], $target); 
$item_image1= basename($rand.$_FILES['file1']['name']);

$tmp_name1=$_FILES['file2']['tmp_name'];
$rand1= rand(1000, 9999);
$target1 = "../admin/id_prove/"; 
$target1 = $target1 .$rand1. basename( $_FILES['file2']['name']) ; 
move_uploaded_file($_FILES['file2']['tmp_name'], $target1); 
$item_image2= basename($rand1.$_FILES['file2']['name']);

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2097152)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
		
		$tmp_name=$_FILES["file"]["tmp_name"];
        $rand= rand(1000, 9999);
		$target = "../admin/technician/"; 
        $target = $target .$rand. basename( $_FILES["file"]["name"]) ; 
      move_uploaded_file($_FILES["file"]["tmp_name"],$target);
	  $item_image= basename($rand.$_FILES['file']['name']);
      
	  $query_2= "INSERT INTO `technician_details` (`tech_name`,`tech_code`,`address`,`blood_group`,`contact`,`photo`,`area`,`add_prove`,`voter_id`) 
VALUES ('$tech_name','$tech_code','$address','$blood_group','$contact','$item_image','$area','$item_image1','$item_image2')";
$result_2= mysql_query($query_2) or die (mysql_error());
      }
    }
else
  {
echo "<script> window.location= 'technician_master.php?error'; </script>";
  }

echo "<script> window.location= 'technician_master.php?insert'; </script>";

}
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
    

	$("#mkt").validate({
		rules: {
			tech_name: {
				required: true
			},
			tech_code: {
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
			file: {
				required: true
			},
			area: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			tech_name: {
				required: "<br /> Please Enter Name."
			
			},
			tech_code: {
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
			file: {
				required: "<br /> Please Enter Image."
			
			},
			area: {
				required: "<br /> Please Enter Area."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->

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
        <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Technician Master</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Inserted successfully.</span>";
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
echo "<span class='errors'>Invalid Image File.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Technician Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="tech_name" id="tech_name" class="in_box" value="" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="tech_code" class="in_box" value="<?php $random= rand(1000, 9999); echo "TECH-".$random; ?>" readonly="readonly"/></td>
        </tr>
      <tr>
        <td height="65" align="left" valign="middle" class="master">Address</td>
        <td height="65" align="left" valign="middle">:</td>
        <td height="65" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Blood Group</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><!--<input type="text" name="blood_group" class="in_box" value=""/>-->
        <select name="blood_group" id="blood_group" class="rounded2" >
          <option value="">Select Blood Group</option>
          <option value="A">A</option>
		  <option value="A+">A+</option>
		  <option value="B">B</option>
		  <option value="B+">B+</option>
		  <option value="O">O</option>
		  <option value="O+">O+</option>
		  <option value="AB">AB</option>
		  <option value="AB+">AB+</option>
        </select></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="in_box" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Photo</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="file" name="file" id value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="area" class="in_box" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Address Proof</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="file" name="file1" id value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Voter ID Proof</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="file" name="file2" id value=""/></td>
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
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center"><table width="1000" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div style="overflow-y:scroll; height:300px;">
            <table width="1000" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="104" height="40" align="center" bgcolor="#fff1ab" class="drive">Technician Name</td>
            <td width="62" height="40" align="center" bgcolor="#fff1ab" class="drive">Code</td>
            <td width="54" height="40" align="center" bgcolor="#fff1ab" class="drive">Blood Group</td>
            <td width="82" height="40" align="center" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="69" height="40" align="center" bgcolor="#fff1ab" class="drive">Area</td>
            <td width="144" height="40" align="center" bgcolor="#fff1ab" class="drive">Contact No</td>
            <td width="132" align="center" bgcolor="#fff1ab" class="drive">Voter ID Proof</td>
            <td width="138" align="center" bgcolor="#fff1ab" class="drive">Address Proof</td>
            <td width="101" align="center" bgcolor="#fff1ab" class="drive">Update</td>
            <td width="101" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
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
            <td align="center">&nbsp;</td>
            </tr>
          <?php		  
$select_user = "SELECT * FROM `technician_details` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$tech_name= $row['tech_name']; 
	$tech_code=$row['tech_code'];
    $blood_group=$row['blood_group'];
    $address= $row['address'];
	$contact=$row['contact'];
	$area=$row['area'];
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="edit_tech.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $tech_name; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $tech_code; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $blood_group; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $address; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $area; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $contact; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <a href="download.php?download_file=<?php echo $row['add_prove'];?>"><?php echo $row['add_prove']; ?></a>
 </td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <a href="download.php?download_file=<?php echo $row['voter_id'];?>"><?php echo $row['voter_id']; ?></a>
 </td>

 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="image" src="image/update.png" height="25" width="70" border="0" name="submit2" id="submit2" value="submit" /></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="tech_del.php?id=<?php echo $id; ?>"><img src="image/delete.png" height="25" width="70" alt="" /></a></td>
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
