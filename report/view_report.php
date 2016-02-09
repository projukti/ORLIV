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
$sql = "select id,state_name from audit_states";
$result = mysql_query($sql);

$total_result = mysql_num_rows($result);
?>

<?php
//echo $sql1 = "select a.classification,SUM(old_ph_stock_qunatity) as book_qty,SUM(ph_stock_qunatity) as ph_qty,b.branch_code,SUM(diff_stock_quantity) as diff_qty,b.branch_code,d.branch_name,c.filename from audit_physical_stock  as a inner join audit_physical_stock_info as b inner join audit_report as c inner join  audit_branch as d on c.branch_code=b.branch_code AND b.audt_code=a.audt_code AND c.branch_code=d.branch_code group by a.classification";
//$sql1 = "select  a.classification,
//sum(a.old_ph_stock_qunatity) as book_qty,
//sum(a.ph_stock_qunatity) as ph_qty,
//b.branch_code,c.branch_code,d.branch_name,
//c.filename
// from audit_physical_stock  as a  right join audit_physical_stock_info as b ON b.audt_code=a.audt_code
//   join audit_report as c on c.branch_code=b.branch_code
//   join  audit_branch as d  ON c.branch_code=d.branch_code
//   where a.classification='Owned' 
//   group by b.branch_code";
   /*$sql1 = "select  a.classification,
sum(a.old_ph_stock_qunatity) as book_qty,
sum(a.ph_stock_qunatity) as ph_qty,
c.branch_code,d.branch_name,c.filename
 from audit_physical_stock  as a right join audit_physical_stock_info as b on b.audt_code=a.audt_code
   join audit_report as c on c.branch_code=b.branch_code
   join audit_branch as d on c.branch_code=d.branch_code
   where a.classification='Owned' 
   group by c.branch_code";*/
   
  /* $sql1 = "select  
a.classification,
c.book_qty,
c.ph_qty,
c.branch_code,
d.branch_name,
c.filename,
c.id
 from audit_physical_stock  as a right join audit_physical_stock_info as b on b.audt_code=a.audt_code
   join audit_report as c on c.branch_code=b.branch_code
   join audit_branch as d on c.branch_code=d.branch_code
   where a.classification='Owned' 
   group by c.branch_code";*/
   
 
 $sql1 = "select audit_report.*,audit_branch.branch_name,audit_states.state_name from audit_report
 join audit_branch on audit_branch.branch_code=audit_report.branch_code
 join audit_states on audit_states.id=audit_report.state_id order by id DESC";
$result1 = mysql_query($sql1);
?>

<?php 
if($_POST['search']=='search') { 
$state_id = $_POST['state_name'];
$branch_name = $_POST['branch_code'];
$category = $_POST['category'];

$sql2 = "select audit_report.*,audit_branch.branch_name,audit_states.state_name from audit_report
 join audit_branch on audit_branch.branch_code=audit_report.branch_code
 join audit_states on audit_states.id=audit_report.state_id where audit_report.state_id='$state_id' and audit_report.branch_code='$branch_name' and audit_report.category='$category' order by uploaded_date DESC";
   //echo $sql2;
$result2 = mysql_query($sql2);

$total_result2 = mysql_num_rows($result2);

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Audit Report</title>

<link href="css/globalstyle.css" rel="stylesheet" type="text/css" />
<style>
#delete{
	color: green;
    margin-left: 445px;
    font-size: 19px;
    font-family: initial;
}
</style>
</head>

<body>
	<div class="wrap">
    	
    	<div class="header">
        	<div class="top_header">
            	<div class="wrapper">
                	<a class="logout" href="logout.php">Log Out</a>
                </div>
            </div>
            <div class="middle_header">
            	<div class="wrapper">
                    <div class="logo">
                        <a href="view_report.php">
                            <img src="images/logo.png" />
                        </a>
                    </div>
                    <div class="right_logo">
                        <img src="images/text_right.png" />
                    </div>
            	</div>
            </div>
        </div>
        <div class="wrapper">
        	<div class="main_container">
            	<div class="search">
                	<h2>Search And View Reports <span style="float:right;"><!--<a href="../auditreport" target="_blank">Barcode Report</a>--></span></h2>
                    
                    <ul>
                    	<form action="" method="post" name="form1">
                    	<li>
                        	<p>State</p>
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
                        </li>
                        <li>
                       	  <p>Location</p>
                            <!--<select>
                                <option>West Bengal</option>
                                <option>Odisha</option>
                                <option>Bihar</option>
                            </select>-->
                            <select name="branch_name1" id="branch_name1" class="rounded1" style="height:30px;">
                            <option value="">Select Branch</option>
                            </select>
                            <span id="branch_name"></span>
                        </li>
                        <li>
                          <p>Category</p>
                          <select name="category">
                          	   <option value="">Select Category</option>
                               <option value="Owned">Owned</option>
                               <option value="Rented">Rented</option>
                          </select>
                        </li>
                        <li>
                          <button onclick="this.form.submit();">Search</button>
                          <input type="hidden" name="search" value="search" />
                        </li>
                        </form>
                  </ul>
                </div>
                
                <div class="table">
                	<?php
					if(isset($_GET['msg'])) { 
					$msg_success = $_GET['msg'];
					}
					?>
                    <?php if($msg_success) { ?>
                    <div id="delete"><?php echo $msg_success; ?></div> 
                    <?php   } ?>
                	<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#8097E4">
                    	<thead>
                          <tr>
                            <th width="6%">SL No.</th>
                            <th width="15%" align="left" style="padding-left:5px;">State Name</th>
                            <th width="15%" align="left" style="padding-left:5px;">Location Name</th>
                            <th width="12%" align="left" style="padding-left:5px;">Location Code</th>                            
                            <th width="10%" align="left" style="padding-left:5px;">Own/Rented</th>
                            <th width="11%" align="center" style="padding-left:5px;">Book Quantity</th>
                            <th width="11%" align="center" style="padding-left:5px;">Physical Total</th>
                            <th width="9%" align="center" style="padding-left:5px;">Difference</th>
                            <th width="11%">Annexture</th>
                          </tr>
                       	</thead>
                        <tbody>
                        
                         
                        <?php
						if($_POST['search']=='search') { 
						$s2 = 1; 
						while($row2 = mysql_fetch_array($result2)) { 
						$book_qty_tot[]=$row2['book_qty'];
						$ph_qty_tot[]=$row2['ph_qty'];
						$diff_qty_tot[]=($row2['ph_qty'] - $row2['book_qty']);
						?>
                          <tr>
                            <td align="center" valign="middle"><?php echo $s2++;?></td>
                            <td><?php echo $row2['state_name'];?></td>
                            <td><?php echo $row2['branch_name'];?></td>
                            <td><?php echo $row2['branch_code'];?></td>                            
                            <td><?php echo $row2['category'];?></td>
                            <td align="center"><?php echo $row2['book_qty'];?></td>
                            <td align="center"><?php echo $row2['ph_qty'];?></td>
                            <td align="center"><?php 
							
							echo ($row2['ph_qty'] - $row2['book_qty']);?></td>
                            <td align="center" valign="middle">
                        <a href="../superauditor/audit_report_excel/<?php echo $row2['filename'];?>" style="margin-left:8px;"><img src="images/excel.png" height="20" width="20" alt="Download Excel" title="Download Excel"></a>
                        <!--<a href="delete_report.php?report_id=<?php echo $row2['id'];?>" style="float:right;margin-right:8px;"><img src="images/delete.png" height="20" width="20" alt="Delete" title="Delete"></a>-->
                          
                            </td>
                          </tr>                         
                         <?php } 
						}
						else
						{ ?>
						<?php
						$s = 1; 
						while($row = mysql_fetch_array($result1)) { 
						$book_qty_tot[]=$row['book_qty'];
						$ph_qty_tot[]=$row['ph_qty'];
						$diff_qty_tot[]=($row['ph_qty'] - $row['book_qty']);
						?>
                          <tr>
                            <td align="center" valign="middle"><?php echo $s++;?></td>
                            <td><?php echo $row['state_name'];?></td>
                            <td><?php echo $row['branch_name'];?></td>
                            <td><?php echo $row['branch_code'];?></td>
                            <td><?php echo $row['category'];?></td>
                            <td align="center"><?php echo $row['book_qty'];?></td>
                            <td align="center"><?php echo $row['ph_qty'];?></td>
                            <td align="center"><?php 
							
							echo ($row['ph_qty'] - $row['book_qty']);?></td>
                            <td align="center" valign="middle">
                     <!--<a href="../superauditor/audit_report_excel/<?php echo $row['filename'];?>" style="margin-left:8px;"><img src="images/excel.png" height="20" width="20" alt="Download Excel" title="Download Excel"></a>-->
                     
                     <a href="../superauditor/audit_report_excel/<?php echo $row['filename'];?>" style="margin-left:8px;"><img src="images/excel.png" height="20" width="20" alt="Download Excel" title="Download Excel"></a>
                     
                     
                     <!--<a href="delete_report.php?report_id=<?php echo $row['id'];?>" style="float:right;margin-right:8px;"><img src="images/delete.png" height="20" width="20" alt="Delete" title="Delete"></a>-->
                     
                     
                            </td>
                          </tr>                         
                         <?php } ?> 	
						<?php }
						 ?>
                          <tr class="total">
                            <td colspan="5">TOTAL</td>
                            <td align="center"><?php echo array_sum($book_qty_tot);?></td>
                            <td align="center"><?php echo array_sum($ph_qty_tot);?></td>
                            <td align="center"><?php echo array_sum($diff_qty_tot);?></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
<script type="application/javascript" src="js/jquery.min.js"></script>
<script>
$(document).ready(function() {
$("#delete").delay(5000).fadeOut();	
});
</script>
<script>
	$(document).ready(function() {
		
		$("#branch_name").hide();
		$("#state_name").change(function(){
		
			stateID = $(this).val();
			
			if(stateID == "")
			{
			$("#branch_name").hide();	
			}
			$.ajax({
				type: "POST",
				url: "branch_generate.php",
				async: false,
				data: {state:stateID},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
						$("#branch_name1").hide();
						$("#branch_name").show();
                        $('#branch_name').html(data);
				}
			})
		});
		
		
		

		});
</script>
</body>
</html>
