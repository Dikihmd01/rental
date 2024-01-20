<?php
include "../config/koneksi.php";
session_start();

$no_plat = $_GET['no_plat'];
$query = "
    DELETE FROM tbl_mobil_dikihamdani
    WHERE
    no_plat_dikihamdani='$no_plat'
";
$delete = mysqli_query($koneksi, $query);

if ($delete) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = "Mobil " . $delete['nama_mobil_dikihamdani'] . " berhasil dihapus.";
    header("location:mobil_view.php?page=mobil");
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = "Ooops.. terjadi kesalahan! Mobil " . $delete['nama_mobil_dikihamdani'] . " gagal dihapus.";
    header("location:mobil_view.php?page=mobil");
}
?>