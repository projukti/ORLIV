<?php
 require("connection.php");

$sql = 'DELETE FROM audit_report WHERE id='.$_GET["report_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_report.php?msg= Report Deleted successfully.');
?>