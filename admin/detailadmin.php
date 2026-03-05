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

    // Logika: Jika feedback kosong, isi otomatis
    if (empty(trim($feedback))) {
        $feedback = "Terimakasih telah menghubungi kami mohon tunggu kami akan segara proses bisagasih";
    }

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
    <title>Detail Pengaduan Admin</title>
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #020617; 
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; 
            color: #fff;
            margin: 0;
            padding: 20px;
        }

        .detail-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 380px; /* Diperkecil dari 500px */
            padding: 20px; /* Padding diperkecil */
            border-radius: 8px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid #3b82f6;
        }

        h2 {
            text-align: center;
            color: #ffffff;
            margin-top: 0;
            margin-bottom: 5px;
            font-size: 18px; /* Font judul diperkecil */
            font-weight: 700;
            text-transform: uppercase;
        }

        .link-kembali {
            text-align: center;
            margin-bottom: 15px; /* Jarak dikurangin */
        }
        .link-kembali a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 11px; /* Font diperkecil */
            transition: color 0.3s;
        }
        .link-kembali a:hover {
            color: #3b82f6;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 6px; /* Jarak antar baris diperkecil */
            font-size: 12px; /* Font tabel diperkecil */
        }

        td {
            padding: 10px 12px; /* Padding diperkecil */
            vertical-align: middle;
        }

        td:first-child {
            background-color: #1e293b;
            color: #94a3b8;
            font-weight: 600;
            width: 35%;
            border-left: 3px solid #3b82f6; /* Ketebalan dikurangin */
            border-radius: 4px 0 0 4px;
            text-transform: uppercase;
            font-size: 10px; /* Font label diperkecil */
        }

        td:last-child {
            background-color: rgba(15, 23, 42, 0.5);
            color: #e2e8f0;
            border-radius: 0 4px 4px 0;
            word-break: break-word; /* Biar teks panjang ga ngeblur */
        }

        select, textarea {
            width: 100%;
            padding: 6px 8px; /* Padding input diperkecil */
            background-color: #0f172a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 11px; /* Font input diperkecil */
            color: #fff;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        select:focus, textarea:focus {
            border-color: #3b82f6;
            background-color: #1e293b;
            outline: none;
        }

        select option {
            background-color: #1e293b;
            color: #fff;
        }

        button[type="submit"] {
            width: 100%;
            padding: 8px; /* Padding tombol diperkecil */
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 12px; /* Font tombol diperkecil */
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 8px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        button[type="submit"]:hover {
            background-color: #3b82f6;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<div class="detail-card">
    <h2>Detail Pengaduan</h2>

    <div class="link-kembali">
        <a href="datapengaduan.php">&larr; Kembali ke Daftar</a>
    </div>
    
    <form method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td><?= $data['id_pelaporan'] ?></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><?= $data['ket_kategori'] ?></td>
            </tr>
            <tr>
                <td>Pelapor</td>
                <td><?= $data['nis'] ?></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td><?= $data['lokasi'] ?></td>
            </tr>
            <tr>
                <td>Isi</td>
                <td><?= $data['keterangan'] ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="statusSelect">
                        <option value="Menunggu" <?= $data['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>    
                        <option value="Proses" <?= $data['status'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
                        <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                </td>
            </tr>

            
               <tr>
          <td>Feedback</td>
             <td>
                <textarea name="feedback" id="feedbackBox" rows="2" placeholder="Tulis tanggapan..."><?= $data['feedback'] ?></textarea>
             </td>
            </tr>
        </table>
        
        <button type="submit" name="simpan">SIMPAN</button>
    </form>
</div>
            <script>
const statusSelect = document.getElementById("statusSelect");
const feedbackBox = document.getElementById("feedbackBox");

if(statusSelect && feedbackBox){
    statusSelect.addEventListener("change", function() {

        if (this.value === "Menunggu") {
            feedbackBox.value = "Pengaduan Anda telah terkirim.";
        }

        else if (this.value === "Proses") {
            feedbackBox.value = "laporan Anda sedang kami proses.";
        }

        else if (this.value === "Selesai") {
            feedbackBox.value = "Pengaduan telah selesai, Terimakasih.";
        }

    });
}
</script>
</body>
</html>
