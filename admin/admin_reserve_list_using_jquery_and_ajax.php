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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function () {
            getdata();

            $(document).on("click", ".delete_btn", function () {
                var rent_id = $(this).data('rent-id');
                var confirmDelete = confirm("Are you sure you want to delete this record?");

                if (confirmDelete) {
        // User confirmed, proceed with the deletion
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'checking_delete': true,
                        'rent_id': rent_id,
                    },
                    success: function (response) {
                        console.log(response);
                        jQuery('#tr_'+rent_id).hide(500);
                        jQuery('#second_tr_'+rent_id).hide(500);
                    }
                });
                } 
            });
            
            $(document).on("click", ".accept_btn", function () {
                var rent_id = $(this).data('rent-id');
               
        // User confirmed, proceed with the upadte
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'checking_accept': true,
                        'rent_id': rent_id,
                    },
                    success: function (response) {
                        console.log(response);
                        var acceptTd = $('.last_row_'+rent_id);
                        acceptTd.html('<label>Accepted</label>');
                    }
                });
            });
        });

        function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetch_ReserveList.php",
                success: function (response) {
                    $.each(response, function (key, value) { 
                        var htmlString =
                        // '<link rel="stylesheet" href="../styles/reserve_list.css">'+
                        '<tr class="each_person_data">'+     

                        '<tr class="rent_data" id="tr_'+value['ID']+'" style="border: none">'+
                            '<td class="first_row_col rmv_border">\
                                <span class="text-muted mb-1">Customer ID:</span>\
                                <span class="badge rounded text-black d-inline ms-1">'+value['c_id']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Pick-up Point:</span>\
                                <span class="badge  rounded text-black d-inline ms-1"> UIU permenant campus, Dhaka</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Date:</span>\
                                <span class="badge  rounded text-black d-inline ms-1">'+value['pickup_date']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Time:</span>\
                                <span class="badge  rounded text-black d-inline ms-1">'+value['time_pickup']+'</span>\
                            </td>\
                            <td class="rmv_border">';

                        if (value['d_id'] == 100) {
                            htmlString += '<span class="badge  rounded text-black d-inline ms-1">Self-drive</span>';
                        } else {
                            htmlString += '<span class="text-muted mb-0 ">Driver ID:</span>\
                                <span class="badge  rounded text-black d-inline ms-1">'+value['d_id']+'</span>';
                        }

                        htmlString += '</td>\
                        </tr>\
                        <tr id="second_tr_'+value['ID']+'" style="border: none">'+
                            '<td class="first_row_col rmv_border">\
                                <span class="text-muted mb-1">Vehicle Model:</span>\
                                <span class="badge text-black  rounded">'+value['veh_model']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Destination:</span>\
                                <span class="badge  rounded text-black d-inline ms-3">Ekota Tower,Sanarpar,Siddirganj,Narayanganj</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Date:</span>\
                                <span class="badge text-black  rounded">'+value['dst_date']+'</span>\
                            </td>\
                            <td class="rmv_border">\
                                <span class="text-muted mb-0 ">Time:</span>\
                                <span class="badge text-black rounded">'+value['time_dst']+'</span>\
                            </td>\
                            <td class="rmv_border last_row_'+value['ID']+'">';

                        if (value['d_id'] != 100) {
                            if (value['verified'] == 0) {
                                htmlString += '<a href="#" type="submit" class="btn btn-link btn-sm px-3 accept_btn" data-ripple-color="dark" title="Accept" name="acceptBtn" data-rent-id="'+value['ID']+'">\
                                    <i class="fa-regular fa-circle-check"></i>\
                                </a>\
                                <a href="#" type="submit" class="btn btn-link btn-sm px-3 delete_btn" data-ripple-color="dark" title="Reject" name="rejectBtn" data-rent-id="'+value['ID']+'">\
                                    <i class="fa-sharp fa-solid fa-trash"></i>\
                                </a>';
                            }

                            if(value['verified']==1){
                                htmlString+='<label > Accepted</label>';
                            }
                        } 
                        htmlString += '</td>\
                        </tr>\
                        </tr>';

                        $('.content').append(htmlString);
                    });
                }
            });
        }
    </script>