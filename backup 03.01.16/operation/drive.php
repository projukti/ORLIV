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
	    $user=$_SESSION['user']['username'];
	$sql4 = "SELECT * from `operation_details` Where `username`='$user'";
    $rs4 = mysql_query($sql4);
    $row4 = mysql_fetch_array($rs4);
    $per_code=$row4['per_code'];
	
$rand= rand(1000,9999);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$target1 = "../admin/drive/"; 	
	$target1 = $target1 .$rand. basename( $_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $target1);
	$file= $rand.basename($_FILES['file']['name']);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$query_2= "INSERT INTO `drive` (`upload_file`, `post`, `holder`, `holder_id`) VALUES ('$file', 'Operation', '$user', '$per_code')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'drive.php?insert'; </script>";

}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORLIV</title>
<link href="login.css" rel="stylesheet" type="text/css" />
<link href="css/template.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
#page-wrap {
  width: 910px; 
  height: 350px;
}
    .tabs {
      position: relative;   
      min-height: 200px; /* This part sucks */
      clear: both;
      margin: 25px 0;      
    }
    .tab {
      float: left;      
    }
    .tab label {
      background: #eee; 
      padding: 10px; 
      border: 1px solid #ccc; 
      margin-left: -1px; 
      position: relative;
      left: 1px;             
    }
    .tab [type=radio] {
      display: none;   
    }
    .content {
      position: absolute;
      top: 28px;
      left: 0;
      background: white;
      right: 0;
      bottom: 0;
	  height:350px;
      border: 1px solid #ccc;       
    }
    [type=radio]:checked ~ label {
      background: white;
      border-bottom: 1px solid white;
      z-index: 2;
    }
    [type=radio]:checked ~ label ~ .content {
      z-index: 1;
    }
</style>
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#drive").validate({
		rules: {

			file: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			file: {
				required: "<br /> Please Enter Image."
			
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
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        <form action="" method="post" name="drive" id="drive" enctype="multipart/form-data"> 
        <table width="600" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="265" height="40" align="center" bgcolor="#fff1ab" class="drive">Upload File</td>
            <td width="112" align="center" bgcolor="#fff1ab" class="drive">Save</td>
          </tr>
          <tr>
            <td height="60" align="center"><input type="file" name="file" id value=""/></td>
            <td height="60" align="center"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
          </tr>
          </table>
          </form>
          </td>
      </tr>
      <tr>
        <td height="20" align="center"><?php
if (isset($_REQUEST['success']))
{
echo "Inserted successfully.";
}
if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>File Inserted Successfully.</span>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data Updated Successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>File Deleted Successfully.</span>";
}

?></td>
      </tr>
      <tr>
        <td height="50" align="center">
        <div id="page-wrap">
    <div class="tabs">
        <div class="tab">
            <input type="radio" id="tab-1" name="tab-group-1" checked>
            <label for="tab-1" style="font-family:Tahoma, Geneva, sans-serif; font-size:14px;">My Drive</label>
            <div class="content">
                <p>
                <table width="880" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">
            <div style="overflow-y:scroll; height:320px;">
                <table width="850" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
                <tr>
            <td width="560" height="40" align="center" bgcolor="#fff1ab" class="drive">File</td>
            <td width="156" align="center" bgcolor="#fff1ab" class="drive">Download</td>
            <td width="128" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
            </tr>
          
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
		  
		    $user=$_SESSION['user']['username'];
	$sql4 = "SELECT * from `operation_details` Where `username`='$user'";
    $rs4 = mysql_query($sql4);
    $row4 = mysql_fetch_array($rs4);
    $per_code=$row4['per_code'];
	
$select_user = "SELECT * FROM `drive` Where `post`='Operation' and `holder`='$user' and `holder_id`='$per_code' order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$upload_file= $row['upload_file']; 
	 
?>
          <tr>
<form name="drive" id="drive" method="post" action="drive_update.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $upload_file; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><a href="download_drive.php?filename=<?php echo $upload_file; ?>"><img src="image/download.png" height="25" width="70" /></a></td>
 <td align="center" bgcolor="#FEEDE7"><a href="file_delete.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
      </form>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td >&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
        </div>
        </td>
        </tr>
        </table>
                </p>
            </div> 
        </div>
        <div class="tab">
            <input type="radio" id="tab-2" name="tab-group-1">
            <label for="tab-2"style="font-family:Tahoma, Geneva, sans-serif; font-size:14px;">Shared With Me</label>
            <div class="content">
                <p> <table width="880" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">
            <div style="overflow-y:scroll; height:320px;">
                <table width="850" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="596" height="40" align="center" bgcolor="#fff1ab" class="drive">File</td>
            <td width="249" align="center" bgcolor="#fff1ab" class="drive">Download</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
$select_user = "SELECT * FROM `drive` Where `operation`='1' order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$upload_file= $row['upload_file']; 
	 
?>
          <tr>
           <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $upload_file; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><a href="download_drive.php?filename=<?php echo $upload_file; ?>"><img src="image/download.png" height="25" width="70" /></a></td>
 </form>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
        </div>
        </td>
        </tr>
        </table></p>
            </div> 
        </div>
    </div>
</div>
        </td>
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
