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
                <a href="mobil_form_view.php?page=mobil&action=create" class="btn btn-primary <?= $className ?>">
                    <i class="fa fa-plus"></i> Tambah Mobil Baru
                </a>
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-8">
                                <h6>Data Mobil Rental</h6>
                            </div>
                            <div class="col-md-4">
                                <form action="mobil_view.php?page=mobil&action=search" method="POST">
                                    <div class="input-group float-end mb-3">
                                        <?php
                                        if ($_GET['action'] == 'search') { ?>
                                            <input type="text" name="keyword" class="form-control" value="<?= $_POST['keyword']; ?>" aria-label="Keyword" aria-describedby="btn-search">
                                        <?php } else { ?>
                                            <input type="text" name="keyword" class="form-control" placeholder="Masukkan No. Plat" aria-label="Keyword" aria-describedby="btn-search">
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
                                        <th
                                            class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                            No.
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            No. Plat
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Nama Mobil
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Brand
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Tipe Transmisi
                                        </th>
                                        <th class="text-secondary opacity-7 <?= $className ?>"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $keyword = "";
                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_mobil_dikihamdani");
                                    if (isset($_POST['cari'])) {
                                        $keyword = $_POST['keyword'];
                                    }
                                    if ($keyword != "") {
                                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_mobil_dikihamdani WHERE no_plat_dikihamdani LIKE '%$keyword%'");
                                    }
                                    while ($data = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $no; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $data['no_plat_dikihamdani']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $data['nama_mobil_dikihamdani']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $data['brand_mobil_dikihamdani']; ?>
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php
                                                        if ($data['tipe_transmisi_dikihamdani'] == 'at') {
                                                            echo "Automatic Transmission";
                                                        } 
                                                        else if ($data['tipe_transmisi_dikihamdani'] == 'cvt') {
                                                            echo "Continuously Variable Transmission";
                                                        }
                                                        else if ($data['tipe_transmisi_dikihamdani'] == 'dct') {
                                                            echo "Dual Clutch Transmission";
                                                        }
                                                        else {
                                                            echo "Automated Manual Transmission)";
                                                        }
                                                    ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center <?= $className ?>">
                                            <a href="mobil_form_view.php?page=mobil&action=edit&no_plat=<?= $data['no_plat_dikihamdani'] ?>"
                                                class="btn btn-primary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="mobil_action_delete.php?no_plat=<?= $data['no_plat_dikihamdani'] ?>"
                                                class="btn btn-danger font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                        } 
                                        if ($no == 0) { ?>
                                    <tr class="text-center">
                                        <td colspan="6">Tidak ada data untuk ditampilkan.</td>
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