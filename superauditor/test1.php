<style>
* {
  margin: 0;
  padding: 0;
}
body {
    background: #999;  
}
#page-wrap {
  width: 910px; 
  height: 350px;
}
    .tabs {
      position: relative;   
      min-height: 200px; /* This part sucks */
      clear: both;
      margin: 25px 0;      
    }
    .tab {
      float: left;      
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
 </style>

  <div id="page-wrap">
    <div class="tabs">
        <div class="tab">
            <input type="radio" id="tab-1" name="tab-group-1" checked>
            <label for="tab-1">MY Drive</label>
            <div class="content">
                <p>Stuff for Tab One</p>
            </div> 
        </div>
        <div class="tab">
            <input type="radio" id="tab-2" name="tab-group-1">
            <label for="tab-2">Shared With Me</label>
            <div class="content">
                <p> <table width="880" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td height="340" align="center" class="drive">
            <div style="overflow:scroll; height:340px;">
                <table width="880" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="207" height="40" align="center" bgcolor="#fff1ab" class="drive">File</td>
            <td width="83" height="40" align="center" bgcolor="#fff1ab" class="drive">Marketing</td>
            <td width="82" height="40" align="center" bgcolor="#fff1ab" class="drive">Operation</td>
            <td width="75" height="40" align="center" bgcolor="#fff1ab" class="drive">Purchase</td>
            <td width="81" height="40" align="center" bgcolor="#fff1ab" class="drive">Accounts</td>
            <td width="135" height="40" align="center" bgcolor="#fff1ab" class="drive">Update</td>
            <td width="108" align="center" bgcolor="#fff1ab" class="drive">Download</td>
            <td width="118" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php
$select_user = "SELECT * FROM `drive` Where `post`='Admin' order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$upload_file= $row['upload_file']; 
	$marketing=$row['marketing'];
    $operation=$row['operation'];
    $purchase= $row['purchase'];
	$accounts=$row['accounts'];
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="drive_update.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $upload_file; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="checkbox" name="marketing" id="marketing" value="1" <?php if($marketing>0) { echo "checked"; } else {}  ?>/></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="checkbox" name="operation" id="operation" value="1" <?php if($operation>0) { echo "checked"; } else {}  ?>/></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="checkbox" name="purchase" id="purchase" value="1" <?php if($purchase>0) { echo "checked"; } else {}  ?>/></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="checkbox" name="accounts" id="accounts" value="1" <?php if($accounts>0) { echo "checked"; } else {}  ?>/></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><input type="image" src="image/update.png" height="25" width="70" border="0" name="submit" id="submit" value="submit" /></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><a href="download_demo.php?filename=<?php echo $upload_file; ?>"><img src="image/download.png" height="25" width="70" /></a></td>
 <td height="30" align="center" bgcolor="#FEEDE7"><a href="file_delete.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
 </form>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        <?php } ?>  
        </table>
        </div>
        </td>
        </tr>
        </table></p>
            </div> 
        </div>
    </div>
</div>