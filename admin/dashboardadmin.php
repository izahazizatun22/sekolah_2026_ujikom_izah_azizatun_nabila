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
    min-height: 100vh;
    color: #fff;
    padding: 20px;
}

.container {
    max-width: 1000px;
    margin: 30px auto;
}

.header {
    background-color: #1e293b;
    padding: 20px 25px;
    border-radius: 12px;
    margin-bottom: 25px;
    border: 1px solid #3b82f6;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.header-atas {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.logo-sekolah {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo-img {
    width: 35px;
    height: auto;
}

.nama-sekolah h4 {
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    margin: 0;
    line-height: 1.2;
}

.nama-sekolah span {
    color: #94a3b8;
    font-size: 10px;
    font-weight: 500;
}

.btn-logout {
    background-color: transparent;
    color: #f87171;
    padding: 6px 15px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    border: 2px solid #f87171;
    transition: all 0.2s;
}

.btn-logout:hover {
    background-color: #f87171;
    color: white;
}

.garis {
    width: 100%;
    height: 1px;
    background-color: rgba(255, 255, 255, 0.1);
}

.judul-dashboard {
    width: 100%;
    text-align: center;
}

.judul-dashboard h2 {
    color: #ffffff;
    font-weight: 700;
    font-size: 20px;
    margin-bottom: 5px;
}

.judul-dashboard p { 
    color: #94a3b8; 
    font-size: 13px; 
}

.menu-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center; 
    margin-bottom: 15px;
}

.menu-item {
    background-color: rgba(30, 41, 59, 0.5); 
    backdrop-filter: blur(5px);
    flex: 1;
    min-width: 200px;
    padding: 20px 15px;
    border-radius: 10px;
    text-align: center;
    text-decoration: none;
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    min-height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.menu-item:hover {
    background-color: rgba(30, 41, 59, 0.8);
    border-color: #3b82f6; 
    transform: translateY(-3px);
}

.icon {
    width: 45px;
    height: 45px;
    color: white;
    font-size: 20px;
    line-height: 45px;
    border-radius: 50%;
    margin: 0 auto 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.box-input-siswa .icon { background-color: #2563eb; }
.box-tampil-siswa .icon { background-color: #0284c7; }
.box-histori .icon { background-color: #dc2626; }
.box-kategori .icon { background-color: #7c3aed; }
.box-tampil-kategori .icon { background-color: #059669; }

.menu-item h3 { 
    margin: 0 0 5px; 
    font-size: 14px;
    font-weight: 600;
}

.menu-item p { 
    margin: 0; 
    font-size: 11px;
    color: #94a3b8; 
}
</style>
</head>

<body>

<div class="container">
    <div class="header">

        <div class="header-atas">
            <div class="logo-sekolah">
                <img src="logo_mutu_png_transparant-removebg-preview-1.png" class="logo-img">
                <div class="nama-sekolah">
                    <h4>SMK TI Muhammadiyah</h4>
                    <span>Cikampek</span>
                </div>
            </div>
            <a href="../logout.php" class="btn-logout">Logout</a>
        </div>

        <div class="garis"></div>

        <div class="judul-dashboard">
            <h2>Dashboard Admin</h2>
            <p>Selamat datang, <b><?= htmlspecialchars($username); ?></b></p>
        </div>
    </div>

    <div class="menu-container">

        <a href="datasiswa.php" class="menu-item box-input-siswa">
            <div class="icon">👨‍🎓</div>
            <h3>Input Siswa</h3>
            <p>Tambahkan data siswa baru.</p>
        </a>

        <a href="tampildata.php" class="menu-item box-tampil-siswa">
            <div class="icon">📋</div>
            <h3>Data Siswa</h3>
            <p>Lihat dan kelola data siswa.</p>
        </a>

        <a href="datapengaduan.php" class="menu-item box-histori">
            <div class="icon">📂</div>
            <h3>Histori Pengaduan</h3>
            <p>Lihat laporan dan beri tanggapan.</p>
        </a>

        <a href="datakategori.php" class="menu-item box-kategori">
            <div class="icon">🏷️</div>
            <h3>Input Kategori</h3>
            <p>Tambahkan kategori baru.</p>
        </a>

        <a href="tampilkategori.php" class="menu-item box-tampil-kategori">
            <div class="icon">📚</div>
            <h3>Data Kategori</h3>
            <p>Lihat dan kelola kategori laporan.</p>
        </a>

    </div>
</div>

</body>
</html>