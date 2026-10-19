
<?php
include_once "../src/Koneksi.php";

// SKRIP TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {

    $id_petugas    = trim($_POST['id_petugas']);
    $nama = trim($_POST['nama']);
    $password = trim($_POST['password']);
    $level = trim($_POST['level']);

    // Validasi form
    $pesanError = array();

    if ($id_petugas == "") {
        $pesanError[] = "ID Petugas tidak boleh kosong!";
    }

    if ($nama == "") {
        $pesanError[] = "Nama tidak boleh kosong!";
    }

    if ($password == "") {
        $pesanError[] = "Password tidak boleh kosong!";
    }

    if ($level == "") {
        $pesanError[] = "Level tidak boleh kosong!";
    }

    // Tampilkan pesan error
    if (count($pesanError) >= 1) {
        foreach ($pesanError as $indeks => $pesan_tampil) {
            echo ($indeks + 1) . ". " . $pesan_tampil . "<br>";
        }
    } else {

        // Update data petugas
        $stmt = mysqli_prepare(
            $Koneksi,
            "UPDATE petugas SET nama = ?, password = ?, level = ?
             WHERE id_petugas = ?"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "ssss",
            $nama,
            $password,
            $level,
            $id_petugas
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<center><b>Data Berhasil Diubah</b></center>";
            echo "<meta http-equiv='refresh' content='2; url=Halaman_Admin.php?open=petugas'>";
        } else {
            echo "Data Gagal Diubah: " . mysqli_stmt_error($stmt);
        }
    }
}

// Membaca data dari database untuk diedit
$id_petugas = $_GET['id_petugas'] ?? '';

$stmt = mysqli_prepare(
    $Koneksi,
    "SELECT * FROM petugas WHERE id_petugas = ?"
);

mysqli_stmt_bind_param($stmt, "s", $id_petugas);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$data) {
    die("Data petugas tidak ditemukan!");
}
?>

<form action="" method="post" name="form1">
    <table class="table-list" width="650" border="0"
           cellspacing="1" cellpadding="3">

        <tr>
            <td bgcolor="#CCCCCC" colspan="3">
                <strong>UBAH DATA PETUGAS</strong>
            </td>
        </tr>

        <tr>
            <td width="182"><strong>ID PETUGAS</strong></td>
            <td width="6">:</td>
            <td width="440">
                <input name="id_petugas" type="text"
                       value="<?php echo htmlspecialchars($data['id_petugas']); ?>"
                       readonly>
            </td>
        </tr>

        <tr>
            <td><strong>Nama</strong></td>
            <td>:</td>
            <td>
                <input name="nama" type="text"
                       value="<?php echo htmlspecialchars($data['nama']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td><strong>Password</strong></td>
            <td>:</td>
            <td>
                <input name="password" type="password"
                       value="<?php echo htmlspecialchars($data['password']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td><strong>Level</strong></td>
            <td>:</td>
            <td>
                <input name="level" type="text"
                       value="<?php echo htmlspecialchars($data['level']); ?>"
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
