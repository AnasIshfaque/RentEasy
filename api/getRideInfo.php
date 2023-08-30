<?php
    $data = json_decode(file_get_contents("php://input"),true);

    $ride_lat = $data['lat'];
    $ride_lng = $data['lng'];
    
    error_reporting(0);

    include_once '../config/db_conn.php';

    $status = 'OK';
    $content = [];

    if(mysqli_connect_errno()){
        $status = 'ERROR';
        $content = 'Failed to connect to database: ' . mysqli_connect_error();
    }else{
        $query1 = "SELECT ID FROM location WHERE latitude=$ride_lat AND longitude=$ride_lng;";
        $result1 = mysqli_query($conn, $query1);
        $loc_row = mysqli_fetch_assoc($result1);
        $loc_id = $loc_row["ID"];

        $query2 = "SELECT driver_info.ID as drv_id, name, mobile, model, passenger, v_type, image, hasAC FROM driver_info JOIN user ON driver_info.ID=user.ID JOIN vehicle ON driver_info.v_id=vehicle.ID WHERE driver_info.loc_id=$loc_id;";
        $result2 = mysqli_query($conn, $query2);

        if(mysqli_num_rows($result2) > 0){
            while($row = mysqli_fetch_assoc($result2)){
                $content[] = $row;
            }
        }else{
            $status = 'ERROR';
            $content = 'No data found';
        }

        mysqli_close($conn);
        $data = ['status' => $status, 'content' => $content];

        header('Content-type: application/json');
        echo json_encode($data);
    }
?>