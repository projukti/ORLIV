	<?php 
ob_start();
include("connection.php"); 
$_SESSION['url']=$_SERVER['REQUEST_URI'];
?>
<?php
if(isset($_SESSION['auth']))
{

$select_user = "SELECT * FROM `user_registration` WHERE `user_id` = '".$_SESSION['id']."'";
$exe_selectuser = mysql_query($select_user);
$fetch_user = mysql_fetch_object($exe_selectuser);
}
?>
<?php

$id=$_SESSION['id'];
if(isset($_SESSION['auth']))
            {
            $select_user = "SELECT * FROM `user_registration` WHERE `user_id` = '".$_SESSION['id']."'";
            $exe_selectuser = mysql_query($select_user);
            $fetch_user = mysql_fetch_object($exe_selectuser);
            }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/eShop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/main.css">

  <script src="js/modernizr-2.6.2.min.js"></script>
<title>eSHOP</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
.all_padding{
	padding:10px;
	}
.products_padding{
	               padding:20px 20px 10px 10px;
	}
.style29 {color: #000000}
.style36 {font-size: 9%}
-->
</style>
</head>

<body>
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="1024" class="all_padding">
      <?php include('header.php');?>    </td>
  </tr>
  <tr>
    <td class="all_padding">
      <?php include('nav.php');?>    </td>
  </tr>
  <tr>
    <td align="center" class="all_padding">
    <?php
                                if(isset($_REQUEST['success']))
								{
									echo "<div class='suc_msg' style='padding-top:10px;'>The quantity of item has been updated</div>";
								}
								
								if(isset($_REQUEST['error']))
								{
									echo "<div class='error_msg' style='padding-top:10px;'>The quantity for the item has been revised due to restrictions at our end. You can continue to place the order for the different item.</div>";
								} 
                                
								?>
                                <div style="padding-top:8px;"><a href="product_list.php"><img src="images_eshop/continueshopping_button.jpg" border="0" /></a></div>
    </td>
  </tr>
  <tr>
    <td style="padding-bottom:10px;"><table width="1006" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="103" height="40" align="center" valign="middle" bgcolor="#B3DCFD"><span class="style29">Image</span></td>
        <td width="20" height="40" align="center" valign="middle" bgcolor="#B3DCFD">&nbsp;</td>
        <td width="206" height="40" align="center" valign="middle" bgcolor="#B3DCFD"><span class="style29">Item Name</span></td>
        <td width="21" height="40" align="center" valign="middle" bgcolor="#B3DCFD">&nbsp;</td>
        <td width="93" height="40" align="center" valign="middle" bgcolor="#B3DCFD"><span class="style29">Price</span></td>
        <td width="19" height="40" align="center" valign="middle" bgcolor="#B3DCFD">&nbsp;</td>
        <td height="40" colspan="2" align="center" valign="middle" bgcolor="#B3DCFD"><span class="style29">Quantity</span></td>
        <td width="14" height="40" align="center" valign="middle" bgcolor="#B3DCFD">&nbsp;</td>
        <td width="151" align="center" valign="middle" bgcolor="#B3DCFD"><span class="style29">Sub Total</span></td>
        <td width="18" align="center" valign="middle" bgcolor="#B3DCFD">&nbsp;</td>
        <td width="119" height="40" align="center" valign="middle" bgcolor="#B3DCFD"><span class="style29">Delete</span></td>
      </tr>
      <tr>
        <td width="103" height="5" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
        <td width="20" height="5" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
        <td width="206" height="5" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
        <td width="21" height="5" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
        <td width="93" height="5" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
        <td width="19" height="5" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
        <td height="5" colspan="2" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
        <td width="14" height="5" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
        <td width="151" align="center" valign="middle" bgcolor="#04ADFF">&nbsp;</td>
        <td width="18" align="center" valign="middle" bgcolor="#04ADFF">&nbsp;</td>
        <td width="119" height="5" align="center" valign="middle" bgcolor="#04ADFF"><span class="style36"></span></td>
      </tr>
      <tr>
        <td height="30" colspan="12" align="center" valign="middle">
<?php


if(isset($_SESSION['auth']))
{
											

			$query= "select * from `order_detail` where user_id= '$id'";
			$result= mysql_query($query) or die (mysql_error());
}

		
while ($row= mysql_fetch_array($result))
{                           
                           // $user_id=$row['user_id'];
							$brand_id=$row['brand_id'];
							$item_name= $row['item_name']; 
							$our_price= $row['our_price'];
							$item_image= $row['item_image']; 
							$description= $row['description'];
							$total_price=$row['total_price'];
							$qty=$row['qty'];
							
			?>        </td>
        </tr>
      <tr>
        <td height="60" align="center" valign="middle"><span style="padding-top:10px;"><?php echo "<img src='$item_image'  width='75' height='75' border='0'  />" ?></span></td>
        <td height="60" align="center" valign="middle">&nbsp;</td>
        <td height="60" align="center" valign="middle"><span class="tool_txt3"><?php echo $item_name; ?></span></td>
        <td height="60" align="center" valign="middle">&nbsp;</td>
        <td height="60" align="center" valign="middle"><span class="tool_txt3"><?php echo $our_price; ?> </span></td>
        <td height="60" align="center" valign="middle">&nbsp;</td>
        <form name="up_form" action="update_cart.php" method="post">
        <td width="51" height="60" align="center" valign="middle">
            <input type="text" value="<?php echo $row['qty']; ?>"  name="qty" id="qty" style="width:20px; height:15px;"/>
            <input type="hidden" value="<?php echo $our_price;?>"  name="price" id="price" style="width:20px"/>
            <input type="hidden" value="<?php echo $row['brand_id']; ?>"  name="brand_id" id="brand_id" style="width:20px"/>        </td>
        <td width="31" align="center" valign="middle"><input type="image" src="images_eshop/refresh.jpg" name="update" value="update"/></td>
        </form>
        <td height="60" align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="middle"><span class="tool_txt3" style="padding-top:10px;"> $<?php echo $total_price; ?></span></td>
        <td align="center" valign="middle">&nbsp;</td>
        <td height="60" align="center" valign="middle">   <a href="delete_cart.php?brand_id=<?php echo $brand_id;?>&user_id=<?php echo $id;?> ">
          <img src='images_eshop/del_icon.png' width='22' height='27' /></a></td>
      </tr>
      <tr>
        <td height="30" colspan="12" align="center" valign="middle"><?php } ?></td>
        </tr>
      <tr>
        <td height="30" colspan="12" align="center" valign="middle">
          <form action="checkout.php" method="post" enctype="multipart/form-data">
        <table width="950" cellpadding="0" cellspacing="0" height="100">
          <tr>
            <td width="435" height="43" style="border-top:1px solid #CCCCCC;">&nbsp;</td>
            <td width="250" align="right" class="free" style="border-top:1px solid #CCCCCC;">TOTAL ORDER AMOUNT </td>
            <td width="263" style="border-top:1px solid #CCCCCC; padding-left:60px;" class="free">
            $<?php
   
$grand_amount=mysql_query("select SUM(total_price) AS total_price from `order_detail` where `user_id`='$id'");
$row_amount = mysql_fetch_assoc($grand_amount);
$grand_total=round($row_amount['total_price']);
echo $grand_total;

?>
            <input type="hidden" id="sponosor_id" name="sponosor_id" value="<?php echo $sponosor_id; ?>" />
<input type="hidden" id="sponosor_name" name="sponosor_name" value="<?php echo $sponosor_name; ?>" />
<input type="hidden" id="full_name" name="full_name" value="<?php echo $full_name; ?>" />
<input type="hidden" id="email" name="email" value="<?php echo $email; ?>" />
<input type="hidden" id="customer_id" name="customer_id" value="<?php echo $customer_id; ?>" />
<input type="hidden" id="brand_ids" name="brand_ids" value="<?php echo $brand_ids; ?>" />
<input type="hidden" id="item_names" name="item_names" value="<?php echo $item_names; ?>" />
<input type="hidden" id="qtys" name="qtys" value="<?php echo $qtys; ?>" />
<input type="hidden" id="sizes" name="sizes" value="<?php echo $sizes; ?>" />
<input type="hidden" id="prices" name="prices" value="<?php echo $prices; ?>" />
<input type="hidden" id="brand_id_name" name="brand_id_name" value="<?php echo $brand_id_name; ?>" />
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right"><input type="image" src="images_eshop/submit_order_button.jpg" border="0" name="submit" id="submit"/></td>
          </tr>
        </table>
        </form>
        </td>
        </tr>
    </table></td>
  </tr>
  
  <tr>
   <td>
      <?php include('footer.php');?>   </td>
  </tr>
  
</table>

</body>
</html>