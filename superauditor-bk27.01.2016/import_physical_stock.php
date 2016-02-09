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

$audt_code=$_REQUEST['branch_code'].date('ymd');
$branch_code = $_REQUEST['branch_code']; 
$classification= $_REQUEST['classification'];

$query= "INSERT INTO `audit_physical_stock_info` (`audt_code`,`branch_code`,`entry_date`,`audit_date`,`classification`) 
VALUES ('".$audt_code."','".$branch_code."','".date('Y-m-d')."','".date('Y-m-d')."','$classification')";
$result= mysql_query($query) or die (mysql_error());


for($i=1;$i<=$arrayCount;$i++){
	
$asset_type= strtoupper(trim($allDataInSheet[$i]["B"]));
$ph_stock_qunatity= trim($allDataInSheet[$i]["C"]);

if(($asset_type!='')&&($ph_stock_qunatity!=''))	
{
	$query1= "INSERT INTO `audit_physical_stock` (`audt_code`,`asset_type`,`classification`,`ph_stock_qunatity`) 
VALUES ('".$audt_code."','".$asset_type."','".$classification."','".$ph_stock_qunatity."')";
    $result1= mysql_query($query1) or die (mysql_error());
	$ph_stock_id=mysql_insert_id();
    
	$sel_prefix=mysql_fetch_array(mysql_query("select asset_prefix from audit_asset_type where `asset_name` LIKE '$asset_type'"));
	if($classification=='Owned'){$cls_type='O';}else{$cls_type='R';}
	
	for($x=0,$y=0;$x<($asset_type),$y<($ph_stock_qunatity);$x++,$y++)
      {
		$loc_code=substr($branch_code,3);
		$asset_prefix=trim($sel_prefix['asset_prefix']);
		$barcode=$asset_prefix.$cls_type.$loc_code.$x;
		$barcode_des=$asset_prefix."-".$cls_type."-".$loc_code."-".$x;
		
      	$query2= "INSERT INTO `audit_physical_stock_details` (`audt_code`,`ph_stock_id`,`asset_barcode`,`barcode_details`) 
VALUES ('".$audt_code."','".$ph_stock_id."','".$barcode."','".$barcode_des."')";
    $result2= mysql_query($query2) or die (mysql_error());
      }
}
	
}

echo "<script type='text/javascript'> window.location= 'import_physical_stock.php?msg= Excel Upload successfully.'; </script>";	
}
?>


<?php
$sql = "select id,state_name from audit_states";
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
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Import Physical Stock</p></td>
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
        <td height="35" align="left" valign="middle" class="master">State Name</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error">
        <select name="state_name" id="state_name" class="rounded1" style="height:30px;">
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
        <td height="35" align="left" valign="middle" class="master">Branch Name</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error">
        <!--<select name="branch_code" id="branch_code" class="rounded1" style="height:30px;" onChange="getauditor(this.value);">
          <option value="">Select Branch</option>
          <?php 
		  $sel_barnch=mysql_query('select * from audit_branch order by branch_name asc');
		  while($fetch_branch=mysql_fetch_array($sel_barnch))
		  {
		  ?>
          <option value="<?php echo $fetch_branch['branch_code'];?>"><?php echo $fetch_branch['branch_name']." (".$fetch_branch['branch_code'].")";?></option>
          <?php }?>
        </select>-->
        <select name="branch_code1" id="branch_code1" class="rounded1" style="height:30px;">
       		<option value="">Select Branch</option>
        </select>
        <span id="branch_code"></span>
        
        </td>
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
        <input type="radio" name="classification" value="Owned" />Owned<input type="radio" name="classification" value="Rented" />Rented
</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" />
        <input type="hidden" name="mode" value="add" /></td>
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


<script type="application/javascript" src="js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		
		$("#branch_code").hide();
		$("#state_name").change(function(){
		
			stateID = $(this).val();
			
			if(stateID == "")
			{
			$("#branch_code").hide();	
			}
			$.ajax({
				type: "POST",
				url: "branch_generate_import.php",
				async: false,
				data: {state:stateID},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
						$("#branch_code1").hide();
						$("#branch_code").show();
                        $('#branch_code').html(data);
				}
			})
		});
		
		
		

		});
</script>
</body>
</html>
