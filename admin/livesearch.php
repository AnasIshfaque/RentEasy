<?php
include '../config/db_conn.php';

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM vehicle WHERE (model LIKE '%$input%' OR number LIKE '%$input%' OR v_type LIKE '%$input%' OR company_name LIKE '%$input%') AND v_type='Car'";
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