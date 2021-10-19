<?php
$mysqli = new mysqli('localhost', 'root', '', 'coba_sekolah');

if ($mysqli->connect_errno) {
    echo 'gagal dalam menyambungkan database';
    exit();
}
