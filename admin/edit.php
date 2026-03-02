<?php
include 'koneksi.php';

if (!isset($_GET['nis'])) {
    echo "NIS tidak ditemukan!";
    exit;
}

 $nis = $_GET['nis'];
 $data = mysqli_query($koneksi, "SELECT * FROM tbuser WHERE nis='$nis'");
 $row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Data siswa tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    // Perbaikan: Ambil data sesuai 'name' di input HTML
    // Saya asumsikan input 'nama' mengisi kolom 'username' di database
    $nama_baru = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    // Perbaikan: Gunakan variabel yang benar di SQL
    // Jika di database kolomnya bernama 'username', kita update username = '$nama_baru'
    $query = "UPDATE tbuser SET username='$nama_baru', kelas='$kelas', jurusan='$jurusan' WHERE nis='$nis'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: tampildata.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <style>
        /* --- CSS TEMA HIJAU PASTEL NOTEBOOK --- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f8e9; /* Background Hijau Muda */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #444;
        }

        .edit-box {
            background-color: white;
            width: 100%;
            max-width: 400px; /* Lebar kotak */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 2px solid #b2dfdb;
            
            /* Efek Garis Notebook */
            background-image: linear-gradient(#e8f5e9 1px, transparent 1px);
            background-size: 100% 30px;
            
            text-align: center;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 25px;
            color: #558b2f;
        }

        label {
            display: block;
            text-align: left;
            margin-left: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #558b2f;
            font-size: 12px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 2px solid #c8e6c9;
            border-radius: 50px; /* Bentuk Pill */
            font-size: 14px;
            text-align: center;
            background-color: white;
            transition: border-color 0.3s;
            margin-bottom: 15px;
            font-family: inherit;
        }

        input:focus {
            border-color: #66bb6a;
            outline: none;
            background-color: #fafafa;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #66bb6a;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 0 #43a047;
            transition: all 0.2s;
            margin-top: 10px;
        }

        button[type="submit"]:active {
            transform: translateY(4px);
            box-shadow: 0 0 0 #43a047;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #888;
            font-size: 13px;
        }
        .back-link:hover { color: #558b2f; }
    </style>
</head>
<body>

<div class="edit-box">
    <h2>Edit Data Siswa</h2>
    
   
    <form method="POST">
        
        <label>Nama / Username</label>
        <input type="text" name="nama" value="<?php echo $row['username']; ?>" placeholder="Masukkan Nama">
        
        <label>Kelas</label>
        <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" placeholder="Masukkan Kelas">
        
        <label>Jurusan</label>
        <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" placeholder="Masukkan Jurusan">

        <button type="submit" name="submit">Update Data</button>
    </form>

    <a href="tampildata.php" class="back-link">Batal / Kembali</a>
</div>

</body>
</html>