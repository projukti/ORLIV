<?php 
    require("connection.php"); 
    if(empty($_SESSION['user'])) 
    { 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    } 	
    $user=$_SESSION['user']['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        html, body {padding: 0; margin: 0}
        .container {
            display: block;
            float: left;
            width: 210mm; height: 297mm;
            padding-left: 5.5mm;
            padding-right: 5.5mm;
            padding-top: 12mm;
            padding-bottom: 12mm;
            /*outline: 1px solid red;*/
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .block {
            display: block;
            height: 21mm;
            width: 38mm;
            outline: 1px dotted;
            float: left;
            margin-right: 2mm;
			-webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
			padding:6mm 0mm 5mm 0mm;
        }
        .block:nth-child(5n) {
            margin-right: 0;
        }
    </style>
        <style>
      * {
          color:#7F7F7F;
          font-family:Arial,sans-serif;
          font-size:12px;
          font-weight:normal;
      }    
      #config{
          overflow: auto;
          margin-bottom: 10px;
      }
      .config{
          float: left;
          width: 200px;
          height: 250px;
          border: 1px solid #000;
          margin-left: 10px;
      }
      .config .title{
          font-weight: bold;
          text-align: center;
      }
      .config .barcode2D,
      #miscCanvas{
        display: none;
      }
      #submit{
          clear: both;
      }
      #barcodeTarget,
      #canvasTarget{
        margin-top: 20px;
      }        
    </style>
    
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-barcode.js"></script>
    
</head>
<body>
<div class="container">
<?php 
$sel=mysql_query("select * from audit_physical_stock_details where audt_code='".$_REQUEST['audt_code']."' and is_audit='Y'");
$count=mysql_num_rows($sel);
if($count==0){?>                     
             <div align="center">No data found</div>                            
	<?php }else {?>
        <?php 
		$i=0;
		while($fetch=mysql_fetch_array($sel)){
		$i++;	
		?>
      <script type="text/javascript">
    
      function generateBarcode<?php echo $i;?>(){
        var value = '<?php echo $fetch['asset_barcode']?>';
        var btype = 'code128';
        var renderer = $("input[name=renderer]:checked").val();
        
		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }
		
        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
          barWidth: $("#barWidth").val(),
          barHeight: 30,
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget<?php echo $i;?>").hide();
          $("#canvasTarget<?php echo $i;?>").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget<?php echo $i;?>").hide();
          $("#barcodeTarget<?php echo $i;?>").html("").show().barcode(value, btype, settings);
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget<?php echo $i;?>').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode<?php echo $i;?>();
      });
  
    </script>
    <div class="block">
      <div id="barcodeTarget<?php echo $i;?>" class="barcodeTarget"></div>
      <canvas id="canvasTarget<?php echo $i;?>" width="150" height="150"></canvas>
    </div>
<?php }}?>    
</div>
</body>
</html>