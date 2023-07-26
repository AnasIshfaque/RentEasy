<?php
include '../admin/admin_navbar.php';
?>
<link rel="stylesheet" href="../styles/driver.css">
<!-- profile section -->
<section class="profile">
    <div class="imgDiv">
        <img class="proImg" src="../assets/images/ProfileImg/per-1.jpg" alt="">
        <h2>MD. Habibur Rahaman</h2>
    </div>
    <div class="tripInfo">
        <div class="t1">
            <h2>2,348</h2>
            <label for="">Trip</label>
        </div>
        <div class="t1">
            <h2>4.8 <i class="fa-solid fa-star" style="color: #ffc800;"></i></h2>
            <label for="">Rating</label>
        </div>
        <div class="t1">
            <h2>10,000tk</h2>
            <label for="">Total income</label>
        </div>
        <div class="t1">
            <h2>2</h2>
            <label for="">Year</label>
        </div>
    </div>
    <hr>
    <div class="location">
        <p><i class="fa-solid fa-globe"></i> speaks <strong>English</strong> and <strong>Bangla</strong></p>
        <p><i class="fa-solid fa-location-dot"></i> From <strong>Boalkhali,Chittagong</strong></p>
       </div>
</section>
<!-- driver skill -->
 <section class="skill">
    <h2>Vehicle Skills</h2>
      <div class="type">
          <p>Toyota premio</p>
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
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
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
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <h5 class="mb-3">Lisa Cudrow</h5>
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
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
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


<!-- driver achivment -->

<section class="achievment">
    <h2>Driver achievments</h2>
    <div class="add-achievments">
        <div class="ac1">
             <img class="acvImg" src="../assets/images/achivement/5-star1.jpg" alt="" srcset="">
             <p>50 5-star trip</p>
        </div>
        <div class="ac1">
            <img class="acvImg"  src="../assets/images/achivement/2-year.jpg" alt="">
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