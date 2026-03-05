<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['nis'])) {
    header("Location: indexlogin.php");
    exit;
}

// Cek apakah ada ID yang dikirim
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

 $id  = $_GET['id'];
 $nis = $_SESSION['nis']; // Ambil NIS dari session

// Ambil data berdasarkan ID dan NIS (biar aman)
 $query = mysqli_query($koneksi, "
    SELECT input_aspirasi.*, kategori.id_kategori AS ket_kategori
    FROM input_aspirasi
    LEFT JOIN kategori ON input_aspirasi.id_kategori = kategori.id_kategori
    WHERE input_aspirasi.id_pelaporan = '$id'
    AND input_aspirasi.nis = '$nis'
");

 $data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data pengaduan tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAIL PENGADUAN SISWA</title>

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
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: #fff;
        }

        
        .detail-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 380px; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid #3b82f6;
        }

        h2 {
            text-align: center;
            color: #ffffff;
            margin-top: 0;
            margin-bottom: 5px;
            font-size: 18px; 
            font-weight: 700;
            text-transform: uppercase;
        }

        .link-kembali {
            text-align: center;
            margin-bottom: 15px; 
        }
        .link-kembali a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 12px; 
            transition: color 0.3s;
        }
        .link-kembali a:hover {
            color: #3b82f6;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 6px; 
            font-size: 12px; 
        }

        td {
            padding: 10px 12px; 
            vertical-align: middle;
        }

        /* label kiri */
        td:first-child {
            background-color: #1e293b; 
            color: #94a3b8;
            font-weight: 600;
            width: 35%;
            border-left: 3px solid #3b82f6; 
            border-radius: 4px 0 0 4px; 
            
            text-transform: uppercase;
            font-size: 10px; 
            letter-spacing: 0.5px;
        }

        /* Kolom Isi (Kanan) */
        td:last-child {
            background-color: rgba(15, 23, 42, 0.5); 
            color: #e2e8f0;
            border-radius: 0 4px 4px 0;
        }

        .status-menunggu, .status-proses, .status-selesai {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 10px; /* Font diperkecil */
            text-transform: uppercase;
            border: 1px solid;
        }

        .status-menunggu {
            background-color: transparent; 
            color: #fbbf24;
            border-color: rgba(251, 191, 36, 0.3);
        }

        .status-proses {
            background-color: transparent; 
            color: #60a5fa;
            border-color: rgba(96, 165, 250, 0.3);
        }

        .status-selesai {
            background-color: transparent; 
            color: #4ade80;
            border-color: rgba(74, 222, 128, 0.3);
        }

        .feedback-text {
            background-color: rgba(15, 23, 42, 0.8);
            padding: 8px; 
            border-left: 3px solid #3b82f6;
            border-radius: 0 4px 4px 0;
            font-style: italic;
            color: #cbd5e1;
            font-size: 11px; 
            line-height: 1.4;
        }

        .kosong {
            color: #64748b;
            font-style: italic;
            font-size: 11px; 
        }
    </style>
</head>
<body>

<div class="detail-card">
    <h2>Detail Pengaduan</h2>
    
    <div class="link-kembali">
        <a href="datapengaduan.php">&larr; Kembali ke Histori</a>
    </div>

    <table>
        <tr>
            <td>Tanggal</td>
            <td><?= $data['tanggal']; ?></td>
        </tr>
        <tr>
            <td>ID Pelaporan</td>
            <td><?= $data['id_pelaporan']; ?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><?= $data['ket_kategori']; ?></td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td><?= $data['lokasi']; ?></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><?= $data['keterangan']; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <?php
                if ($data['status'] == 'Menunggu') {
                    echo "<span class='status-menunggu'>Menunggu</span>";
                } elseif ($data['status'] == 'Proses') {
                    echo "<span class='status-proses'>Proses</span>";
                } elseif ($data['status'] == 'Selesai') {
                    echo "<span class='status-selesai'>Selesai</span>";
                } else {
                    echo $data['status'];
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Feedback</td>
            <td>
                <?php
                if (!empty($data['feedback']) && $data['feedback'] != '-') {
                    echo "<div class='feedback-text'>" . nl2br($data['feedback']) . "</div>";
                } else {
                    echo "<span class='kosong'>Belum ada tanggapan.</span>";
                }
                ?>
            </td>
        </tr>
    </table>
</div>

</body>
</html>