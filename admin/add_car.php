<?php
include '../config/db_conn.php';
// add_car.php

if (isset($_POST['model']) && isset($_POST['number'])) {
    // Get the new car's details from the AJAX request
    $model = $_POST['model'];
    $number = $_POST['number'];
    $val=$_FILES["my_image"]["name"];
    // Process the uploaded image
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["my_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["my_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $uploadOk = 0;
    }

    // Check file size (you can adjust the maximum size as needed)
    if ($_FILES["my_image"]["size"] > 5000000) {
        $uploadOk = 0;
    }

    // Allow only certain image file formats (you can add more if needed)
    if (
        $imageFileType !== "jpg" && $imageFileType !== "png" &&
        $imageFileType !== "jpeg" && $imageFileType !== "gif"
    ) {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        // Error handling if the image upload fails
        $response = array("status" => "error", "message" => "Failed to upload image.");
        echo json_encode($response);
    } else {
        // If everything is okay, move the uploaded image to the uploads folder
        if (move_uploaded_file($_FILES["my_image"]["tmp_name"], $targetFile)) {
            // Insert the new car's details into the database
            // Connect to the database (replace with your database credentials)
    
            // Prepare and execute the database insertion
            $stmt = $conn->prepare("INSERT INTO vehicle (model, number, image) VALUES ('$model', '$number', '$val')");
            $stmt->bind_param("sss", $model, $number, $_FILES["my_image"]["name"]);
            $stmt->execute();

            // Close connections
            $stmt->close();
            $conn->close();

            // Success response
            $response = array("status" => "success", "message" => "New car added successfully!");
            echo json_encode($response);
        } else {
            // Error handling if the image move fails
            $response = array("status" => "error", "message" => "Failed to move image to the server.");
            echo json_encode($response);
        }
    }
} else {
    // Error handling if the required data is not received
    $response = array("status" => "error", "message" => "Missing data.");
    echo json_encode($response);
}
?>

