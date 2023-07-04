<link rel="stylesheet" href="../styles/admin_style.css">

<?php
    include('admin_navbar.php');
    include '../config/db_conn.php';

?>
<table class="table align-middle mb-0 bg-white">
<tbody>
<?php

// Fetch and display the driver data
$sql = "SELECT ID, name, mobile,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), '%Y') + 0 AS age FROM driver WHERE ID <> 100 AND verified <> 1";
$query = mysqli_query($conn, $sql);

while ($info = mysqli_fetch_array($query)) {
    ?>

    <tr class="each_person_data">
        <tr>
            <td class="first_row_col">
                <span class="text-muted mb-1">Applicant ID:</span>
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
                <span class="text-muted mb-1">Applicant Name:</span>
                <span class="badge text-black  rounded"><?php echo $info[1] ?></span>
            </td>
            <td>
                <span class="text-muted mb-0 ">Applicant License:</span>
                <span class="badge  rounded text-black d-inline ms-3">Ekota Tower, Sanarpar, Siddirganj, Narayanganj</span>
            </td>
            <td>
                <a href="add_new_driver.php?ID=<?= $info[0] ?>" class="mr-5" title="Edit"><i class="fa-regular fa-circle-check add_driver"></i></a>
                <a href="delete_driver.php?ID=<?= $info[0] ?>"  class="mr-3 deleteDriver" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
    </tr>

    <?php
}
?>
</tbody>
</table>
<script>
    // function checkdelete()
    // {
    //     return confirm('Are you sure you want to Delete this Record');
    // }
</script>

<?php
include '../partials/footer.php';
?>
