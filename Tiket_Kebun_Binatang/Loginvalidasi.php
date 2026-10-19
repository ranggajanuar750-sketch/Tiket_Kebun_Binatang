<?php
session_start();
// skrip menghubungkan php dengan koneksi database
include 'src/Koneksi.php';

// skrip menangkap data yang dikirim dari form login
$nama = $_POST['nama'];
$password = md5($_POST['password']);

$Login = mysqli_query($Koneksi, "SELECT * FROM petugas WHERE nama='$nama' AND password='$password'")
        or die(mysqli_error());
$cek = mysqli_num_rows($Login);

// skrip mengecek apakah nama dan password di temukan pada database
if($cek > 0){
    $data = mysqli_fetch_assoc($Login);
    
    if($data['level']=="admin"){ // cek jika user login sebagai admin
        $_SESSION['nama'] = $nama;
        $_SESSION['level'] = "admin";
        $_SESSION['id_petugas'] = $data['id_petugas'];
        // alihkan ke halaman dashboard admin
        echo '<script language="javascript">alert("Anda berhasil Login Admin!");
        document.location="admin/Halaman_Admin.php";</script>';
        
    // cek jika user login sebagai petugas
    }else if($data['level']=="petugas"){
        $_SESSION['nama'] = $nama;
        $_SESSION['level'] = "petugas";
        $_SESSION['id_petugas'] = $data['id_petugas'];
        // alihkan ke halaman dashboard petugas
        echo '<script language="javascript">alert("Anda berhasil Login Petugas!");
        document.location="petugas/halaman_petugas.php";</script>';
        
    }else{
        // alihkan ke halaman login kembali
        header("location:Index.php?pesan=gagal");
    }
}else{
    header("location:Index.php?pesan=gagal");
}
?>
