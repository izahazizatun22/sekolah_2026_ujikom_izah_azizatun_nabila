<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan</title>
    <!-- Import Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Tema Pastel Biru & Kuning */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e3f2fd; /* Biru pastel lembut */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            background: white;
            padding: 25px; /* Padding dikurangi dari 40px */
            width: 100%;
            max-width: 350px; /* Lebar dikurangi dari 450px */
            text-align: center;
            border-radius: 15px; /* Sudut disesuaikan */
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 2px solid #b3e5fc;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 18px; /* Ukuran judul dikurangi */
            margin-bottom: 20px; /* Jarak bawah dikurangi */
            color: #0277bd;
            line-height: 1.3;
        }

        /* Tombol Kembali */
        .btn-back {
            display: inline-block;
            margin-bottom: 15px;
            color: #0277bd;
            text-decoration: none;
            font-size: 12px; /* Font dikurangi */
            font-weight: 600;
            transition: color 0.3s;
        }
        .btn-back:hover {
            color: #01579b;
            text-decoration: underline;
        }

        /* Grup Form */
        .form-group {
            margin-bottom: 15px; /* Jarak antar form dikurangi */
            text-align: left;
        }

        /* Label Bold */
        label {
            display: block;
            margin-bottom: 5px; /* Jarak label ke input dikurangi */
            font-weight: 600;
            color: #0277bd;
            font-size: 12px; /* Font label dikurangi */
        }

        /* Input & Select */
        input[type="text"], 
        textarea,
        select {
            width: 100%;                
            padding: 8px 10px; /* Padding input dikurangi */
            border: 2px solid #b3e5fc;
            border-radius: 8px;
            box-sizing: border-box;     
            font-family: 'Poppins', sans-serif;
            font-size: 12px; /* Font input dikurangi */
            background-color: #fff;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        /* Efek Fokus */
        input:focus, select:focus, textarea:focus {
            border-color: #29b6f6;
            outline: none;
            box-shadow: 0 0 0 2px rgba(41, 182, 246, 0.2); /* Bayangan dikurangi */
        }

        /* Textarea ukuran */
        textarea {
            resize: vertical;
            min-height: 60px; /* Tinggi minimal dikurangi */
        }

        /* Tombol Submit */
        button {
            background-color: #fff59d;
            color: #f57f17;
            border: none;
            padding: 10px 15px; /* Padding tombol dikurangi */
            width: 100%;                
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            font-size: 13px; /* Font tombol dikurangi */
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            margin-top: 5px;
            box-shadow: 0 3px 0 #fdd835; /* Bayangan dikurangi */
        }

        button:hover {
            background-color: #fff176;
            transform: translateY(-2px);
            box-shadow: 0 5px 0 #fdd835;
        }

        button:active {
            transform: translateY(2px);
            box-shadow: 0 1px 0 #fdd835;
        }
    </style>
</head>
<body>
    
<div class="container">
    <a href="index.php" class="btn-back">&larr; Kembali ke Menu Utama</a>

    <h1>FORM PENGADUAN MUTU</h1>

    <form action="prosespengaduan.php" method="POST">
        
        <div class="form-group">
            <label for="tanggal">TANGGAL</label>
            <input type="text" 
                   id="tanggal"
                   value="<?= date('Y-m-d H:i:s'); ?>" 
                   readonly style="background-color: #f1f8e9; cursor: not-allowed;">
        </div>

        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" 
                   name="NIS" id="nis" placeholder="Masukkan NIS" required />
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" 
                   name="lokasi" id="lokasi" placeholder="Contoh: Lab Komputer" required />
        </div>

        <div class="form-group">
            <label for="kategori">KATEGORI</label>
            <select name="kategori" id="kategori" required>
                <option value="1">Lingkungan</option>
                <option value="2">Fasilitas</option>
                <option value="3">Pelayanan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" 
                      id="keterangan" placeholder="Jelaskan detail masalah Anda" required></textarea>
        </div>
            
        <button type="submit" name="kirim">KIRIM PENGADUAN</button>
    </form>
</div>

</body>
</html>