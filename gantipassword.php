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

    // Ambil Password Lama di DB
    $query_cek = mysqli_query($koneksi, "SELECT password FROM tbuser WHERE nis = '$nis_siswa'");
    $data_user = mysqli_fetch_array($query_cek);
    $pass_db   = $data_user['password'];

    // Validasi
    if ($password_lama != $pass_db) {
        $pesan = "<div style='color: #c62828; background: #ffebee; padding: 10px; border-radius: 50px; margin-bottom: 20px; text-align:center;'>
                    Password Lama Salah!
                  </div>";
    }
    elseif ($password_baru != $konfirmasi) {
        $pesan = "<div style='color: #c62828; background: #ffebee; padding: 10px; border-radius: 50px; margin-bottom: 20px; text-align:center;'>
                    Password Baru & Konfirmasi Tidak Cocok!
                  </div>";
    }
    elseif (empty($password_baru)) {
        $pesan = "<div style='color: #c62828; background: #ffebee; padding: 10px; border-radius: 50px; margin-bottom: 20px; text-align:center;'>
                    Password Baru Tidak Boleh Kosong!
                  </div>";
    }
    else {
        // Update
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
    <style>
      
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 40px;
            width: 400px; 
            text-align: center;
            border-radius: 20px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.1); 
            border: 2px solid #b3e5fc; 
        }

        h2 {
            color: #0277bd;
            margin-bottom: 30px;
            margin-top: 0;
        }

        label {
            display: block;
            text-align: left;
            margin-left: 15px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #0277bd;
            font-size: 14px;
        }

        /* Input Field Styling */
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 2px solid #b3e5fc; 
            border-radius: 50px; 
            box-sizing: border-box;
            text-align: center;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #0277bd;
            background-color: #f1f8e9;
        }

       
        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px 5px;
            text-decoration: none;
            border-radius: 50px; 
            font-weight: bold;
            transition: 0.2s;
            border: none;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-kirim {
            background-color: #fff59d; /
            color: #f9a825; 
            margin-top: 10px;
        }

        .btn-kirim:hover {
            opacity: 0.8;
            transform: scale(1.05); 
        }
        
        .back-link {
            display: block;
            margin-top: 20px;
            color: #888;
            text-decoration: none;
            font-size: 13px;
        }
        .back-link:hover {
            color: #0277bd;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>GANTI PASSWORD</h2>

        <!-- Pesan Error -->
        <?php if(isset($pesan)) { echo $pesan; } ?>

        <form action="" method="POST">
            
            <label>Password Lama</label>
            <input type="password" name="password_lama" placeholder="Password Lama" required>

            <label>Password Baru</label>
            <input type="password" name="password_baru" placeholder="Password Baru" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="konfirmasi_password" placeholder="Ulangi Password" required>

            <button type="submit" name="simpan_password" class="btn btn-kirim">SIMPAN</button>
        </form>

        <a href="index.php" class="back-link">&larr; Kembali</a>
    </div>

</body>
</html>