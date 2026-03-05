<?php
session_start();

if (!isset($_SESSION['nis'])) {
    echo "<script>alert('Silakan Login Terlebih Dahulu!'); window.location.href='indexlogin.php';</script>";
    exit;
}

 $koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_izah");

if (isset($_POST['simpan_password'])) {
    
    $nis_siswa     = $_SESSION['nis']; 
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi    = $_POST['konfirmasi_password'];

    $query_cek = mysqli_query($koneksi, "SELECT password FROM tbuser WHERE nis = '$nis_siswa'");
    $data_user = mysqli_fetch_array($query_cek);
    $pass_db   = $data_user['password'];

    if ($password_lama != $pass_db) {
        $pesan = "<div style='color: #f87171; background: rgba(248, 113, 113, 0.1); padding: 10px; border-radius: 6px; margin-bottom: 15px; text-align:center; border: 1px solid rgba(248, 113, 113, 0.3); font-size: 13px;'>
                    Password Lama Salah!
                  </div>";
    }
    elseif ($password_baru != $konfirmasi) {
         $pesan = "<div style='color: #f87171; background: rgba(248, 113, 113, 0.1); padding: 10px; border-radius: 6px; margin-bottom: 15px; text-align:center; border: 1px solid rgba(248, 113, 113, 0.3); font-size: 13px;'>
                    Password Baru & Konfirmasi Tidak Cocok!
                  </div>";
    }
    elseif (empty($password_baru)) {
         $pesan = "<div style='color: #f87171; background: rgba(248, 113, 113, 0.1); padding: 10px; border-radius: 6px; margin-bottom: 15px; text-align:center; border: 1px solid rgba(248, 113, 113, 0.3); font-size: 13px;'>
                    Password Baru Tidak Boleh Kosong!
                  </div>";
    }
    else {
        $update = mysqli_query($koneksi, "UPDATE tbuser SET password = '$password_baru' WHERE nis = '$nis_siswa'");
        
        if ($update) {
            echo "<script>alert('Password Berhasil Diganti!'); window.location.href='index.php';</script>";
        } else {
            echo "Gagal: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    
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
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        .container {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            padding: 25px;
            width: 100%;
            max-width: 320px;
            text-align: center;
            border-radius: 8px; 
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid #3b82f6; 
        }

        h2 {
            color: #ffffff;
            margin-bottom: 5px;
            margin-top: 0;
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .link-kembali {
            text-align: center;
            margin-bottom: 20px;
        }
        .link-kembali a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s;
        }
        .link-kembali a:hover {
            color: #3b82f6; 
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 4px;
            font-weight: 600;
            color: #94a3b8; 
            font-size: 11px;
            text-transform: uppercase;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px; 
            background-color: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px; 
            box-sizing: border-box;
            text-align: left; 
            outline: none;
            transition: 0.3s;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #fff;
        }

        input:focus {
            border-color: #3b82f6; 
            background-color: rgba(15, 23, 42, 0.8);
        }
        
        input::placeholder {
            color: #64748b;
        }

        /* tombol simpan */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 5px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            width: 100%;
            cursor: pointer;
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
        }

        .btn-kirim {
            background-color: #2563eb; 
            color: white;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
            transition: all 0.3s ease;
        }

        .btn-kirim:hover {
            background-color: #3b82f6;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Ganti Password</h2>
        
        <div class="link-kembali">
            <a href="dashboardsiswa.php">&larr; Kembali ke Dashboard</a>
        </div>

        <!-- pesan error -->
        <?php if(isset($pesan)) { echo $pesan; } ?>
            
        <form method="POST">

            <label>Password Lama</label>
            <input type="password" name="password_lama" placeholder="masukkan password lama" required>

            <label>Password Baru</label>
            <input type="password" name="password_baru" placeholder="masukkan password baru" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="konfirmasi_password" placeholder="ulangi password baru" required>

            <button type="submit" name="simpan_password" class="btn btn-kirim">SIMPAN PASSWORD</button>
        </form>
    </div>

</body>
</html>