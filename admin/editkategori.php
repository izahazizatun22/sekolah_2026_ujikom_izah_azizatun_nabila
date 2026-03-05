<?php
include 'koneksi.php';

// Ambil ID, jika tidak ada kembalikan ke halaman data
if (!isset($_GET['id'])) {
    header("Location: tampilkategori.php");
    exit;
}

 $id = $_GET['id'];
 $data = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
 $row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Data tidak ditemukan!";
    exit;
}

if(isset($_POST['submit'])) {
    $ket = $_POST['ket_kategori'];

    mysqli_query($koneksi, "UPDATE kategori SET ket_kategori='$ket' WHERE id_kategori='$id'");

    header("Location: tampilkategori.php");
    exit;
}    
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <!-- Font Poppins -->
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

        .edit-box {
            background: rgba(30, 41, 59, 0.7); 
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 320px;
            padding: 25px;
            border-radius: 8px; 
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid #3b82f6; 
            text-align: center;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 5px;
            color: #ffffff;
            font-size: 18px;
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
            font-size: 12px;
            transition: color 0.3s;
        }
        .link-kembali a:hover {
            color: #3b82f6; 
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 4px;
            font-weight: 600;
            color: #94a3b8;
            font-size: 10px;
            text-transform: uppercase;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px 10px;
            box-sizing: border-box;
            background-color: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            font-size: 12px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 15px; 
            transition: all 0.3s ease;
        }

        input[type="text"]:disabled {
            background-color: rgba(15, 23, 42, 0.2); 
            color: #64748b; 
            cursor: not-allowed;
            border-style: dashed; 
        }

        input:focus {
            border-color: #3b82f6; 
            background-color: rgba(15, 23, 42, 0.8);
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 5px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        button[type="submit"]:hover {
            background-color: #3b82f6;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<div class="edit-box">
    <h2>Edit Kategori</h2>
    
    <div class="link-kembali">
        <a href="tampilkategori.php">&larr; Batal / Kembali</a>
    </div>

    <form method="POST">
        <div>
            <label>ID Kategori</label>
            <input type="text" value="<?php echo $row['id_kategori']; ?>" disabled>
        </div>
        
        <div>
            <label>Keterangan Kategori</label>
            <input type="text" name="ket_kategori" value="<?php echo $row['ket_kategori']; ?>" placeholder="Nama Kategori" required>
        </div>

        <button type="submit" name="submit">UPDATE DATA</button>
    </form>
</div>

</body>

</html>
