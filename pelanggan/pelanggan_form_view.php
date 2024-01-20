<?php
include('../config/koneksi.php');
include('../templates/header.php');

if ($_GET['action'] == 'edit') { ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include('../templates/breadcumb.php') ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Edit Pelanggan</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-4">
                                <form action="pelanggan_action_save.php" method="post">
                                    <?php
                                    $nik = $_GET['nik'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan_dikihamdani WHERE nik_ktp_dikihamdani='$nik'");
                                    $data = mysqli_fetch_array($query);
                                    ?>
                                    <div class="row">
                                    <input type="hidden" name="form_mode" class="form-control" value="edit">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="text" name="nik" class="form-control" id="nik" value="<?= $data['nik_ktp_dikihamdani'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap" value="<?= $data['nama_dikihamdani'] ?>" class="form-control" id="nama_lengkap" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_hp">No. HP</label>
                                                <input type="text" name="no_hp" value="<?= $data['no_hp_dikihamdani'] ?>" class="form-control" id="no_hp" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" value="<?= $data['alamat_dikihamdani'] ?>" name="alamat" id="alamat" placeholder="Alamat" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                &nbsp;Simpan</button>
                                            <a href="pelanggan_view.php?page=pelanggan" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                                                &nbsp;Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
} else { ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include('../templates/breadcumb.php') ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Tambah Pelanggan Baru</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-4">
                                <form action="pelanggan_action_save.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK.. ex: B7070CD">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" id="nama_lengkap" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_hp">No. Hp</label>
                                                <input type="text" name="no_hp" placeholder="No. Hp" class="form-control" id="no_hp" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                &nbsp;Simpan</button>
                                            <a href="pelanggan_view.php?page=pelanggan" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                                                &nbsp;Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php } ?>

<?php include('../templates/footer.php') ?>