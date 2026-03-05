<?php
include 'koneksi.php';
 $query = "SELECT * FROM tbuser";
 $result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
            padding: 20px;
            margin: 0;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #ffffff;
            margin-top: 0;
            margin-bottom: 5px;
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

        .container-table {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 950px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            border: 1px solid #3b82f6; 
            overflow-x: auto; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            min-width: 700px; 
        }

        th {
            background-color: #1e293b;
            color: #94a3b8; 
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #3b82f6; 
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            color: #e2e8f0; 
            vertical-align: middle;
        }

        tr:hover td {
            background-color: rgba(59, 130, 246, 0.05);
        }

        
        .btn-aksi {
            padding: 5px 12px;
            text-decoration: none;
            border-radius: 4px; 
            font-size: 11px;
            font-weight: 600;
            margin-right: 5px;
            display: inline-block;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-edit {
            background-color: #f59e0b; 
            color: white;
        }
        .btn-edit:hover {
            background-color: #fbbf24;
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.3);
        }

        .btn-hapus {
            background-color: #ef4444; 
            color: white;
        }
        .btn-hapus:hover {
            background-color: #f87171;
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.3);
        }

        .kosong {
            text-align: center; 
            color: #64748b; 
            padding: 30px; 
            font-style: italic;
        }
    </style>
</head>
<body>

<h2>Data Siswa</h2>
<div class="link-kembali">
    <a href="datasiswa.php">&larr; Kembali ke Input Data</a>
</div>

<div class="container-table">
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">NIS</th>
                <th width="25%">Username</th>
                <th width="10%">Kelas</th>
                <th width="15%">Jurusan</th>
                <th width="10%">Role</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nis']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['kelas']; ?></td>
                <td><?= $row['jurusan']; ?></td>
                <td><?= $row['role']; ?></td>
                
                <td>
                    <a href="edit.php?nis=<?= $row['nis']; ?>" class="btn-aksi btn-edit">Edit</a>
                    
                    <a href="delete.php?nis=<?= $row['nis']; ?>" 
                       class="btn-aksi btn-hapus"
                       onclick="return confirm('Yakin ingin menghapus data siswa ini?')">
                       Delete
                    </a>
                </td>
            </tr>
            <?php } 
            } else {
                echo "<tr><td colspan='7' class='kosong'>Belum ada data siswa.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>