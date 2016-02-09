<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

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

    <div align='center' style='padding:10px; font-size:24px; font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;'>".$fetch_state['state_name']."-".$fetch_branch['branch_name']."(".$branch_code.")"."</div></div>";


// PUT YOUR HTML HEADER IN A VARIABLE
$my_html_header="
<div style=\"display:block; background-color:#f2f2f2; padding:10px; border-bottom:2pt solid #cccccc; color:#6e6e6e; font-size:.85em; font-family:verdana;\">
  <div style=\"float:left; width:33%; text-align:left;\">
      <img src=\"http://dummyimage.com/128x32/6E6E6E/ffffff.png&text=LOGO\">
  </div>
  <div style=\"float:left; width:33%; text-align:center;\">
      My Sample Header
  </div>
  <div style=\"float:left; width:33%; text-align:right;\">
      Report: January - April
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
?>