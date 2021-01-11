<?php

include "dbFunctions.php";

$statistics = array();
$isEmpty = true;

if (isset($_GET['id'])) {
    
    // Retrieve Data using GET 
    $id = $_GET['id'];
    
    // 1. Create Query
    $query = "Select * "
           . "FROM statistics "
           . "WHERE id = $id ";
    
    // 2. Execute Query
    $result = mysqli_query($link, $query);
    
    // 3. Store Rows in Array
    // Check for Empty Result
    if (!empty($result)) {
        $statistics = mysqli_fetch_assoc($result);
        $isEmpty = false;
    }
    
} 

// Check Array - Comment Out Afterwards
//echo "<pre>";
//print_r($statistics);
//echo "<pre>";

echo json_encode( array("statistics" => $statistics, "isEmpty" => $isEmpty) );

mysqli_close($link);



