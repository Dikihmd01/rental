<?php
include('../config/koneksi.php');
include('../templates/header.php');
$className = "";
if ($_SESSION['level'] == "user") {
    $className = "d-none";
}
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include('../templates/breadcumb.php') ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <?php
                include('../templates/alert.php');
                ?>
                <a href="rental_form_view.php?page=rental&action=create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Transaksi Baru</a>
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-8">
                                <h6>Data Transaksi Rental</h6>
                            </div>
                            <div class="col-md-4">
                                <form action="rental_view.php?page=rental&action=search" method="POST">
                                    <div class="input-group float-end mb-3">
                                        <?php
                                        if ($_GET['action'] == 'search') { ?>
                                            <input type="text" name="keyword" class="form-control" value="<?= $_POST['keyword']; ?>" aria-label="Keyword" aria-describedby="btn-search">
                                        <?php } else { ?>
                                            <input type="text" name="keyword" class="form-control" placeholder="Masukkan No. Trx" aria-label="Keyword" aria-describedby="btn-search">
                                        <?php } ?>
                                        <input class="btn btn-outline-primary mb-0" type="submit" name="cari" value="Cari" id="btn-search"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                            No.
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            No Transaksi
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Pelanggan
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Mobil
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Tanggal Rental
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Jam Rental
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Harga
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Lama Rental
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Total Bayar
                                        </th>
                                        <th class="text-secondary opacity-7 <?= $className ?>"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $sql = "
                                    SELECT * FROM
                                        tbl_rental_dikihamdani
                                    INNER JOIN
                                        tbl_pelanggan_dikihamdani
                                    ON
                                        tbl_rental_dikihamdani.nik_ktp_dikihamdani=tbl_pelanggan_dikihamdani.nik_ktp_dikihamdani
                                    INNER JOIN
                                        tbl_mobil_dikihamdani
                                    ON
                                    tbl_rental_dikihamdani.no_plat_dikihamdani=tbl_mobil_dikihamdani.no_plat_dikihamdani
                                    ";
                                    $keyword = "";
                                    if (isset($_POST['cari'])) {
                                        $keyword = $_POST['keyword'];
                                    }
                                    if ($keyword != "") {
                                        $sql = "
                                        SELECT * FROM
                                            tbl_rental_dikihamdani
                                        INNER JOIN
                                            tbl_pelanggan_dikihamdani
                                        ON
                                            tbl_rental_dikihamdani.nik_ktp_dikihamdani=tbl_pelanggan_dikihamdani.nik_ktp_dikihamdani
                                        INNER JOIN
                                            tbl_mobil_dikihamdani
                                        ON
                                            tbl_rental_dikihamdani.no_plat_dikihamdani=tbl_mobil_dikihamdani.no_plat_dikihamdani
                                        WHERE
                                            no_trx_dikihamdani
                                        LIKE '%$keyword%'
                                        ";
                                    }
                                    $query = mysqli_query($koneksi, $sql);
                                    while ($data = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0"><?= $no; ?></p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['no_trx_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['nama_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs font-weight-bold mb-0">
                                                <?= $data['nama_mobil_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['tgl_rental_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['jam_rental_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= 'Rp ' . number_format($data['harga_dikihamdani'], 0, ',', '.'); ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['lama_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs font-weight-bold mb-0">
                                                <?= 'Rp ' . number_format($data['total_bayar_dikihamdani'], 0, ',', '.'); ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center <?= $className ?>">
                                                <a href="rental_form_view.php?page=rental&action=edit&no_trx=<?= $data['no_trx_dikihamdani'] ?>" class="btn btn-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="rental_action_delete.php?no_trx=<?= $data['no_trx_dikihamdani'] ?>" class="btn btn-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php 
                                    } 
                                    if ($no == 0) { ?>
                                    <tr class="text-center">
                                        <td colspan="10">Tidak ada data untuk ditampilkan.</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('../templates/footer.php') ?>