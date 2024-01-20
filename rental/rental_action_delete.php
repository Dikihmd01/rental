<?php
include "../config/koneksi.php";
session_start();

$no_trx = $_GET['no_trx'];
$query = "
    DELETE FROM
        tbl_rental_dikihamdani
    WHERE
        no_trx_dikihamdani='$no_trx'
";
$delete = mysqli_query($koneksi, $query);

if ($delete) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = "Transaksi dengan nomor " . $no_trx . " berhasil dihapus.";
    header("location:../rental/rental_view.php?page=rental");
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = "Ooops.. terjadi kesalahan! Pelanggan " . $no_trx . " gagal dihapus.";
    header("location:../rental/rental_view.php?page=rental");
}
?>