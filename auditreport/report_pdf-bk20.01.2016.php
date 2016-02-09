<?php

require("connection.php");

?>


<?php
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

          
		<tr>
        	<th colspan="9">Address : <?php echo $fetch_branch['branch_address']; ?></th>
        </tr>
          
		<tr>
        	<th colspan="9">Date & Time : <?php 
			
			$entry_date = date_create($entry_date);
			echo $entry_date = date_format($entry_date,"d-m-Y")
			 ?></th>
        </tr>
          <?php 
		  
		  	//PDF USING MULTIPLE PAGES
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('fpdf.php');

//Connect to your database
//include("conectmysql.php");

//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30,6,'CODE',1,0,'L',1);
$pdf->Cell(100,6,'NAME',1,0,'L',1);
$pdf->Cell(30,6,'PRICE',1,0,'R',1);

$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$result=mysql_query("select * from audit_physical_stock where audt_code='$audt_code'",$link);

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

while($row = mysql_fetch_array($result))
{
	//echo $row['asset_type'];
	//If the current row is the last one, create new page and print column title
	if ($i == $max)
	{
		$pdf->AddPage();

		//print column titles for the current page
		$pdf->SetY($y_axis_initial);
		$pdf->SetX(25);
		$pdf->Cell(30,6,'CODE',1,0,'L',1);
		$pdf->Cell(100,6,'NAME',1,0,'L',1);
		$pdf->Cell(30,6,'PRICE',1,0,'R',1);
		
		//Go to next row
		$y_axis = $y_axis + $row_height;
		
		//Set $i variable to 0 (first row)
		$i = 0;
	} ?>

	
 <?php   
 	$audt_code = $row['asset_type'];
	//$price = $row['Price'];
	//$name = $row['Code'];

 
	$pdf->SetY($y_axis);
	$pdf->SetX(25);
	$pdf->Cell(30,6,$code,1,0,'L',1);
	$pdf->Cell(100,6,$name,1,0,'L',1);
	$pdf->Cell(30,6,$price,1,0,'R',1);

	//Go to next row
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
}

//mysql_close($link);

//Send file
$pdf->Output();
			

		  	 ?>

        </table>

    </div>

	

</body>

</html>