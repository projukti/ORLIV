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



date_default_timezone_set("Asia/Kolkata");

ini_set ( 'max_execution_time', 12000000); 



if(isset($_GET['msg'])) { 

$msg_success = $_GET['msg'];

}

if (isset($_REQUEST['mode'])&&$_REQUEST['mode']=='add')
{

					//$branch_code = $_POST['branch_code'];

                    $image = str_replace(' ', '-', $_FILES['upload']['name']);

					$file= mysql_real_escape_string($_REQUEST['upload']);	

					$image_path="audit_report_excel/";

					$image_path=$image_path.$image;

					@move_uploaded_file($_FILES['upload']['tmp_name'], $image_path);

					$typeOfUploadedImage = end(explode("/",$_FILES['upload']['type']));



$state_id = $_POST['state_name'];

$branch_code = $_POST['branch_code'];

$filename = $image;

$category = $_POST['classification'];

$book_qty = $_POST['book_qty'];

$ph_qty = $_POST['ph_qty'];


$query= "INSERT INTO `audit_report` (`state_id`,`branch_code`,`filename`,`category`,`uploaded_date`,`book_qty`,`ph_qty`)

VALUES ('".$state_id."','".$branch_code."','".$filename."','".$category."','".date('d-m-Y')."','$book_qty','$ph_qty')";


//echo $query;die;

$result= mysql_query($query) or die (mysql_error());

echo "<script type='text/javascript'> window.location= 'audit_report.php?msg= Excel Upload successfully.'; </script>";	

}
?>


<?php

$sql = "select id,state_name from audit_states";

$result = mysql_query($sql);



$total_result = mysql_num_rows($result);

?>



<?php

$list = "select audit_report.*,audit_states.state_name,audit_branch.branch_name from audit_report 

inner join audit_states on audit_states.id=audit_report.state_id inner join audit_branch on audit_branch.branch_code=audit_report.branch_code order by id DESC";

$result_list = mysql_query($list);

$total_list = mysql_num_rows($result_list);

?>

 

<!----------------------validation----------------------------->



 <script src="assets/jquery.min.js"></script>  

  <script type="text/javascript" src="js/validate.js"></script>  

<script type="text/javascript">

$(document).ready(function(){ 

   



$("#mkt").validate({

rules: {

state_name: {

required: true

},

branch_code:{

required: true

},

upload:{

required: true

},

classification:{

required: true

},

book_qty:{

required: true,

digits:true,

},

ph_qty:{

required: true,

digits:true,

},





}, //end rules

messages: {

state_name: {

required: "<br /> Please Choose."

},

branch_code: {

required: "<br /> Please Choose."

},

upload:{

required: "<br /> Please Choose."

},

classification:{

required: "<br /> Please Tick."

},

book_qty:{

required: "<br /> Please Enter.",

digits: "<br>Digits only"

},

ph_qty:{

required: "<br /> Please Enter.",

digits: "<br>Digits only"

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

#delete{

	margin-left: 355px;

    font-size: 21px;

    color: green;

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

    

    <table width="500" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">For Report Only</p></td>

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

      

      <?php if($msg_success) { ?>

        <tr>

        	<td colspan="3" style="color: green;font-size: 18px;padding-left: 247px;"><?php echo $msg_success; ?></td>

        </tr>

        <?php } ?>

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

        <td height="35" align="left" valign="middle" class="master">Category</td>

        <td height="35" align="left" valign="middle">:</td>

        <td height="35" align="left" valign="middle">

        Owned<input type="radio" name="classification" value="Owned" />

        <!--<input type="radio" name="classification" value="Rented" />Rented-->

		</td>

      </tr>

      <tr>

        <td height="35" align="left" valign="middle" class="master">Book Quantity</td>

        <td height="35" align="left" valign="middle">:</td>

        <td height="35" align="left" valign="middle"><input type="text" name="book_qty" class="rounded" value=""/></td>

      </tr>

      <tr>

        <td height="35" align="left" valign="middle" class="master">Available Qantity</td>

        <td height="35" align="left" valign="middle">:</td>

        <td height="35" align="left" valign="middle"><input type="text" name="ph_qty" class="rounded" value=""/></td>

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

      <tr>

        <td height="50">&nbsp;</td>

      </tr>

      <tr>

        <td height="50" align="center"><table width="1000" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td>

                <div style="overflow-y:scroll; height:900px;">

                <?php

					if(isset($_GET['delete_msg'])) { 

					$delete_success = $_GET['delete_msg'];

					}

				?>

                <?php if($delete_success) { ?>

                    <div id="delete"><?php echo $delete_success; ?></div> 

                <?php   } ?>

                <table width="980" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">

                  <tr>

                    <td width="256" height="40" align="center" bgcolor="#fff1ab" class="drive">State Name</td>

                    <td width="256" align="center" bgcolor="#fff1ab" class="drive">Location Name</td>

                    <td width="256" align="center" bgcolor="#fff1ab" class="drive">Category</td>

                    <td width="256" align="center" bgcolor="#fff1ab" class="drive">Book Quantity</td>

                    <td width="256" align="center" bgcolor="#fff1ab" class="drive">Available Quantity</td>

                    <td width="256" align="center" bgcolor="#fff1ab" class="drive">Uploaded Date</td>

                    <td width="187" align="center" bgcolor="#fff1ab" class="drive">Delete</td>

                  </tr>

                  <tr>

                    <td align="center">&nbsp;</td>

                    <td align="center">&nbsp;</td>

                    <td width="4" align="center">&nbsp;</td>

                    <td width="194" align="center">&nbsp;</td>

                    <td width="208" align="center">&nbsp;</td>

                    <td width="208" align="center">&nbsp;</td>

                    <td width="114" align="center">&nbsp;</td>

                  </tr>

                

                <?php 

                    if($total_list>0)

                    {

                        while($row_list = mysql_fetch_array($result_list))

                        { 

                        

                        $id= $row_list['id'];

                        ?>

                <tr>

                        

                     <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row_list['state_name']; ?></td>

                     <td align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row_list['branch_name']; ?></td>

                     <td align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row_list['category']; ?></td>

                     <td align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row_list['book_qty']; ?></td>

                     <td align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row_list['ph_qty']; ?></td>

                     <td align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row_list['uploaded_date']; ?></td>

                     <td align="center" bgcolor="#FEEDE7" class="drive_txt">

                     <a href="delete_report.php?report_id=<?php echo $row_list['id'];?>"><img src="image/delete.png" alt="Delete" title="Delete"></a>

                     </td>

                     

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

                <?php 	}

                    }                   

            ?>  

            </table>

                </div>

            </td>

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





<!--<script type="application/javascript" src="js/jquery.min.js"></script>-->

<script>

$(document).ready(function() {

$("#delete").delay(3000).fadeOut();	

});

</script>

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

