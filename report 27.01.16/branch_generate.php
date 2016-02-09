<?php
require("connection.php");
 
$state_name = $_POST['state'];

//$sql = "select branch_code,branch_name from audit_branch where state_id=$state_name AND ( branch_code='LOC143' OR branch_code='LOC043' OR branch_code='LOC1193' OR  branch_code='LOC134' OR branch_code='LOC937') order by branch_name ASC";

$sql = "select distinct audit_branch.branch_code,audit_branch.branch_name from audit_branch left join audit_physical_stock_info on audit_physical_stock_info.branch_code = audit_branch.branch_code where audit_branch.state_id=$state_name AND audit_physical_stock_info.is_report='Y'  order by branch_name ASC";

$result = mysql_query($sql);

$total_result = mysql_num_rows($result);

echo "<select name='branch_name' id='branch_name' class='rounded1' style='height:30px;'>";
echo "<option value=''>Select Branch</option>";
			
				if($total_result > 0)
				{
					while($result_arr = mysql_fetch_array($result, MYSQL_ASSOC)) 
					{
					
						$branch_code = $result_arr['branch_code'];
						$branch_name = $result_arr['branch_name'];
						
                        echo "<option value='$branch_code'>$branch_name</option>";
					}
				}
			

echo "</select>";
?>