<?php
    include_once '../config/db_conn.php';

    $data = json_decode(file_get_contents("php://input"),true);

    $req_id = $data['req_id'];
    $driverID = $data['drv_id'];

    $status = 'OK';
    $content = [];

    if(mysqli_connect_errno()){
        $status = 'ERROR';
        $content = 'Failed to connect to database: ' . mysqli_connect_error();
    }else{
        $sql1 = "UPDATE rent_request SET drv_reply = 'accepted' WHERE id = '$req_id';";
        $result1 = mysqli_query($conn, $sql1);

        if($result1){
            $sql2 = "UPDATE rent_request SET drv_reply = 'busy' WHERE drv_id = '$driverID' AND id != '$req_id';";
            $result2 = mysqli_query($conn, $sql2);

            if($result2){
                $status = 'OK';
                $content = 'Database updated successfully';
            }
            else {
                $status = 'ERROR';
                $content = 'Failed to update database: ' . mysqli_connect_error();
            }
        }
        else {
            $status = 'ERROR';
            $content = 'Failed to update database: ' . mysqli_connect_error();
        }
            
        mysqli_close($conn);
        $data = ["status" => $status];

        header('Content-type: application/json');
        echo json_encode($data);
    }
?>