<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID pengguna tidak ditemukan";
    exit;
}

 $id = $_GET['id'];

if (isset($_POST['simpan'])) {
    $status = $_POST['status'];
    $feedback = $_POST['feedback'];

    mysqli_query($koneksi, "UPDATE `input_aspirasi` SET status='$status', feedback='$feedback' WHERE id_pelaporan='$id'");

    header("Location: datapengaduan.php"); 
    exit;
}


 $query = mysqli_query($koneksi, "SELECT `input_aspirasi`.*, kategori.id_kategori AS ket_kategori FROM `input_aspirasi` LEFT JOIN kategori ON `input_aspirasi`.id_kategori = kategori.id_kategori WHERE `input_aspirasi`.id_pelaporan = '$id' ");

 $data = mysqli_fetch_assoc($query);

if(!$data) {
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
    <style>
      
        body {
            background-color: #f1f8e9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh; 
            color: #444;
            margin: 0;
            padding: 20px;
        }

        .detail-card {
            background-color: white;
            width: 100%;
            max-width: 600px; /* Ukuran pas seperti form input */
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 2px solid #b2dfdb; /* Border hijau kebiruan */
            
            /* --- EFEK GARIS NOTEBOOK --- */
            background-image: linear-gradient(#e8f5e9 1px, transparent 1px);
            background-size: 100% 30px;
        }

        h2 {
            text-align: center;
            color: #558b2f; /* Hijau Tua Judul */
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 22px;
        }

        /* Tabel Layout */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        td {
            padding: 8px 10px;
            border-bottom: 1px solid #f1f8e9; /* Garis bawah halus */
            vertical-align: top; 
        }

        /* Styling Kolom Kiri (Label) */
        td:first-child {
            font-weight: bold;
            color: #558b2f; /* Warna teks label */
            background-color: #e8f5e9; /* Background label */
            width: 35%; 
            border-radius: 8px;
            padding-left: 15px;
        }

        /* Kolom Isi (Kanan) */
        td:last-child {
            color: #444;
            padding-left: 15px;
        }
        
        /* Styling Input, Select, Textarea */
        select, textarea {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #c8e6c9; /* Border hijau pastel */
            border-radius: 20px; /* Bentuk Pill (Bulat) */
            font-family: inherit;
            font-size: 13px;
            box-sizing: border-box; 
            background-color: #fff;
            transition: border-color 0.3s;
        }

        select:focus, textarea:focus {
            border-color: #66bb6a; /* Fokus hijau terang */
            outline: none;
        }
      
        /* Tombol Simpan */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #66bb6a; /* Hijau Utama */
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 0 #43a047; /* Efek timbul */
            transition: all 0.2s;
            margin-top: 10px;
        }

        button[type="submit"]:active {
            transform: translateY(4px);
            box-shadow: 0 0 0 #43a047;
        }

        /* Tombol Kembali */
        .btn-kembali {
            display: block;
            width: 100%;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #666;
            background-color: #e0e0e0;
            padding: 10px;
            border-radius: 20px;
            font-size: 13px;
            transition: background 0.3s;
        }

        .btn-kembali:hover {
            background-color: #d6d6d6;
            color: #333;
        }
    </style>
</head>
<body>

<div class="detail-card">
    <h2>Detail Laporan</h2>
    
    <form method="POST">
        <table>
            <tr>
                <td>ID Pelaporan</td>
                <td><?= $data['id_pelaporan'] ?></td>
            </tr>
            <tr>
                <td>Kategori</td>

                <td><?= $data['ket_kategori'] ?></td>
            </tr>
            <tr>
                <td>Pelapor (NIS)</td>
                <td><?= $data['nis'] ?></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td><?= $data['lokasi'] ?></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><?= $data['keterangan'] ?></td>
            </tr>
            <tr>
                <td>Status Saat Ini</td>
                <td>
                    <select name="status">
                        <option value="Menunggu" <?= $data['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>    
                        <option value="Proses" <?= $data['status'] == 'Proses' ? 'selected' : '' ?>>Sedang Diproses</option>
                        <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Tanggapan Admin</td>
                <td>
                    <textarea name="feedback" rows="4" placeholder="Tulis tanggapan Anda di sini..."><?= $data['feedback'] ?></textarea>
                </td>
            </tr>
        </table>
        
        <button type="submit" name="simpan">Simpan Perubahan</button>
        <a href="datapengaduan.php" class="btn-kembali">Kembali ke Daftar Laporan</a>
    </form>
</div>

</body>
</html>