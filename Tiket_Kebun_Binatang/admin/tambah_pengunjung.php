
<?php
include_once "../src/Koneksi.php";

$pesanError = array();

if (isset($_POST['btnSimpan'])) {

    $id_pengunjung   = trim($_POST['id_pengunjung']);
    $nama_pengunjung = trim($_POST['nama_pengunjung']);
    $jenis_tiket     = trim($_POST['jenis_tiket']);
    $no_telp         = trim($_POST['no_telp']);
    $durasi          = trim($_POST['durasi']);
    $harga_tiket     = trim($_POST['harga_tiket']);

    // Validasi data
    if ($id_pengunjung == "") {
        $pesanError[] = "ID Pengunjung tidak boleh kosong!";
    }

    if ($nama_pengunjung == "") {
        $pesanError[] = "Nama Pengunjung tidak boleh kosong!";
    }

    if ($jenis_tiket == "") {
        $pesanError[] = "Jenis Tiket harus dipilih!";
    }

    if ($no_telp == "") {
        $pesanError[] = "Nomor Telepon tidak boleh kosong!";
    }

    if ($durasi == "") {
        $pesanError[] = "Durasi tidak boleh kosong!";
    }

    if ($harga_tiket === "" || !is_numeric($harga_tiket) || $harga_tiket < 0) {
        $pesanError[] = "Harga harus berupa angka yang valid!";
    }

    if (!empty($pesanError)) {
        foreach ($pesanError as $pesan) {
            echo "<p style='color:red;'>"
                . htmlspecialchars($pesan) . "</p>";
        }
    } else {

        // Simpan data pengunjung
        $stmt = mysqli_prepare(
            $Koneksi,
            "INSERT INTO pengunjung
            (id_pengunjung, nama_pengunjung, jenis_tiket,
             no_telp, durasi, harga_tiket)
            VALUES (?, ?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sssssd",
            $id_pengunjung,
            $nama_pengunjung,
            $jenis_tiket,
            $no_telp,
            $durasi,
            $harga_tiket
        );

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);

            echo "<script>
                alert('Data Pengunjung Berhasil Disimpan!');
                window.location.href =
                'Halaman_Admin.php?open=data_pengunjung';
            </script>";
            exit;
        } else {
            if (mysqli_stmt_errno($stmt) == 1062) {
                echo "<p style='color:red;'>
                    ID Pengunjung sudah digunakan!
                    Gunakan ID lain.</p>";
            } else {
                echo "<p style='color:red;'>Gagal menyimpan data:
                    " . htmlspecialchars(mysqli_stmt_error($stmt))
                    . "</p>";
            }
        }

        mysqli_stmt_close($stmt);
    }
}
?>


<form action="" method="post">
    <table cellspacing="1" cellpadding="3">

        <!-- ID Pengunjung -->
        <tr>
            <td>ID Pengunjung</td>
            <td>:</td>
            <td><input type="text" name="id_pengunjung" required></td>
        </tr>

        <!-- Nama Pengunjung -->
        <tr>
            <td>Nama Pengunjung</td>
            <td>:</td>
            <td><input type="text" name="nama_pengunjung" required></td>
        </tr>

        <!-- Jenis Tiket -->
        <tr>
            <td>Jenis Tiket</td>
            <td>:</td>
            <td>
                <select name="jenis_tiket" required>
                    <option value="">-- Pilih Jenis Tiket --</option>
                    <?php
                    $query = "SELECT * FROM jenis_tiket";
                    $result = mysqli_query($Koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . htmlspecialchars($row['jenis_tiket']) . "'>"
                            . htmlspecialchars($row['jenis_tiket']) . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <!-- TEMPEL KODE JENIS TIKET, DURASI, DAN HARGA DI SINI -->

        <!-- No. Telepon -->
        <tr>
            <td>No. Telepon</td>
            <td>:</td>
            <td><input type="tel" name="no_telp" required></td>
        </tr>

        <!-- Durasi -->
        <tr>
    <td>Durasi</td>
    <td>:</td>
    <td>
        <select name="durasi" required>
            <option value="">-- Pilih Durasi --</option>
            <?php
            $query = "SELECT DISTINCT durasi_tiket FROM jenis_tiket";
            $result = mysqli_query($Koneksi, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" .
                    htmlspecialchars($row['durasi_tiket']) . "'>"
                    . htmlspecialchars($row['durasi_tiket']) .
                    "</option>";
            }
            ?>
        </select>
    </td>
</tr>
        <!-- Harga Tiket -->
        <tr>
            <td>Harga Tiket</td>
            <td>:</td>
            <td>
                <select name="harga_tiket" required>
                    <option value="">-- Pilih Harga Tiket --</option>
                    <?php
                    $query = "SELECT * FROM harga";
                    $result = mysqli_query($Koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . htmlspecialchars($row['harga_tiket']) . "'>"
                            . htmlspecialchars($row['harga_tiket']) . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <!-- Tombol Simpan -->
        <tr>
            <td colspan="3">
                <button type="submit" name="btnSimpan">Simpan</button>
            </td>
        </tr>

    </table>
</form>
