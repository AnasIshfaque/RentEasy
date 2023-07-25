<link rel="stylesheet" href="../styles/admin_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php
    include('admin_navbar.php');
    include '../config/db_conn.php';
 
?>
<div class="dashboardof_Admin">
    <div class="rentalDetails" >
        <div class="map_of_first_Car">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14612.975403928907!2d90.497437!3d23.70298445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1690220726108!5m2!1sen!2sbd" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="car_number_one">

        <div class="first_car">
            <img src="../assets/images/car_images/Honda_CR-V.png" alt="Honda CR-V" width="45%" height="90%">
                <div class="car_details">
                    <h3 class="car_model">Honda CR-V</h3>
                    <p class="car_model">SUV</p>
                </div>
        </div>

        <h6 style="margin-left: 1%;">Pick-Up</h6>
        <div class="first_car_pickup">
            <i class="fa-solid fa-location-dot fa-lg location_icon"></i> <input type="text" name="" id="" placeholder="Narayanganj" readonly class="pick_up_details">
            <i class="fa-regular fa-calendar-days fa-lg location_icon"></i><input type="text" name="" id="" placeholder="24 July 2023" readonly class="pick_up_details">
            <i class="fa-regular fa-clock fa-lg location_icon"></i><input type="text" name="" id="" placeholder="07:00 AM" readonly>
        </div>

        <h6 style="margin-left: 1%;">Drop-Off</h6>
        <div class="first_car_pickup">
            <i class="fa-solid fa-location-dot fa-lg location_icon"></i> <input type="text" name="" id="" placeholder="UIU Permanent Campus" readonly class="pick_up_details">
            <i class="fa-regular fa-calendar-days fa-lg location_icon"></i><input type="text" name="" id="" placeholder="24 July 2023" readonly class="pick_up_details">
            <i class="fa-regular fa-clock fa-lg location_icon"></i><input type="text" name="" id="" placeholder="08:00 AM" readonly>
        </div>
        </div>

    </div>

    <div class="transaction_pieChart">
        <div class="top_rentals">
            <div id="donutchart" style="width: 700px; height: 325px;"></div>
        </div>
        
        <div class="recent_transaction">
            <table class="table caption-top">
                <div class="head_of_transaction_table">
                    <p class="header_recent_data">Recent Transaction</p>
                    <a href="#" class="header_recent_data">View All</a>
                </div>
                <tbody>
                    <tr>
                        <th><img src="../assets/images/car_images/Honda_CR-V.png" alt="Honda CR-V" height="80px" width="100px"></th>
                        <td class="recent_vehicle_data">
                            <p>Honda CR-V</p>
                            <p class="recent_vehicle_td">SUV</p>
                        </td>
                        <td>
                            <p>24 July</p>
                            <p class="recent_vehicle_td">Tk 3150</p>
                        </td>
                    </tr>
                    <tr>
                        <th><img src="../assets/images/car_images/Premio.png" alt="Honda CR-V" height="90px" width="150px"></th>
                        <td class="recent_vehicle_data">
                            <p>Toyota Premio</p>
                            <p class="recent_vehicle_td">Car</p>
                        </td>
                        <td>
                            <p>23 July</p>
                            <p class="recent_vehicle_td">Tk 1650</p>
                        </td>
                    </tr>
                    <tr>
                        <th><img src="../assets/images/car_images/Axio.png" alt="Honda CR-V" height="90px" width="150px"></th>
                        <td class="recent_vehicle_data">
                            <p>Toyota Axio</p>
                            <p class="recent_vehicle_td">Car</p>
                        </td>
                        <td>
                            <p>23 July</p>
                            <p class="recent_vehicle_td">Tk 1450</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php
include '../partials/footer.php';
?>
   <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Toyota - 11',     11],
          ['Audi - 2',      2],
          ['BMW - 1',  1],
          ['MG - 2', 2],
          ['Honda - 7',    7]
        ]);

        var options = {
          title: 'Top 5 Rental Vehicle ',
          pieHole: 0.6,
          pieSliceText: 'none',
          tooltip: {
                text: '10% percentage' // Show the percentage in the tooltip
            },
            colors: ['#0D3559', '#175D9C', '#2084DE', '#63A9E8', '#A6CEF2'] // Custom colors for the slices

        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
