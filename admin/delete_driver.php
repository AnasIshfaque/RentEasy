<link rel="stylesheet" href="../style.css">
<?php
    // include('../admin_navbar.php');
    include '../constant.php';

    $ID=$_GET['ID'];
    $referringPage = $_SERVER['HTTP_REFERER'];
    $sql = "DELETE FROM driver WHERE ID='$ID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Record Deleted from Database')</script>";
        if($referringPage == "http://localhost/RENTEASY/admin/new_Driver.php" ){

        ?>
        <META HTTP-EQUIV="Refresh" CONTENT ="0; URL= 'http://localhost/RENTEASY/admin/new_Driver.php'">
        <?php
        }
        elseif($referringPage == "http://localhost/RENTEASY/admin/admin_driver.php" ){

            ?>
            <META HTTP-EQUIV="Refresh" CONTENT ="0; URL= 'http://localhost/RENTEASY/admin/admin_driver.php'">
            <?php
        }
    }
?>