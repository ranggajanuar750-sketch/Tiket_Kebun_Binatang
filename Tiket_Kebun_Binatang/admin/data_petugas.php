<?php
include_once "../src/Koneksi.php";
?>

<h1><b>DATA PETUGAS </b></h1>
<h4><a href="?open=tambah_petugas">+ Tambah Data</a></h3>

<table cellspacing="1" cellpadding="3">
    <tr>
        <td width="5%" bgcolor="#CCCCCC"><b>No.</b></td>
        <td width="5%" bgcolor="#CCCCCC"><b>ID</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>NAMA</b></td>
        <td width="10%" bgcolor="#CCCCCC"><b>PASSWORD</b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>LEVEL</b></td>
       
        <td colspan="2" align="center" bgcolor="#CCCCCC"><b>Tools</b></td>
    </tr>

<?php
$sql = mysqli_query($Koneksi, "SELECT * FROM petugas");
$nomor = 0;
while ($data = mysqli_fetch_array($sql)) {
    $nomor++;
?>

    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $data['id_petugas']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['password']; ?></td>
        <td><?php echo $data['level']; ?></td>
        <td width="9%" align="center"><a href="?open=hapus_petugas&id_petugas=<?php echo $data['id_petugas']; ?>"
            target="_self" onclick="return confirm('YAKIN INGIN MENGHAPUS DATA PETUGAS INI . . . ?')">Delete</a></td>
        <td width="9%" align="center"><a href="?open=edit_petugas&id_petugas=<?php echo $data['id_petugas']; ?>"
            target="_self">Edit</a></td>
    </tr>

<?php } ?>
</table>