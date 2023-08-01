<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../styles/admin_style.css">

<?php
    include('admin_navbar.php');
    include '../config/db_conn.php';
?>

<div class="modal fade" id="MicroEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Microbus</h1>
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
                    <input type="text" class="form-control" id="edit_ID" readonly>
                </div>
            </div>

            <div class="form-group">
                <label>Model: </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-car"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_model">
                </div>
            </div>

            <div class="form-group">
                <label>Number: </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-car"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_number">
                </div>
            </div>

            <div class="form-group">
                <label>Fuel Capacity:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-gas-pump"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_fuel">
                </div>
            </div>

            <div class="form-group">
                <label>Transmission:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-gear"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_gear">
                </div>
            </div>

            <div class="form-group">
                <label>Passenger:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_passenger">
                </div>
            </div>
            <img id="selected_image_preview" src="" alt="Selected Image" style="max-width: 100%; max-height: 200px;">

            <form id="car_update_form" enctype="multipart/form-data" method="post">
                <input type="file" id="edit_img" name="my_image" class="image_input" accept="image/png, image/jpeg">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary Micro_update_ajax" name="update">Update</button>
      </div>
      </form>


    </div>
  </div>
</div>


<!-- Add Car Modal -->
<div class="modal fade" id="AddMicroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Microbus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add form fields to input new car details here -->
                <!-- Example: -->
                <div class="form-group">
                    <label>Model: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-car"></i></span>
                        </div>
                        <input type="text" class="form-control" id="new_model">
                    </div>
                </div>

                <div class="form-group">
                    <label>Number: </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-car"></i></span>
                        </div>
                        <input type="text" class="form-control" id="new_number">
                    </div>
                </div>
                
            <div class="form-group">
                <label>Fuel Capacity:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-gas-pump"></i></span>
                    </div>
                    <input type="text" class="form-control" id="new_fuel">
                </div>
            </div>

            <div class="form-group">
                <label>Transmission:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-gear"></i></span>
                    </div>
                    <input type="text" class="form-control" id="new_gear">
                </div>
            </div>

            <div class="form-group">
                <label>Passenger:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="new_passenger">
                </div>
            </div>
            <img id="selected_new_image_preview" src="" alt="Selected Image" style="max-width: 100%; max-height: 200px;">


                <!-- Add input field for the new car image -->
                <div class="form-group">
                    <label>Car Image:</label>
                    <input type="file" id="new_Micro_img" name="my_image" class="image_input" accept="image/png, image/jpeg">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addMicroBtn">Add Microbus</button>
            </div>
        </div>
    </div>
</div>

<div class="admin_editpage_header">
    <input class="admin_serach form-control me-2 " type="search" placeholder="Search" aria-label="Search" autocomplete="off" id="live_search_Micro" style="width:82rem;" >
    <button type="button" class="btn btn-outline-primary add_new_Micro" style="height: fit-content; font-size: 11px; " >Add New</button>

</div>
<div class="message-show">

</div>

<div class="car_content">

</div>

<?php
include '../partials/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function () {
        getdata();

        $("#live_search_Micro").keyup(function () {
        var input = $(this).val();
        if (input != "") {
            $.ajax({
                url: "livesearchMicro.php",
                method: "POST",
                data: {
                    input: input
                },
                success: function (response) {
                    $('.car_content').empty(); // Clear existing content

                    if (response.length > 0) {
                        $.each(response, function (key, value) {
                            var htmlString =
                                '<div class="card" style="width: 22rem; ">' +
                                '<img src="uploads/' + value['image'] + '" class="card-img-top" alt="Honda CR-V">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title">' + value['model'] + '</h5>' +
                                '<div class="car_data">' +
                                '<label for="">Car Number: </label>' +
                                '<h6 class="card-title" style="padding: 1%;">' + value['number'] + '</h6>' +
                                '</div>' +
                                '<div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">' + value['fuel'] + '</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">' + value['gear'] + '</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>' + value['passenger'] + '</p></div>' +
                                '<a href="#" class="btn btn-primary specific_Micro" data-candidate-id=' + value['ID'] + '>Edit</a>' +
                                '</div></div>';

                            $('.car_content').append(htmlString);
                        });
                    } else {
                        $('.car_content').html("<h4>No Record Found</h4>");
                    }
                }
            });
        } else {
            $('.car_content').empty(); // Clear existing content
            getdata(); // Display all cars if the search input is empty
        }
    });

    // ... Existing code ...
    $(".add_new_Micro").click(function () {
        $("#AddMicroModal").modal("show");

    });

    $('#new_Micro_img').change(function() {
    // Get the selected file from the input element
        var file = this.files[0];

        // If a file is selected, update the image preview
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#selected_new_image_preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, clear the image preview
            $('#selected_new_image_preview').attr('src', '');
        }
    });

    $('#AddMicroModal').on('hidden.bs.modal', function () {
        $('#selected_new_image_preview').attr('src', '');
        var newFileInput = $("<input>").attr({
            type: "file",
            id: "new_Micro_img",
            name: "my_image",
            class: "image_input",
            accept: "image/png, image/jpeg"
        });

        // Replace the old input element with the new one
        $('#new_Micro_img').replaceWith(newFileInput);

    });

    // Handle "Add Car" button click
    $("#addMicroBtn").click(function (e) {

        e.preventDefault();

        // Get the selected file from the input element
        var fileInput = document.getElementById('new_Micro_img');
        var file = fileInput.files[0];

        // Create a new FormData object
        var formData = new FormData();

        // Append the file to the FormData object
        formData.append('my_image', file);

        // Add other form data to the FormData object if needed
        formData.append('checcking_new_Micro', true);
        // formData.append('new_car_number', $('#edit_ID').val());
        formData.append('new_car_model', $('#new_model').val());
        formData.append('new_car_reg_num', $('#new_number').val());
        formData.append('new_car_fuel', $('#new_fuel').val());
        formData.append('new_car_gear', $('#new_gear').val());
        formData.append('new_car_passenger', $('#new_passenger').val());

        $.ajax({
            type: 'POST',
            url: 'code.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle the server response here
                console.log('Success:', response);
                $("#new_model").val("");
                $("#new_number").val("");
                // $("#new_Micro_img").empty();
                $('#new_fuel').val("");
                // $('#selected_new_image_preview').attr('src', '');
                // $('selected_new_image_preview').empty();
                $('#new_gear').val("");
                $('#new_passenger').val("");
                $('#AddMicroModal').modal('hide');
                $('.car_content').empty(); // Clear existing content

                getdata(); // Display all cars if the search input is empty

            },
            error: function (xhr, status, error) {
                // Handle the error if any
                console.log('Error:', error);
            }
        });
    });



        $(document).on("click", ".specific_Micro", function () {
            var candidate_id = $(this).data('candidate-id');
            $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'checking_Micro_edit': true,
                        'candidate_id': candidate_id,
                    },
                    success: function (response) {
                        $.each(response, function (key, editCar) { 
                            // console.log(studview['fname']);
                            $('#edit_ID').val(editCar['ID']);
                            $('#edit_model').val(editCar['model']);
                            $('#edit_number').val(editCar['number']);
                            $('#edit_fuel').val(editCar['fuel']);
                            $('#edit_gear').val(editCar['gear']);
                            $('#edit_passenger').val(editCar['passenger']);
                            $('#edit_img').change(function() {
                                // Get the selected file from the input element
                                var file = this.files[0];

                                // If a file is selected, update the image preview
                                if (file) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#selected_image_preview').attr('src', e.target.result);
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    // If no file is selected, clear the image preview
                                    $('#selected_image_preview').attr('src', '');
                                }
                            });
                            $('#selected_image_preview').attr('src', 'uploads/' + editCar['image']);
                        });
                        $('#MicroEditModal').modal('show');

                    }
                });
        });

    $('.Micro_update_ajax').click(function (e) {
        e.preventDefault();

        // Get the selected file from the input element
        var fileInput = document.getElementById('edit_img');
        var file = fileInput.files[0];

        // Create a new FormData object
        var formData = new FormData();

        // Append the file to the FormData object
        formData.append('my_image', file);

        // Add other form data to the FormData object if needed
        formData.append('checking_Micro_update', true);
        formData.append('edit_car_number', $('#edit_ID').val());
        formData.append('edit_car_model', $('#edit_model').val());
        formData.append('edit_car_reg_num', $('#edit_number').val());
        formData.append('edit_car_fuel', $('#edit_fuel').val());
        formData.append('edit_car_gear', $('#edit_gear').val());
        formData.append('edit_car_passenger', $('#edit_passenger').val());

        // Send the AJAX request to the server
        $.ajax({
            type: 'POST',
            url: 'code.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle the server response here
                console.log('Success:', response);
                $('#MicroEditModal').modal('hide');
                // location.reload();
                $('.car_content').empty(); // Clear existing content

                getdata(); // Display all cars if the search input is empty

            },
            error: function (xhr, status, error) {
                // Handle the error if any
                console.log('Error:', error);
            }
        });
    });

    }
    );

    function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetch_Micro.php",
                success: function (response) {
                    $.each(response, function (key, value) { 
                        var htmlString =
                        '<div class="card" style="width: 22rem; ">' +
                        '<img src="uploads/' + value['image'] + '" class="card-img-top" alt="Honda CR-V">' +
                        '<div class="card-body">' +
                        '<h5 class="card-title">' + value['model'] + '</h5>' +
                        '<div class="car_data">' +
                        '<label for="">Car Number: </label>' +
                        '<h6 class="card-title" style="padding: 1%;">' + value['number'] + '</h6>' +
                        '</div>' +
                        '<div class="car_info"><i class="fa-solid fa-gas-pump diesel_gas_capacity"></i><p class="car_detail_info">' + value['fuel'] + '</p> <i class="fa-solid fa-gear diesel_gas_capacity"></i><p class="car_detail_info">' + value['gear'] + '</p><i class="fa-solid fa-user diesel_gas_capacity"></i><p>' + value['passenger'] + '</p></div>' +
                        '<a href="#" class="btn btn-primary specific_Micro" data-candidate-id=' + value['ID'] + '>Edit</a>' +
                        '</div></div>';

                        $('.car_content').append(htmlString);
                    });
                }
            });
        }

</script>
