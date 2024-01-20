<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "rental_mobil_dikihamdani";
$koneksi = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
    trigger_error(
        'Koneksi ke database gagal: ' . mysqli_connect_error(),
        E_USER_ERROR
    );
}
