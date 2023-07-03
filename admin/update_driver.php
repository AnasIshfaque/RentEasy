<link rel="stylesheet" href="../style.css">
<?php
    include('admin_navbar.php');
    include '../constant.php';

    $ID=$_GET['ID'];
    $name=$_GET['name'];
    $mobile=$_GET['mobile'];
?>
<!-- <div class="modal fade" id="editUser" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> -->
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <form id="updateForm" method="POST" class="updateForm">
                <div class="form-group">
                    <div class="modal-body">
                        <label for="driverId">Driver ID:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-regular fa-id-badge"></i></span>
                            </div>
                            <input type="number" class="form-control mb-2" id="driverId" name="driver_id" value="<?php echo("$ID") ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <label for="driverName">Driver Name:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                        </div>
                        <input type="text" class="form-control mb-2" id="driverName" value="<?php echo("$name") ?>" name="driver_name">
                    </div>
                </div>

                <!-- <div class="modal-body">
                    <label for="dateOfBirth">Date of Birth:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                        </div>
                        <input type="date" class="form-control" id="dateOfBirth" name="dob">
                    </div>
                </div> -->

                <div class="modal-body">
                    <label for="mobile">Mobile:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-mobile"></i></span>
                        </div>
                        <input type="text" class="form-control mb-2" id="mobile" value="<?php echo("$mobile") ?>" name="mobile">
                    </div>
                </div>

                <div class="modal-body">
                    <label for="license">License:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-file"></i></span>
                        </div>
                        <input type="text" class="form-control mb-2" id="license" name="license">
                    </div>
                </div>

                <div class="modal-footer"> 
                    <button type="submit" name="submit" class="btn btn-primary editBtn">Update</button>
                    <a href="admin_driver.php" type="button" class="btn btn-secondary back" data-dismiss="modal">Back</a>
                
                    <input type="hidden" name="action" value="adduser">
                    <input type="hidden" name="userId" id="userId" value="">
                </div>
            </form>
        <!-- </div>
    </div>
</div> -->


<?php
    include('admin_footer.php');

    if(isset($_POST['submit'])){
        $ID=$_POST['driver_id'];
        $name=$_POST['driver_name'];
        $mobile=$_POST['mobile'];

        // Perform the update query
        $sql="UPDATE driver SET name = '$name', mobile = '$mobile' WHERE ID = '$ID'";
        $query = mysqli_query($conn, $sql);
        if($query){
            echo "<script>alert('Record Updated')</script>";
    
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT ="0;URL= 'http://localhost/RENTEASY/admin/admin_driver.php'">
    
            <?php
        }
        else{
            echo "Failed to update";
        }
    }
?>


