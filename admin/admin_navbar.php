
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
<!-- Navbar -->
<!-- <link rel="stylesheet" href="../styles/admin_style.css"> -->


<nav class="navbar navbar-expand-lg navbar-info  " >
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars text-white"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="../assets/images/landpg/logo.jpg"
          height="65"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link text-white" href="admin_reserve_list_using_jquery_and_ajax.php">Reserve List</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">Vehicle</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item text-black" href="#">Car</a>
              </li>
              <li>
                <a class="dropdown-item text-black" href="#">Truck</a>
              </li>
              <li>
                <a class="dropdown-item text-black" href="#">Microbus</a>
              </li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="admin_customer.php">Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="admin_driver_using_ajax_jquery.php">Driver</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">


      <!-- Notifications -->
      <div class="dropdown">
        <a
          class="text-white me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fas fa-bell"></i>
          <?php
            require_once '../config/db_conn.php';
            $sql="SELECT COUNT(verified) AS pending_Case FROM driver WHERE verified=0 and ID<>100";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            // $pendingCaseCount = $result['pending_Case'];

          ?>
          <span class="badge rounded-pill badge-notification bg-danger"><?php echo $result['pending_Case']>0 ? $result['pending_Case'] :"" ?></span>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <li>
            <a class="dropdown-item" href="new_Driver_using_ajax_jquery.php">Driver Candidates</a>
          </li>
          <!-- <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li> -->
        </ul>
      </div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="../assets/images/ProfileImg/admin_profile_pic.png"
            class="rounded-circle"
            height="30"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item text-black" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item text-black" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item text-black" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
