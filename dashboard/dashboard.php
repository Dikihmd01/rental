<?php
include "../config/koneksi.php";
include('../templates/header.php');
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include('../templates/breadcumb.php') ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h3>Selamat Datang, <?= $_SESSION['nama_lengkap']; ?>!</h3>
            </div>
            <?php
            if ($_SESSION['level'] == "admin") { ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Mobil</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php 
                                        $sql = "SELECT COUNT(*) FROM tbl_mobil_dikihamdani";
                                        $query = mysqli_query($koneksi, $sql);
                                        $count_mobil = mysqli_fetch_array($query);
                                        echo $count_mobil[0];
                                        ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pelanggan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php 
                                        $sql = "SELECT COUNT(*) FROM tbl_pelanggan_dikihamdani";
                                        $query = mysqli_query($koneksi, $sql);
                                        $count_pelanggan = mysqli_fetch_array($query);
                                        echo $count_pelanggan[0];
                                        ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Transaksi</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php 
                                        $sql = "SELECT COUNT(*) FROM tbl_rental_dikihamdani";
                                        $query = mysqli_query($koneksi, $sql);
                                        $count_transaksi = mysqli_fetch_array($query);
                                        echo $count_transaksi[0];
                                        ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row my-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>10 Rental Terakhir</h6>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                               <a href="../rental/rental_view.php?page=rental" class="text-secondary text-xs font-weight-bolder opacity-7">Lihat Semua Transaksi</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                            No.
                                        </th>
                                        <?php if ($_SESSION['level'] == "admin") { ?>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            No Transaksi
                                        </th>
                                        <?php } ?>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Pelanggan
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Mobil
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Rental
                                        </th>
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
                                    ORDER BY
                                        tgl_rental_dikihamdani DESC
                                    LIMIT 10
                                    ";
                                    $query = mysqli_query($koneksi, $sql);
                                    while ($data = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0"><?= $no; ?></p>
                                            </td>
                                            <?php if ($_SESSION['level'] == "admin") { ?>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['no_trx_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <?php } ?>
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
                                            <td class="align-middle">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['tgl_rental_dikihamdani']; ?>
                                                </p>
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
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>3 Mobil Paling Sering di Rental</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline timeline-one-side">
                            <?php
                            $no = 0;
                            $sql = "
                            SELECT
                                tbl_mobil_dikihamdani.*,
                                COUNT(tbl_rental_dikihamdani.no_plat_dikihamdani) as rental_count
                            FROM
                                tbl_rental_dikihamdani
                            INNER JOIN
                                tbl_pelanggan_dikihamdani
                            ON
                                tbl_rental_dikihamdani.nik_ktp_dikihamdani = tbl_pelanggan_dikihamdani.nik_ktp_dikihamdani
                            INNER JOIN
                                tbl_mobil_dikihamdani
                            ON
                                tbl_rental_dikihamdani.no_plat_dikihamdani = tbl_mobil_dikihamdani.no_plat_dikihamdani
                            GROUP BY
                                tbl_mobil_dikihamdani.no_plat_dikihamdani
                            ORDER BY
                                rental_count DESC
                            LIMIT 3;
                            ";
                            $query = mysqli_query($koneksi, $sql);
                            while ($data = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                            <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <?= $no; ?>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">
                                        <?= $data['nama_mobil_dikihamdani'] ?>
                                        &nbsp;<span class="badge bg-info"><?= $data['brand_mobil_dikihamdani'] ?></span>
                                    </h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                        <?= $data['rental_count'] ?> kali dirental    
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('../templates/footer.php') ?>