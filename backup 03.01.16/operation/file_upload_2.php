<?php 

    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
     

?>
<?php

$tablename= mysql_real_escape_string($_REQUEST['tablename']);	


if (isset($_REQUEST['submit']))
{

$id=$_REQUEST['id'];
$tablename= mysql_real_escape_string($_REQUEST['tablename']);	

$arr2=explode("_",$tablename);
$destination= $arr2[0]; 
$det= $arr2[1];


//$tmp_name=$_FILES['item_image']['tmp_name'];
//$rand= rand(1000, 9999);
//$target = "../admin/id_prove/"; 
//$target = $target .$rand. basename( $_FILES['item_image']['name']) ; 
//move_uploaded_file($_FILES['item_image']['tmp_name'], $target); 
//$item_image= basename($rand.$_FILES['item_image']['name']);


$tmp_name=$_FILES['file1']['tmp_name'];
$rand= rand(1000, 9999);
$target = "../admin/id_prove/"; 
$target = $target .$rand. basename( $_FILES['file1']['name']) ; 
move_uploaded_file($_FILES['file1']['tmp_name'], $target); 
$item_image1= basename($rand.$_FILES['file1']['name']);

/////////////////////////////////////////////////////
	  	  	
			$query_update= "UPDATE `$tablename` SET 
            `voter_id`='$item_image'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<link rel='stylesheet' type='text/css' href='styles.css' />
<link rel='stylesheet' type='text/css' href='css/admin.css' />
<script type='text/javascript' src='menu_jquery.js'></script>

<!--//////////////image priview///////////////////-->
<script type="text/javascript">
//function readURL(input) {
//if (input.files && input.files[0]) {
//var reader = new FileReader();
//reader.onload = function (e) {
//$('#test').attr('src', e.target.result);
//}
//reader.readAsDataURL(input.files[0]);
//}
//}
</script>
<!--/////////////////////////////////-->
</head>

<body>

<form name="payslip" id="payslip" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
<?php
							$id=$_REQUEST['id'];
							$tablename=$_REQUEST['tablename'];
							
                            $query="SELECT * FROM `$tablename` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							
							?>
<table align="center" width="700" border="0" cellspacing="0" class="table_bill">
  <tr>
    <td width="156" class="err"><?php if(isset($_REQUEST['success'])) { echo "Thanks! updated successfully."; } ?>
      <?php if(isset($_REQUEST['error'])) { echo "Sorry!"; } ?></td>
    <td width="16" class="err">&nbsp;</td>
    <td colspan="5" class="err">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" colspan="7"  align="center" class="edit">File Upload</td>
  </tr>
  <tr>
    <td height="35" colspan="7" align="center" class="form_txtr">select file: 
      <input type="file" name="file1" value=""/>      <input type="hidden" name="tablename" value="<?php echo $tablename; ?>" />      <span class="form_txtr"></span></td>
    </tr>
  <tr>
    <td height="5">&nbsp;</td>
    <td height="5">&nbsp;</td>
    <td height="5" colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="right"><input type="image" src="image/submit.jpg" border="0" value="submit" name="submit" id="submit" /></td>
    <td width="20" align="center">&nbsp;</td>
    <td width="328" align="left"><input type="image" src="image/cancel.png" border="0" name="cancel" id="cancel" onclick="self.close()" /></td>
  </tr>
</table>
</form>
</body>
</html>