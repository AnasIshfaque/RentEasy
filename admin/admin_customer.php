<link rel="stylesheet" href="../styles/admin_style.css">

<?php
    include '../config/db_conn.php';
    include('admin_navbar.php');
 
?>
    <table class="table align-middle mb-0 bg-white">
        <tbody>
            <?php
                $sql = "select ID,name,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), '%Y') + 0 AS age,email from user WHERE type_id=1 && ID<>100";
                $query = mysqli_query($conn, $sql);
                while ($info = mysqli_fetch_array($query)){
            ?>

            <tr class="each_person_data">     
                <tr>
                    <td class="first_row_col rmv_border">
                        <span class="text-muted mb-1">Customer ID:</span>
                        <span class="badge rounded text-black d-inline ms-1"><?php echo $info[0]; ?></span>
                    </td>
                    <td class="rmv_border">
                        <span class="text-muted mb-0 ">Age:</span>
                        <span class="badge  rounded text-black d-inline ms-1"><?php echo $info[2]; ?></span>
                    </td>
                    <td class="rmv_border">
                        <span class="text-muted mb-0 ">E-mail:</span>
                        <span class="badge  rounded text-black d-inline ms-1"><?php echo $info[3]; ?></span>
                    </td>
                   
                </tr>

                <tr>
                    <td class="first_row_col rmv_border">
                        <span class="text-muted mb-1">Customer Name:</span>
                        <span class="badge text-black  rounded"><?php echo $info[1] ?></span>
                    </td>
                    <td class="rmv_border">
                        <span class="text-muted mb-0 ">Driving Lisence:</span>
                        <span class="badge  rounded text-black d-inline ms-3">Ekota Tower,Sanarpar,Siddirganj,Narayanganj</span>
                    </td>
                    
                </tr>
            </tr>
            <?php
                }
            ?>

        </tbody>
    </table> 

<?php
include '../partials/footer.php';
?>