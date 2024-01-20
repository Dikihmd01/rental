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
                            <h6>Edit Mobil <?= $_GET['no_plat'] ?></h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-4">
                                <form action="mobil_action_save.php" method="post">
                                    <?php
                                    $no_plat = $_GET['no_plat'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_mobil_dikihamdani WHERE no_plat_dikihamdani='$no_plat'");
                                    $data = mysqli_fetch_array($query);
                                    ?>
                                    <div class="row">
                                    <input type="hidden" name="form_mode" class="form-control" value="edit">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_plat">No. Plat</label>
                                                <input type="text" name="no_plat" class="form-control" id="no_plat" value="<?= $data['no_plat_dikihamdani'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_mobil">Nama Mobil</label>
                                                <input type="text" name="nama_mobil"  value="<?= $data['nama_mobil_dikihamdani'] ?>" class="form-control" id="nama_mobil" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="brand_mobil">Brand Mobil</label>
                                                <input type="text" name="brand_mobil"  value="<?= $data['brand_mobil_dikihamdani'] ?>" class="form-control" id="brand_mobil" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tipe_transmisi">Tipe Transmisi</label>
                                                <select name="tipe_transmisi" id="tipe_transmisi" class="form-control">
                                                    <option value="">-- Pilih Tipe Transmisi --</option>
                                                    <option value="at" <?php if ($data['tipe_transmisi_dikihamdani'] == 'at') {echo "selected";} ?>>Automatic Transmission</option>
                                                    <option value="cvt" <?php if ($data['tipe_transmisi_dikihamdani'] == 'cvt') {echo "selected";} ?>>Continuously Variable Transmission</option>
                                                    <option value="dct" <?php if ($data['tipe_transmisi_dikihamdani'] == 'dct') {echo "selected";} ?>>Dual Clutch Transmissionn</option>
                                                    <option value="amt" <?php if ($data['tipe_transmisi_dikihamdani'] == 'amt') {echo "selected";} ?>>Automated Manual Transmission</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                &nbsp;Simpan</button>
                                            <a href="mobil_view.php?page=mobil" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
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
                            <h6>Tambah Mobil Baru</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-4">
                                <form action="mobil_action_save.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_plat">No. Plat</label>
                                                <input type="text" name="no_plat" class="form-control" id="no_plat" placeholder="No. Plat.. ex: B7070CD">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_mobil">Nama Mobil</label>
                                                <input type="text" name="nama_mobil" placeholder="Nama Mobil" class="form-control" id="nama_mobil" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="brand_mobil">Brand Mobil</label>
                                                <input type="text" name="brand_mobil" placeholder="Brand Mobil" class="form-control" id="brand_mobil" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tipe_transmisi">Tipe Transmisi</label>
                                                <select name="tipe_transmisi" id="tipe_transmisi" class="form-control">
                                                    <option value="">-- Pilih Tipe Transmisi --</option>
                                                    <option value="at">Automatic Transmission</option>
                                                    <option value="cvt">Continuously Variable Transmission</option>
                                                    <option value="dct">Dual Clutch Transmissionn</option>
                                                    <option value="amt">Automated Manual Transmission</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                &nbsp;Simpan</button>
                                            <a href="mobil_view.php?page=mobil" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
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