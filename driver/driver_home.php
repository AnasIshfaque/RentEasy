<?php

use function PHPSTORM_META\type;

include '../partials/header.php';
include '../config/db_conn.php';
include '../config/functions.php';
$driverId = $_SESSION['ID']; // Example driver ID

// Fetch driver information from the database
$query = "
      SELECT u.name,u.email,u.profileImg, d.*
      FROM driver_info d
      JOIN user u ON d.id = u.id
      WHERE d.id = $driverId
    ";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $driverData = mysqli_fetch_assoc($result);

  // Calculate service time
  $joinTime = strtotime($driverData['date']);
  $currentTime = time();
  $serviceDuration = $currentTime - $joinTime;

  $serviceTime = '';
  if ($serviceDuration >= 365 * 24 * 60 * 60) {
    $years = floor($serviceDuration / (365 * 24 * 60 * 60));
    $serviceTime = $years . ' year' . ($years > 1 ? 's' : '');
  } elseif ($serviceDuration >= 30 * 24 * 60 * 60) {
    $months = floor($serviceDuration / (30 * 24 * 60 * 60));
    $serviceTime = $months . ' month' . ($months > 1 ? 's' : '');
  } else {
    $days = floor($serviceDuration / (24 * 60 * 60));
    $serviceTime = $days . ' day' . ($days > 1 ? 's' : '');
  }
}

// driver achivment
$completedTrips = $driverData['trip'];
$fiveStarTrips = $driverData['countStar'];
$serviceYears = $serviceTime;

// Fetch rent requests along with customer information
$queryRentRequests = "
    SELECT r.*, c.name as customer_name, c.email as customer_email
    FROM rent_request r
    JOIN user c ON r.c_id = c.id
    WHERE r.drv_id = $driverId
    ORDER BY r.req_time DESC
";

$resultRentRequests = mysqli_query($conn, $queryRentRequests);
?>

<link rel="stylesheet" href="../styles/driver.css">
<!-- profile section -->
<section class="profile">
  <div class="imgDiv">
    <img class="proImg" src="../assets/images/ProfileImg/<?php echo $driverData['profileImg']; ?>" alt="">
    <h2><?php echo $driverData['name']; ?></h2>
  </div>
  <div class="tripInfo">
    <div class="t1">
      <h2><?php echo $driverData['trip']; ?></h2>
      <label for="">Trip</label>
    </div>
    <div class="t1">
      <h2><?php echo $driverData['rating']; ?> <i class="fa-solid fa-star" style="color: #ffc800;"></i></h2>
      <label for="">Rating</label>
    </div>
    <div class="t1">
      <h2><?php echo $driverData['total_income']; ?>tk</h2>
      <label for="">Total income</label>
    </div>
    <div class="t1">
      <h2><?php echo $serviceTime; ?></h2>
      <label for="">Service Time</label>
    </div>
  </div>
  <hr>
  <div class="location">
    <p><i class="fa-solid fa-phone"></i> Phone Number: <strong><?php echo $driverData['mobile']; ?></strong></p>
    <p><i class="fa-solid fa-envelope"></i></i> Email: <strong><?php echo $driverData['email']; ?></strong></p>
  </div>
</section>

<!-- driver skill -->
<section class="skill" id="skill">
  <div class="row">
    <div class="col v-skill">
      <h2>Skills</h2>
      <div class="lic">
        <h4>license</h4>
        <p><a href="../assets/images/pdf_uploads/<?php echo $driverData['license']; ?>">View</a> your linecse</p>
      </div>
      <div class="drive">
        <h4>Drive</h4>
        <p>SUV, Crossover, Sedan, Coupe</p>
      </div>
      <div class="tech">
        <h4>Technical skill</h4>
        <p>strong knowledge of traffic laws, maintenance knowledge</p>
      </div>
    </div>
    <div class="col-7">
      <h3>Request form customer</h3>
      <div class="container">
        <div class="row">
          <div class="col-12 table-container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Serial</th>
                  <th scope="col">Customer</th>
                  <th scope="col">pickup</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Price</th>
                  <th scope="col">Time</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $serial = 1;
                while ($row = mysqli_fetch_assoc($resultRentRequests)) {
                  echo '<tr>';
                  echo '<th scope="row">' . $serial . '</th>';
                  echo '<td id="customername_El">' . $row['customer_name'] . '</td>';
                ?>
                  <script>
                    fetch('../api/getGeoCoordinates.php', {
                      method: 'POST',
                      headers: {
                        'Content-Type': 'application/json',
                      },
                      body: JSON.stringify({
                        pickup_loc_id: <?php echo $row['pickup_loc_id']; ?>,
                        dest_loc_id: <?php echo $row['dest_loc_id']; ?>
                      }),
                    }).then(response => response.json()).then(data => {
                      console.log(data.content[0]);

                      fetch('https://revgeocode.search.hereapi.com/v1/revgeocode?at=' + data.content[0].latitude + ',' + data.content[0].longitude + '&limit=1&lang=en-US &apiKey=hpSPdwU1DaymxCsxbBkwD7eV0MtmFvNWhn_FY4aRlFc').then(response => response.json()).then(data => {
                        const destLocCellEl = document.getElementById('pickup_loc_cell_<?php echo $serial; ?>');
                        destLocCellEl.innerHTML = data.items[0].address.label + " Pickup";
                        console.log(data.items[0].address.label);
                      }).catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                      });

                      fetch('https://revgeocode.search.hereapi.com/v1/revgeocode?at=' + data.content[1].latitude + ',' + data.content[1].longitude + '&limit=1&lang=en-US &apiKey=hpSPdwU1DaymxCsxbBkwD7eV0MtmFvNWhn_FY4aRlFc').then(response => response.json()).then(data => {
                        const destLocCellEl1 = document.getElementById('dest_loc_cell_<?php echo $serial; ?>');
                        destLocCellEl1.innerHTML = data.items[0].address.label + " Destination";
                        console.log(data.items[0].address.label);
                      }).catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                      });

                    }).catch(error => {
                      console.error('There has been a problem with your fetch operation:', error);
                    });
                  </script>
                <?php
                echo '<td id="pickup_loc_cell_' . $serial . '"></td>';
    
                // Create a placeholder for destination location
                echo '<td id="dest_loc_cell_' . $serial . '"></td>';
                  echo '<td>' . $row['rent_fee'] . '</td>';
                  echo '<td>' . $row['req_time'] . '</td>';
                  echo '<td>';
                  echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-check"></i></button>';
                  echo '<button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>';
                  echo '</td>';
                  echo '</tr>';
                  $serial++;
                }
                ?>
              </tbody>
            </table>
            <div class="text-center">
              <a href="tableView.php" class="btn btn-primary">View All</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- if driver accept -->
<section id="accept" class="accept" style="display: none;">
  <?php include '../driver/driver_accept.php'; ?>
</section>

<!-- Rider review  -->
<section>
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-xl-8 text-center">
      <h3 class="mb-4">Testimonials</h3>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-md-4 mb-5 mb-md-0">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp" class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">Maria Smantha</h5>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet, consectetur
        adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab hic
        tenetur.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star-half-alt fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
    <div class="col-md-4 mb-5 mb-md-0">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp" class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">Lisa Cudrow</h5>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>Ut enim ad minima veniam, quis nostrum
        exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid commodi. Lorem ipsum dolor sit.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
    <div class="col-md-4 mb-0">
      <div class="d-flex justify-content-center mb-4">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp" class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">John Smith</h5>
      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2"></i>At vero eos et accusamus et iusto odio
        dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.
      </p>
      <ul class="list-unstyled d-flex justify-content-center mb-0">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="far fa-star fa-sm text-warning"></i>
        </li>
      </ul>
    </div>
  </div>
</section>


<!-- driver achivment -->

<section class="achievment">
  <h2>Your achievments</h2>
  <div class="add-achievments">
    <?php
    if ($completedTrips >= 2000) {
      echo '<div class="ac1">';
      echo '<img class="acvImg" src="../assets/images/achivement/2000cb.jpg" alt="">';
      echo '<p>Complete 2000<br> Trips</p>';
      echo '</div>';
    }

    if ($completedTrips >= 4000) {
      echo '<div class="ac1">';
      echo '<img class="acvImg" src="../assets/images/achivement/4000cb.jpg" alt="">';
      echo '<p>Complete 4000<br> Trips</p>';
      echo '</div>';
    }

    if ($fiveStarTrips >= 50) {
      echo '<div class="ac1">';
      echo '<img class="acvImg" src="../assets/images/achivement/5-star1.jpg" alt="" srcset="">';
      echo '<p>50 5-star Trips</p>';
      echo '</div>';
    }

    if ($serviceYears >= 2) {
      echo '<div class="ac1">';
      echo '<img class="acvImg" src="../assets/images/achivement/2-year.jpg" alt="">';
      echo '<p>2 Years with <br> rentEasy</p>';
      echo '</div>';
    }

    ?>

  </div>
</section>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<script>
  const acceptButton = document.getElementById('btn-accept'); // Select the accept button by its ID
  const skillSection = document.getElementById('skill'); // Select the skill section
  const acceptSection = document.getElementById('accept'); // Select the accept section

  acceptButton.addEventListener('click', () => {
    skillSection.style.display = 'none'; // Hide the skill section
    acceptSection.style.display = 'block'; // Show the accept section
  });
</script>
<?php
include '../partials/footer.php';
?>