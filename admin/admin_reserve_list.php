<link rel="stylesheet" href="../styles/admin_style.css">

<?php
    include('admin_navbar.php'); 
        
    include '../config/db_conn.php';
?>
<!-- <form method="post" action="ReserveList.php" > -->

    <table class="table align-middle mb-0 bg-white">
        <tbody>
            <?php
                $sql = "select c_id,v_id,d_id,DATE(pickup_time) AS pickup_date,TIME(pickup_time) AS time_pickup,DATE(dst_time) AS dst_date,TIME(dst_time) AS time_dst,verified,ID from renting ORDER BY verified ASC";
                $query = mysqli_query($conn, $sql);
                while ($info = mysqli_fetch_array($query)){
                    $sql1 = "select model from vehicle where vehicle.id='$info[1]'";
                    $query1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($query1);
                    $model = $row1['model'];
            ?>

            <tr class="each_person_data">     
                <tr>
                    <td class="first_row_col">
                        <span class="text-muted mb-1">Customer ID:</span>
                        <span class="badge rounded text-black d-inline ms-1"><?php echo $info[0]; ?></span>
                    </td>
                    <td>
                        <span class="text-muted mb-0 ">Pick-up Point:</span>
                        <span class="badge  rounded text-black d-inline ms-1"> UIU permenant campus, Dhaka</span>
                    </td>
                    <td>
                        <span class="text-muted mb-0 ">Date:</span>
                        <span class="badge  rounded text-black d-inline ms-1"><?php echo $info[3]; ?></span>
                    </td>
                    <td>
                        <span class="text-muted mb-0 ">Time:</span>
                        <span class="badge  rounded text-black d-inline ms-1"><?php echo $info[4]; ?></span>
                    </td>
                    <td>
                        <?php if($info[2]==100)
                            {
                        ?>
                                <span class="badge  rounded text-black d-inline ms-1">Self-drive</span>
                        <?php
                            }
                            else{

                        ?>
                                <span class="text-muted mb-0 ">Driver ID:</span>
                                <span class="badge  rounded text-black d-inline ms-1"><?php echo $info[2] ?></span>

                        <?php

                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td class="first_row_col">
                        <span class="text-muted mb-1">Vehicle Model:</span>
                        <span class="badge text-black  rounded"><?php echo $model ?></span>
                    </td>
                    <td>
                        <span class="text-muted mb-0 ">Destination:</span>
                        <span class="badge  rounded text-black d-inline ms-3">Ekota Tower,Sanarpar,Siddirganj,Narayanganj</span>
                    </td>
                    <td>
                        <span class="text-muted mb-0 ">Date:</span>
                        <span class="badge text-black  rounded"><?php echo $info[5]; ?></span>
                    </td>
                    <td>
                        <span class="text-muted mb-0 ">Time:</span>
                        <span class="badge text-black rounded"><?php echo $info[6]; ?></span>
                    </td>
                    <td>
                        <!-- <input type="hidden" name="entryId" value="<?php echo $info[8]; ?>"> -->
                        <?php 
                            if($info[2]!=100){
                                 if ($info[7] == 0) { ?>
                                    <a href="Update_ReserveList.php?ID=<?= $info[8] ?>" type="submit" class="btn btn-link btn-sm px-3" data-ripple-color="dark" title="Accept" name="acceptBtn">
                                        <i class="fa-regular fa-circle-check"></i>
                                    </a>
                                    <a href="Delete_ReserveList.php?ID=<?= $info[8] ?>" type="submit" class="btn btn-link btn-sm px-3" data-ripple-color="dark" title="Reject" name="rejectBtn">
                                        <i class="fa-sharp fa-solid fa-trash"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($info[7] == 1) { ?>
                                    <label > Accepted</label>
                                <?php } 
                            }
                        ?>
                            
                    </td>
                </tr>
            </tr>
            <?php
                }
            ?>

        </tbody>
    </table> 
<!-- </form> -->


<?php
include '../partials/footer.php';

?>