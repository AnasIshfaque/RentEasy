<?php
  include "../partials/header.php";
?>

<!-- conditions to decide which page to show -->
<?php
  if (isset($_SESSION['name'])) {
    if ($_SESSION['type_id'] == 1) {
      include "../customer/homePage.php";
    } else if ($_SESSION['type_id'] == 2) {
      include "../driver/homePage.php";
    } else if ($_SESSION['type_id'] == 3) {
      include "../admin/adminHome.php";
    }
  } else {
    include "landingPageBody.php";
  }
?>

<?php
include '../partials/footer.php';
?>