    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/admin_style.css">

<?php
    include('admin_navbar.php'); 
?>

<div class="modal fade" id="DriverEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_name">
                </div>
            </div>

            <div class="form-group">
                <label>Date of Birth:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-regular fa-calendar-days"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_dob">
                </div>
            </div>

            <div class="form-group">
                <label>Mobile:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-mobile"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_mobile">
                </div>
            </div>

            <!-- <div class="form-group">
                <label>License:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" id="edit_license">
                </div>
            </div> -->

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary Driver_update_ajax">Update</button>
      </div>
    </div>
  </div>
</div>

<div class="admin_editpage_header">
    <input class="admin_serach form-control me-2 " type="search" placeholder="Search" aria-label="Search" autocomplete="off" id="live_search_Driver" style="width: 95%;" >
</div>

<table class="table align-middle mb-0 bg-white">
    <div class="message-show">

    </div>
    <tbody class="content">
                                         
    </tbody>
</table> 

<?php
include '../partials/footer.php';
?>

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
    <script>
        $(document).ready(function () {
            getdata();

            
        $("#live_search_Driver").keyup(function () {
        var input = $(this).val();
        if (input != "") {
            $.ajax({
                url: "livesearchdriver.php",
                method: "POST",
                data: {
                    input: input
                },
                success: function (response) {
                    $('.content').empty(); // Clear existing content

                    if (response.length > 0) {
                        $.each(response, function (key, value) { 
                        var htmlString =
                        '<tr class="each_person_data">'+
                        '<tr class="rent_data" id="tr_'+value['ID']+'">'+
                            '<td class="first_row_col rmv_border">\
                                <span class="text-muted mb-1">Driver ID:</span>\
                                <span class="badge rounded text-black d-inline ms-1">'+value['ID']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Age:</span>\
                                <span class="badge  rounded text-black d-inline ms-1">'+value['age']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Mobile:</span>\
                                <span class="badge  rounded text-black d-inline ms-1">'+value['mobile']+'</span>\
                            </td>\
                        </tr>\
                        <tr id="second_tr_'+value['ID']+'">'+
                            '<td class="first_row_col rmv_border">\
                                <span class="text-muted mb-1">Driver Name:</span>\
                                <span class="badge text-black  rounded">'+value['name']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Driving License:</span>\
                                <span class="badge  rounded text-black d-inline ms-3">'+value['license']+'</span>\
                            </td>\
                            <td class="rmv_border last_row_'+value['ID']+'">';
                                htmlString +='<a href="#" class="editDriverbtn" title="Edit" data-candidate-id="'+value['ID']+'"><i class="fas fa-edit text-info update_driver"></i></a>\
                                <a href="#"  class="deleteDriver" title="Delete" data-candidate-id="'+value['ID']+'"><i class="fas fa-trash-alt text-danger"></i></a>';
                        htmlString += '</td>\
                        </tr>\
                        </tr>';

                        $('.content').append(htmlString);
                    });
                    } else {
                        $('.content').html("<h4>No Record Found</h4>");
                    }
                }
            });
        } else {
            $('.content').empty(); // Clear existing content
            getdata(); // Display all cars if the search input is empty
        }
    });

            $('.Driver_update_ajax').click(function (e) { 
                e.preventDefault();
                // $('.message-show').empty();
               
                var driver_id= $('#edit_id').val();
                var driver_Name = $('#edit_name').val();
                var driver_dov = $('#edit_dob').val();
                var driver_mobile = $('#edit_mobile').val();
                var driver_license = $('#edit_license').val();
                // alert(driver_mobile);

                if(driver_Name != '' & driver_dov !='' & driver_mobile !='' & driver_license !='')
                {
                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: {
                            'checking_update':true,
                            'driver_id': driver_id,
                            'driver_Name': driver_Name,
                            'driver_dov': driver_dov,
                            'driver_mobile': driver_mobile,
                            // 'driver_license': driver_license,
                        },
                        success: function (response) {
                            // console.log(response);
                            $('#DriverEditModal').modal('hide');
                            $("#live_search_Driver").val(""); 
                            // console.log(response);
                            $('.message-show').append('\
                                <div class="alert alert-success alert-dismissible fade show" role="alert">\
                                    <strong></strong> '+response+'.\
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                                </div>\
                            ');

                            setTimeout(function () {
                                $('.alert').alert('close');
                            }, 2000);

                            $('.content').html("");
                            getdata();
                        }
                    });

                }
                else
                {
                    // console.log("Please enter all fileds.");
                    $('.error-message-update').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                            Please enter all fileds.\
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                        </div>\
                    ');
                }
                
            });

            $(document).on("click", ".deleteDriver", function () {
                var candidate_id = $(this).data('candidate-id');
                var confirmDelete = confirm("Are you sure you want to delete this record?");

                if (confirmDelete) {
        // User confirmed, proceed with the deletion
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'checking_candidate_delete': true,
                        'candidate_id': candidate_id,
                    },
                    success: function (response) {
                        console.log(response);
                        jQuery('#tr_'+candidate_id).hide(500);
                        jQuery('#second_tr_'+candidate_id).hide(500);
                    }
                });
                } 
            });


            
            $(document).on("click", ".editDriverbtn", function () {
                var candidate_id = $(this).data('candidate-id');
                // alert(candidate_id);
               
        // User confirmed, proceed with the upadte
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'checking_driver_edit': true,
                        'candidate_id': candidate_id,
                    },
                    success: function (response) {

                        $.each(response, function (key, editDriver) { 
                            // console.log(studview['fname']);
                            $('#edit_id').val(editDriver['ID']);
                            $('#edit_name').val(editDriver['name']);
                            $('#edit_dob').val(editDriver['dob']);
                            $('#edit_mobile').val(editDriver['mobile']);
                            $('#edit_license').val(editDriver['license']);
                        });

                        $('#DriverEditModal').modal('show');

                    }
                });
            });
        });

        function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetch_driver.php",
                success: function (response) {
                    $.each(response, function (key, value) { 
                        var htmlString =
                        '<tr class="each_person_data">'+
                        '<tr class="rent_data" id="tr_'+value['ID']+'">'+
                            '<td class="first_row_col rmv_border">\
                                <span class="text-muted mb-1">Driver ID:</span>\
                                <span class="badge rounded text-black d-inline ms-1">'+value['ID']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Age:</span>\
                                <span class="badge  rounded text-black d-inline ms-1">'+value['age']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Mobile:</span>\
                                <span class="badge  rounded text-black d-inline ms-1">'+value['mobile']+'</span>\
                            </td>\
                        </tr>\
                        <tr id="second_tr_'+value['ID']+'">'+
                            '<td class="first_row_col rmv_border">\
                                <span class="text-muted mb-1">Driver Name:</span>\
                                <span class="badge text-black  rounded">'+value['name']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Driving License:</span>\
                                <span class="badge rounded text-black d-inline ms-3"><a href="../assets/images/pdf_uploads/'+ value['license'] + '" target = "_blank">View</a></span>\
                            </td>\
                            <td class="rmv_border last_row_'+value['ID']+'">';
                                htmlString +='<a href="#" class="editDriverbtn" title="Edit" data-candidate-id="'+value['ID']+'"><i class="fas fa-edit text-info update_driver"  style="margin: 0% 10%;"></i></a>\
                                <a href="#"  class="deleteDriver" title="Delete" data-candidate-id="'+value['ID']+'"><i class="fas fa-trash-alt text-danger"></i></a>';
                        htmlString += '</td>\
                        </tr>\
                        </tr>';

                        $('.content').append(htmlString);
                    });
                }
            });
        }
    </script>