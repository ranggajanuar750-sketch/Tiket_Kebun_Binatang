<?php

if (isset($_GET['open'])) {
    switch ($_GET['open']) {
        case '':
            if (!file_exists("Halaman_Admin.php")) die("File tidak ada");
            include "Halaman_Admin.php";
            break;
        case 'data_pengunjung':
                if (!file_exists("data_pengunjung.php")) die("File tidak ada !");
                include "data_pengunjung.php";
                break;
        case 'tambah_pengunjung':
                if (!file_exists("tambah_pengunjung.php")) die("File tidak ada !");
                include "tambah_pengunjung.php";
                break;
        case 'hapus_pengunjung':
                if (!file_exists("hapus_pengunjung.php")) die("File tidak ada !");
                include "hapus_pengunjung.php";
                break;
        case 'edit_pengunjung':
                if (!file_exists("edit_pengunjung.php")) die("File tidak ada !");
                include "edit_pengunjung.php";
                break;
        case 'data_jenis_tiket':
                if (!file_exists("dat_jenis_tiket.php")) die("File tidak ada !");
                include "data_jenis_tiket.php";
                break;
        case 'tambah_jenis_tiket':
                if (!file_exists("tambah_jenis_tiket.php")) die("File tidak ada !");
                include "tambah_jenis_tiket.php";
                break;
        case 'hapus_jenis_tiket':
                if (!file_exists("hapus_jenis_tiket.php")) die("File tidak ada !");
                include "hapus_jenis_tiket.php";
                break;
        case 'edit_jenis_tiket':
                if (!file_exists("edit_jenis_tiket.php")) die("File tidak ada !");
                include "edit_jenis_tiket.php";
                break;
        case 'data_harga_tiket':
                if (!file_exists("data_harga_tiket.php")) die("File tidak ada !");
                include "data_harga_tiket.php";
                break;
        case 'tambah_harga_tiket':
                if (!file_exists("tambah_harga_tiket.php")) die("File tidak ada !");
                include "tambah_harga_tiket.php";
                break;
        case 'hapus_harga_tiket':
                if (!file_exists("hapus_harga_tiket.php")) die("File tidak ada !");
                include "hapus_harga_tiket.php";
                break;
        case 'edit_harga_tiket':
                if (!file_exists("edit_harga_tiket.php")) die("File tidak ada !");
                include "edit_harga_tiket.php";
                break;
        case 'data_petugas':
                if (!file_exists("data_petugas.php")) die("File tidak ada !");
                include "data_petugas.php";
                break;
        case 'tambah_petugas':
                if (!file_exists("tambah_petugas.php")) die("File tidak ada !");
                include "tambah_petugas.php";
                break;
        case 'hapus_petugas':
                if (!file_exists("hapus_petugas.php")) die("File tidak ada !");
                include "hapus_petugas.php";
                break;
        case 'edit_petugas':
                if (!file_exists("edit_petugas.php")) die("File tidak ada !");
                include "edit_petugas.php";
                break;
                        

            default:
                if (!file_exists("Hlaman_Admin.php")) die("File tidak ada !");
                include "Halaman_Admin.php";
                     break;
    }
}