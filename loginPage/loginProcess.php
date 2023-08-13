<?php
session_start();
$name = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $password = test_input($_POST["password"]);
    include '../config/db_conn.php';

    $query = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
    if ($result = mysqli_query($conn, $query)) {

        if ($result->num_rows == 1) {
            
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['type_id'] = $row['type_id'];
 
            if ($_SESSION['type_id'] == 1) {
                header ('Location:../customer/homePage.php');
            } else if ($_SESSION['type_id'] == 2) {
                header ('Location:../driver/driver_home.php');
            } else if ($_SESSION['type_id'] == 3) {
                header ('Location:../admin/admin_dashboard.php');
            }

        } else {
            echo "<script>alert('Incorrect username or password.')</script>";
        }
    } else {
        echo "<script>alert('Error connecting to database.')</script>";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>