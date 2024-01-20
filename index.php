<?php

session_start();
if (!empty($_SESSION['username']) and !empty($_SESSION['password'])) {
    header('location:dashboard/dashboard.php?page=dashboard');
} else {
    header("location:login.php");
}

?>
