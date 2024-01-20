<?php

include "../config/koneksi.php";
session_start();

if (isset($_POST['form_mode']) == 'edit') {
    $harga_rental = (int) preg_replace('/[^0-9]/', '', $_POST['harga_rental']);
    $total_bayar = (int) preg_replace('/[^0-9]/', '', $_POST['total_bayar']);
    $query = "
        UPDATE tbl_rental_dikihamdani
        SET
            no_trx_dikihamdani = '$_POST[no_trx]',
            nik_ktp_dikihamdani = '$_POST[nik]',
            no_plat_dikihamdani = '$_POST[no_plat]',
            tgl_rental_dikihamdani = '$_POST[tanggal_rental]',
            jam_rental_dikihamdani = '$_POST[jam_rental]',
            harga_dikihamdani = '$harga_rental',
            lama_dikihamdani = '$_POST[lama_rental]',
            total_bayar_dikihamdani = '$total_bayar'
        WHERE
            no_trx_dikihamdani = '$_POST[no_trx]'
    ";
    $update = mysqli_query($koneksi, $query);
    if ($update) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = "Transaksi dengan nomor " . $_POST['no_trx'] . " berhasil disimpan.";
        header("location:../rental/rental_view.php?page=rental");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Ooops.. terjadi kesalahan! Pelanggan " . $_POST['no_trx'] . " gagal disimpan.";
        header("location:../rental/rental_view.php?page=rental");
    }
} else {
    $harga_rental = (int) preg_replace('/[^0-9]/', '', $_POST['harga_rental']);
    $total_bayar = (int) preg_replace('/[^0-9]/', '', $_POST['total_bayar']);
    $query = "
        INSERT INTO tbl_rental_dikihamdani
        VALUES(
            '$_POST[no_trx]',
            '$_POST[nik]',
            '$_POST[no_plat]',
            '$_POST[tanggal_rental]',
            '$_POST[jam_rental]',
            '$harga_rental',
            '$_POST[lama_rental]',
            '$total_bayar'
        )
    ";
    $insert = mysqli_query($koneksi, $query);
    if ($insert) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = "Transaksi dengan nomor " . $_POST['no_trx'] . " berhasil disimpan.";
        header("location:../rental/rental_view.php?page=rental");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Ooops.. terjadi kesalahan! Pelanggan " . $_POST['no_trx'] . " gagal disimpan.";
        header("location:../rental/rental_view.php?page=rental");
    }
}
