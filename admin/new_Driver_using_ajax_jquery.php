    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/admin_style.css">
<?php
    include('admin_navbar.php'); 
?>

<table class="table align-middle mb-0 bg-white">
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


            
            $(document).on("click", ".addDriver", function () {
                var candidate_id = $(this).data('candidate-id');
               
        // User confirmed, proceed with the upadte
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'checking_candidate_accept': true,
                        'candidate_id': candidate_id,
                    },
                    success: function (response) {
                        console.log(response);
                        jQuery('#tr_'+candidate_id).hide(500);
                        jQuery('#second_tr_'+candidate_id).hide(500);
                    }
                });
            });
        });

        function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetch_driver_candidate.php",
                success: function (response) {
                    if (response.length === 0) {
                        $('.content').append('<tr><td colspan="3"><h4>No Record Found</h4></td></tr>');

                    }
                    else{

                    

                    $.each(response, function (key, value) { 
                        var htmlString =
                        '<tr class="each_person_data">'+
                        '<tr class="rent_data" id="tr_'+value['ID']+'">'+
                            '<td class="first_row_col rmv_border">\
                                <span class="text-muted mb-1">Applicant ID:</span>\
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
                                <span class="text-muted mb-1">Applicant Name:</span>\
                                <span class="badge text-black  rounded">'+value['name']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Applicant License:</span>\
                                <span class="badge  rounded text-black d-inline ms-3">'+value['license']+'</span>\
                            </td>\
                            <td class="rmv_border last_row_'+value['ID']+'">';
                                htmlString +='<a href="#" class="addDriver" title="Accept" data-candidate-id="'+value['ID']+'"><i class="fa-regular fa-circle-check add_driver"></i></a>\
                                <a href="#"  class="deleteDriver" title="Delete" data-candidate-id="'+value['ID']+'"><i class="fas fa-trash-alt text-danger"></i></a>';
                        htmlString += '</td>\
                        </tr>\
                        </tr>';

                        $('.content').append(htmlString);
                    });
                }
            }
            });
        }
    </script>