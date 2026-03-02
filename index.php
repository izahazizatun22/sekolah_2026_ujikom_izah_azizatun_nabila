<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- Link Font yang sudah diperbaiki -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif; 
            background-color: #f1f8e9; /* Warna dasar Hijau Pastel Lembut */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 60px 50px; /* Padding diperbesar */
            width: 100%;
            max-width: 700px; /* Lebar kotak diperbesar dari 500px jadi 700px */
            border-radius: 30px; /* Sudut lebih bulat */
            box-shadow: 0 15px 30px rgba(0,0,0,0.1); 
            border: 3px solid #81d4fa; /* Border Biru Pastel */
            animation: fadeIn 0.8s ease;
            text-align: center;
        } /* Kurung kurawal yang hilang sudah ditambahkan */

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        h2 {
            color: #0277bd; /* Warna Biru Tua */
            margin-bottom: 40px; /* Jarak ke tombol diperlebar */
            font-size: 32px; /* Ukuran font diperbesar */
            line-height: 1.4;
            font-weight: 700;
        }

        .btn {
            display: inline-block;
            padding: 18px 50px; /* Ukuran tombol diperbesar */
            margin: 10px 5px;
            text-decoration: none;
            border-radius: 50px; 
            font-weight: bold;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            font-size: 18px; /* Font tombol diperbesar */
            width: auto; /* Lebar menyesuaikan isi */
            min-width: 200px; /* Lebar minimal */
            font-family: 'Poppins', sans-serif;
            
            /* Warna Tombol Biru (menyesuaikan tema login) */
            background-color: #29b6f6; 
            color: white;
            box-shadow: 0 5px 0 #0288d1;
        }

        .btn:hover {
            background-color: #4fc3f7;
            transform: translateY(-3px); 
            box-shadow: 0 8px 0 #0288d1;
        }
        
        .btn:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #0288d1;
        }

    </style>
</head>
<body>
    
    <div class="container">
        <h2>SELAMAT DATANG DI WEBSITE PENGADUAN MUTU</h2>
        <form action="indexlogin.php" method="POST">
            <button type="submit" class="btn">LOGIN</button>
        </form>
    </div>

</body>
</html>