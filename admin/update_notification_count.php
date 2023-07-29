<?php
require_once '../config/db_conn.php';
$sql = "SELECT COUNT(verified) AS pending_Case FROM driver_info WHERE verified = 0 AND ID <> 100";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

// Return the updated notification count as JSON
echo ($result['pending_Case']);
?>
