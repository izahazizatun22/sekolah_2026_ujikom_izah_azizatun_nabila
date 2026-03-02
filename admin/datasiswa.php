<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Siswa</title>
    <style>
        
        body {
            background-color: #f1f8e9; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Tambahkan ini untuk posisi tengah vertikal */
            height: 100vh; /* Tinggi layar penuh */
            margin: 0;
            color: #444;
            font-size: 12px;
        }

       
        .login-box {
            background-color: white;
            width: 100%;
            max-width: 320px; /* Diperbesar sedikit dari 260px */
            padding: 20px; 
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 2px solid #b2dfdb;
            
            /* Garis notebook */
            background-image: linear-gradient(#e8f5e9 1px, transparent 1px);
            background-size: 100% 22px; 
            
            text-align: center;
        }

        h2 {
            margin: 0 0 15px 0; 
            color: #558b2f; 
            font-size: 18px; 
        }

        label {
            display: block;
            text-align: left;
            margin-left: 5px;
            margin-bottom: 2px;
            font-weight: bold;
            color: #558b2f; 
            font-size: 11px; 
        }

        
        input[type="text"], 
        input[type="password"],
        select {
            width: 100%;
            padding: 6px 10px; 
            box-sizing: border-box;
            border: 2px solid #c8e6c9;
            border-radius: 20px; 
            font-size: 12px; 
            text-align: center;
            background-color: white; 
            transition: border-color 0.3s;
            margin-bottom: 8px; 
            font-family: inherit;
        }

        input:focus, select:focus {
            border-color: #66bb6a;
            outline: none;
            background-color: #fafafa;
        }

        /* Tombol Submit */
        button[type="submit"] {
            width: 100%;
            padding: 8px; 
            background-color: #66bb6a; 
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 3px 0 #43a047;
            transition: all 0.2s;
            margin-top: 5px;
        }

        button[type="submit"]:active {
            transform: translateY(3px);
            box-shadow: 0 0 0 #43a047; 
        }

        /* Tombol Lihat Data (Baru) */
        .btn-lihat {
            display: block;
            text-decoration: none;
            width: 100%;
            padding: 8px;
            background-color: white; 
            color: #558b2f;
            border: 2px solid #66bb6a;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 10px; /* Jarak dengan tombol kirim */
            box-sizing: border-box;
        }

        .btn-lihat:hover {
            background-color: #e8f5e9;
        }

    </style>
</head>
<body>

<div class="login-box">
    <h2>Input Data Siswa</h2>
    
    <!-- Pastikan action mengarah ke file proses yang benar -->
    <form action="koneksidata.php" method="POST">
        <div>
            <label>NIS</label>
            <input type="text" name="nis" required>
        </div>

        <div>
            <label>USERNAME</label>
            <input type="text" name="username" required>
        </div>

        <div>
            <label>PASSWORD</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>NAMA</label>
            <input type="text" name="nama" required>
        </div>

        <div>
            <label>ROLE</label>
            <select name="role">
                <option value="siswa">Siswa</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div>
            <label>KELAS</label>
            <input type="text" name="kelas" required>
        </div>

        <div>
            <label>JURUSAN</label>
            <input type="text" name="jurusan" required>
        </div>
        
        <button type="submit">Kirim Data</button>
        
        <!-- Tombol baru untuk melihat data -->
        <a href="tampildata.php" class="btn-lihat">Lihat Data Siswa</a>
    </form>
</div>

</body>
</html>