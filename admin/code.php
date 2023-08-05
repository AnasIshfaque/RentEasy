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

?>