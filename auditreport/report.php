<?php

require("connection.php");

//header("Content-type: application/vnd.ms-excel");

//header("Content-Disposition: attachment;Filename=stock.xls");

//require('fpdf/fpdf.php');

//header("Content-type: application/vnd-ms-excel");

 



//header("Content-Disposition: attachment; filename=codelution-stock.xls");

 



$state_name = $_POST['state_name'];



$branch_code = $_POST['branch_name'];

$fetch_branch=mysql_fetch_array(mysql_query("select * from audit_branch where branch_code='$branch_code'"));

$fetch_state=mysql_fetch_array(mysql_query("select * from audit_states where id='".$fetch_branch['state_id']."'"));



$sql = "select * from audit_physical_stock_info where branch_code='$branch_code' limit 1";

$result = mysql_query($sql);



$total_result = mysql_num_rows($result);



if($total_result > 0)

{

	$result_arr = mysql_fetch_array($result, MYSQL_ASSOC);

	$audt_code = $result_arr['audt_code'];

	$entry_date = $result_arr['entry_date'];

}

?>







<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Stock Details</title>

<style>

	.page_box

	{

		width:1100px;

		display:block;

		margin:0px auto;
		border-collapse:collapse;

	}

.page_box table tr th {

	padding-left:5px;

}	

.page_box table tr td {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 14px;

	padding-left:5px;
	border-collapse:collapse;

}

.page_box table {

	font-family: Arial, Helvetica, sans-serif;
	border-collapse:collapse;

}

</style>

</head>



<body>

	<div class="page_box">

    <div align="center" style="padding:10px; font-size:24px; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;"><?php echo $fetch_state['state_name']."-".$fetch_branch['branch_name']."(".$branch_code.")";?> <span style="float:right;"><a href="report_excel.php?state_name=<?php echo $state_name?>&branch_name=<?php echo $branch_code;?>"><img src="image/excel.png" height="48" width="48"></a>
    <?php /*?><a href="actionpdf.php?state_name=<?php echo $state_name?>&branch_name=<?php echo $branch_code;?>"><img src="image/pdf.png" height="48" width="48"></a><?php */?></span></div>

    	<table width="1100" border="1" cellspacing="0" cellpadding="0">

        <tr>
        	<th colspan="10">Audit Code : <?php echo $audt_code;?></th>
        </tr>  
		<tr>
        	<th colspan="10">Address : <?php echo $fetch_branch['branch_address']; ?></th>
        </tr>
          
		<tr>
        	<th colspan="10">Date & Time : <?php 
			
			$entry_date = date_create($entry_date);
			echo $entry_date = date_format($entry_date,"d-m-Y")
			 ?></th>
        </tr>
          

          <tr style="height:30px; background-color:#E2E2E2; text-align:left; font-size:14px;">

            <!--<th width="16%">Audit Code</th>-->

            <th width="19%">Assets Type</th>
            
            <th width="10%">Classification</th>

            <th width="7%">Book Quantity</th>

            <th width="7%">Available Qunatity</th>

            <th width="8%">Damage / Obsolete</th>

            <th width="12%">Recent disposal&nbsp;(If any)</th>
            
            <th width="9%">Difference Quantity</th>
            <th width="18%">Barcode Range</th>
            
            <th width="10%">Remarks</th>

          </tr>

          <?php 

		  	$sql1 = "select * from audit_physical_stock where audt_code='$audt_code' and asset_type!='ASSET TYPE'";
			
			//$sql1 = "select * from audit_physical_stock INNER JOIN audit_asset_type on audit_asset_type.asset_name=audit_physical_stock.asset_type where audt_code='$audt_code'";
			//$sql1 = "select a.*,b.branch_code from audit_physical_stock as a JOIN audit_physical_stock_info as b ON a.audt_code=b.audt_code where a.audt_code='$audt_code'";
			
			$sql2 = "SELECT sum(`ph_stock_qunatity`) FROM `audit_physical_stock` WHERE `audt_code`='$audt_code'";
			$result2 = mysql_query($sql2);
			$result_arr2 = mysql_fetch_array($result2, MYSQL_ASSOC);
			

			$result1 = mysql_query($sql1);

			

			$total_result1 = mysql_num_rows($result1);

			

			if($total_result1 > 0)

			{

				$sl = 1;

				while($result_arr1 = mysql_fetch_array($result1, MYSQL_ASSOC))

				{ 

				$result_arr1['branch_code'];
				
				$arr_sum[]=$result_arr1['ph_stock_qunatity'];
				
 $fetch_barcode_f=mysql_fetch_array(mysql_query("select asset_barcode from audit_physical_stock_details where ph_stock_id='".$result_arr1['ph_stock_id']."' order by id desc"));
 $fetch_barcode_l=mysql_fetch_array(mysql_query("select asset_barcode from audit_physical_stock_details where ph_stock_id='".$result_arr1['ph_stock_id']."' order by id asc"));
 $count_barcode=mysql_num_rows(mysql_query("select asset_barcode from audit_physical_stock_details where ph_stock_id='".$result_arr1['ph_stock_id']."'"));
				?>

				

                    <tr>

                		<!--<td><?php echo $result_arr1['audt_code'];?></td>-->

                        <td><?php echo $result_arr1['asset_type'];?></td>
                        
                        <td><?php echo $result_arr1['classification'];?></td>

                        <td><?php if(($result_arr1['old_ph_stock_qunatity'] == 0)&&($result_arr1['avail_stock_qunatity'] == 0)) { echo $result_arr1['avail_stock_qunatity'];}else if(($result_arr1['old_ph_stock_qunatity'] == 0)){echo $result_arr1['ph_stock_qunatity'];} else { echo $result_arr1['old_ph_stock_qunatity']; } 
						
						//echo $result_arr1['ph_stock_qunatity'];
						?>
                        
                        </td>

                        <td><?php echo $result_arr1['ph_stock_qunatity'];?></td>

                        <td><?php echo $result_arr1['damage_quantity'];?></td>

                        <td><?php echo $result_arr1['disposal_quantity'];?></td>
                        
                        <td>
						<?php if(($result_arr1['old_ph_stock_qunatity'] == 0)&&($result_arr1['diff_stock_quantity'] == 0)) 
						{ 
						echo $result_arr1['ph_stock_qunatity']-$result_arr1['old_ph_stock_qunatity'];
						}
						else{
							echo $result_arr1['diff_stock_quantity'];
							}?></td>
                        <td><?php if($result_arr1['ph_stock_qunatity']!=0){
							if($count_barcode>1){echo $fetch_barcode_l['asset_barcode']." - ".$fetch_barcode_f['asset_barcode'];}
							else{echo $fetch_barcode_l['asset_barcode'];}
							}?></td>
                        
                        <td><?php echo $result_arr1['remarks'];?></td>

                    </tr>	

			

			

          

          <?php } 

		  //echo array_sum($arr_sum);

		  } ?>

        </table>

    </div>

	

</body>

</html>