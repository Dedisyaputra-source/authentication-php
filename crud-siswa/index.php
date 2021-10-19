<?php
require_once('connection.php');
require_once('session_check.php');


$query = "SELECT * FROM siswa";

$result = mysqli_query($mysqli, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Data Siswa</title>
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
                    <?php if ($sessionStatus == false) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login Petugas</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if ($sessionStatus) : ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h3>Data Siswa</h3>
                </div>
                <div class="col-md-2 ms-auto">
                    <a href="tambah_data_siswa.php" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Usia</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </tbody>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($result as $siswa) {
                            $tgl_lahir = explode('-', $siswa['tgl_lahir']);
                            $tahunSekarang = DATE("Y");

                            $selisihTahun = $tahunSekarang - $tgl_lahir[0];
                            echo '
                            <tr>
                                <td>' . $i++ . '</td>
                                <td>' . $siswa["nama"] . '</td>
                                <td>' . $siswa["jk"] . '</td>
                                <td>' . $siswa["alamat"] . '</td>
                                <td>' . $selisihTahun . '</td>
                                <td>' . $siswa["telepon"] . '</td>
                                <td>
                                    <a href="edit_siswa.php?nis=' . $siswa['nis'] . '">Edit</a>
                                    <a href="delete.php?nis=' . $siswa['nis'] . '" onclick= "return confirm_delete()">Hapus</a>
                                </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col text-center mt-5">
                <h4>Silahkan Login Terlebih Dahulu</h4>
            </div>
        </div>
    <?php endif; ?>
    </div>
    <script>
        function confirm_delete() {
            return confirm("apakah anda yakin ??");
        }
    </script>
</body>

</html>