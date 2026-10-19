<?php

include "../src/Koneksi.php";

$nama_pengunjung = $_POST['nama_pengunjung'];
$no_telp = $_POST['no_telp'];

$sql = "INSERT INTO pengunjung 
        (nama_pengunjung, no_telp)
        VALUES 
        ('$nama_pengunjung', '$no_telp')";

$query = mysqli_query($Koneksi, $sql);

if ($query) {
    echo "<script>
            alert('Data pengunjung berhasil disimpan');
            window.location='pengunjung.php';
          </script>";
} else {
    echo "Data gagal disimpan: " . mysqli_error($Koneksi);
}

?>