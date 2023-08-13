<?php
$name = $email = $DOB = $password = $license = $mobile = "";

$imgFile = $_FILES['profileImg'];

$userImgName = $_FILES['profileImg']['name'];
$userImgTmpName = $_FILES['profileImg']['tmp_name'];
$userImgSize = $_FILES['profileImg']['size'];
$userImgError = $_FILES['profileImg']['error'];
$userImgType = $_FILES['profileImg']['type'];

$userImgExt = explode('.', $userImgName);
$userImgActualExt = strtolower(end($userImgExt));

$allowed = array('jpg', 'jpeg', 'png');

$nameflag = $emailflag = $dobflag = $passflag = $licenseflag = $mobileflag = 0;
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

    if (empty($_POST["license"])) {
        $licenseflag = 0;
        echo "License is required";
    } else {
        $licenseflag = 1;
        $license = test_input($_POST["license"]);
    }

    if (empty($_POST["mobile"])) {
        $mobileflag = 0;
        echo "Mobile is required";
    } else {
        $mobileflag = 1;
        $mobile = test_input($_POST["mobile"]);
    }

    if(in_array($userImgActualExt, $allowed)){
        if($userImgError === 0){
            if($userImgSize < 1000000){
                $userImgNameNew = uniqid('', true).".".$userImgActualExt;
                $userImgDestination = '../assets/images/'.$userImgNameNew;
                move_uploaded_file($userImgTmpName, $userImgDestination);
            }
            else{
                echo "Your file is too big!";
            }
        }
        else{
            echo "There was an error uploading your file!";
        }
    }
    else{
        echo "You cannot upload files of this type!";
    }

    if ($nameflag && $emailflag && $dobflag && $passflag) {
        //creating user in database
        include '../config/db_conn.php';

        $query1 = "INSERT INTO user (name, email, dob, password, type_id) VALUES ('$name', '$email', '$DOB', '$password', 2)";
        if (mysqli_query($conn, $query1)) {
            $last_id = mysqli_insert_id($conn);
            echo "New record created successfully";
            $query2 = "INSERT INTO driver_info (ID, license, mobile, verified, status) VALUES ('$last_id','$license', '$mobile', 0, 'pending')";
            if (mysqli_query($conn, $query2)) {
                echo "New record created successfully";
                header("Location: ../landingPage/index.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
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