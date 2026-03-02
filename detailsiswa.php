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
    <title>Detail Pengaduan</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e3f2fd;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: #444;
        }

        
        .detail-card {
            background: white;
            width: 100%;
            max-width: 600px;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 2px solid #bbdefb; 
        }

        h2 {
            text-align: center;
            color: #1565c0; /* Biru tua */
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 24px;
        }

        /* Tabel Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e3f2fd;
            vertical-align: top;
        }

        /* Kolom Label (Kiri) */
        td:first-child {
            background-color: #e3f2fd; /* Background biru muda */
            color: #1565c0;
            font-weight: 600; /* Semi-bold */
            width: 35%;
            border-radius: 8px;
        }

        /* Kolom Isi (Kanan) */
        td:last-child {
            color: #555;
        }

        /* Styling Status Badge */
        .status-menunggu, .status-proses, .status-selesai {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 12px;
            text-transform: uppercase;
        }

        .status-menunggu {
            background-color: #fff3e0; /* Oranye pastel */
            color: #ef6c00;
        }

        .status-proses {
            background-color: #e3f2fd; /* Biru pastel */
            color: #1565c0;
        }

        .status-selesai {
            background-color: #e8f5e9; /* Hijau pastel */
            color: #2e7d32;
        }

        /* Feedback Box */
        .feedback-text {
            background-color: #fafafa;
            padding: 10px;
            border-left: 4px solid #90caf9;
            border-radius: 0 5px 5px 0;
            font-style: italic;
            color: #666;
        }

        /* Tombol Kembali */
        .btn-kembali {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 25px;
            padding: 12px;
            background-color:rgb(80, 219, 253);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: background-color 0.3s;
            box-shadow: 0 4px 0 #0d47a1;
        }

        .btn-kembali:hover {
            background-color: #1976d2;
            transform: translateY(-2px);
            box-shadow: 0 6px 0 #0d47a1;
        }
        
        .btn-kembali:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #0d47a1;
        }
    </style>
</head>
<body>

<div class="detail-card">
    <h2>Detail Pengaduan Anda</h2>

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
            <td>Feedback Admin</td>
            <td>
                <?php
                if (!empty($data['feedback']) && $data['feedback'] != '-') {
                    echo "<div class='feedback-text'>" . nl2br($data['feedback']) . "</div>";
                } else {
                    echo "<i>Belum ada tanggapan dari admin.</i>";
                }
                ?>
            </td>
        </tr>
    </table>

    <a href="datapengaduan.php" class="btn-kembali">Kembali</a>
</div>

</body>
</html>