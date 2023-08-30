<?php
    include_once '../config/db_conn.php';

    $data = json_decode(file_get_contents("php://input"),true);

    $pickup_loc_id = $data['pickup_loc_id'];
    $dest_loc_id = $data['dest_loc_id'];

    $status = 'OK';
    $content = [];

    if(mysqli_connect_errno()){
        $status = 'ERROR';
        $content = 'Failed to connect to database: ' . mysqli_connect_error();
    }else{
        $sql1 = "SELECT longitude, latitude FROM location WHERE ID = '$pickup_loc_id'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1) > 0){
            while($row = mysqli_fetch_assoc($result1)){
                $content[] = $row;
            }
        }else{
            $status = 'ERROR';
            $content = 'No data found';
        }

        $sql2 = "SELECT longitude, latitude FROM location WHERE ID = '$dest_loc_id'";
        $result2 = mysqli_query($conn, $sql2);

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