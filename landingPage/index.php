<?php
include "../partials/header.php";
?>

<!-- conditions to decide which page to show -->
<?php
  if (isset($_SESSION['name'])) {
    if ($_SESSION['type_id'] == 1) {
      header('Location:../customer/homePage.php');
    } else if ($_SESSION['type_id'] == 2) {
      header('Location:../driver/homePage.php');
    } else if ($_SESSION['type_id'] == 3) {
      header('Location:../admin/admin_dashboard.php');
    }
  } else {
    include "landingPageBody.php";
  }
?>

<?php
  include '../partials/footer.php';
?>