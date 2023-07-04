<link rel="stylesheet" href="../styles/admin_style.css">
<?php
    // include('../admin_navbar.php');
    include '../config/db_conn.php';

    $ID=$_GET['ID'];

    $sql="UPDATE driver SET verified = 1 WHERE ID = '$ID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Record Deleted from Database')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT ="0; URL= 'http://localhost/RENTEASY/admin/new_Driver.php'">
        <?php
    }
?>