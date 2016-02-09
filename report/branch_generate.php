<?php
require("connection.php");
 
$state_name = $_POST['state'];

//$sql = "select branch_code,branch_name from audit_branch where state_id=$state_name AND ( branch_code='LOC143' OR branch_code='LOC043' OR branch_code='LOC1193' OR  branch_code='LOC134' OR branch_code='LOC937') order by branch_name ASC";

$sql = "select distinct branch_code,branch_name from audit_branch where state_id=$state_name order by branch_name ASC";

$result = mysql_query($sql);

$total_result = mysql_num_rows($result);

echo "<select name='branch_code' id='branch_code' class='rounded1' style='height:30px;'>";
echo "<option value=''>Select Branch</option>";
			
				if($total_result > 0)
				{
					while($result_arr = mysql_fetch_array($result, MYSQL_ASSOC)) 
					{
					
						$branch_code = $result_arr['branch_code'];
						$branch_name = $result_arr['branch_name'];
						
                        echo "<option value='$branch_code'>$branch_name  ($branch_code)</option>";
					}
				}
			

echo "</select>";
?>