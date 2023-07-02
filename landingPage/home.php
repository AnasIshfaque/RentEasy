<?php
include "../landingPage/header.php"
?>

<head>
  <link rel="stylesheet" href="/landingPage/home.css">
</head>

<body>
  <!-- form section -->
  <div class="formSection">
    <div class="container">
      <h1>Rent Today</h1>
      <form action="">
        <div class="row fRow">
          <div class="col loaction">
            <input type="text" placeholder="Pickup location">
            <input type="text" placeholder="Destination">
          </div>
          <div class="col">
            <input type="date">
            <input type="date">
          </div>
          <div class="col">
            <input type="time" placeholder="Setect time">
            <input type="time">
          </div>
          <div class="col">
            <input type="date">
            <select id="cars" name="cars">
              <option value="volvo">Vehicle type</option>
              <option value="saab">Car</option>
              <option value="fiat">Bus</option>
              <option value="audi">Truck</option>
            </select>
          </div>
          <!-- Select Button -->
          <div class="row">
            <div class="col-6">
              <button type="button" class="btn btn-outline-warning btn-Select">Select Car</button>
            </div>
            <div class="col">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Self Drive</label>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Advertisement Section-->
  <div class="advertise">
    <h1>Grab your offer</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. <br> Voluptate dolorem incidunt vitae sit mollitia neque iure sed tenetur porro vel!</p>
    <div id="carouselExampleCaptions" class="carousel slide a-slide" data-bs-ride="carousel">
      <!-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div> -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/S-1.jpg" class="d-block a-img" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>50% off on SUV</h5>
            <p>Some representative placeholder content for the first slide.</p>
            <button type="button" class="btn btn-outline-primary">Veiw offer</button>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/S-2.jpg" class="d-block a-img" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>30% off on every long-term service</h5>
            <p>Some representative placeholder content for the second slide.</p>
            <button type="button" class="btn btn-outline-primary">Veiw offer</button>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/S-4.jpg" class="d-block a-img" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Special 10% off for our regular customer </h5>
            <p>Some representative placeholder content for the third slide.</p>
            <button type="button" class="btn btn-outline-primary">Veiw offer</button>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Our service -->
  <section class="service">
    <h2>Our Service</h2>
    <div class="row">
      <div class="col">
        <h2>Get an Emergency Ambulance <br> Right now</h2>
        <button type="button" class="btn btn-outline-primary">Rent Now</button>
      </div>
      <div class="col">
        <div id="carouselExampleSlidesOnly" class="carousel slide s-slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/Service1.png" class="d-block w-100 sImg" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/Service2.png" class="d-block w-100 sImg" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/Service3.png" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/Service1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/Service2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/Service3.png" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <h2>Running a startup? <br>
          Get your employee a good <br>
          commute</h2>
        <button type="button" class="btn btn-outline-primary">Rent Now</button>
      </div>
    </div>
  </section>
  <!-- Review section -->
  <section>
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8 text-center">
        <h3 class="mb-4">Testimonials</h3>
        <p class="mb-4 pb-2 mb-md-5 pb-md-0">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
          numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
          quisquam eum porro a pariatur veniam.
        </p>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-md-4 mb-5 mb-md-0">
        <div class="d-flex justify-content-center mb-4">
          <img src="ProfileImg/p-1.jpg" class="rounded-circle shadow-1-strong" width="150" height="150" />
        </div>
        <h5 class="mb-3">Maria Smantha</h5>
        <h6 class="text-primary mb-3">Web Developer</h6>
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
          <img src="ProfileImg/p-2.jpg" class="rounded-circle shadow-1-strong" width="150" height="150" />
        </div>
        <h5 class="mb-3">Lisa Cudrow</h5>
        <h6 class="text-primary mb-3">Graphic Designer</h6>
        <p class="px-xl-3">
          <i class="fas fa-quote-left pe-2"></i>Ut enim ad minima veniam, quis nostrum
          exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid commodi.
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
          <img src="ProfileImg/p-3.jpg" class="rounded-circle shadow-1-strong" width="150" height="150" />
        </div>
        <h5 class="mb-3">John Smith</h5>
        <h6 class="text-primary mb-3">Marketing Specialist</h6>
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
</body>