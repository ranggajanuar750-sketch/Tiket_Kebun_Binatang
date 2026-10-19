
<?php
include_once "../src/Koneksi.php";

// SKRIP TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {

    $id_tiket = $_POST['id_tiket'];
    $nama_tiket = $_POST['jenis_tiket'];
    $durasi_tiket = $_POST['durasi_tiket'];

    // Validasi Form Inputs
    $pesanError = array();

    if (trim($id_tiket) == "") {
        $pesanError[] = "Data <b>ID TIKET</b> tidak boleh kosong!";
    }

    if (trim($nama_tiket) == "") {
        $pesanError[] = "Data <b>NAMA TIKET</b> tidak boleh kosong!";
    }

    if (trim($durasi_tiket) == "") {
        $pesanError[] = "Data <b>DURASI TIKET</b> tidak boleh kosong!";
    }

    // Menampilkan Pesan Error
    if (count($pesanError) >= 1) {
        $noPesan = 0;

        foreach ($pesanError as $pesan_tampil) {
            $noPesan++;
            echo "$noPesan. $pesan_tampil<br>";
        }
        echo "<br>";
    } else {
        // Simpan data ke tabel tiket
        $stmt = mysqli_prepare(
            $Koneksi,
            "INSERT INTO jenis_tiket
            (id_tiket, jenis_tiket, durasi_tiket)
            VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $id_tiket,
            $nama_tiket,
            $durasi_tiket
        );

        if (mysqli_stmt_execute($stmt)) {
        echo "<center><b>Data Berhasil Disimpan</b></center>";
        echo "<meta http-equiv='refresh'
          content='2; url=Halaman_Admin.php?open=jenis_tiket'>";
        } else {
        echo "Data Gagal Disimpan: " .
         mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
        exit;
    }
}
?>

<form action="" method="post">
    <table cellspacing="1" cellpadding="3">
        <tr>
            <td colspan="3" bgcolor="#CCCCCC">
                <strong>TAMBAH DATA JENIS TIKET</strong>
            </td>
        </tr>

        <tr>
            <td>ID TIKET</td>
            <td>:</td>
            <td>
                <input name="id_tiket" type="text"
                       size="20" maxlength="5" required>
            </td>
        </tr>

        <tr>
            <td>NAMA TIKET</td>
            <td>:</td>
            <td>
                <input name="jenis_tiket" type="text"
                       size="30" maxlength="10" required>
            </td>
        </tr>

        <tr>
            <td>DURASI TIKET</td>
            <td>:</td>
            <td>
                <input name="durasi_tiket" type="text"
                       size="50" maxlength="10" required>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <input name="btnSimpan" type="submit"
                       value="Simpan">
            </td>
        </tr>
    </table>
</form>