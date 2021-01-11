<?php

include "dbFunctions.php"; 

$statistics = array();
$isEmpty = true;

// 1. Create Query
$query = "SELECT * "
       . "FROM statistics "; 

// 2. Execute Query
$result = mysqli_query($link, $query);

// 3. Store Rows in Array
// Check for Empty Result
if (!empty($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $statistics[] = $row;
    }
    $isEmpty = false;
}

// Check Array - Comment Out Afterwards
//echo "<pre>";
//print_r($statistics);
//echo "<pre>";

echo json_encode( array("statistics" => $statistics, "isEmpty" => $isEmpty) );

mysqli_close($link);

