<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php");
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

// PUT YOUR HTML IN A VARIABLE
$my_html = "<html>

<head>

<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

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
<div class='page_box'>

    <div align='center' style='padding:10px; font-size:24px; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;'>".$fetch_state['state_name']."-".$fetch_branch['branch_name']."(".$branch_code.")"."</div></div>
	<table width='100%' border='1' cellspacing='0' cellpadding='0'>
		<tr>
        	<th colspan='10'>Address : ".$fetch_branch['branch_address']."</th>
        </tr>
          
		<tr>
        	<th colspan='10'>Date & Time : ".$entry_date." </th>
        </tr>
		<tr style='height:30px; background-color:#CCC; text-align:left;'>

            <th width='16%'>Audit Code</th>

            <th width='36%'>Assets Type</th>
            
            <th width='13%'>Classification</th>

            <th width='17%'>Book Quantity</th>

            <th width='18%'>Available Qunatity</th>

            <th width='18%'>Damage/Obsolete</th>

            <th width='18%'>Recent disposal(If any)</th>
            
            <th width='18%'>Difference Quantity</th>
            
            <th width='18%'>Remarks</th>

          </tr>";
		  
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
				
				//$arr_sum[]=$result_arr2['ph_stock_qunatity'];
				
	$my_html .= "<tr>
                		<td>".$result_arr1['audt_code']."</td>

                        <td>".$result_arr1['asset_type']."</td>
                        
                        <td>".$result_arr1['classification']."</td>

                        ";
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
						
                        
                       $my_html .= "<td>".$book."</td>

                        <td>".$result_arr1['ph_stock_qunatity']."</td>

                        <td>".$result_arr1['damage_quantity']."</td>

                        <td>".$result_arr1['disposal_quantity']."</td>
                        
                        ";
						if(($result_arr1['old_ph_stock_qunatity'] == 0)&&($result_arr1['diff_stock_quantity'] == 0)) 
						{ 
						$diff = $result_arr1['ph_stock_qunatity']-$result_arr1['old_ph_stock_qunatity'];
						}
						else
						{
						$diff = $result_arr1['diff_stock_quantity'];
						}
			$my_html .=	"<td>".$diff."</td>
                        
                        <td>".$result_arr1['remarks']."</td>

                    </tr>";			
				
				}
				
			}
			
	$my_html .= "</table>
	</div>

	

</body>

</html>
	";
	

//$report_date = date('d-M-Y');

// PUT YOUR HTML HEADER IN A VARIABLE
$my_html_header="
<div style=\"display:block; background-color:#f2f2f2; padding:10px; border-bottom:2pt solid #cccccc; color:#6e6e6e; font-size:.85em; font-family:verdana;\">
  <div style=\"float:left; width:33%; text-align:left;\">
      <img src=\"image/orliv.png\">
  </div>
  <div style=\"float:left; width:33%; text-align:center;\">
      Report
  </div>
  <div style=\"float:left; width:33%; text-align:right;\">
      Report Date: ".$report_date."
  </div>
  <br style=\"clear:left;\"/>
</div>";


// PUT YOUR HTML FOOTER IN A VARIABLE (AND I USE PAGE NUMBERS)
$my_html_footer="
<div style=\"display:block;\">
  <div style=\"float:left; width:33%; text-align:left;\">
          &nbsp; 
  </div>
  <div style=\"float:left; width:33%; text-align:center;\">
         Page phptopdf_on_page_number of phptopdf_pages_total
  </div>
  <div style=\"float:left; width:33%; text-align:right;\">
          &nbsp;
   </div>
   <br style=\"clear:left;\"/>
</div>";




// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'sample_pdf_report.pdf',
  "header" => $my_html_header,
  "footer" => $my_html_footer);


// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='sample_pdf_report.pdf'>Download Your PDF</a>");
//redirect("sample_pdf_report.pdf");
?>