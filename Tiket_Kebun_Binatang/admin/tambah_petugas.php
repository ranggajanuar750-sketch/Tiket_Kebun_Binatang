
<?php
include_once "../src/Koneksi.php";

// SKRIP TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {

    $id_petugas = $_POST['id_petugas'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // Validasi Form Inputs
    $pesanError = array();

    if (trim($id_petugas) == "") {
        $pesanError[] = "Data <b>ID PETUGAS</b> tidak boleh kosong!";
    }

    if (trim($nama) == "") {
        $pesanError[] = "Data <b>NAMA</b> tidak boleh kosong!";
    }

    if (trim($password) == "") {
        $pesanError[] = "Data <b>PASSWORD</b> tidak boleh kosong!";
    }

    if (trim($level) == "") {
        $pesanError[] = "Data <b>LEVEL</b> tidak boleh kosong!";
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
            "INSERT INTO petugas
            (id_petugas, nama, password, level)
            VALUES (?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "ssss",
            $id_petugas,
            $nama,
            $password,
            $level
        );

        if (mysqli_stmt_execute($stmt)) {
        echo "<center><b>Data Berhasil Disimpan</b></center>";
        echo "<meta http-equiv='refresh'
          content='2; url=Halaman_Admin.php?open=petugas'>";
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
                <strong>TAMBAH DATA PETUGAS</strong>
            </td>
        </tr>

        <tr>
            <td>ID PETUGAS</td>
            <td>:</td>
            <td>
                <input name="id_petugas" type="text"
                       size="20" maxlength="5" required>
            </td>
        </tr>

        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td>
                <input name="nama" type="text"
                       size="30" maxlength="10" required>
            </td>
        </tr>

        <tr>
            <td>PASSWORD</td>
            <td>:</td>
            <td>
                <input name="password" type="password"
                       size="30" maxlength="10" required>
            </td>
        </tr>

        <tr>
            <td>LEVEL</td>
            <td>:</td>
            <td>
                <input name="level" type="text"
                       size="30" maxlength="10" required>
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