<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kategori</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #020617;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .kotak-form {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 320px;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid #3b82f6;
            text-align: center;
        }

        h2 {
            margin-bottom: 5px;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .tombol-kembali {
            text-align: center;
            margin-bottom: 20px;
        }

        .tombol-kembali a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 12px;
            transition: 0.3s;
        }

        .tombol-kembali a:hover {
            color: #3b82f6;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 4px;
            font-weight: 600;
            color: #94a3b8;
            font-size: 10px;
            text-transform: uppercase;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px 10px;
            background-color: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            font-size: 12px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #3b82f6;
            background-color: rgba(15, 23, 42, 0.8);
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 5px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        button[type="submit"]:hover {
            background-color: #3b82f6;
            transform: translateY(-1px);
        }

        .btn-lihat-data {
            display: block;
            text-decoration: none;
            width: 100%;
            padding: 10px;
            background-color: transparent;
            color: #94a3b8;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-lihat-data:hover {
            background-color: rgba(255,255,255,0.05);
            color: #fff;
            border-color: rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>

<div class="kotak-form">
    <h2>Input Kategori</h2>

    <div class="tombol-kembali">
        <a href="dashboardadmin.php">&larr; Kembali ke Dashboard</a>
    </div>

    <form action="simpankategori.php" method="POST">
        <div>
            <label>ID Kategori</label>
            <input type="text" name="id_kategori" placeholder="Contoh: 1, 2, 3..." required>
        </div>

        <div>
            <label>Keterangan Kategori</label>
            <input type="text" name="ket_kategori" placeholder="Contoh: Lingkungan" required>
        </div>

        <button type="submit">SIMPAN DATA</button>
        
        <a href="tampilkategori.php" class="btn-lihat-data">Lihat Data Kategori</a>
    </form>
</div>

</body>
</html>