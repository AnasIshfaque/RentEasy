<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/landingPg.css">
  <link rel="stylesheet" href="../styles/admin_style.css">
  <link rel="stylesheet" href="../styles/rent.css">
  <link rel="stylesheet" href="../styles/signupPg.css">

  <title>RentEasy</title>
</head>

<body>
  <header>
    <nav>
      <img src="../assets/images/landpg/logo.jpg" alt="renteasy logo" class="logoImg">
      <ul>
      <?php 
          session_start(); 
          if (isset($_SESSION['name'])) {
            //type_id = 1 -> customer
            if ($_SESSION['type_id'] == 1) {
              echo '<li><a class="nav_links" href="../landingPage/index.php">Home</a></li>';
              echo '<li><a class="nav_links" href="vehicle.php">Rent History</a></li>';
              echo '<li><a class="nav_links" href="services.php">Emergency service</a></li></ul>';

            }
            //type_id = 2 -> driver 
            else if ($_SESSION['type_id'] == 2) {
              echo '<li><a class="nav_links" href="../landingPage/index.php">Home</a></li>';
              echo '<li><a class="nav_links" href="vehicle.php">Wallet</a></li>';
              echo '<li><a class="nav_links" href="services.php">Achivements</a></li></ul>'; 

            }
            //type_id = 3 -> admin 
            // else if ($_SESSION['type_id'] == 3) {
            //   include "admin_nav_links.php";
            // }
            echo '<div class="navBtns">';
              echo '<a href="../partials/logout.php" class="logoutBtn">Log out</a>';
            echo '</div>';
          }
          else {
            echo '<li><a class="nav_links" href="../landingPage/index.php">Home</a></li>';
            echo '<li><a class="nav_links" href="vehicle.php">Vehicle</a></li>';
            echo '<li><a class="nav_links" href="services.php">Our Service</a></li></ul>';
            echo '<div class="navBtns">';
              echo '<button class="loginBtn">Login</button>';
              echo '<a class="signupBtn" href="../SignupPage/signup_option.php">Signup</a>';
            echo '</div>';
          }
      ?>
      
    </nav>
    
  </header>