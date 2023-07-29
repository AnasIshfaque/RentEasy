<?php
    function isLoggedin() {
        if (isset($_SESSION['name'])) {
            return true;
        } else {
            return false;
        }
    }
?>