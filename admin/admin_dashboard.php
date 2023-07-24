<link rel="stylesheet" href="../styles/admin_style.css">

<?php
    include('admin_navbar.php');
    include '../config/db_conn.php';
 
?>
<div class="dashboardof_Admin">
    <div class="rentalDetails" >
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima aliquid adipisci nemo ratione ab cumque pariatur facere praesentium recusandae expedita perspiciatis rem fugiat delectus doloribus a, magnam veritatis inventore eaque!</p>
    </div>
    <div class="transaction_pieChart">
        <div class="top_rentals">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ratione suscipit, similique corrupti recusandae possimus dolorum. Laborum quibusdam tempora nam error architecto itaque neque, facilis veniam quasi possimus, eaque placeat.</p>
        </div>
        <div class="recent_transaction">
            <table class="table caption-top">
                <div class="head_of_transaction_table">
                    <p>Recent Transaction</p>
                    <a href="">View All</a>
                </div>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php
include '../partials/footer.php';
?>