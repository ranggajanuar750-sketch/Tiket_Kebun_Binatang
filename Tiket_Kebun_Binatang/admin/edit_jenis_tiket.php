
<?php
include_once "../src/Koneksi.php";

// SKRIP TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {

    $id_tiket    = trim($_POST['id_tiket']);
    $jenis_tiket = trim($_POST['jenis_tiket']);
    $durasi_tiket = trim($_POST['durasi_tiket']);

    // Validasi form
    $pesanError = array();

    if ($id_tiket == "") {
        $pesanError[] = "ID Tiket tidak boleh kosong!";
    }

    if ($jenis_tiket == "") {
        $pesanError[] = "Jenis Tiket tidak boleh kosong!";
    }

    if ($durasi_tiket == "") {
        $pesanError[] = "Durasi Tiket tidak boleh kosong!";
    }

    // Tampilkan pesan error
    if (count($pesanError) >= 1) {
        foreach ($pesanError as $indeks => $pesan_tampil) {
            echo ($indeks + 1) . ". " . $pesan_tampil . "<br>";
        }
    } else {

        // Update data jenis tiket
        $stmt = mysqli_prepare(
            $Koneksi,
            "UPDATE jenis_tiket SET jenis_tiket = ?, durasi_tiket = ?
             WHERE id_tiket = ?"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $jenis_tiket,
            $durasi_tiket,
            $id_tiket
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<center><b>Data Berhasil Diubah</b></center>";
            echo "<meta http-equiv='refresh' content='2; url=Halaman_Admin.php?open=jenis_tiket'>";
        } else {
            echo "Data Gagal Diubah: " . mysqli_stmt_error($stmt);
        }
    }
}

// Membaca data dari database untuk diedit
$id_tiket = $_GET['id_tiket'] ?? '';

$stmt = mysqli_prepare(
    $Koneksi,
    "SELECT * FROM jenis_tiket WHERE id_tiket = ?"
);

mysqli_stmt_bind_param($stmt, "s", $id_tiket);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$data) {
    die("Data jenis tiket tidak ditemukan!");
}
?>

<form action="" method="post" name="form1">
    <table class="table-list" width="650" border="0"
           cellspacing="1" cellpadding="3">

        <tr>
            <td bgcolor="#CCCCCC" colspan="3">
                <strong>UBAH DATA JENIS TIKET</strong>
            </td>
        </tr>

        <tr>
            <td width="182"><strong>ID TIKET</strong></td>
            <td width="6">:</td>
            <td width="440">
                <input name="id_tiket" type="text"
                       value="<?php echo htmlspecialchars($data['id_tiket']); ?>"
                       readonly>
            </td>
        </tr>

        <tr>
            <td><strong>Jenis TIKET</strong></td>
            <td>:</td>
            <td>
                <input name="jenis_tiket" type="text"
                       value="<?php echo htmlspecialchars($data['jenis_tiket']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td><strong>Durasi TIKET</strong></td>
            <td>:</td>
            <td>
                <input name="durasi_tiket" type="text"
                       value="<?php echo htmlspecialchars($data['durasi_tiket']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td>
                <input name="btnSimpan" type="submit"
                       id="btnSimpan" value="Simpan">
            </td>
        </tr>

    </table>
</form>
