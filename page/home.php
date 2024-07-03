<?php
require_once('function/koneksi.php');

$process = isset($_GET['process']) ? $_GET['process'] : false;
$status = isset($_GET['status']) ? $_GET['status'] : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <style>
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border: none;
            border-radius: 0;
            margin-bottom: 20px;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <?php if ($status == 'insert') : ?>
            <div class="alert alert-success" role="alert">
                Data berhasil dimasukkan
            </div>
        <?php elseif ($status == 'edit') : ?>
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        <?php elseif ($status == 'delete') : ?>
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        <?php endif; ?>

        <!-- mengambil data dari database -->
        <?php
        $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");
        ?>

        <input class="form-control mb-3" id="searchInput" type="text" placeholder="Cari data..">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor ID</th>
                                    <th scope="col">Nomor HP</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pegawai as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $p['nama'] ?></td>
                                        <td><?= $p['noid'] ?></td>
                                        <td><?= $p['nohp'] ?></td>
                                        <td><?= $p['email'] ?></td>
                                        <td><?= $p['alamat'] ?></td>
                                        <td>
                                            <a class="btn btn-danger badge" href="<?= BASE_URL . 'process/process_delete.php?id=' . $p['id'] ?>">Hapus</a>
                                            <a class="btn btn-info badge" href="<?= BASE_URL . 'dashboard.php?page=edit&id=' . $p['id'] ?>">Ubah</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button id="btn_prev" onclick="prevPage()">Sebelumnya</button>
                        <button id="btn_next" onclick="nextPage()">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
