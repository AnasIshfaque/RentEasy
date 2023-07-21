<?php

include '../config/db_conn.php';
$sql = "SELECT ID, name, mobile,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), '%Y') + 0 AS age,license FROM driver WHERE ID <> 100 AND verified <> 0";
$query_run = mysqli_query($conn, $sql);
$result_array = [];

if(mysqli_num_rows($query_run) > 0)
{
    foreach($query_run as $row)
    {
        array_push($result_array, $row);
    }
    header('Content-type: application/json');
    echo json_encode($result_array);
}
else
{
    echo $return = "<h4>No Record Found</h4>";
}
?>