<?php
session_start();
include "config/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$sql = "
    SELECT * FROM
        tbl_user_dikihamdani
    WHERE
        username_dikihamdani = '$username'
    AND
        password_dikihamdani='$password'
";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

if (!empty($data['username_dikihamdani'])) {
    $_SESSION['username'] = $data['username_dikihamdani'];
    $_SESSION['password'] = $data['password_dikihamdani'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap_dikihamdani'];
    $_SESSION['level'] = $data['level_dikihamdani'];
    echo "<script>alert('Berhasil Login');
    window.location='dashboard/dashboard.php?page=dashboard';</script>";
} else {
    echo "<script>alert('Gagal Login'); window.location='login.php';</script>";
}
?>
