<?php
include_once "../src/Koneksi.php";
?>

<h1><b>DATA PENGUNJUNG </b></h1>
<h4><a href="?open=tambah_pengunjung">+ Tambah Data</a></h3>

<table cellspacing="1" cellpadding="3">
    <tr>
        <td width="5%" bgcolor="#CCCCCC"><b>No.</b></td>
        <td width="5%" bgcolor="#CCCCCC"><b>ID</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>NAMA PENGUNJUNG</b></td>
        <td width="10%" bgcolor="#CCCCCC"><b>JENIS TIKET</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>NO. TELEPON</b></td>
        <td width="5%" bgcolor="#CCCCCC"><b>DURASI</b></td>
        <td width="10%" bgcolor="#CCCCCC"><b>HARGA</b></td>
       
        <td colspan="2" align="center" bgcolor="#CCCCCC"><b>Tools</b></td>
    </tr>

<?php
$sql = mysqli_query($Koneksi, "SELECT * FROM jenis_tiket JOIN pengunjung
on jenis_tiket.id_tiket = pengunjung.id_tiket JOIN harga on pengunjung.id_harga = harga.id_harga");
$nomor = 0;
while ($data = mysqli_fetch_array($sql)) {
    $nomor++;
?>

    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $data['id_pengunjung']; ?></td>
        <td><?php echo $data['nama_pengunjung']; ?></td>
        <td><?php echo $data['jenis_tiket']; ?></td>
        <td><?php echo $data['no_telp']; ?></td>
        <td><?php echo $data['durasi_tiket']; ?></td>
        <td><?php echo $data['harga_tiket']; ?></td>
        <td width="9%" align="center"><a href="?open=hapus_pengunjung&id_pengunjung=<?php echo $data['id_pengunjung']; ?>"
            target="_self" onclick="return confirm('YAKIN INGIN MENGHAPUS DATA PENGUNJUNG INI . . . ?')">Delete</a></td>
        <td width="9%" align="center"><a href="?open=edit_pengunjung&id_pengunjung=<?php echo $data['id_pengunjung']; ?>"
            target="_self">Edit</a></td>
    </tr>

<?php } ?>
</table>