
<?php
include_once "../src/Koneksi.php";

// SKRIP TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {

    $id_harga = $_POST['id_harga'];
    $id_tiket = $_POST['id_tiket'];
    $harga_tiket = $_POST['harga_tiket'];

    // Validasi Form Inputs
    $pesanError = array();

    if (trim($id_harga) == "") {
        $pesanError[] = "Data <b>ID HARGA</b> tidak boleh kosong!";
    }

    if (trim($id_tiket) == "") {
        $pesanError[] = "Data <b>ID  TIKET</b> tidak boleh kosong!";
    }

    if (trim($harga_tiket) == "") {
        $pesanError[] = "Data <b>HARGA TIKET</b> tidak boleh kosong!";
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
            "INSERT INTO harga
            (id_harga, id_tiket, harga_tiket)
            VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $id_harga,
            $id_tiket,
            $harga_tiket
        );

        if (mysqli_stmt_execute($stmt)) {
        echo "<center><b>Data Berhasil Disimpan</b></center>";
        echo "<meta http-equiv='refresh'
          content='2; url=Halaman_Admin.php?open=harga_tiket'>";
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
                <strong>TAMBAH DATA HARGA TIKET</strong>
            </td>
        </tr>

        <tr>
            <td>ID HARGA</td>
            <td>:</td>
            <td>
                <input name="id_harga" type="text"
                       size="20" maxlength="5" required>
            </td>
        </tr>

        <tr>
            <td>ID TIKET</td>
            <td>:</td>
            <td>
                <input name="id_tiket" type="text"
                       size="30" maxlength="10" required>
            </td>
        </tr>

        <tr>
            <td>HARGA TIKET</td>
            <td>:</td>
            <td>
                <input name="harga_tiket" type="number"
                       size="50" maxlength="10" required
                       min="0" step="1">
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