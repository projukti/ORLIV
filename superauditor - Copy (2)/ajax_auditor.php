<?php  error_reporting(0);
    require("connection.php");
?>
<select name="audt_id" id="audt_id" class="rounded1" style="height:30px;">
          <option value="">Select Auditor</option>
          <?php 
		  $sel_barnch=mysql_query('select * from audit_stock_auditor where branch_id  like "'.$_REQUEST['id'].'" order by audt_name asc');
		  while($fetch_branch=mysql_fetch_array($sel_barnch))
		  {
		  ?>
          <option value="<?php echo $fetch_branch['audt_id'];?>"><?php echo $fetch_branch['audt_name'];?></option>
          <?php }?>
        </select>
