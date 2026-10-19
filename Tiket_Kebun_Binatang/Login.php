<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login TIKET KEBUN BINATANG</title>
    <!-- Mengambil font Google modern -->
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
           background: linear-gradient(135deg, #4be9dc 0%, #11b080, #f0f5f0 50%, #21ec7c, #398a2a 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
            font-size: 2.2rem;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
        }

        h1 b {
            color:  #2e7d32;
            font-weight: 700;
        }

        .login-card {
            background-color: white;
            width: 100%;
            max-width: 400px;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .profile-area {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-area img {
            border-radius: 50%;
            background: #f3f4f6;
            padding: 5px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .title-login {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 25px;
        }

        /* Notifikasi Error PHP */
        .alert {
            background-color: #fde8e8;
            color: #9b1c1c;
            padding: 12px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid #fbd5d5;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            height: 50px;
            padding: 0 20px;
            font-size: 0.95rem;
            background-color: #f3f4f6;
            border: 2px solid transparent;
            border-radius: 12px;
            color: #1f2937;
            transition: all 0.3s ease;
        }

        /* Efek fokus saat input diklik */
        .form-group input:focus {
            outline: none;
            background-color: #fff;
            border-color: #428df5;
            box-shadow: 0 0 0 4px rgba(66, 141, 245, 0.15);
        }

        /* Tombol Login */
        .btn-submit {
            width: 100%;
            height: 50px;
            background-color: #428df5;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
            box-shadow: 0 4px 12px rgba(66, 141, 245, 0.3);
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #2b76dd;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

    <h1><b>TIKET KEBUN BINATANG</b></h1>

    <div class="login-card">
        
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal"){
                echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
            }
        }
        ?>

        <div class="profile-area">
            <img src="logo_zoo.jpg" width="80" height="80" alt="Profile">
        </div>

        <h2 class="title-login">LOGIN</h2>

        <form action="Loginvalidasi.php" method="post">
            <div class="form-group">
                <input name="nama" type="text" placeholder="Nama" required>
            </div>

            <div class="form-group">
                <input name="password" type="password" placeholder="Password" required>
            </div>

            <button name="login" type="submit" class="btn-submit">LOGIN</button>
            
        <!-- </form>
            <tr><td> </td></tr>
            <tr><td> </td></tr>
            <tr><td align="center"> <a href = "bayar.php"> CEK PEMBAYARAN </a> </td></tr>
    </div> -->

</body>
</html>