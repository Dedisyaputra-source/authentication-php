<?php
require_once('connection.php');

require_once('session_check.php');

if ($sessionStatus == false) {
    header('Location :index.php');
}

$error = 0;

if (isset($_GET['nis'])) $nis = $_GET['nis'];
else 'data tidak ditemukan <a href= "edit_siswa.php">Kembali</a>';

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
    if ($siswa['jk'] == "L") {
        $maleChecked = "checked";
    } else if ($siswa['jk'] == "P") {
        $femaleChecked = "checked";
    }
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
                        <a class="nav-link" href="index.php">Data Siswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row my-2">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-title mx-auto mt-3">
                        <h3>Edit Data Siswa</h3>
                    </div>
                    <div class="card-body">
                        <form action="action_edit.php" method="POST">
                            <div class="mb-2">
                                <label for="nis">Nis</label>
                                <input type="text" class="form-control mt-2" name="nis" required placeholder="nis siswa" autocomplete="off" value="<?= $nis; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control mt-2" name="nama" required placeholder="nama siswa" autocomplete="off" value="<?= $nama; ?>">
                            </div>
                            <div class="mb-2">
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input mt-2" <?= $maleChecked; ?> type="radio" name="gender" required value="L" id="male">
                                    <label for="male" class="form-check-label">Laki-Laki</label>
                                </div>
                                <div class="form-check disable">
                                    <input type="radio" class="form-check-input mt-2" <?= $femaleChecked; ?> name="gender" required value="P" id="female">
                                    <label for="male" class="form-check-label">Perempuan</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="address">Alamat</label>
                                <textarea name="address" id="address" class="form-control" rows="3" required><?= $address; ?></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="placeOfBirth">Tempat Lahir</label>
                                <input type="text" class="form-control mt-2" name="placeOfBirth" required placeholder="tempat lahir" autocomplete="off" id="tmp_lahir" value="<?= $placeOfBirth; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="dateOfBirth">Tanggal Lahir</label>
                                <input type="date" class="form-control mt-2" name="dateOfBirth" required placeholder="tanggal lahir" autocomplete="off" id="tgl_lahir" value="<?= $dateOfBirth; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control mt-2" name="phone" required placeholder="nomor telepon" autocomplete="off" id="phone" value="<?= $phone; ?>">
                            </div>
                            <input type="submit" class="btn btn-primary" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>