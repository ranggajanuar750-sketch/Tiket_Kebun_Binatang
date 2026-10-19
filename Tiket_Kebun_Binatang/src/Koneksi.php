<?php

$Koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_tiket_kebun_binatang"
);

if (!$Koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>