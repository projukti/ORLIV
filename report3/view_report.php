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
$sql1 = "select  a.classification,
sum(a.old_ph_stock_qunatity) as book_qty,
sum(a.ph_stock_qunatity) as ph_qty,
b.branch_code,c.branch_code,d.branch_name,
c.filename
 from audit_physical_stock  as a  join audit_report as c on c.branch_code=b.branch_code
   join  audit_branch as d  ON c.branch_code=d.branch_code
   where a.classification='Owned' 
   group by b.branch_code";
$result1 = mysql_query($sql1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css/globalstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="wrap">
    	
    	<div class="header">
        	<div class="top_header">
            	<div class="wrapper">
                	<a class="logout.php">Log Out</a>
                </div>
            </div>
            <div class="middle_header">
            	<div class="wrapper">
                    <div class="logo">
                        <a href="">
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
                	<h2>Search And View Reports</h2>
                    
                    <ul>
                    	<form action="" method="post" name="form1" target="_blank">
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
                          <select>
                          	   <option value="">Select Category</option>
                               <option value="Owned">Owned</option>
                               <option value="Rented">Rented</option>
                          </select>
                        </li>
                        <li>
                          <button onclick="this.form.submit();">Search</button>
                        </li>
                        </form>
                  </ul>
                </div>
                
                <div class="table">
                	<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#8097E4">
                    	<thead>
                          <tr>
                            <th width="7%">SL No.</th>
                            <th width="17%">Location Code</th>
                            <th width="17%">Location Name</th>
                            <th width="17%">Own/Rented</th>
                            <th width="9%">Book Quantity</th>
                            <th width="9%">Physical Total</th>
                            <th width="9%">Difference</th>
                            <th width="6%">Annexture</th>
                          </tr>
                       	</thead>
                        <tbody>
                        <?php
						$s = 1; 
						while($row = mysql_fetch_array($result1)) { 
						$book_qty_tot[]=$row['book_qty'];
						$ph_qty_tot[]=$row['ph_qty'];
						$diff_qty_tot[]=($row['ph_qty'] - $row['book_qty']);
						?>
                          <tr>
                            <td><?php echo $s++;?></td>
                            <td><?php echo $row['branch_code'];?></td>
                            <td><?php echo $row['branch_name'];?></td>
                            <td><?php echo $row['classification'];?></td>
                            <td><?php echo $row['book_qty'];?></td>
                            <td><?php echo $row['ph_qty'];?></td>
                            <td><?php 
							
							echo ($row['ph_qty'] - $row['book_qty']);?></td>
                            <td align="center">
                            <a href="../superauditor/audit_report_excel/<?php echo $row['filename'];?>"><img src="images/excel.png" height="20" width="20"></a>
                            </td>
                          </tr>                         
                         <?php } ?> 
                          <tr>
                            <td colspan="4">TOTAL</td>
                            <td><?php echo array_sum($book_qty_tot);?></td>
                            <td><?php echo array_sum($ph_qty_tot);?></td>
                            <td><?php echo array_sum($diff_qty_tot);?></td>
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
