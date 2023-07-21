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

    $sql = "DELETE FROM driver WHERE ID='$candidate_id'";
    $result = mysqli_query($conn, $sql);

    // $sql1 = "UPDATE renting SET d_id=100 WHERE d_id='$candidate_id'";
    // $result1 = mysqli_query($conn, $sql1);

    if($result)
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

    $sql="UPDATE driver SET verified = 1 WHERE ID = '$candidate_id'";
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

    $sql = "SELECT ID, name, mobile, dob ,license FROM driver WHERE ID='$candidate_id'";
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
    $driver_license = $_POST['driver_license'];

    $sql="UPDATE driver SET name = '$driver_Name', mobile = '$driver_mobile' , dob='$driver_dov' , license='$driver_license'  WHERE ID = '$driver_id'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo $return = "Updated succesfully";
    }
    else
    {
        echo $return = "No Updated.!";
    }
}

?>