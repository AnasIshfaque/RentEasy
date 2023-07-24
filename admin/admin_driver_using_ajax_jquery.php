    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

            <div class="form-group">
                <label>License:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-id-card"></i></span>
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

<table class="table align-middle mb-0 bg-white">
    <div class="message-show">

    </div>
        <tbody class="content">
      
                                    
    </tbody>
</table> 

<?php
include '../partials/footer.php';
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            getdata();

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
                            'driver_license': driver_license,
                        },
                        success: function (response) {
                            // console.log(response);
                            $('#DriverEditModal').modal('hide');
                            // console.log(response);
                            $('.message-show').append('\
                                <div class="alert alert-success alert-dismissible fade show" role="alert">\
                                    <strong></strong> '+response+'.\
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                        <span aria-hidden="true">&times;</span>\
                                    </button>\
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
                            <strong></strong> Please enter all fileds.\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                <span aria-hidden="true">&times;</span>\
                            </button>\
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
                }
            });
        }
    </script>