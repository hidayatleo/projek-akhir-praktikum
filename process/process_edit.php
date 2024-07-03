<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

$nama = $_POST['nama'];
$noid = $_POST['noid'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$id = $_POST['id'];

// Memeriksa apakah ada field yang kosong
if (empty($nama) || empty($noid) || empty($email) || empty($nohp) || empty($alamat)) {
    header("location: " . BASE_URL . 'dashboard.php?page=edit&id=' . $id . '&process=failed');
    exit();
} else {
    // Melakukan query update ke database
    $query = "UPDATE pegawai SET nama='$nama', noid='$noid', email='$email', nohp='$nohp', alamat='$alamat' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        header("location: " . BASE_URL . 'dashboard.php?page=home&process=success&status=edit');
        exit();
    } else {
        die("Query error: " . mysqli_error($koneksi));
    }
}
?>
