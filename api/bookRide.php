<?php
    include_once '../config/db_conn.php';

    $data = json_decode(file_get_contents("php://input"),true);

    $customerID = $data['customerID'];
    $driverID = $data['driverID'];
    $customerLat = $data['customerLat'];
    $customerLng = $data['customerLng'];
    $destLat = $data['destLat'];
    $destLng = $data['destLng'];
    $price = $data['price'];

    $status = 'OK';
    $content = [];

    if(mysqli_connect_errno()){
        $status = 'ERROR';
        $content = 'Failed to connect to database: ' . mysqli_connect_error();
    }else{
        $query1 = "INSERT into location (longitude, latitude) VALUES ('$customerLng', '$customerLat');";
        $result1 = mysqli_query($conn, $query1);
        // $mysqli->query($query1);
        // $pickup_loc_id = $mysqli->insert_id;
        $pickup_loc_id = mysqli_insert_id($conn);

        $query2 = "INSERT into location (longitude, latitude) VALUES ('$destLng','$destLat');";
        $result2 = mysqli_query($conn, $query2);
        // $mysqli->query($query2);
        $dest_loc_id = mysqli_insert_id($conn);

        $sql = "INSERT INTO rent_request (c_id, drv_id, pickup_loc_id, dest_loc_id, drv_reply, rent_fee) VALUES ('$customerID', '$driverID', '$pickup_loc_id','$dest_loc_id','pending','$price');";
        $result = mysqli_query($conn, $sql);
        $req_id = mysqli_insert_id($conn);

        mysqli_close($conn);
        $data = ["status" => $status, "content" => $req_id];

        header('Content-type: application/json');
        echo json_encode($data);
    }
?>