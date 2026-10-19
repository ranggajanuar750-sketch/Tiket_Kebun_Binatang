<?php
session_start();

if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Tiket Kebun Binatang</title>
    <link rel="stylesheet" type="text/css" href="../src/Style.css">
</head>

<body>

<!-- HEADER -->
<div class="header">

    <a href="logout.php" class="logout">LOGOUT</a>

    <h1>KEBUN BINATANG</h1>
    <p>Sistem Pembelian Tiket Kebun Binatang</p>

</div>


<!-- NAVBAR -->
<div class="navbar">

    <a href="Halaman_Admin.php">HOME</a>

    <a href="Halaman_Admin.php?open=data_pengunjung">
        PENGUNJUNG
    </a>

    <a href="Halaman_Admin.php?open=jenis_tiket">
        JENIS TIKET
    </a>

    <a href="Halaman_Admin.php?open=harga_tiket">
        HARGA TIKET
    </a>

    <a href="Halaman_Admin.php?open=petugas">
        PETUGAS
    </a>

</div>


<!-- CONTENT -->
<div class="container">

<?php

if (isset($_GET['open']) && $_GET['open'] == "data_pengunjung") {

    include "data_pengunjung.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "jenis_tiket") {

    include "data_jenis_tiket.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "harga_tiket") {

    include "data_harga_tiket.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "petugas") {

    include "data_petugas.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "jenis_pengunjung") {

    include "jenis_pengunjung.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "tambah_pengunjung") {

    include "tambah_pengunjung.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "edit_pengunjung") {

    include "edit_pengunjung.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "hapus_pengunjung") {

    include "hapus_pengunjung.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "tambah_jenis_tiket") {

    include "tambah_jenis_tiket.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "edit_jenis_tiket") {

    include "edit_jenis_tiket.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "hapus_jenis_tiket") {

    include "hapus_jenis_tiket.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "tambah_harga_tiket") {

    include "tambah_harga_tiket.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "edit_harga_tiket") {

    include "edit_harga_tiket.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "hapus_harga_tiket") {

    include "hapus_harga_tiket.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "tambah_petugas") {

    include "tambah_petugas.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "edit_petugas") {

    include "edit_petugas.php";

} elseif (isset($_GET['open']) && $_GET['open'] == "hapus_petugas") {

    include "hapus_petugas.php";
} 

else {

?>

    <div class="welcome">

        <h2>Selamat Datang, Admin 👋</h2>

        <p>
            Kelola data pengunjung, jenis tiket, dan petugas
            melalui halaman admin.
        </p>

    </div>


    <div class="cards">

        <!-- DATA PENGUNJUNG -->
        <div class="card">

            <div class="icon">👥</div>

            <h3>Data Pengunjung</h3>

            <a href="Halaman_Admin.php?open=data_pengunjung">
                Kelola Data
            </a>

        </div>


        <!-- JENIS TIKET -->
        <div class="card">

            <div class="icon">🎟️</div>

            <h3>Jenis Tiket</h3>

            <a href="Halaman_Admin.php?open=jenis_tiket">
                Kelola Tiket
            </a>

        </div>


        <!-- PETUGAS -->
        <div class="card">

            <div class="icon">👨‍💼</div>

            <h3>Petugas</h3>

            <a href="Halaman_Admin.php?open=petugas">
                Kelola Petugas
            </a>

        </div>


        <!-- JENIS PENGUNJUNG -->
        <div class="card">

            <div class="icon">👨‍👩‍👧</div>

            <h3>Jenis Pengunjung</h3>

            <a href="Halaman_Admin.php?open=jenis_pengunjung">
                Kelola Data
            </a>

        </div>

    </div>

<?php

}

?>

</div>


<!-- FOOTER -->
<div class="footer">

    <p>© 2026 Sistem Tiket Kebun Binatang</p>

</div>

</body>
</html>