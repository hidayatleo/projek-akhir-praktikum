<?php

require_once('function/helper.php');
require_once('function/koneksi.php');

// Memastikan user telah login
if ($_SESSION["id"] == null) {
    header("location: " . BASE_URL);
    exit();
}

$id = isset($_GET['id']) ? ($_GET['id']) : false;

// Mengambil data pegawai berdasarkan ID
$query = "SELECT * FROM pegawai WHERE id = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah query berhasil dieksekusi
if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

// Mengambil data pegawai dari hasil query
$pegawai = mysqli_fetch_assoc($result);

// Menangani pesan error jika form kosong
$error = isset($_GET['emptyform']) ? ($_GET['emptyform']) : false;

?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <?php if ($error == "true") : ?>
                    <div class="alert alert-danger" role="alert">
                        Proses gagal, pastikan semua formulir terisi
                    </div>
                <?php endif; ?>
                <div class="row">
                    <h1 style="text-align: center; color: #185ADB;">Form Edit Pegawai</h1>
                </div>
                <form method="POST" action="<?= BASE_URL . 'process/process_edit.php' ?>">
                    <input type="hidden" name="id" value="<?= $pegawai['id'] ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="noid" class="form-label">Nomor ID</label>
                        <input type="number" class="form-control" id="noid" name="noid" value="<?= $pegawai['noid'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" id="nohp" name="nohp" value="<?= $pegawai['nohp'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $pegawai['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pegawai['alamat'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
