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
ini_set ( 'max_execution_time', 12000000); 
if (isset($_REQUEST['mode'])&&$_REQUEST['mode']=='add')
{

                    $image = md5(time()).str_replace(' ', '-', $_FILES['upload']['name']);

					$file= mysql_real_escape_string($_REQUEST['upload']);	

					$image_path="excel/";

					$image_path=$image_path.$image;

					@move_uploaded_file($_FILES['upload']['tmp_name'], $image_path);

					$typeOfUploadedImage = end(explode("/",$_FILES['upload']['type']));

					

//set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

include 'Classes/PHPExcel/IOFactory.php';  

 $response = "upload/FriendsList1.xls"; // Upload the file to the current folder


	try {

		$objPHPExcel = PHPExcel_IOFactory::load($image_path);

	} catch(Exception $e) {

		die('Error : Unable to load the file : "'.pathinfo($image_path,PATHINFO_BASENAME).'": '.$e->getMessage());

	}

function clean($string) {

   $string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.

   return preg_replace('/^[\w\d\s.,-]*$/', ' ', $string); // Removes special chars.

}

function clean_string($string) {

$s = trim($string);

$s = iconv("UTF-8", "UTF-8//IGNORE", $s); // drop all non utf-8 characters



// this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think

$s = preg_replace('/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', ' ', $s);



$s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space



return $s;

}

$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

$arrayCount = count($allDataInSheet); 

$audt_code=$_REQUEST['audt_code'];
$branch_code = $_REQUEST['branch_code']; 
$classification= $_REQUEST['classification'];

$query= "UPDATE `audit_physical_stock_info` set `is_audit`='Y',`is_report`='Y' where audt_code='$audt_code'";
$result= mysql_query($query) or die (mysql_error());

for($i=1;$i<=$arrayCount;$i++){
	
$asset_type= strtoupper(trim($allDataInSheet[$i]["B"]));
$book_stock_qunatity= trim($allDataInSheet[$i]["C"]);
$avail_stock_qunatity= trim($allDataInSheet[$i]["D"]);
$damage_stock_qunatity= trim($allDataInSheet[$i]["E"]);

if(($asset_type!='')&&($book_stock_qunatity!=''))	
{	
	////////////////if asset not  found(new asset)////////////
	if($book_stock_qunatity==0){
	$query1= "INSERT INTO `audit_physical_stock` (`audt_code`,`asset_type`,`classification`,`ph_stock_qunatity`) 
VALUES ('".$audt_code."','".$asset_type."','".$classification."','".$avail_stock_qunatity."')";
    $result1= mysql_query($query1) or die (mysql_error());
	$ph_stock_id=mysql_insert_id();
    
	$sel_prefix=mysql_fetch_array(mysql_query("select asset_prefix from audit_asset_type where `asset_name` LIKE '$asset_type'"));
	if($classification=='Owned'){$cls_type='O';}else{$cls_type='R';}
	
	for($x=0,$y=0;$x<($asset_type),$y<($avail_stock_qunatity);$x++,$y++)
      {
		$loc_code=substr($branch_code,3);
		$asset_prefix=trim($sel_prefix['asset_prefix']);
		$barcode=$asset_prefix.$cls_type.$loc_code.$x;
		$barcode_des=$asset_prefix."-".$cls_type."-".$loc_code."-".$x;
		
      	$query2= "INSERT INTO `audit_physical_stock_details` (`audt_code`,`ph_stock_id`,`asset_barcode`,`barcode_details`,`is_audit`) 
VALUES ('".$audt_code."','".$ph_stock_id."','".$barcode."','".$barcode_des."','Y')";
    $result2= mysql_query($query2) or die (mysql_error());
      }
}
	////////////////if book qty equal to avialble////////////
else if($book_stock_qunatity==$avail_stock_qunatity){
$q=mysql_query("select * from audit_physical_stock where audt_code='".$audt_code."' and asset_type='".$asset_type."' and classification='".$classification."'");
$count=mysql_num_rows($q);		
$fetch_physical_stock=mysql_fetch_array($q);		

$diff_stock_quantity=$avail_stock_qunatity-$book_stock_qunatity;

$query= "UPDATE `audit_physical_stock` set `ph_stock_qunatity`='".$avail_stock_qunatity."',`avail_stock_qunatity`='".$avail_stock_qunatity."',`diff_stock_quantity`='".$diff_stock_quantity."',`old_ph_stock_qunatity`='".$book_stock_qunatity."',`approved`='Y',`notification_date`='".date('Y-m-d')."' WHERE `ph_stock_id`='".$fetch_physical_stock['ph_stock_id']."'";
$result= mysql_query($query) or die (mysql_error());
}

////////////if asset found (less) ///////////////

else if($book_stock_qunatity>$avail_stock_qunatity)
{
	//echo $sql = "select * from audit_physical_stock where audt_code='".$audt_code."' and asset_type='".$asset_type."' and classification='".$classification."'";die;
	
$q=mysql_query("select * from audit_physical_stock where audt_code='".$audt_code."' and asset_type='".$asset_type."' and classification='".$classification."'");

$count=mysql_num_rows($q);		
$fetch_physical_stock=mysql_fetch_array($q);

//echo $sql = "select barcode_details from audit_physical_stock_details where ph_stock_id='".$fetch_physical_stock['ph_stock_id']."' order by id desc";		
$fetch_max_barcode=mysql_fetch_array(mysql_query("select barcode_details from audit_physical_stock_details where ph_stock_id='".$fetch_physical_stock['ph_stock_id']."' order by id DESC"));
//echo "<br>";
$diff_stock_quantity=$avail_stock_qunatity-$book_stock_qunatity;



$query= "UPDATE `audit_physical_stock` set `ph_stock_qunatity`='".$avail_stock_qunatity."',`avail_stock_qunatity`='".$avail_stock_qunatity."',`diff_stock_quantity`='".$diff_stock_quantity."',`old_ph_stock_qunatity`='".$book_stock_qunatity."',`damage_quantity`='".$damage_stock_qunatity."',`approved`='Y',`notification_date`='".date('Y-m-d')."' WHERE `ph_stock_id`='".$fetch_physical_stock['ph_stock_id']."'"; 


$result= mysql_query($query) or die (mysql_error());

//echo $fetch_max_barcode['barcode_details']."<br>";
$ex_barcode=explode("-",$fetch_max_barcode['barcode_details']);
//print_r($ex_barcode);
	$pre=$ex_barcode['3']+1;
    $max=$pre+$diff_stock_quantity;
	$limit = $pre-$max;
	for($x=$pre;$x>$max;$x--)
      {
		$barcode=$ex_barcode[0].$ex_barcode[1].$ex_barcode[2].($x-1);
		//echo "<br>";
		$barcode_des=$ex_barcode[0]."-".$ex_barcode[1]."-".$ex_barcode[2]."-".($x-1);
		//die;
		$query91 = "delete from `audit_physical_stock_details` where `asset_barcode`='".$barcode."' "; 
		$result91 = mysql_query($query91) or die (mysql_error());
		
      	$query92= "INSERT INTO `audit_disposal_details` (`audt_code`,`ph_stock_id`,`asset_barcode`,`barcode_details`) 
VALUES ('".$fetch_physical_stock['audt_code']."','".$fetch_physical_stock['ph_stock_id']."','".$barcode."','".$barcode_des."')";

		//die;
    	$result92= mysql_query($query92) or die (mysql_error());
	
      }


	
}

	////////////////if asset found (excess)////////////
	else
	{
$q=mysql_query("select * from audit_physical_stock where audt_code='".$audt_code."' and asset_type='".$asset_type."' and classification='".$classification."'");
$count=mysql_num_rows($q);		
$fetch_physical_stock=mysql_fetch_array($q);		
$fetch_max_barcode=mysql_fetch_array(mysql_query("select barcode_details from audit_physical_stock_details where ph_stock_id='".$fetch_physical_stock['ph_stock_id']."' order by id desc"));
$diff_stock_quantity=$avail_stock_qunatity-$book_stock_qunatity;

$query= "UPDATE `audit_physical_stock` set `ph_stock_qunatity`='".$avail_stock_qunatity."',`avail_stock_qunatity`='".$avail_stock_qunatity."',`diff_stock_quantity`='".$diff_stock_quantity."',`old_ph_stock_qunatity`='".$book_stock_qunatity."',`approved`='Y',`notification_date`='".date('Y-m-d')."' WHERE `ph_stock_id`='".$fetch_physical_stock['ph_stock_id']."'";
$result= mysql_query($query) or die (mysql_error());

$ex_barcode=explode("-",$fetch_max_barcode['barcode_details']);
	$pre=$ex_barcode['3']+1;
    $max=$ex_barcode['3']+$diff_stock_quantity;
	for($x=$pre;$x<=$max;$x++)
      {
		$barcode=$ex_barcode[0].$ex_barcode[1].$ex_barcode[2].$x;
		$barcode_des=$ex_barcode[0]."-".$ex_barcode[1]."-".$ex_barcode[2]."-".$x;
		
      	$query2= "INSERT INTO `audit_physical_stock_details` (`audt_code`,`ph_stock_id`,`asset_barcode`,`barcode_details`,`is_audit`) 
VALUES ('".$fetch_physical_stock['audt_code']."','".$fetch_physical_stock['ph_stock_id']."','".$barcode."','".$barcode_des."','Y')";
    $result2= mysql_query($query2) or die (mysql_error());
      }


	}
	}
}

echo "<script type='text/javascript'> window.location= 'final_stock.php?msg= Excel Upload successfully.'; </script>";	
}
?>
 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			upload: {
				required: true
			},
			classification:{
				required: true
			},
			branch_code:{
				required: true
			},

		 
		}, //end rules
		messages: {
			upload: {
				required: "<br /> Please Choose."
			},
			classification: {
				required: "<br /> Please Choose."
			},
			branch_code:{
				required: "<br /> Please Choose."
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
<?php $sel=mysql_fetch_array(mysql_query("select * from audit_physical_stock_info where audt_code='".$_REQUEST['a']."' and classification='".$_REQUEST['c']."'"));?>
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
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Re-Import Physical Stock</p></td>
        </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td width="21" height="35" align="left" valign="middle">&nbsp;</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><?php
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
        <td height="35" align="left" valign="middle" class="master">Branch Name</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error">
        <input type="hidden" name="audt_code" value="<?php echo $sel['audt_code'];?>" />
        <select name="branch_code" id="branch_code" class="rounded1" style="height:30px;" onChange="getauditor(this.value);">
          <?php 
		  $sel_barnch=mysql_query('select * from audit_branch where branch_code="'.$sel['branch_code'].'"');
		  while($fetch_branch=mysql_fetch_array($sel_barnch))
		  {
		  ?>
          <option value="<?php echo $fetch_branch['branch_code'];?>"><?php echo $fetch_branch['branch_name']." (".$fetch_branch['branch_code'].")";?></option>
          <?php }?>
        </select></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">File</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="file" name="upload" class="rounded" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Classification</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <input type="radio" name="classification" value="Owned" <?php if($_REQUEST['c']=='Owned'){echo 'checked';}?>/>Owned
        <input type="radio" name="classification" value="Rented" <?php if($_REQUEST['c']=='Rented'){echo 'checked';}?>/>Rented
</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" />
        <input type="hidden" name="mode" value="add" /></td>
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
