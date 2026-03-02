<?php
session_start();
if (!isset($_SESSION['nis'])) {
    header("Location: indexlogin.php"); 
}

 $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Siswa';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Font diganti Poppins */
            background-color: #e3f2fd; /* Biru pastel terang */
            margin: 0;
            padding: 0;
        }

       
        .container {
            max-width: 900px;
            margin: 50px auto; 
            padding: 20px;
        }

        /*  Sapaan */
        .header {
            background-color: white;
            padding: 25px;
            border-radius: 15px; 
            margin-bottom: 25px;
            border-left: 6px solid #29b6f6;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            position: relative; 
        }

        .header h2 {
            margin: 0;
            color: #0277bd; 
            font-weight: 700;
        }

        .header p {
            margin: 8px 0 0;
            color: #666;
        }

        /* Style Tombol Logout */
        .btn-logout {
            position: absolute;
            top: 25px;
            right: 25px;
            background-color: #ef5350; 
            color: white;
            padding: 8px 20px;
            border-radius: 20px; 
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 3px 0 #d32f2f;
        }

        .btn-logout:hover {
            background-color: #e53935;
            transform: translateY(-2px);
            box-shadow: 0 5px 0 #d32f2f;
        }
        
        .btn-logout:active {
            transform: translateY(1px);
            box-shadow: 0 1px 0 #d32f2f;
        }

        /* Pembungkus Menu */
        .menu-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Style Kotak Menu */
        .menu-box {
            background-color: white;
            flex: 1;
            min-width: 250px;
            padding: 30px 20px;
            border-radius: 15px;
            text-align: center;
            text-decoration: none;
            color: #444;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent; /* Untuk efek hover border */
        }

        .menu-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border-color: #81d4fa; /* Border biru muda saat hover */
        }

        /* Ikon Bulat */
        .icon {
            width: 70px;
            height: 70px;
            background-color: #29b6f6; 
            color: white;
            font-size: 28px;
            line-height: 70px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s;
        }

        /* Warna per Menu */
       
        .box-buat .icon { background-color: #4fc3f7; box-shadow: 0 5px 0 #29b6f6; }
    
        .box-cari .icon { background-color: #0288d1; box-shadow: 0 5px 0 #01579b; }
        
        /* Box 3: Ungu/Indigo (variasi agar tidak monoton) */
        .box-pw .icon { background-color: #5c6bc0; box-shadow: 0 5px 0 #3949ab; }

        .menu-box h3 { 
            margin: 0 0 10px; 
            color: #0277bd;
            font-weight: 600;
        }
        .menu-box p { margin: 0; font-size: 14px; color: #777; }

    </style>
</head>
<body>

    <div class="container">
        
        <!-- Sapaan -->
        <div class="header">
            
            <a href="logout.php" class="btn-logout">Logout</a>
            
            <h2>Dashboard Siswa</h2>
    
            <p>Selamat datang, <b><?php echo htmlspecialchars($username); ?></b></p>
        </div>

    
        <div class="menu-wrapper">
            
            <a href="buatpengaduan.php" class="menu-box box-buat">
                <div class="icon">📝</div>
                <h3>Buat Pengaduan</h3>
                <p>Klik untuk mengirimkan keluhan baru.</p>
            </a>

            <a href="datapengaduan.php" class="menu-box box-cari">
                <div class="icon">🔍</div>
                <h3>Data pengaduan</h3>
                <p>Lihat data yang sudah anda input</p>
            </a>

            <a href="gantipassword.php" class="menu-box box-pw">
                <div class="icon">🔑</div>
                <h3>Ganti Password</h3>
                <p>Perbarui kata sandi akun Anda.</p>
            </a>

        </div>

    </div>

</body>
</html>