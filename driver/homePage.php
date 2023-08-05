<?php
    include '../config/db_conn.php';
    include '../partials/header.php';
    include '../config/functions.php';
    if(isLoggedin() == false) {
        header('Location:../landingPage/index.php');
    }
    $name = $_SESSION['name'];
?>

    <h1>Driver Home</h1>
    <?php echo $_SESSION['name']; ?>
    
<?php
    include '../partials/footer.php';
?>