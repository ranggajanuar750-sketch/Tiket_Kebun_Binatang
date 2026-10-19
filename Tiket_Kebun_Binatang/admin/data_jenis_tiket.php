<?php
include_once "../src/Koneksi.php";
?>

<h1><b>DATA JENIS TIKET</b></h1>
<h4><a href="?open=tambah_jenis_tiket">+ Tambah Data</a></h4>

<table cellspacing="1" cellpadding="3">
    <tr>
        <td width="5%" bgcolor="#CCCCCC"><b>No.</b></td>
        <td width="5%" bgcolor="#CCCCCC"><b>ID</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>JENIS TIKET</b></td>
        <td width="10%" bgcolor="#CCCCCC"><b>DURASI</b></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC">
            <b>Tools</b>
        </td>
    </tr>

<?php
$sql = mysqli_query(
    $Koneksi,
    "SELECT * FROM jenis_tiket"
);

if (!$sql) {
    die("Query gagal: " . mysqli_error($Koneksi));
}

$nomor = 0;

while ($data = mysqli_fetch_assoc($sql)) {
    $nomor++;
?>

    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo htmlspecialchars($data['id_tiket']); ?></td>
        <td><?php echo htmlspecialchars($data['jenis_tiket']); ?></td>
        <td><?php echo htmlspecialchars($data['durasi_tiket']); ?></td>

        <td width="9%" align="center">
            <a href="?open=hapus_jenis_tiket&id_tiket=<?php
                echo urlencode($data['id_tiket']);
            ?>"
            onclick="return confirm('Yakin ingin menghapus data jenis tiket ini?')">
                Delete
            </a>
        </td>

        <td width="9%" align="center">
            <a href="?open=edit_jenis_tiket&id_tiket=<?php
                echo urlencode($data['id_tiket']);
            ?>">
                Edit
            </a>
        </td>
    </tr>

<?php
}
?>

</table>