<?php
$name = $email = $DOB = $password = $license = $mobile = "";

$imgFile = $_FILES['profileImg'];

$userImgName = $_FILES['profileImg']['name'];
$userImgTmpName = $_FILES['profileImg']['tmp_name'];
$userImgSize = $_FILES['profileImg']['size'];
$userImgError = $_FILES['profileImg']['error'];
$userImgType = $_FILES['profileImg']['type'];

// Handle uploaded license PDF
$licensePdfName = $_FILES['license']['name'];
$licensePdfTmpName = $_FILES['license']['tmp_name'];
$licensePdfSize = $_FILES['license']['size'];
$licensePdfError = $_FILES['license']['error'];
$licensePdfType = $_FILES['license']['type'];

// $licensePdfExt = pathinfo($licensePdfExt, PATHINFO_EXTENSION);
// $allowedPdfExtensions = array('pdf');
$licensePdfExt = explode('.', $licensePdfName);
$licensePdfActualExt = strtolower(end($licensePdfExt));

$allowedPdfExtensions = array('pdf');


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

    if (in_array($userImgActualExt, $allowed)) {
        if ($userImgError === 0) {
            if ($userImgSize < 1000000) {
                $userImgNameNew = uniqid('', true) . "." . $userImgActualExt;
                $userImgDestination = '../assets/images/profileImg/' . $userImgNameNew;
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
    //for license
    if (in_array($licensePdfActualExt, $allowedPdfExtensions)) {
        if ($licensePdfError === 0) {
            if ($licensePdfSize < 1000000) {
                $licensePdfNameNew = uniqid('', true) . "." . $licensePdfActualExt;
                $licensePdfDestination = '../assets/images/pdf_uploads/' . $licensePdfNameNew;
                move_uploaded_file($licensePdfTmpName, $licensePdfDestination);
            } else {
                echo "Your PDF file is too big!";
            }
        } else {
            echo "There was an error uploading your PDF file!";
        }
    } else {
        echo "You can only upload PDF files!";
    }



    if (empty($errors['name']) && empty($errors['email']) && empty($errors['DOB']) && empty($errors['password']) && empty($errors['license']) && empty($errors['mobile']) && empty($errors['userImg'])) {
        //creating user in database
        include '../config/db_conn.php';

        $query1 = "INSERT INTO user (name, email, dob, password, type_id, profileImg) VALUES ('$name', '$email', '$DOB', '$password', 2 ,'$userImgNameNew')";
        if (mysqli_query($conn, $query1)) {
            $last_id = mysqli_insert_id($conn);
            echo "New record created successfully";
            $query2 = "INSERT INTO driver_info (ID, license, mobile, verified, status) VALUES ('$last_id','$licensePdfNameNew', '$mobile', 0, 'pending')";
            if (mysqli_query($conn, $query2)) {
                echo "New record created successfully";
                header("Location: ../landingPage/index.php");
            } else {
                echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
        }
    } else {
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
