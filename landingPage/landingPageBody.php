<?php
include '../loginPage/loginModal.php';
?>

<div class="hero">
    <div class="heroContent">
        <h1>Renting made <span>Easy!</span></h1>
        <p>Find the best rental deals closest to you in no time with our simple renting steps.</p>
        <a href="../SignupPage/signup_option.php" class="heroBtn">
            Start today
            <i class="fa-solid fa-circle-arrow-right"></i>
        </a>
    </div>
    <div class="searchArea">
        <div class="rentSearchBox">
            <div class="location">
                <p>Location</p>
                <input type="text" placeholder="Search your location">
                <button><i class="fa-solid fa-location-dot"></i></button>
            </div>
            <div class="pickupDate">
                <p>Pickup Date</p>
                <input type="date" placeholder="Pickup Date">
            </div>
            <div class="dropoffDate">
                <p>Dropoff Date</p>
                <input type="date" placeholder="Dropoff Date">
            </div>
            <button class="searchBtn">Search</button>
        </div>
    </div>
</div>

<div class="brandLogos">
    <img src="../assets/images/brandlogos/mazda.png" alt="mazda">
    <img src="../assets/images/brandlogos/audi.png" alt="audi">
    <img src="../assets/images/brandlogos/volkswagen-new.png" alt="">
    <img src="../assets/images/brandlogos/bmw.png" alt="bmw">
    <img src="../assets/images/brandlogos/mercedes-new.png" alt="mercedes">
    <img src="../assets/images/brandlogos/ford.jpg" alt="ford">
    <img src="../assets/images/brandlogos/nissan.jpg" alt="nissan">
</div>

<p class="work_title">HOW IT WORKS</p>
<h1 class="work_title">Rent with following 3 working steps</h1>

<div class="rentSteps">
    <div class="step">
        <div class="step1box">
            <i class="fa-solid fa-location-dot fa-lg"></i>
        </div>
        <h2>Choose location</h2>
        <p>Choose your location and find your best car.</p>
    </div>
    <hr>
    <div class="step">
        <div class="step2box">
            <i class="fa-solid fa-calendar-days fa-lg"></i>
        </div>
        <h2>Pick-up date</h2>
        <p>Select your pick-up date and time to book your car.</p>
    </div>
    <hr>
    <div class="step">
        <div class="step3box">
            <i class="fa-solid fa-car fa-lg"></i>
        </div>
        <h2>Book your car</h2>
        <p>Book your car and we will deliver it directly to you.</p>
    </div>

</div>