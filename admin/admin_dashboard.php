<link rel="stylesheet" href="../styles/admin_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php
    include('admin_navbar.php');
    include '../config/db_conn.php';
    // query for the pie chart
    $query = "SELECT vehicle.model, COUNT(*) AS total_cars FROM renting INNER JOIN vehicle ON vehicle.ID = renting.v_id GROUP BY vehicle.model LIMIT 5";
    $result=mysqli_query($conn,$query);
?>
<div class="dashboardof_Admin">
    <div class="rentalDetails" >
        <div class="map_of_first_Car">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14612.975403928907!2d90.497437!3d23.70298445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1690220726108!5m2!1sen!2sbd" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="car_number_one">
        <?php 
            $sql1="SELECT renting.model, renting.cartype, renting.pickup, renting.dst, Date(pickup_time) as pick_date, Time(pickup_time) as pick_time, Date(dst_time) as desti_date, Time(dst_time) as desti_time, vehicle.image FROM renting INNER JOIN vehicle on vehicle.ID=renting.v_id ORDER BY dst_time DESC LIMIT 1";
            $result2=mysqli_query($conn,$sql1);
            $info1 = mysqli_fetch_array($result2)
        ?>

        <div class="first_car">
            <img src="uploads/<?php echo $info1['image'] ?>" id="latest_Car_img" alt="Honda CR-V" width="45%" height="90%">
                <div class="car_details">
                    <h3 class="car_model"><?php echo $info1['model'] ?></h3>
                    <p class="car_model"><?php echo $info1['cartype'] ?></p>
                </div>
        </div>
        
        <h6 style="margin-left: 1%;">Pick-Up</h6>
        <div class="first_car_pickup">
            <i class="fa-solid fa-location-dot fa-lg location_icon"></i> <input type="text" name="" id="" placeholder="<?php echo $info1['pickup'] ?>" readonly class="pick_up_details">
            <i class="fa-regular fa-calendar-days fa-lg location_icon"></i><input type="text" name="" id="" placeholder="<?php echo $info1['pick_date'] ?>" readonly class="pick_up_details">
            <i class="fa-regular fa-clock fa-lg location_icon"></i><input type="text" name="" id="" placeholder="<?php echo $info1['pick_time'] ?>" readonly>
        </div>

        <h6 style="margin-left: 1%;">Drop-Off</h6>
        <div class="first_car_pickup">
            <i class="fa-solid fa-location-dot fa-lg location_icon"></i> <input type="text" name="" id="" placeholder="<?php echo $info1['dst'] ?>" readonly class="pick_up_details">
            <i class="fa-regular fa-calendar-days fa-lg location_icon"></i><input type="text" name="" id="" placeholder="<?php echo $info1['desti_date'] ?>" readonly class="pick_up_details">
            <i class="fa-regular fa-clock fa-lg location_icon"></i><input type="text" name="" id="" placeholder="<?php echo $info1['desti_time'] ?>" readonly>
        </div>
        </div>

    </div>

    <div class="transaction_pieChart">
        <div class="top_rentals">
            <!-- <div id="donutchart" style="width: 700px; height: 325px;"></div> -->
            <div id="donutchart"></div>
        </div>
        <div class="recent_transaction">
            <table class="table caption-top">
                <div class="head_of_transaction_table">
                    <p class="header_recent_data1">Recent Transaction</p>
                    <!-- <a href="#" class="header_recent_data">View All</a> -->
                </div>
                <tbody>
                <?php
                    $sql="SELECT renting.rent_fee, vehicle.model,vehicle.number, vehicle.v_type,vehicle.image, Date(dst_time) as date, Time(dst_time) as time FROM renting INNER JOIN vehicle on vehicle.ID=renting.v_id ORDER BY dst_time DESC LIMIT 5";
                    $result1=mysqli_query($conn,$sql);
                    while ($info = mysqli_fetch_array($result1)){
                ?>
                    <tr>
                        <th class="Recent_Transaction_th" style="padding: 0px;"><img src="uploads/<?php  echo $info['image'] ?>" alt="Honda CR-V" height="80px" width="100px"></th>
                        <td class="recent_vehicle_data">
                            <p><?php echo $info['model'] ?></p>
                            <p class="recent_vehicle_td">Vehicle Number: <?php echo $info['number'] ?></p>
                        </td>
                        <td class="recent_vehicle_data">
                            <p><?php echo $info['date'] ?></p>
                            <p class="recent_vehicle_td"><?php echo $info['time'] ?></p>
                        </td>
                        <td>
                            <p><?php echo $info['v_type'] ?></p>
                            <p class="recent_vehicle_td"><?php echo $info['rent_fee'] ?> BDT</p>
                        </td>
                    </tr>
                    <?php
                     }
                    ?>
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
          ['Car Model', 'Number of Cars'],
        <?php  
            while($row = mysqli_fetch_array($result))  
            {  
                echo "['".$row["model"]."', ".$row["total_cars"]."],";  
            }  
            ?> 
        ]);

        var options = {
          title: 'Top 5 Rental Vehicle ',
          pieHole: 0.6,
          width: 700,
          height: 325,
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