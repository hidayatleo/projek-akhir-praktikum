<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');

session_start();
unset($_SESSION['id']);

header('location: ' . BASE_URL . 'index.php?process=logout');
exit();
?>
