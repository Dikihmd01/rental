<?php

include "../config/koneksi.php";
session_start();

if (isset($_POST['form_mode']) == 'edit') {
    $nik_ktp = $_POST['nik'];
    $query = "
        UPDATE tbl_pelanggan_dikihamdani
        SET 
        nik_ktp_dikihamdani = '$nik_ktp',
        nama_dikihamdani = '$_POST[nama_lengkap]',
        no_hp_dikihamdani = '$_POST[no_hp]',
        alamat_dikihamdani = '$_POST[alamat]'
        WHERE
        nik_ktp_dikihamdani = '$nik_ktp'
    ";
    $update = mysqli_query($koneksi, $query);
    if ($update) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = "Pelanggan " . $_POST['nama_lengkap'] . " berhasil diupdate.";
        header("location:pelanggan_view.php?page=pelanggan");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Ooops.. terjadi kesalahan! Pelanggan " . $_POST['nama_lengkap'] . " gagal diupdate.";
        header("location:pelanggan_view.php?page=pelanggan");
    }
}
else {
    $query = "
        INSERT INTO tbl_pelanggan_dikihamdani
        VALUES(
            '$_POST[nik]',
            '$_POST[nama_lengkap]',
            '$_POST[no_hp]',
            '$_POST[alamat]'
        )
    ";
    $insert = mysqli_query($koneksi, $query);
    if ($insert) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = "Pelanggan " . $_POST['nama_lengkap'] . " berhasil disimpan.";
        header("location:pelanggan_view.php?page=pelanggan");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Ooops.. terjadi kesalahan! Pelanggan " . $_POST['nama_lengkap'] . " gagal disimpan.";
        header("location:pelanggan_view.php?page=pelanggan");
    }
}

?>