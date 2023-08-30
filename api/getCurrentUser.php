<?php
    // include_once '../config/db_conn.php';
    session_start();
    $status = 'OK';
    $content = [];

    $userId = $_SESSION['ID'];
    $content[0] = $userId;
    $data = ['status' => $status, 'content' => $content];

    header('Content-type: application/json');
    echo json_encode($data);

?>