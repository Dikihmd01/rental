<?php
include "../config/koneksi.php";
session_start();

$nik_ktp = $_GET['nik'];
$query = "
    DELETE FROM tbl_pelanggan_dikihamdani
    WHERE
    nik_ktp_dikihamdani='$nik_ktp'
";
$delete = mysqli_query($koneksi, $query);

if ($delete) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = "Pelanggan " . $nik_ktp . " berhasil dihapus.";
    header("location:pelanggan_view.php?page=pelanggan");
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = "Ooops.. terjadi kesalahan! Pelanggan " . $nik_ktp . " gagal dihapus.";
    header("location:pelanggan_view.php?page=pelanggan");
}
?>