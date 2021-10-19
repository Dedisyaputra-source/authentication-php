<?php
require_once('connection.php');

$error = 0;
if (isset($_POST['nomorbarang'])) $noBarang = $_POST['nomorbarang'];
else $error = 1;

if (isset($_POST['namabarang'])) $namaBarang = $_POST['namabarang'];
else $error = 1;

if (isset($_POST['stok'])) $stok = $_POST['stok'];
else $error = 1;

if (isset($_POST['harga'])) $harga = $_POST['harga'];
else $error = 1;

if ($error == 1) {
    echo 'terjadi kesalahan penginputan data';
}

$queryInsert = "
    INSERT INTO barang
    (id_barang, no_barang, nama_barang, stok, harga)
     VALUES
      (0,'{$noBarang}','{$namaBarang}','{$stok}','{$harga}');
";

$insert = mysqli_query($mysqli, $queryInsert);

if ($insert == false) {
    echo 'error dalam menambahkan data . <a href="form_tambah_data.php">Kembali</a>';
} else {
    header('Location :index.php');
}
