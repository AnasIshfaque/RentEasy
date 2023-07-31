<?php

include '../config/db_conn.php';
$sql = "select ID,model,number,image,fuel,gear,passenger from vehicle where v_type='car'";
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