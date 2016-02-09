<?php
require('convert-html-to-pdf-with-fpdf/WriteHTML.php');
require("connection.php"); 

$state_name = $_REQUEST['state_name'];
$branch_code = $_REQUEST['branch_name'];

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

$entry_date = date_create($entry_date);
$entry_date = date_format($entry_date,'d-m-Y');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
//$pdf->Image('logo.png',18,13,33);
$pdf->SetFont('Arial','B',14);
//$pdf->WriteHTML('');

$pdf->SetFont('Arial','B',7); 

$htmlTable='
<TABLE>
<TR>
	<TD>Audit Code</TD>
	<TD>Assets Type</TD>
	<TD width="200">Classification</TD>
	<TD>Book Quantity</TD>
	<TD>Available Qunatity</TD>
	<TD>Damage / Obsolete</TD>
	<TD>Recent disposal(If any)</TD>
	<TD>Difference Quantity</TD>
	<TD>Remarks</TD>
</TR>';

$sql1 = "select * from audit_physical_stock where audt_code='$audt_code'";
			
			
			
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
				
				$htmlTable .= '
				<TR>
								<TD>'.$result_arr1['audt_code'].'</TD>
								<TD>'.$result_arr1['asset_type'].'</TD>
								<TD>'.$result_arr1['classification'].'</TD>';
				if(($result_arr1['old_ph_stock_qunatity'] == 0)&&($result_arr1['avail_stock_qunatity'] == 0)) 
						{ 
						$book = $result_arr1['avail_stock_qunatity'];
						}
						else if(($result_arr1['old_ph_stock_qunatity'] == 0))
						{
						$book = $result_arr1['ph_stock_qunatity'];
						} 
						else 
						{ 
						$book = $result_arr1['old_ph_stock_qunatity']; 
						}
				$htmlTable .= 	'<TD>'.$book.'</TD>
					<TD>'.$result_arr1['ph_stock_qunatity'].'</TD>
					<TD>'.$result_arr1['damage_quantity'].'</TD>
					<TD>'.$result_arr1['disposal_quantity'].'</TD>';
				if(($result_arr1['old_ph_stock_qunatity'] == 0)&&($result_arr1['diff_stock_quantity'] == 0)) 
						{ 
						$diff = $result_arr1['ph_stock_qunatity']-$result_arr1['old_ph_stock_qunatity'];
						}
						else
						{
						$diff = $result_arr1['diff_stock_quantity'];
						}	
				$htmlTable .= 	'<TD>'.$diff.'</TD>
					<TD>'.$result_arr1['remarks'].'</TD>
				</TR>
				';
				
				
				}
				
			}
	$htmlTable .= '</TABLE>';		

$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>