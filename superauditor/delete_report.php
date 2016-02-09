<?php
 require("connection.php");

$sql = 'DELETE FROM audit_report WHERE id='.$_GET["report_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: audit_report.php?delete_msg= Report Deleted successfully.');
?>