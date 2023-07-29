<li class="nav-item">
    <a class="nav-link text-white" href="../admin/admin_dashboard.php">Dashboard</a>
</li>
<li class="nav-item">
    <a class="nav-link text-white nav_site" href="../admin/admin_reserve_list_using_jquery_and_ajax.php">Reserve List</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">Vehicle</a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <li>
            <a class="dropdown-item text-black" href="../admin/admin_car.php">Car</a>
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
    <a class="nav-link text-white" href="../admin/admin_customer.php">Customer</a>
</li>
<li class="nav-item">
    <a class="nav-link text-white" href="../admin/admin_driver_using_ajax_jquery.php">Driver</a>
</li>
</ul>

<div class="d-flex align-items-center">

    <!-- Notifications -->
    <div class="dropdown">
        <a class="text-white me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <?php
                require_once '../config/db_conn.php';
                $sql = "SELECT COUNT(verified) AS pending_Case FROM driver_info WHERE verified=0 and ID<>100";
                $query = mysqli_query($conn, $sql);
                $result = mysqli_fetch_assoc($query);
            ?>
            <span class="badge rounded-pill badge-notification bg-danger"><?php echo $result['pending_Case'] > 0 ? $result['pending_Case'] : "" ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
                <a class="dropdown-item" href="new_Driver_using_ajax_jquery.php">Driver Candidates</a>
            </li>
        </ul>
    </div>
    <!-- Avatar -->
    <div class="dropdown">
        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <img src="../assets/images/ProfileImg/admin_profile_pic.png" class="rounded-circle" height="30" alt="Black and White Portrait of a Man" loading="lazy" />
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
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