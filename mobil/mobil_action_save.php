<?php

include "../config/koneksi.php";
session_start();

if (isset($_POST['form_mode']) == 'edit') {
    $no_plat = $_POST['no_plat'];
    $query = "
        UPDATE tbl_mobil_dikihamdani
        SET 
        no_plat_dikihamdani = '$_POST[no_plat]',
        nama_mobil_dikihamdani = '$_POST[nama_mobil]',
        brand_mobil_dikihamdani = '$_POST[brand_mobil]',
        tipe_transmisi_dikihamdani = '$_POST[tipe_transmisi]'
        WHERE
        no_plat_dikihamdani = '$no_plat'
    ";
    $update = mysqli_query($koneksi, $query);
    if ($update) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = "Mobil dengan plat nomor " . $no_plat . " berhasil disimpan.";
        header("location:mobil_view.php?page=mobil");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Ooops.. terjadi kesalahan! Mobil dengan plat nomor " . $no_plat . " gagal disimpan.";
        header("location:mobil_view.php?page=mobil");
    }
}
else {
    $query = "
        INSERT INTO tbl_mobil_dikihamdani
        VALUES(
            '$_POST[no_plat]',
            '$_POST[nama_mobil]',
            '$_POST[brand_mobil]',
            '$_POST[tipe_transmisi]'
        )
    ";
    $insert = mysqli_query($koneksi, $query);
    if ($insert) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = "Mobil " . $_POST['nama_mobil'] . " berhasil disimpan.";
        header("location:mobil_view.php?page=mobil");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Ooops.. terjadi kesalahan! Mobil " . $_POST['nama_mobil'] . " gagal disimpan.";
        header("location:mobil_view.php?page=mobil");
    }
}

?>