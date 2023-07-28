<?php

include '../config/db_conn.php';


$sql = "select c_id,vehicle.model AS veh_model,d_id,DATE(pickup_time) AS pickup_date,TIME(pickup_time) AS time_pickup,DATE(dst_time) AS dst_date,TIME(dst_time) AS time_dst,verified,renting.ID AS ID from renting INNER JOIN vehicle ON v_id=vehicle.ID ORDER BY pickup_time DESC, verified ASC";
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