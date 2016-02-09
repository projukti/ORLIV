<?php  require("connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORLIV - System Integration, Development, Consultancy, Networking</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #2E2E2E;
	font-size: 8px;
}
.style2 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 30px;
	color: #000000;
}
.style6 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.style11 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #999999;
}
a:link {
	color: #999999;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #999999;
}
a:hover {
	text-decoration: none;
	color: #FF6633;
}
a:active {
	text-decoration: none;
	color: #999999;
}
.txt {font-family:Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
letter-spacing:0.5px;
}
.error {font-family:Arial, Helvetica, sans-serif;
font-size:12px;
color:#FF0000;
letter-spacing:0.5px;
}
.box{width:250px;
height:25px;
color:#000000;
background:#E0E0E0;
border:solid #CCC 1px;
padding:4px 5px;
outline: 0;
-webkit-appearance: none;
}
.box1{width:250px;
height:60px;
color:#000000;
background:#E0E0E0;
border:solid #CCC 1px;
padding:4px 5px;
outline: 0;
-webkit-appearance: none;
}
#page-wrap {
  width: 450px; 
  height: 400px;
}
    .tabs {
      position: relative;   
      min-height: 400px; /* This part sucks */
      clear: both;
      margin: 25px 0;      
    }
    .tab {
      float: left;  
	  font-family:Georgia, 'Times New Roman', Times, serif;
  font-size:14px;    
    }
    .tab label {
      background: #eee; 
      padding: 10px; 
      border: 1px solid #ccc; 
      margin-left: -1px; 
      position: relative;
      left: 1px;             
    }
    .tab [type=radio] {
      display: none;   
    }
    .content {
      position: absolute;
      top: 28px;
      left: 0;
      background: white;
      right: 0;
      bottom: 0;
      padding: 20px;
      border: 1px solid #ccc;       
    }
    [type=radio]:checked ~ label {
      background: white;
      border-bottom: 1px solid white;
      z-index: 2;
    }
    [type=radio]:checked ~ label ~ .content {
      z-index: 1;
    }
-->
</style>
        
        <!----------------------validation----------------------------->

<script type="text/javascript" src="js/validate.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#service").validate({
		rules: {
			name: {
				required: true
			},
			con: {
				required: true
			},
			email: {
				required :true,
				email:true
			}
			
		 
		}, //end rules
		messages: {
			
			name: {
				required: "<br/>Please enter your name."
			
			},
			con: {
				required: "Please enter your contact no."
			
			},
			email: {
				required: "Please enter a valid email address."
			}
		
			
		} //end messages
		
	}); //end validate
  });
</script>

<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('images_orliv/aboutus_button_hover.jpg','images_orliv/services_button_hover.jpg','images_orliv/clients_button_hover.jpg','images_orliv/contactus_button_hover.jpg')">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12%" height="950">&nbsp;</td>
    <td width="76%" height="950" align="center" valign="top"><table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="100" align="right" valign="middle" background="images_orliv/orliv_header_bg.jpg" style="background-repeat:no-repeat;"><table width="950" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="500" align="left" valign="middle"><a href="index.html"><img src="images_orliv/orliv_logo.jpg" width="183" height="83" border="0" align="absmiddle" /></a></td>
            <td width="100" align="center" valign="middle"><a href="about_orliv.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images_orliv/aboutus_button_hover.jpg',1)"><img src="images_orliv/aboutus_button.jpg" name="Image1" width="100" height="100" border="0" id="Image1" /></a></td>
            <td width="100" align="center" valign="middle"><a href="service_orliv.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','images_orliv/services_button_hover.jpg',1)"><img src="images_orliv/services_button.jpg" name="Image2" width="100" height="100" border="0" id="Image2" /></a></td>
            <td width="100" align="center" valign="middle"><a href="clients_orliv.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images_orliv/clients_button_hover.jpg',1)"><img src="images_orliv/clients_button.jpg" name="Image3" width="100" height="100" border="0" id="Image3" /></a></td>
            <td width="100" align="center" valign="middle"><a href="contact_orliv.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images_orliv/contactus_button_hover.jpg',1)"><img src="images_orliv/contactus_button.jpg" name="Image4" width="100" height="100" border="0" id="Image4" /></a></td>
            <td width="25" height="100">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="350" align="center" valign="middle"><img src="images_orliv/01.jpg" width="950" height="350" /></td>
        </tr>
      <tr>
        <td height="8" align="center" valign="middle" bgcolor="#2E2E2E"><span class="style1">ORLIV</span></td>
        </tr>
      <tr>
        <td height="350" align="center" valign="top"><table width="950" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="45" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="574" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="19" height="390" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="312" align="left" valign="top" bgcolor="#FFFFFF"><span class="style2">Contact Information</span><br />
              <br />
              <span class="style6"><strong>Registered Office</strong><br />
Fartabad, Garia<br />
Kolkata - 700084<br />
West Bengal, India<br />
<br />
<strong>Phone</strong><br />
+91 9804245112<br />
<br />
<strong>Email</strong><br />
info@orliv.net<br />
<br />
<strong>Website</strong><br />
www.orliv.net</span><br /></td>
            <td height="390" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="390" align="left" valign="top" bgcolor="#FFFFFF"><div id="page-wrap">
    <div class="tabs">
        <div class="tab">
            <input type="radio" id="tab-1" name="tab-group-1" checked>
            <label for="tab-1">Service Type Query</label>
            <div class="content">
                <form name="service" id="service" action="servicemail.php" method="post">
		   <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="110" height="40" align="left" valign="middle" class="txt">Your Name</td>
    <td width="290" height="40" align="left" valign="middle" class="error"><input type="text" name="name" id="name"  class="box" required="required"/></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle" class="txt">Email</td>
    <td height="40" align="left" valign="middle" class="error"><input type="text" name="email" id="email"  class="box" required="required"/></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle" class="txt">Contact</td>
    <td height="40" align="left" valign="middle" class="error"><input type="text" name="con" id="con"  class="box" required="required"/></td>
  </tr>
  <tr>
    <td height="75" align="left" valign="middle" class="txt">Address</td>
    <td height="75" align="left" valign="middle" class="error"><textarea name="add" id="add" class="box1"></textarea></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle" class="txt">Service Type</td>
    <td height="40" align="left" valign="middle" class="error"><select name="job_type" id="job_type" class="box" style="height:30px; width:260px;">
                  <option value=""> Select Service Type</option>
                  <?php
$sql4 = "SELECT * from `job_type` group by job";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
                  <option value="<?php echo $row4['job']; ?>" ><?php echo $row4['job']; ?></option>
                  <?php } ?>
                </select></td>
  </tr>
  <tr>
    <td height="75" align="left" valign="middle" class="txt">Complain</td>
    <td height="75" align="left" valign="middle" class="error"><textarea name="comp" id="comp" class="box1" required="required"></textarea></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle">&nbsp;</td>
    <td height="40" align="left" valign="middle"><input type="image" src="images_orliv/save_b.png" border="0" value="submit" name="submit" id="submit" /></td>
  </tr>
</table>
</form>
            </div> 
        </div>
        <div class="tab">
            <input type="radio" id="tab-2" name="tab-group-1">
            <label for="tab-2">Sale Type Query</label>
            <div class="content">
                <form name="sale" id="sale" action="salemail.php" method="post">
		   <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="110" height="40" align="left" valign="middle" class="txt">Customer Name</td>
    <td width="290" height="40" align="left" valign="middle" class="error"><input type="text" name="name" id="name"  class="box" required="required"/></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle" class="txt">Email</td>
    <td height="40" align="left" valign="middle" class="error"><input type="text" name="email" id="email"  class="box" required="required"/></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle" class="txt">Contact</td>
    <td height="40" align="left" valign="middle" class="error"><input type="text" name="con" id="con"  class="box" required="required"/></td>
  </tr>
  <tr>
    <td height="75" align="left" valign="middle" class="txt">Address</td>
    <td height="75" align="left" valign="middle" class="error"><textarea name="add" id="add" class="box1"></textarea></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle" class="txt">Product Type</td>
    <td height="40" align="left" valign="middle" class="error"><select name="job_type" id="job_type" class="box" style="height:30px; width:260px;">
                  <option value=""> Select Product Type</option>
                  <?php
$sql4 = "SELECT * from `job_type` group by job";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
                  <option value="<?php echo $row4['job']; ?>" ><?php echo $row4['job']; ?></option>
                  <?php } ?>
                </select></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle">&nbsp;</td>
    <td height="40" align="left" valign="middle"><input type="image" src="images_orliv/save_b.png" border="0" value="submit" name="submit" id="submit" /></td>
  </tr>
</table>
</form>
            </div> 
        </div>
        <div class="tab">
            <input type="radio" id="tab-3" name="tab-group-1">
            <label for="tab-3">Employee Login</label>
            <div class="content">
                <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="290" height="20" align="center" valign="middle" class="style6">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle" class="style6"><a href="http://orliv.net/admin" target="_blank">ADMIN LOGIN</a></td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle" class="style6"><a href="http://orliv.net/marketing" target="_blank">MARKETING LOGIN</a></td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle" class="style6"><a href="http://orliv.net/operation" target="_blank">OPERATION LOGIN</a></td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle" class="style6"><a href="http://orliv.net/purchase" target="_blank">PURCHASE LOGIN</a></td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle" class="style6"><a href="http://orliv.net/accounts" target="_blank">ACCOUNTS LOGIN</a></td>
  </tr>
</table>
            </div> 
        </div>
    </div>
</div></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      <tr>
        <td height="55" align="center" valign="middle" bgcolor="#2E2E2E"><span class="style11">&copy; Copyright protected by ORLIV, 2014. All Rights Reserved. Powered by <a href="http://www.projukti.info" target="_blank">PROJUKTI</a></span></td>
        </tr>
    </table></td>
    <td width="12%" height="950">&nbsp;</td>
  </tr>
</table>
</body>
</html>
