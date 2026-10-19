
<?php
include_once "../src/Koneksi.php";

// SKRIP TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {

    $id_harga    = trim($_POST['id_harga']);
    $id_tiket    = trim($_POST['id_tiket']);
    $harga_tiket = trim($_POST['harga_tiket']);

    // Validasi form
    $pesanError = array();

    if ($id_harga == "") {
        $pesanError[] = "ID Harga tidak boleh kosong!";
    }

    if ($id_tiket == "") {
        $pesanError[] = "ID Tiket tidak boleh kosong!";
    }

    if ($harga_tiket == "") {
        $pesanError[] = "Harga Tiket tidak boleh kosong!";
    }

    // Tampilkan pesan error
    if (count($pesanError) >= 1) {
        foreach ($pesanError as $indeks => $pesan_tampil) {
            echo ($indeks + 1) . ". " . $pesan_tampil . "<br>";
        }
    } else {

        // Update data harga tiket
        $stmt = mysqli_prepare(
            $Koneksi,
            "UPDATE harga SET id_tiket = ?, harga_tiket = ?
             WHERE id_harga = ?"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $id_tiket,
            $harga_tiket,
            $id_harga
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<center><b>Data Berhasil Diubah</b></center>";
            echo "<meta http-equiv='refresh' content='2; url=Halaman_Admin.php?open=data_harga_tiket'>";
        } else {
            echo "Data Gagal Diubah: " . mysqli_stmt_error($stmt);
        }
    }
}

// Membaca data dari database untuk diedit
$id_harga = $_GET['id_harga'] ?? '';

$stmt = mysqli_prepare(
    $Koneksi,
    "SELECT * FROM harga WHERE id_harga = ?"
);

mysqli_stmt_bind_param($stmt, "s", $id_harga);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$data) {
    die("Data harga tiket tidak ditemukan!");
}
?>

<form action="" method="post" name="form1">
    <table class="table-list" width="650" border="0"
           cellspacing="1" cellpadding="3">

        <tr>
            <td bgcolor="#CCCCCC" colspan="3">
                <strong>UBAH DATA HARGA TIKET</strong>
            </td>
        </tr>

        <tr>
            <td width="182"><strong>ID Harga</strong></td>
            <td width="6">:</td>
            <td width="440">
                <input name="id_harga" type="text"
                       value="<?php echo htmlspecialchars($data['id_harga']); ?>"
                       readonly>
            </td>
        </tr>

        <tr>
            <td><strong>ID Tiket</strong></td>
            <td>:</td>
            <td>
                <input name="id_tiket" type="text"
                       value="<?php echo htmlspecialchars($data['id_tiket']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td><strong>Harga Tiket</strong></td>
            <td>:</td>
            <td>
                <input name="harga_tiket" type="number"
                       value="<?php echo htmlspecialchars($data['harga_tiket']); ?>"
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
