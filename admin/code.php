<?php 
include '../config/db_conn.php';

///ReserveList
if(isset($_POST['checking_delete']))
{
    $rent_id = $_POST['rent_id'];

    $sql="DELETE FROM renting WHERE ID='$rent_id'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo $return = "Deleted";
    }
    else
    {
        echo $return = "No Record deleted.!";
    }
}

if(isset($_POST['checking_accept']))
{
    $rent_id = $_POST['rent_id'];

    $sql="UPDATE renting SET verified = 1 WHERE ID = '$rent_id'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo $return = "Updated";
    }
    else
    {
        echo $return = "No Updated.!";
    }
}


///driver candidate 
if(isset($_POST['checking_candidate_delete']))///this function use for candidate and driver both
{
    $candidate_id = $_POST['candidate_id'];

    $sql1 = "UPDATE renting SET d_id=100 WHERE d_id='$candidate_id'";
    $result1 = mysqli_query($conn, $sql1);

    $sql = "DELETE FROM driver_info WHERE ID='$candidate_id'";
    $result = mysqli_query($conn, $sql);

    $sql2 = "DELETE FROM user WHERE user.ID='$candidate_id'";
    $result2 = mysqli_query($conn, $sql2);

    // $sql1 = "UPDATE renting SET d_id=100 WHERE d_id='$candidate_id'";
    // $result1 = mysqli_query($conn, $sql1);

    if($result && $result1 && $result2)
    {
        echo $return = "Deleted";
    }
    else
    {
        echo $return = "No Record deleted.!";
    }
}

if(isset($_POST['checking_candidate_accept']))
{
    $candidate_id = $_POST['candidate_id'];

    $sql="UPDATE driver_info SET verified = 1 WHERE ID = '$candidate_id'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo $return = "Updated";
    }
    else
    {
        echo $return = "No Updated.!";
    }
}

///driver edit

if(isset($_POST['checking_driver_edit']))
{
    $candidate_id = $_POST['candidate_id'];
    $result_array = [];

    $sql = "SELECT driver_info.ID, user.name, mobile, user.dob ,license FROM driver_info INNER JOIN user on user.ID = driver_info.ID WHERE driver_info.ID='$candidate_id' AND driver_info.verified <> 0";
    $query_run = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else
    {
        echo $return = "<h4>No Record Found</h4>";
    }
}


if(isset($_POST['checking_update']))
{
    $driver_id = $_POST['driver_id'];
    $driver_Name = $_POST['driver_Name'];
    $driver_dov = $_POST['driver_dov'];
    $driver_mobile = $_POST['driver_mobile'];
    // $driver_license = $_POST['driver_license'];

    $sql1 = "UPDATE driver_info SET mobile = '$driver_mobile' WHERE driver_info.ID = '$driver_id'";
    $result1 = mysqli_query($conn, $sql1);
    $sql="UPDATE user SET name = '$driver_Name', dob='$driver_dov' WHERE user.ID = '$driver_id'";
    $result = mysqli_query($conn, $sql);

    if($result && $result1)
    {
        echo $return = "Updated succesfully";
    }
    else
    {
        echo $return = "No Updated.!";
    }
}


///car edit
if (isset($_POST['checking_car_update'])) {
    // Your other data handling code...

    
    $edit_car_number = $_POST['edit_car_number'];
    $edit_car_model = $_POST['edit_car_model'];
    $edit_car_reg_num = $_POST['edit_car_reg_num'];
    $edit_car_fuel = $_POST['edit_car_fuel'];
    $edit_car_gear = $_POST['edit_car_gear'];
    $edit_car_passenger = $_POST['edit_car_passenger'];

    $sql1="UPDATE vehicle SET model = '$edit_car_model', number = '$edit_car_reg_num', fuel='$edit_car_fuel', gear='$edit_car_gear', passenger='$edit_car_passenger' WHERE ID = '$edit_car_number'";   
    $result1 = mysqli_query($conn, $sql1);

    if (isset($_FILES['my_image'])) {
        $file = $_FILES['my_image'];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];

        $destination_directory="uploads/".$file_name;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($file_temp, $destination_directory)) {
            // File upload success
            $sql="UPDATE vehicle SET model = '$edit_car_model', number = '$edit_car_reg_num', fuel='$edit_car_fuel', gear='$edit_car_gear', passenger='$edit_car_passenger',image='$file_name' WHERE ID = '$edit_car_number'";   
            $result = mysqli_query($conn, $sql);
            echo "File uploaded successfully.";
        } else {
            // File upload failed
            echo "Error uploading the file.";
        }
    } 
    else {
        // File not found in the request
        echo "No file selected.";
    }

    // Your other data handling code...
}



if (isset($_POST['checcking_new_Car'])) {
    // Your other data handling code...
    $new_car_model = $_POST['new_car_model'];
    $new_car_reg_num = $_POST['new_car_reg_num'];
    $new_car_fuel = $_POST['new_car_fuel'];
    $new_car_gear = $_POST['new_car_gear'];
    $new_car_passenger = $_POST['new_car_passenger'];

    if (isset($_FILES['my_image'])) {
        $file = $_FILES['my_image'];
        $file_name = $file['name'];
        $file_temp = $file['tmp_name'];

        $destination_directory="uploads/".$file_name;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($file_temp, $destination_directory)) {
            $sql1="INSERT INTO `vehicle`( `model`, `number`, `v_type`,  `fuel`, `gear`, `passenger` ,`image`) VALUES ('$new_car_model','$new_car_reg_num','Car','$new_car_fuel','$new_car_gear','$new_car_passenger','$file_name')";   
            $result1 = mysqli_query($conn, $sql1);
            // File upload success
            echo "File uploaded successfully.";
        } else {
            // File upload failed
            echo "Error uploading the file.";
        }
    } 
    else {
        // File not found in the request
        echo "No file selected.";
    }

    // Your other data handling code...
}


// if (isset($_POST['checking_add_Car'])) {
//     // Get the form data for adding a new car
//     $car_model = $_POST['edit_car_model'];
//     $car_number = $_POST['edit_car_reg_num'];
//     $car_fuel = $_POST['edit_car_fuel'];
//     $car_gear = $_POST['edit_car_gear'];
//     $car_passenger = $_POST['edit_car_passenger'];

//     // Process the form data and perform any necessary database insertion operations
//     $sql1="INSERT INTO `vehicle`( `model`, `number`, `v_type`,  `fuel`, `gear`, `passenger`) VALUES ('$car_model','$car_number','Car','$car_fuel','$car_gear','$car_passenger')";   
//     $result1 = mysqli_query($conn, $sql1);

//     // Send the response back to the AJAX call
//     echo json_encode(array('status' => 'success', 'message' => 'New car added successfully'));
//     exit; // Don't forget to exit after sending the response
// }

if(isset($_POST['checking_car_edit']))
{
    $candidate_id = $_POST['candidate_id'];
    $result_array = [];

    $sql = "select ID,model,number,image,fuel,gear,passenger from vehicle where ID='$candidate_id'";
    $query_run = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            // $row['image'] = 'uploads/' . $row['image'];

            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else
    {
        echo $return = "<h4>No Record Found</h4>";
    }
}


?>