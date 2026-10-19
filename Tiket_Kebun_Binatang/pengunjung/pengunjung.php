<?php
include "../src/Koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengunjung</title>

    <style>
        body {
            font-family: Arial;
            background: #e8f5e9;
        }

        .container {
            width: 450px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #2e7d32;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2e7d32;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
        }

        button:hover {
            background: #1b5e20;
        }
        .container .logout {
            position: absolute;
            top: 10px;
            left: 12px;
            background: #c62828;
            color: white;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        .container .logout:hover {
            background: #b71c1c;
        }
    </style>
</head>

<body>

<div class="container">
    <a href="logout.php" class="logout">LOGOUT</a>

    <h2>FORM DATA PENGUNJUNG</h2>

    <form method="POST" action="simpan_pengunjung.php">

        <label>Nama Pengunjung</label>
        <input type="text" name="nama_pengunjung" required>

        <label>Jenis Tiket</label>
        <input type="text" name="jenis_tiket" required>

        <label>No. Telepon</label>
        <input type="text" name="no_telp" required>

        <button type="submit">BELI TIKET</button>

    </form>

</div>

</body>
</html>