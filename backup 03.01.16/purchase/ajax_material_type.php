<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
?>

                <select name="type" id="type" class="rounded" style="width:215px; height:28px;"  onchange="getavailavel(this.value)">
                <option value="">Select type</option>
                 <?php
                 $sql=mysql_query("select * from material_details where material_name='".$_REQUEST['id']."'");
                 while($row = mysql_fetch_array($sql))
                  {
                  ?>
                <option value="<?php echo $row['type']."**".$_REQUEST['id']; ?>"><?php echo $row['type']; ?></option>
                <?php } ?> 
                </select>
                