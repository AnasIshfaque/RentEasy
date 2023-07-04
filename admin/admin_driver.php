<link rel="stylesheet" href="../styles/admin_style.css">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyYi1G7N7nC5OqLpvXz+zv2hbeBf6aKW6pYBd6l4sf0dg9WgvepF6szZ4VbW/dWu" crossorigin="anonymous"></script> -->

<!-- <script src="../js/script.js"></script> -->
<?php
    include('admin_navbar.php');
    include '../config/db_conn.php';
 


// Check if the form was submitted
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Get the updated values from the form
//     $driverId = $_POST['driver_id'];
//     $driverName = $_POST['driver_name'];
//     //$dob = $_POST['date_of_birth'];
//     $mobile = $_POST['mobile'];
//     $license = $_POST['license'];

//     // Update the values in the database
//     $sql = "UPDATE driver SET name = '$driverName', mobile = '$mobile', license = '$license' WHERE ID = '$driverId'";
//     $result = mysqli_query($conn, $sql);

//     if ($result) {
//         // Success message
//         echo "<script>alert('Driver information updated successfully');</script>";
//     } else {
//         // Error message
//         echo "<script>alert('Failed to update driver information');</script>";
//     }
// }


// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'updateuser') {
//     // Get the updated values from the form
//     $driverId = $_POST['driver_id'];
//     $driverName = $_POST['driver_name'];
//     $mobile = $_POST['mobile'];
//     $license = $_POST['license'];

//     // Update the values in the database
//     $sql = "UPDATE driver SET name = '$driverName', mobile = '$mobile', license = '$license' WHERE ID = '$driverId'";
//     $result = mysqli_query($conn, $sql);

//     if ($result) {
//         // Success message
//         echo "<script>alert('Driver information updated successfully');</script>";
//     } else {
//         // Error message
//         echo "<script>alert('Failed to update driver information');</script>";
//     }
// }


?>
<table class="table align-middle mb-0 bg-white">
<tbody>
<?php

// Fetch and display the driver data
$sql = "SELECT ID, name, mobile,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), '%Y') + 0 AS age FROM driver WHERE ID <> 100 AND verified <> 0";
$query = mysqli_query($conn, $sql);

while ($info = mysqli_fetch_array($query)) {
    ?>

    <tr class="each_person_data">
        <tr>
            <td class="first_row_col">
                <span class="text-muted mb-1">Driver ID:</span>
                <span class="badge rounded text-black d-inline ms-1"><?php echo $info[0]; ?></span>
            </td>
            <td>
                <span class="text-muted mb-0 ">Age:</span>
                <span class="badge  rounded text-black d-inline ms-1"><?php echo $info[3]; ?></span>
            </td>
            <td>
                <span class="text-muted mb-0 ">Mobile:</span>
                <span class="badge  rounded text-black d-inline ms-1"><?php echo $info[2]; ?></span>
            </td>
        </tr>

        <tr>
            <td class="first_row_col">
                <span class="text-muted mb-1">Driver Name:</span>
                <span class="badge text-black  rounded"><?php echo $info[1] ?></span>
            </td>
            <td>
                <span class="text-muted mb-0 ">Driving License:</span>
                <span class="badge  rounded text-black d-inline ms-3">Ekota Tower, Sanarpar, Siddirganj, Narayanganj</span>
            </td>
            <td>
                <a href="update_driver.php?ID=<?= $info[0] ?>&name=<?= $info[1] ?>&mobile=<?= $info[2]?>" class="mr-5" title="Edit"><i class="fas fa-edit text-info update_driver"></i></a>
                <a href="delete_driver.php?ID=<?= $info[0] ?>" onclick="return checkdelete()" class="mr-3 deleteDriver" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
    </tr>

    <?php
}
?>
</tbody>
</table>
<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to Delete this Record');
    }
</script>

<!-- Modal -->

<!-- <script src="js/script.js">
    // JavaScript code to fill the form with current data when the edit button is clicked
JavaScript code to fill the form with current data when the edit button is clicked
$(document).on('click', '.each_person_data a[data-target="#editUser"]', function () {
    var row = $(this).closest('tr');
    var driverId = row.find('.badge').eq(0).text();
    var driverName = row.find('.badge').eq(1).text();
    var age = row.find('.badge').eq(2).text();
    var mobile = row.find('.badge').eq(3).text();
    var drivingLicense = row.find('.badge').eq(4).text();

    $('#driverId').val(driverId);
    $('#driverName').val(driverName);
    $('#age').val(age);
    $('#mobile').val(mobile);
    $('#drivingLicense').val(drivingLicense);
});

</script> -->
<!-- <script>
$(document).ready(function() {
    // Populate form fields with current data when the edit button is clicked
    $('.editBtn').click(function() {
        var driverId = $(this).data('id');
        var driverName = $(this).data('name');
        var mobile = $(this).data('mobile');
        var license = $(this).data('license');

        $('#userId').val(driverId);
        $('#driverName').val(driverName);
        $('#mobile').val(mobile);
        $('#license').val(license);
    });
});
</script> -->

<?php
include '../partials/footer.php';
?>
