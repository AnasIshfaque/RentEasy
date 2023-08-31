<?php
    include_once '../config/db_conn.php';

    $data = json_decode(file_get_contents("php://input"),true);

    $req_id = $data['req_id'];

    $status = 'OK';
    $content = [];

    if(mysqli_connect_errno()){
        $status = 'ERROR';
        $content = 'Failed to connect to database: ' . mysqli_connect_error();
    }else{
        $sql1 = "SELECT drv_reply FROM rent_request WHERE id = '$req_id';";
        $result1 = mysqli_query($conn, $sql1);

        if($result1){
            $row = mysqli_fetch_assoc($result1);
        }
        else {
            $status = 'ERROR';
            $content = 'Failed to update database: ' . mysqli_connect_error();
        }
            
        mysqli_close($conn);
        $data = ["status" => $status, "content" => $row['drv_reply']];

        header('Content-type: application/json');
        echo json_encode($data);
    }
?>