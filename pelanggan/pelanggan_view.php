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
                <a href="pelanggan_form_view.php?page=pelanggan&action=create" class="btn btn-primary <?= $className ?>"><i class="fa fa-plus"></i> Tambah Pelanggan Baru</a>
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-8">
                                <h6>Data Pelanggan</h6>
                            </div>
                            <div class="col-md-4">
                                <form action="pelanggan_view.php?page=pelanggan&action=search" method="POST">
                                    <div class="input-group float-end mb-3">
                                        <?php
                                        if ($_GET['action'] == 'search') { ?>
                                            <input type="text" name="keyword" class="form-control" value="<?= $_POST['keyword']; ?>" aria-label="Keyword" aria-describedby="btn-search">
                                        <?php } else { ?>
                                            <input type="text" name="keyword" class="form-control" placeholder="Masukkan Nama" aria-label="Keyword" aria-describedby="btn-search">
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
                                            NIK
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Nama Lengkap
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            No. Telepon
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Alamat
                                        </th>
                                        <th class="text-secondary opacity-7 <?= $className ?>"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $keyword = "";
                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan_dikihamdani");
                                    if (isset($_POST['cari'])) {
                                        $keyword = $_POST['keyword'];
                                    }
                                    if ($keyword != "") {
                                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan_dikihamdani WHERE nama_dikihamdani LIKE '%$keyword%'");
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
                                                    <?= $data['nik_ktp_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['nama_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs font-weight-bold mb-0">
                                                <?= $data['no_hp_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <?= $data['alamat_dikihamdani']; ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center <?= $className ?>">
                                                <a href="pelanggan_form_view.php?page=pelanggan&action=edit&nik=<?= $data['nik_ktp_dikihamdani'] ?>" class="btn btn-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="pelanggan_action_delete.php?nik=<?= $data['nik_ktp_dikihamdani'] ?>" class="btn btn-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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