<?php
require_once('connection.php');

$error = 0;
if (isset($_POST['nis'])) $nis = $_POST['nis'];
else $error = 1;

if (isset($_POST['nama'])) $nama = $_POST['nama'];
else $error = 1;

if (isset($_POST['gender'])) $gender = $_POST['gender'];
else $error = 1;

if (isset($_POST['address'])) $address = $_POST['address'];
else $error = 1;

if (isset($_POST['placeOfBirth'])) $placeOfBirth = $_POST['placeOfBirth'];
else $error = 1;

if (isset($_POST['dateOfBirth'])) $dateOfBirth = $_POST['dateOfBirth'];
else $error = 1;

if (isset($_POST['phone'])) $phone = $_POST['phone'];
else $error = 1;

if ($error == 1) {
    echo 'terjadi kesalahan penginputan data';
}

$queryInsert = "
INSERT INTO siswa(nis, nama, jk, alamat, tmp_lahir, tgl_lahir, telepon, id_jurusan)
 VALUES ('{$nis}','{$nama}','{$gender}','{$address}','{$placeOfBirth}','{$dateOfBirth}','{$phone}',0)
;";

$insert = mysqli_query($mysqli, $queryInsert);

if ($insert == false) {
    echo 'error dalam menambahkan data . <a href="tambah_data_siswa.php">Kembali</a>';
} else {
    header('Location :index.php');
}
