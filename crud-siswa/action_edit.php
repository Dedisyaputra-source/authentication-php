<?php
require_once('connection.php');


if (isset($_POST['nis'])) $nis = $_POST['nis'];
else {
    echo 'Nomor Barang tidak ditemukan <a href= "index.php">Kembali</a>';
    exit();
}
$queryEdit = "SELECT * FROM siswa WHERE nis = '{$nis}'";

$result = mysqli_query($mysqli, $queryEdit);

foreach ($result as $siswa) {
    $nis = $siswa['nis'];
    $nama = $siswa['nama'];
    $address = $siswa['alamat'];
    $placeOfBirth = $siswa['tmp_lahir'];
    $dateOfBirth = $siswa['tgl_lahir'];
    $phone = $siswa['telepon'];

    $maleChecked = "";
    $femaleChecked = "";
}

if (isset($_POST['nama'])) $nama = $_POST['nama'];

if (isset($_POST['gender'])) $gender = $_POST['gender'];

if (isset($_POST['address'])) $address = $_POST['address'];

if (isset($_POST['placeOfBirth'])) $placeOfBirth = $_POST['placeOfBirth'];

if (isset($_POST['dateOfBirth'])) $dateOfBirth = $_POST['dateOfBirth'];

if (isset($_POST['phone'])) $phone = $_POST['phone'];

$queryUpdate = "
    UPDATE siswa SET
        nama = '{$nama}', 
        jk = '{$gender}', 
        alamat = '{$address}', 
        tmp_lahir = '{$placeOfBirth}', 
        tgl_lahir = '{$dateOfBirth}',  
        telepon = '{$phone}',  
    WHERE nis = '{$nis}'; 
";

$insert = mysqli_query($mysqli, $queryUpdate);

if ($insert == false) {
    echo 'error dalam update data <a href="index.php">Kembali</a>';
} else {
    header('Location: index.php');
}
