<?php
    include_once '../config/db_conn.php';

    $status = 'OK';
    $content = [];

    if(mysqli_connect_errno()){
        $status = 'ERROR';
        $content = 'Failed to connect to database: ' . mysqli_connect_error();
    }else{
        $sql = "SELECT latitude, longitude FROM driver_info JOIN location ON driver_info.loc_id=location.ID";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
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