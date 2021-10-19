<?php
require_once('connection.php');

require_once('action_session.php');

if ($sessionStatus == false) {
    header('Location :index.php');
}

$error = 0;

if (isset($_GET['no_barang'])) $nomorBarang = $_GET['no_barang'];
else 'data tidak ditemukan <a href= "form_edit.php">Kembali</a>';

$queryEdit = "SELECT * FROM barang WHERE no_barang = '{$nomorBarang}'";

$result = mysqli_query($mysqli, $queryEdit);

foreach ($result as $barang) {
    $nomorBarang = $barang['no_barang'];
    $namaBarang = $barang['nama_barang'];
    $stok = $barang['stok'];
    $harga = $barang['harga'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Form Tambah Data</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="logo.png" alt="" width="100"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Data Barang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-title mx-auto mt-3">
                        <h3>Form Edit Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="action_edit.php" method="POST">
                            <div class="mb-3">
                                <label for="nomorbarang">Nomor Barang:</label>
                                <input type="text" class="form-control mt-2" name="nomorbarang" required placeholder="nomor barang" autocomplete="off" value=<?= $nomorBarang; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="namabarang">Nama Barang:</label>
                                <input type="text" class="form-control mt-2" name="namabarang" required placeholder="nama barang" autocomplete="off" value="<?= $namaBarang; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stok">Stok:</label>
                                <input type="number" class="form-control mt-2" name="stokbarang" required placeholder="stok" autocomplete="off" value="<?= $stok; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga:</label>
                                <input type="number" class="form-control mt-2" name="hargabarang" required placeholder="harga" autocomplete="off" value="<?= $harga; ?>">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Ubah Data">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>