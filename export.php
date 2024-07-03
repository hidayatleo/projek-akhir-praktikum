// export.php
<?php
require_once('function/koneksi.php');

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Nama', 'Nomor ID', 'Nomor HP', 'Email', 'Alamat'));

$query = "SELECT * FROM pegawai";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}
fclose($output);
?>

// index.php
<a href="export.php" class="btn btn-success">Unduh CSV</a>
