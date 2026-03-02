<?php
session_start();


if (!isset($_SESSION['nis'])) {
    header("Location: indexlogin.php"); 
    exit;
}

 $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
      
        
    
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1f8e9;
            margin: 0;
            padding: 0;
        }

        /* Kotak Utama */
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
        }

        /* Header Sapaan */
        .header {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 5px solid #558b2f;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: relative; /* Untuk posisi tombol logout */
        }

        .header h2 {
            margin: 0;
            color: #33691e;
        }

        .header p {
            margin: 5px 0 0;
            color: #666;
        }

        /* Style Tombol Logout */
        .btn-logout {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ef5350;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn-logout:hover {
            background-color: #c62828;
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
            min-width: 200px; /* Agar muat 4 menu */
            padding: 30px 20px;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            color: #444;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }

        .menu-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Ikon Bulat */
        .icon {
            width: 60px;
            height: 60px;
            color: white;
            font-size: 24px;
            line-height: 60px;
            border-radius: 50%;
            margin: 0 auto 15px;
        }

    
        .box-input-siswa .icon { background-color: #66bb6a; } 
        .box-tampil-siswa .icon { background-color: #29b6f6; } 
        .box-histori .icon { background-color: #ab47bc; }
        .box-kategori .icon { background-color: #ffa726; } 

        .menu-box h3 { margin: 0 0 10px; font-size: 18px; }
        .menu-box p { margin: 0; font-size: 13px; color: #777; }

    </style>
</head>
<body>

    <div class="container">
        
        <div class="header">
            <!-- Tombol Logout -->
            <a href="../logout.php" class="btn-logout">Logout</a>
            
            <h2>Dashboard Admin</h2>
            <p>Selamat datang, <b><?php echo htmlspecialchars($username); ?></b></p>
        </div>

    
        <div class="menu-wrapper">
            
          
            <a href="datasiswa.php" class="menu-box box-input-siswa">
                <div class="icon">👨‍🎓</div>
                <h3>Input Siswa</h3>
                <p>Tambahkan data siswa baru.</p>
            </a>

           
            <a href="tampildata.php" class="menu-box box-tampil-siswa">
                <div class="icon">📋</div>
                <h3>Data Siswa</h3>
                <p>Lihat dan kelola data siswa.</p>
            </a>

    
            <a href="datapengaduan.php" class="menu-box box-histori">
                <div class="icon">📂</div>
                <h3>Histori Pengaduan</h3>
                <p>Lihat laporan dan beri tanggapan.</p>
            </a>

            <a href="datakategori.php" class="menu-box box-kategori">
                <div class="icon">🏷️</div>
                <h3>Input Kategori</h3>
                <p>Tambah kategori laporan.</p>
            </a>

        </div>

    </div>

</body>
</html>