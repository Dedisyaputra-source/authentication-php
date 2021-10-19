<?php
require_once('connection.php');

require_once('session_check.php');

if ($sessionStatus == false) {
    header('Location :index.php');
}

if (isset($_GET['nis'])) $nis = $_GET['nis'];
else {
    echo 'Nomor barang tidak ditemukan';
    exit();
}

$queryDelete = "DELETE FROM siswa WHERE nis = '{$nis}'";

$result = mysqli_query($mysqli, $queryDelete);

if (!$result) {
    exit('gagal menghapus data');
}

header('Location: index.php');
