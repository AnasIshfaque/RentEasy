<?php
include '../partials/header.php';
include '../config/db_conn.php';
include '../config/functions.php';
$driverId = $_SESSION['ID'];// Example driver ID

// Fetch driver information from the database
$query = "
      SELECT u.name,u.email, d.*
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
?>

<link rel="stylesheet" href="../styles/driver.css">
<!-- profile section -->
<section class="profile">
  <div class="imgDiv">
    <img class="proImg" src="../assets/images/ProfileImg/per-1.jpg" alt="">
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
<section class="skill">
  <div class="row">
    <div class="col v-skill">
      <h2>Skills</h2>
      <div class="lic">
        <h4>license</h4>
        <p>ID: NDK1039220439022</p>
        <a href="">View</a>
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
                <tr>
                  <th scope="row">1</th>
                  <td>Mohamod jamil</td>
                  <td>Boalkhali</td>
                  <td>GEC more</td>
                  <td>700tk</td>
                  <td>3 min ago</td>
                  <td>
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Mohamod jamil</td>
                  <td>Boalkhali</td>
                  <td>GEC more</td>
                  <td>700tk</td>
                  <td>3 min ago</td>
                  <td>
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Mohamod jamil</td>
                  <td>Boalkhali</td>
                  <td>GEC more</td>
                  <td>700tk</td>
                  <td>3 min ago</td>
                  <td>
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Mohamod jamil</td>
                  <td>Boalkhali</td>
                  <td>GEC more</td>
                  <td>700tk</td>
                  <td>3 min ago</td>
                  <td>
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="text-center">
              <button type="button" class="btn btn-primary">View All</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
    <div class="ac1">
      <img class="acvImg" src="../assets/images/achivement/5-star1.jpg" alt="" srcset="">
      <p>50 5-star trip</p>
    </div>
    <div class="ac1">
      <img class="acvImg" src="../assets/images/achivement/2-year.jpg" alt="">
      <p>2 year with <br> rentEasy</p>
    </div>
    <div class="ac1">
      <img class="acvImg" src="../assets/images/achivement/late-night.jpg" alt="">
      <p>100 late night <br> Trip</p>
    </div>

  </div>
</section>
<?php
  include '../partials/footer.php';
?>