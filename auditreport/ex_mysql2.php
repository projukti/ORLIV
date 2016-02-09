<?php
//PDF USING MULTIPLE PAGES
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('fpdf.php');

//Connect to your database
include("connection.php");

//Create new pdf file
$pdf=new FPDF();


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
$result=mysql_query("select * from audit_physical_stock INNER JOIN audit_asset_type on audit_asset_type.asset_name=audit_physical_stock.asset_type where audt_code='$audt_code'",$con);



//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 250;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(5);
$pdf->Cell(23,10,'Audit Code',1,0,'L',1);
$pdf->Cell(36,10,'Assets Type',1,0,'L',1);
$pdf->Cell(13,10,'Prefix',1,0,'L',1);
$pdf->Cell(30,10,'Classification',1,0,'L',1);
$pdf->Cell(30,10,'Book Quantity',1,0,'L',1);
$pdf->Cell(30,10,'Available Qunatity',1,0,'L',1);
$pdf->Cell(30,10,'Damage/Obselete',1,0,'L',1);
$pdf->Cell(30,10,'Recent disposal(If any)',1,0,'L',1);
$pdf->Cell(30,10,'Difference Quanity',1,0,'L',1);
$pdf->Cell(30,10,'Remarks',1,0,'L',1);


$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file

while($row = mysql_fetch_array($result))
{
	//If the current row is the last one, create new page and print column title
	if ($i == $max)
	{
		$pdf->AddPage();

		//print column titles for the current page
		$pdf->SetY($y_axis_initial);
		$pdf->SetX(25);
		$pdf->Cell(30,6,'Audit Code',1,0,'L',1);
		$pdf->Cell(10,6,'Assets Type',1,0,'L',1);
		$pdf->Cell(10,6,'Prefix',1,0,'L',1);
		$pdf->Cell(10,6,'Classification',1,0,'L',1);
		$pdf->Cell(10,6,'Book Quantity',1,0,'L',1);
		$pdf->Cell(10,6,'Available Qunatity',1,0,'L',1);
		$pdf->Cell(10,6,'Damage/Obselete',1,0,'L',1);
		$pdf->Cell(10,6,'Recent disposal(If any)',1,0,'L',1);
		$pdf->Cell(10,6,'Difference Quanity',1,0,'L',1);
		$pdf->Cell(10,6,'Remarks',1,0,'L',1);
		
		//Go to next row
		$y_axis = $y_axis + $row_height;
		
		//Set $i variable to 0 (first row)
		$i = 0;
	}

	$audt_code = $row['audt_code'];
	$asset_type = $row['asset_type'];
	$asset_prefix = $row['asset_prefix'];
	
	$classification = $row['classification'];
	$old_ph_stock_qunatity = $row['old_ph_stock_qunatity'];
	$ph_stock_qunatity = $row['ph_stock_qunatity'];
	$damage_quantity = $row['damage_quantity'];
	$disposal_quantity = $row['disposal_quantity'];
	$diff_stock_quantity = $row['diff_stock_quantity'];
	$remarks = $row['remarks'];

	$pdf->SetY($y_axis);
	$pdf->SetX(25);
	$pdf->Cell(30,6,$audt_code,1,0,'L',1);
	$pdf->Cell(10,6,$asset_type,1,0,'L',1);
	$pdf->Cell(30,6,$asset_prefix,1,0,'L',1);
	
	$pdf->Cell(30,6,$classification,1,0,'L',1);
	$pdf->Cell(30,6,$old_ph_stock_qunatity,1,0,'L',1);
	$pdf->Cell(30,6,$ph_stock_qunatity,1,0,'L',1);
	$pdf->Cell(30,6,$damage_quantity,1,0,'L',1);
	$pdf->Cell(30,6,$disposal_quantity,1,0,'L',1);
	$pdf->Cell(30,6,$diff_stock_quantity,1,0,'L',1);
	$pdf->Cell(30,6,$remarks,1,0,'L',1);

	//Go to next row
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
}

mysql_close($con);

//Send file
$pdf->Output();
?>
