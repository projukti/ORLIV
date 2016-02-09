<?php
    require("connection.php"); 
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
	$sql = "SELECT * FROM audit_asset_type WHERE asset_name LIKE '%".$searchTerm."%' ORDER BY asset_name ASC";
    $query = mysql_query($sql);
    while ($row = mysql_fetch_array($query)) {
        $data[] = $row['asset_name'];
    }
    
    //return json data
	//print_r($data);die;
    echo json_encode($data);
?>