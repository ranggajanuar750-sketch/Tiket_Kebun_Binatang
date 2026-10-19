<?php
include_once "../src/Koneksi.php";

// SKRIP TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {

    $id_pengunjung   = trim($_POST['id_pengunjung']);
    $nama_pengunjung = trim($_POST['nama_pengunjung']);
    $jenis_tiket     = trim($_POST['jenis_tiket']);
    $no_telp         = trim($_POST['no_telp']);
    $durasi_tiket    = trim($_POST['durasi_tiket']);
    $harga           = trim($_POST['harga']);

    // Validasi form
    $pesanError = array();

    if ($id_pengunjung == "") {
        $pesanError[] = "ID Pengunjung tidak boleh kosong!";
    }

    if ($nama_pengunjung == "") {
        $pesanError[] = "Nama Pengunjung tidak boleh kosong!";
    }

    if ($jenis_tiket == "") {
        $pesanError[] = "Jenis Tiket tidak boleh kosong!";
    }

    if ($no_telp == "") {
        $pesanError[] = "Nomor Telepon tidak boleh kosong!";
    }

    if ($durasi_tiket == "") {
        $pesanError[] = "Durasi tidak boleh kosong!";
    }

    if ($harga == "" || !is_numeric($harga)) {
        $pesanError[] = "Harga Tiket harus berupa angka!";
    }

    // Tampilkan pesan error
    if (count($pesanError) >= 1) {
        foreach ($pesanError as $indeks => $pesan_tampil) {
            echo ($indeks + 1) . ". "
                . htmlspecialchars($pesan_tampil) . "<br>";
        }
    } else {

        // Update data pengunjung
        $stmt = mysqli_prepare(
            $Koneksi,
            "UPDATE pengunjung
             SET nama_pengunjung = ?,
                 jenis_tiket = ?,
                 no_telp = ?,
                 durasi_tiket = ?,
                 harga = ?
             WHERE id_pengunjung = ?"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "ssssds",
             $id_pengunjung,
            $nama_pengunjung,
            $jenis_tiket,
            $no_telp,
            $durasi_tiket,
            $harga
           
        );

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);

            echo "<script>
                alert('Data Pengunjung Berhasil Diubah!');
                window.location.href =
                'Halaman_Admin.php?open=data_pengunjung';
            </script>";
            exit;
        } else {
            echo "Data Gagal Diubah: "
                . htmlspecialchars(mysqli_stmt_error($stmt));
            mysqli_stmt_close($stmt);
        }
    }
}

// Membaca data dari database untuk diedit
$id_pengunjung = $_GET['id_pengunjung']
    ?? $_POST['id_pengunjung']
    ?? '';

$stmt = mysqli_prepare(
    $Koneksi,
    "SELECT * FROM pengunjung WHERE id_pengunjung = ?"
);

mysqli_stmt_bind_param($stmt, "s", $id_pengunjung);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$data) {
    die("Data pengunjung tidak ditemukan!");
}
?>

<form action="" method="post" name="form1">
    <table class="table-list" width="650" border="0"
           cellspacing="1" cellpadding="3">

        <tr>
            <td bgcolor="#CCCCCC" colspan="3">
                <strong>UBAH DATA PENGUNJUNG</strong>
            </td>
        </tr>

        <tr>
            <td width="182"><strong>ID Pengunjung</strong></td>
            <td width="6">:</td>
            <td width="440">
                <input name="id_pengunjung" type="text"
                       value="<?php echo htmlspecialchars($data['id_pengunjung']); ?>"
                       readonly>
            </td>
        </tr>

        <tr>
            <td><strong>Nama Pengunjung</strong></td>
            <td>:</td>
            <td>
                <input name="nama_pengunjung" type="text"
                       value="<?php echo htmlspecialchars($data['nama_pengunjung']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td><strong>Jenis Tiket</strong></td>
            <td>:</td>
            <td>
                <select name="jenis_tiket" required>
                    <option value="">-- Pilih Jenis Tiket --</option>
                    <?php
                    $queryTiket = mysqli_query(
                        $Koneksi,
                        "SELECT jenis_tiket FROM jenis_tiket"
                    );

                    while ($tiket = mysqli_fetch_assoc($queryTiket)) {
                        $selected = (
                            $data['jenis_tiket'] == $tiket['jenis_tiket']
                        ) ? "selected" : "";

                        echo "<option value='" .
                            htmlspecialchars($tiket['jenis_tiket']) .
                            "' $selected>" .
                            htmlspecialchars($tiket['jenis_tiket']) .
                            "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td><strong>No. Telepon</strong></td>
            <td>:</td>
            <td>
                <input name="no_telp" type="tel"
                       value="<?php echo htmlspecialchars($data['no_telp']); ?>"
                       required>
            </td>
        </tr>

        <tr>
    <td><strong>Durasi</strong></td>
    <td>:</td>
    <td>
        <input name="durasi_tiket" type="text"
               value="<?php echo htmlspecialchars($data['durasi_tiket'] ?? ''); ?>"
               required>
    </td>
</tr>

        
        <tr>
            <td><strong>Harga Tiket</strong></td>
            <td>:</td>
            <td>
                <input name="harga" type="number"
                       value="<?php echo htmlspecialchars($data['harga_tiket'] ?? ''); ?>"
                       min="0" required>
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
