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

$errors = ['name' => '', 'userImg' => '', 'email' => '', 'DOB' => '', 'password' => '', 'license' => '', 'mobile' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    } else {
        $errors['name'] = "";
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            echo "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
    } else {
        $errors['email'] = "";
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        }
    }

    if (empty($_POST["DOB"])) {
        $errors['DOB'] = "DOB is required";
    } else {
        $errors['DOB'] = "";
        $DOB = test_input($_POST["DOB"]);
    }

    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required";
    } else {
        $errors['password'] = "";
        $password = test_input($_POST["password"]);
    }

    //handle license
    if (empty($_POST["license"])) {
        $errors['license'] = "License is required";
    } else {
        $errors['license'] = "";
        $license = test_input($_POST["license"]);
    }

    if (empty($_POST["mobile"])) {
        $errors['mobile'] = "Mobile is required";
    } else {
        $errors['mobile'] = "";
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
                $errors['userImg'] = "Your file is too big!";
            }
        }
        else{
            $errors['userImg'] = "There was an error uploading your file!";
        }
    }
    else{
        $errors['userImg'] = "You cannot upload files of this type!";
    }

    if (empty($errors['name']) && empty($errors['email']) && empty($errors['DOB']) && empty($errors['password']) && empty($errors['license']) && empty($errors['mobile']) && empty($errors['userImg'])) {
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
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

    }
}

function test_input($data)
{
    $data = trim($data); // Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
    $data = stripslashes($data); // Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
    $data = htmlspecialchars($data); // Convert special characters to HTML entities (with the PHP htmlspecialchars() function)
    return $data;
}