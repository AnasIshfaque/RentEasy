<?php
include '../config/db_conn.php';
include '../config/functions.php';
include '../partials/header.php';
if (isLoggedin() == false) {
    header('Location:../landingPage/index.php');
}
$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>

<h1 id="greetings">Welcome <?php echo $_SESSION['name']; ?>!</h1>

<hr class="divider">

<section>
    <div class="rideTitle">
        <img class="carIcon" src="../assets/images/icons/ride_car.png" alt="ride car">
        <h2>Book a Ride</h2>
    </div>
    <div class="ride">
        <div id="ride_map"></div>
        <div class="rideInfoBox">
            <h5>Ride details</h5>
            <p id="carReqMsg">Select a car from the map</p>
            <div id="rideInfo"></div>
        </div>
    </div>
</section>

<hr class="divider">

<section>
    <div class="rideTitle">
        <img class="carIcon" src="../assets/images/icons/rent_car.png" alt="rent car">
        <h2>Planned</h2>
    </div>
</section>

<script src="../config/js/map_api.js"></script>
</body>

</html>