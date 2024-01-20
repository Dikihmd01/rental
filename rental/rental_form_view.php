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
                            <h6>Edit <?= ucfirst($_GET['no_trx']) ?></h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-4">
                                <form action="rental_action_save.php" method="post">
                                    <?php
                                    $no_trx = $_GET['no_trx'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_rental_dikihamdani WHERE no_trx_dikihamdani='$no_trx'");
                                    $record = mysqli_fetch_array($query);
                                    ?>
                                    <div class="row">
                                        <input type="hidden" name="form_mode" class="form-control" value="edit">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_trx">No. Trx</label>
                                                <input type="text" name="no_trx" value="<?= $no_trx ?>" readonly="true" class="form-control" id="no_trx">
                                            </div>
                                            <div class="form-group">
                                                <label for="no_plat">Mobil</label>
                                                <select name="no_plat" id="no_plat" class="form-control">
                                                    <option value="">-- Pilih Mobil --</option>
                                                    <?php 
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_mobil_dikihamdani");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?= $data['no_plat_dikihamdani'] ?>" <?php if ($data['no_plat_dikihamdani'] == $record['no_plat_dikihamdani']) {echo "selected";} ?>>
                                                        <?= $data['no_plat_dikihamdani'] ?> - <?= $data['nama_mobil_dikihamdani'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Pelanggan</label>
                                                <select name="nik" id="nik" class="form-control">
                                                    <option value="">-- Pilih Pelanggan --</option>
                                                    <?php 
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan_dikihamdani");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?= $data['nik_ktp_dikihamdani'] ?>" <?php if ($data['nik_ktp_dikihamdani'] == $record['nik_ktp_dikihamdani']) {echo "selected";}?>>
                                                        <?= $data['nik_ktp_dikihamdani'] ?> - <?= $data['nama_dikihamdani'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_rental">Tanggal Ambil</label>
                                                <input type="date" name="tanggal_rental" id="tanggal_rental" value="<?= $record['tgl_rental_dikihamdani'] ?>" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="jam_rental">Jam Ambil</label>
                                                <input type="time" name="jam_rental" class="form-control" id="jam_rental" value="<?= $record['jam_rental_dikihamdani'] ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="lama_rental">Lama Rental</label>
                                                <input type="number" name="lama_rental" id="lama_rental" class="form-control" value="<?= $record['lama_dikihamdani'] ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga_rental">Harga Rental</label>
                                                <input type="text" name="harga_rental" id="harga_rental" value="<?= $record['harga_dikihamdani'] ?>" class="form-control" onchange="formatCurrency(this)" />
                                            </div>
                                            <div class="form-group">
                                                <label for="total_bayar">Total Bayar</label>
                                                <input type="text" name="total_bayar" id="total_bayar" value="<?= $record['total_bayar_dikihamdani'] ?>" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                &nbsp;Simpan</button>
                                            <a href="../rental/rental_view.php?page=rental" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
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
                            <h6>Tambah Transaksi</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-4">
                                <form action="rental_action_save.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_trx">No. Trx</label>
                                                <input type="text" name="no_trx" value="<?= "TRX-".date("Ymdhis"); ?>" readonly="true" class="form-control" id="no_trx">
                                            </div>
                                            <div class="form-group">
                                                <label for="no_plat">Mobil</label>
                                                <select name="no_plat" id="no_plat" class="form-control">
                                                    <option value="">-- Pilih Mobil --</option>
                                                    <?php 
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_mobil_dikihamdani");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?= $data['no_plat_dikihamdani'] ?>">
                                                        <?= $data['no_plat_dikihamdani'] ?> - <?= $data['nama_mobil_dikihamdani'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">Pelanggan</label>
                                                <select name="nik" id="nik" class="form-control">
                                                    <option value="">-- Pilih Pelanggan --</option>
                                                    <?php 
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan_dikihamdani");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?= $data['nik_ktp_dikihamdani'] ?>">
                                                        <?= $data['nik_ktp_dikihamdani'] ?> - <?= $data['nama_dikihamdani'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_rental">Tanggal Ambil</label>
                                                <input type="date" name="tanggal_rental" id="tanggal_rental" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="jam_rental">Jam Ambil</label>
                                                <input type="time" name="jam_rental" class="form-control" id="jam_rental" />
                                            </div>
                                            <div class="form-group">
                                                <label for="lama_rental">Lama Rental</label>
                                                <input type="number" name="lama_rental" id="lama_rental" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="harga_rental">Harga Rental</label>
                                                <input type="text" name="harga_rental" id="harga_rental" value="0" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="total_bayar">Total Bayar</label>
                                                <input type="text" name="total_bayar" id="total_bayar" value="0" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                &nbsp;Simpan</button>
                                            <a href="../rental/rental_view.php?page=rental" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Function to format currency for a given input element
        function formatCurrency(input) {
            // Remove non-numeric characters from the input value
            let cleanedValue = input.value.replace(/[^\d]/g, '');

            // If the cleaned value is not empty, format it as IDR currency
            if (cleanedValue !== '') {
                let numericValue = parseFloat(cleanedValue) / 100; // Divide by 100 to handle two decimal places
                let formattedValue = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(numericValue);

                // Update the input value with the formatted currency
                input.value = formattedValue;
            } else {
                // If the cleaned value is empty, clear the input
                input.value = '';
            }
        }

        // Get the input elements with the specified IDs
        let hargaRentalInput = document.getElementById('harga_rental');
        let lamaRentalInput = document.getElementById('lama_rental');
        let totalBayarInput = document.getElementById('total_bayar');

        // Attach event listeners to the input elements
        [hargaRentalInput, totalBayarInput].forEach(function (input) {
            // Initialize the raw value as 0 for each input
            let rawValue = 0;

            // Format the currency on input
            input.addEventListener("input", function () {
                // Remove non-numeric characters from the input value
                let cleanedValue = input.value.replace(/[^\d]/g, '');

                // Update the raw value
                rawValue = parseFloat(cleanedValue) || 0;

                // Format the currency
                formatCurrency(input);
                updateTotalBayar();
            });

            // Format the currency on initial load
            formatCurrency(input);
        });

        // Update Total Bayar based on Harga Rental and Duration
        function updateTotalBayar() {
            let hargaRental = parseFloat(hargaRentalInput.value.replace(/[^\d]/g, '')) || 0;
            let lamaRental = parseFloat(lamaRentalInput.value) || 0;

            // Calculate Total Bayar (assuming a simple calculation, adjust as needed)
            let totalBayar = (hargaRental * lamaRental) / 100;

            // Format the calculated value as IDR currency
            totalBayarInput.value = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(totalBayar);
        }

        // Attach an event listener to the lamaRental input
        lamaRentalInput.addEventListener("input", function () {
            updateTotalBayar();
        });
    });
</script>

<?php include('templates/footer.php') ?>