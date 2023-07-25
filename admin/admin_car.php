<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../styles/admin_style.css">

<?php
    include('admin_navbar.php');
    include '../config/db_conn.php';
?>

<div class="modal fade" id="CarEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Driver</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">

            <div class="col-md-12">
                    <div class="error-message-update">

                    </div>
            </div>

            <div class="form-group">
                <label>ID:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-id-badge"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_id" readonly>
                </div>
            </div>

            <div class="form-group">
                <label>Name:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-car"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_name">
                </div>
            </div>

            <div class="form-group">
                <label>Fuel Capacity:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-gas-pump"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_dob">
                </div>
            </div>

            <div class="form-group">
                <label>Transmission:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-gear"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_mobile">
                </div>
            </div>

            <div class="form-group">
                <label>Passenger:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_license">
                </div>
            </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary Driver_update_ajax">Update</button>
      </div>
    </div>
  </div>
</div>




<div class="car_content">
    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/Honda_CR-V.png" class="card-img-top" alt="Honda CR-V">
        <div class="card-body">
            <h5 class="card-title">Honda CR-V</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle" >Edit</a>
        </div>
    </div>

    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/Axio.png" class="card-img-top" alt="Toyota Axio">
        <div class="card-body">
            <h5 class="card-title">Toyota Axio</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle">Edit</a>
        </div>
    </div>

    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/Premio.png" class="card-img-top" alt="Toyota Premio">
        <div class="card-body">
            <h5 class="card-title">Toyota Premio</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle">Edit</a>
        </div>
    </div>
</div>

<div class="car_content">
    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/land_cruiser.png" class="card-img-top" alt="Toyota Land-Cruiser">
        <div class="card-body">
            <h5 class="card-title">Toyota Land-Cruiser</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle">Edit</a>
        </div>
    </div>

    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/aqua.png" class="card-img-top" alt="Toyota Aqua">
        <div class="card-body">
            <h5 class="card-title">Toyota Aqua</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle">Edit</a>
        </div>
    </div>

    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/hiace.png" class="card-img-top" alt="Toyota Hiace">
        <div class="card-body">
            <h5 class="card-title">Toyota Hiace</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle">Edit</a>
        </div>
    </div>
</div>

<div class="car_content">
    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/honda_civic.png" class="card-img-top" alt="Honda Civic">
        <div class="card-body">
            <h5 class="card-title">Honda Civic</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle">Edit</a>
        </div>
    </div>

    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/mg.png" class="card-img-top" alt="MG ZS">
        <div class="card-body">
            <h5 class="card-title">MG ZS</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle">Edit</a>
        </div>
    </div>

    <div class="card" style="width: 22rem;">
        <img src="../assets/images/car_images/hundai_sonata.png" class="card-img-top" alt="Hyundai Sonata">
        <div class="card-body">
            <h5 class="card-title">Hyundai Sonata</h5>
            <div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">70L</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">Auto</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>4</p></div>
            <a href="#" class="btn btn-primary specific_vehicle">Edit</a>
        </div>
    </div>
</div>


<?php
include '../partials/footer.php';
?>

<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function () {
        $(document).on("click", ".specific_vehicle", function () {
            // var candidate_id = $(this).data('candidate-id');
            // $.ajax({
            //         type: "POST",
            //         url: "code.php",
            //         data: {
            //             'checking_driver_edit': true,
            //             'candidate_id': candidate_id,
            //         },
            //         success: function (response) {
            //             $('#DriverEditModal').modal('show');
            //         }
            //     });
            $('#CarEditModal').modal('show');

        });
    });

</script>
