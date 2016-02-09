<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORLIV</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />


<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}

a.tooltip {outline:none; }
a.tooltip:hover {text-decoration:none;} 
a.tooltip span {
    z-index:10;display:none;
    margin-top:0px; margin-left:0px;
    width:190px; line-height:16px;
}
a.tooltip:hover span{
	margin-top:-10px; margin-left:-167px;
    display:inline; position:absolute; 
    -moz-box-shadow: 0 0 5px #B9B9B9;
-webkit-box-shadow: 0 0 5px#B9B9B9;
box-shadow: 0 0 5px #B9B9B9;
   
}
.callout {z-index:20;position:absolute;border:0;}
    
/*CSS3 extras*/
a.tooltip span
{
	width:185px;
	height:185px;
    border-radius:10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;

}

</style>

<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th height="60" align="center" valign="middle"><?php include_once("header.php"); ?></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="1024" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
      <tr>
        <td colspan="3"><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>
        <td height="50" colspan="3" align="center"><h2><u>EDIT</u></h2></td>
      </tr>
      <tr>
        <td height="185" align="center"><a href="edit_mkt.php" class="tooltip"><img src="image/mkt.png" width="170" height="170" border="0" /><span></span></a></td>
        <td height="185" align="center"><a href="edit_oper.php" class="tooltip"><img src="image/oper.png" width="170" height="170" border="0" /><span></span></a></td>
        <td height="185" align="center"><a href="edit_pur.php" class="tooltip"><img src="image/purch.png" width="170" height="170" border="0" /><span></span></a></td>
      </tr>
      <tr>
        <td width="343" height="185" align="center"><a href="edit_acc.php" class="tooltip"><img src="image/acc.png" width="170" height="170" border="0" /><span></span></a></td>
        <td width="340" height="185" align="center"><a href="edit_cust.php" class="tooltip"><img src="image/cust.png" width="170" height="170" border="0" /><span></span></a></td>
        <td width="339" height="185" align="center"><a href="edit_tech.php" class="tooltip"><img src="image/tech.png" width="170" height="170" border="0" /><span></span></a></td>
      </tr>
      <tr>
        <td height="18" colspan="3">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle"><?php include_once("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
