<?php
$name = $email = $DOB = $password = "";
$nameflag = $emailflag = $dobflag = $passflag = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameflag = 0;
        echo "Name is required";
    } else {
        $nameflag = 1;
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            echo "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailflag = 0;
        echo "Email is required";
    } else {
        $emailflag = 1; //flag is set to 1 if email is not empty
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        }
    }

    if (empty($_POST["DOB"])) {
        $dobflag = 0;
        echo "DOB is required";
    } else {
        $dobflag = 1;
        $DOB = test_input($_POST["DOB"]);
    }

    if (empty($_POST["password"])) {
        $passflag = 0;
        echo "Password is required";
    } else {
        $passflag = 1;
        $password = test_input($_POST["password"]);
    }

    if ($nameflag && $emailflag && $dobflag && $passflag) {
        //creating user in database
        include '../config/db_conn.php';

        $sql = "INSERT INTO user (name, email, dob, password, type_id) VALUES ('$name', '$email', '$DOB', '$password', 1)";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header("Location: ../landingPage/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        header("Location: signupCustomer.php");
    }
}

function test_input($data)
{
    $data = trim($data); // Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
    $data = stripslashes($data); // Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
    $data = htmlspecialchars($data); // Convert special characters to HTML entities (with the PHP htmlspecialchars() function)
    return $data;
}
