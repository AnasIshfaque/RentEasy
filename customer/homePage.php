<?php
    include '../config/db_conn.php';
    include '../config/functions.php';
    include '../partials/header.php';
    if(isLoggedin() == false) {
        header('Location:../landingPage/index.php');
    }
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
?>

    <h1>Customer Home</h1>
    <h2>Welcome <?php echo $_SESSION['name']; ?></h2>
    
<?php
    include '../partials/footer.php';
?>