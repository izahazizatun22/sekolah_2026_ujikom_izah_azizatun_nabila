<?php
include 'koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #020617;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            padding: 20px;
            width: 100%;
            max-width: 300px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #3b82f6;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
        }

        h1 {
            font-size: 16px;
            margin-bottom: 15px;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
        }

        .btn-back {
            display: inline-block;
            margin-bottom: 10px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 11px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 10px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 3px;
            font-weight: 600;
            color: #94a3b8;
            font-size: 10px;
            text-transform: uppercase;
        }

        input[type="text"], 
        textarea,
        select {
            width: 100%;
            padding: 8px 10px;
            background-color: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            color: #ffffff;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #3b82f6;
            background-color: rgba(15, 23, 42, 0.8);
            outline: none;
            box-shadow: 0 0 0 1px rgba(59, 130, 246, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 50px;
        }

        button {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 8px 15px;
            width: 100%;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
            margin-top: 5px;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.4);
        }

        button:hover { background-color: #3b82f6; }
    </style>
</head>
<body>
    
<div class="container">
    <a href="dashboardsiswa.php" class="btn-back">&larr; Kembali ke dashboardsiswa</a>

    <h1>Form Pengaduan</h1>

    <form action="prosespengaduan.php" method="POST">
        
        <div class="form-group">
            <label>TANGGAL</label>
            <input type="text" 
                   value="<?= date('Y-m-d H:i:s'); ?>" 
                   readonly 
                   style="background-color: rgba(15, 23, 42, 0.2); cursor: not-allowed; border-style: dashed;">
        </div>

        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="NIS" placeholder="Masukkan NIS" required />
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" placeholder="Contoh: Lab Komputer" required />
        </div>

        <div class="form-group">
            <label>KATEGORI</label>
            <select name="kategori" required>
                <option value="">-- Pilih Kategori --</option>

                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM kategori");

                if (!$query) {
                    echo "<option value=''>Tabel kategori tidak ditemukan</option>";
                } else {
                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                            echo "<option value='".$data['id_kategori']."'>".$data['ket_kategori']."</option>";
                        }
                    } else {
                        echo "<option value=''>Belum ada kategori</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" placeholder="Jelaskan detail masalah" required></textarea>
        </div>
            
        <button type="submit" name="kirim">KIRIM</button>
    </form>
</div>

</body>
</html>