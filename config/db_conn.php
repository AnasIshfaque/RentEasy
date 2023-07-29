<?php
    // session_start();
    if (!defined('LOCALHOST')) {
        define('LOCALHOST', 'localhost');
    }
    
    if (!defined('DB_USERNAME')) {
        define('DB_USERNAME', 'root');
    }
    
    if (!defined('DB_PASSWORD')) {
        define('DB_PASSWORD', '');
    }
    
    if (!defined('DB_NAME')) {
        define('DB_NAME', 'renteasy');
    }
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting Database

?>

