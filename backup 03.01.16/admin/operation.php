<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<?php
if (isset($_REQUEST['submit']))
{
$per_name= mysql_real_escape_string($_REQUEST['per_name']);
$per_code= mysql_real_escape_string($_REQUEST['per_code']);
$address= mysql_real_escape_string($_REQUEST['address']);
$blood_group= mysql_real_escape_string($_REQUEST['blood_group']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$area= mysql_real_escape_string($_REQUEST['area']);
$salary= mysql_real_escape_string($_REQUEST['salary']);
$username= mysql_real_escape_string($_REQUEST['username']);
$password= mysql_real_escape_string($_REQUEST['password']);
$email= mysql_real_escape_string($_REQUEST['email']);

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
		$target = "operation/"; 
        $target = $target .$rand. basename( $_FILES["file"]["name"]) ; 
      move_uploaded_file($_FILES["file"]["tmp_name"],$target);
	  $item_image= basename($rand.$_FILES['file']['name']);
      
$query_2= "INSERT INTO `operation_details` (`per_name`,`per_code`,`address`,`blood_group`,`contact`,`photo`,`area`,`salary`,`username`,`password`,`email`,`add_prove`,`voter_id`) 
VALUES ('$per_name','$per_code','$address','$blood_group','$contact','$item_image','$area','$salary','$username','$password','$email','$item_image1','$item_image2')";
$result_2= mysql_query($query_2) or die (mysql_error());

      }
    }
else
  {
echo "<script> window.location= 'operation.php?error'; </script>";
  }
  
echo "<script> window.location= 'operation.php?insert'; </script>";

}

?>
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			per_name: {
				required: true
			},
			per_code: {
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
			
			per_name: {
				required: "<br /> Please Enter Name."
			
			},
			per_code: {
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
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data">
    
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Operation Master</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Inserted successfully.<span>";
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
        <td width="137" height="35" align="left" valign="middle" class="master">Person Name</td>
        <td width="21" height="35" align="center" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="per_name" id="" class="rounded" value="" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Code</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="per_code" class="rounded" value="<?php $random= rand(1000, 9999); echo "OPS-".$random; ?>" readonly/></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Address</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Blood Group</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><!--<input type="text" name="blood_group" class="rounded" value=""/>-->
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
        </select>
        </td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Photo</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="file" name="file" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="area" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Salary</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="salary" name="salary" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Email</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="email" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Username</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="username" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Password</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="password" class="rounded" value=""/></td>
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
