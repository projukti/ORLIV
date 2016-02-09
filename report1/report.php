<?php
require("connection.php");
//header("Content-type: application/vnd.ms-excel");
//header("Content-Disposition: attachment;Filename=stock.xls");

//header("Content-type: application/vnd-ms-excel");
 

//header("Content-Disposition: attachment; filename=codelution-stock.xls");
 

$state_name = $_POST['state_name'];

$branch_code = $_POST['branch_name'];
$fetch_branch=mysql_fetch_array(mysql_query("select * from audit_branch where branch_code='$branch_code'"));
$fetch_state=mysql_fetch_array(mysql_query("select * from audit_states where id='".$fetch_branch['state_id']."'"));

$sql = "select audt_code from audit_physical_stock_info where branch_code='$branch_code'";
$result = mysql_query($sql);

$total_result = mysql_num_rows($result);

if($total_result > 0)
{
	$result_arr = mysql_fetch_row($result, MYSQL_ASSOC);
	$audt_code = $result_arr['audt_code'];
	
}
?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock Details</title>
<style>
	.page_box
	{
		width:900px;
		display:block;
		margin:0px auto;
	}
.page_box table tr th {
	padding-left:5px;
}	
.page_box table tr td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	padding-left:5px;
}
.page_box table {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>

<body>
	<div class="page_box">
    <div align="center" style="padding:10px; font-size:24px; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;"><?php echo $fetch_state['state_name']."-".$fetch_branch['branch_name']."(".$branch_code.")";?></div>
    	<table width="100%" border="1" cellspacing="0" cellpadding="0">
          
          
          
          <tr style="height:30px; background-color:#CCC; text-align:left;">
            <th width="16%">Audit Code</th>
            <th width="36%">Assets Type</th>
            <th width="13%">Classification</th>
            <th width="17%">Book Quantity</th>
            <th width="18%">Available Qunatity</th>
          </tr>
          <?php 
		  	$sql1 = "select * from audit_physical_stock where audt_code='$audt_code'";
			//$sql1 = "select a.*,b.branch_code from audit_physical_stock as a JOIN audit_physical_stock_info as b ON a.audt_code=b.audt_code where a.audt_code='$audt_code'";
			$result1 = mysql_query($sql1);
			
			$total_result1 = mysql_num_rows($result1);
			
			if($total_result1 > 0)
			{
				$sl = 1;
				while($result_arr1 = mysql_fetch_array($result1, MYSQL_ASSOC))
				{ 
				echo $result_arr1['branch_code'];
				?>
				
                    <tr>
                		<td><?php echo $result_arr1['audt_code'];?></td>
                        <td><?php echo $result_arr1['asset_type'];?></td>
                        <td><?php echo $result_arr1['classification'];?></td>
                        <td><?php echo $result_arr1['old_ph_stock_qunatity'];?></td>
                        <td><?php echo $result_arr1['ph_stock_qunatity'];?></td>
                    </tr>	
			
			
          
          <?php } 
		  } ?>
        </table>
    </div>
	
</body>
</html>