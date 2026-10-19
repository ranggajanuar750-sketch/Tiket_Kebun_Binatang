<?php
include_once "../src/Koneksi.php";
?>

<h1><b>DATA JENIS TIKET</b></h1>
<h4><a href="?open=tambah_harga_tiket">+ Tambah Data</a></h4>

<table cellspacing="1" cellpadding="3">
    <tr>
        <td width="5%" bgcolor="#CCCCCC"><b>No.</b></td>
        <td width="5%" bgcolor="#CCCCCC"><b>ID</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>ID TIKET</b></td>
        <td width="10%" bgcolor="#CCCCCC"><b>HARGA</b></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC">
            <b>Tools</b>
        </td>
    </tr>

<?php
$sql = mysqli_query(
    $Koneksi,
    "SELECT * FROM harga"
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
        <td><?php echo htmlspecialchars($data['id_harga']); ?></td>
        <td><?php echo htmlspecialchars($data['id_tiket']); ?></td>
        <td><?php echo htmlspecialchars($data['harga_tiket']); ?></td>

        <td width="9%" align="center">
            <a href="?open=hapus_harga_tiket&id_harga=<?php
                echo urlencode($data['id_harga']);
            ?>"
            onclick="return confirm('Yakin ingin menghapus data harga tiket ini?')">
                Delete
            </a>
        </td>

        <td width="9%" align="center">
            <a href="?open=edit_harga_tiket&id_harga=<?php
                echo urlencode($data['id_harga']);
            ?>">
                Edit
            </a>
        </td>
    </tr>

<?php
}
?>

</table>