<?php
include '../config/db_conn.php';

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT driver_info.ID, `mobile`, `rating` ,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), user.dob)), '%Y') + 0 AS age,license , user.name, user.email FROM `driver_info` INNER JOIN user on user.ID = driver_info.ID WHERE driver_info.verified <> 0 AND (mobile LIKE '%$input%' or user.name LIKE '%$input%' or user.email LIKE '%$input%' or driver_info.ID LIKE '%$input%' OR rating LIKE '%$input%' )";
    $query_run = mysqli_query($conn, $query);
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
        echo json_encode(["error" => "No Record Found"]);
    }
}
?>