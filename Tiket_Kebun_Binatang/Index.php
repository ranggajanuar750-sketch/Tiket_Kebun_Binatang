<!DOCTYPE html>
<html>
<head>
    <title>Kebun Binatang</title>

    <style>
         {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4be9dc 0%, #11b080, #f0f5f0 50%, #21ec7c, #398a2a 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            width: 500px;
            padding: 30px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .container img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        h1 {
            margin-top: 20px;
            font-size: 25px;
            color: #2e7d32;
        }

        p {
            margin: 10px 0 25px;
            color: #656d6d;
        }

        .button {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .button a {
            text-decoration: none;
            color: white;
            background: #2e7d32;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: bold;
        }

        .button a:hover {
            background: #1b5e20;
        }
    </style>
</head>

<body>

    <div class="container">

        <img src="logo_zoo.jpg" alt="Kebun Binatang">

        <h1>PEMBELIAN TIKET KEBUN BINATANG</h1>

        <p>Silakan pilih menu untuk melanjutkan</p>

        <div class="button">
            <a href="Login.php">ADMIN</a>
            <a href="pengunjung/pengunjung.php">PENGUNJUNG</a>
        </div>

    </div>

</body>
</html>