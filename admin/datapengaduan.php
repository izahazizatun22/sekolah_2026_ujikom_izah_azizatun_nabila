<?php
 $koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_izah");


 $nis      = isset($_GET['nis']) ? $_GET['nis'] : '';
 $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
 $tanggal  = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';


 $sql = "SELECT * FROM input_aspirasi WHERE 1=1";


if (!empty($nis)) {
    $sql .= " AND nis LIKE '%$nis%'";
}


if (!empty($kategori)) {
    $sql .= " AND id_kategori = '$kategori'";
}

if (!empty($tanggal)) {
    $sql .= " AND DATE(tanggal) = '$tanggal'";
}

 $sql .= " ORDER BY tanggal DESC";

 $query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan Admin</title>
    <style>
      
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f8e9; 
            padding: 20px;
            margin: 0;
            color: #444;
        }

     
        .container {
            max-width: 1000px; 
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 2px solid #b2dfdb; 
            
           
            background-image: linear-gradient(#e8f5e9 1px, transparent 1px);
            background-size: 100% 30px;
        }

        h2 {
            text-align: center;
            color: #558b2f; /* Judul Hijau Tua */
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 24px;
        }

        /* Kotak Pencarian */
        .search-box {
            background-color: #fafafa;
            padding: 15px;
            border-radius: 15px;
            border: 1px dashed #c8e6c9;
            margin-bottom: 25px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }

        label {
            font-size: 12px;
            font-weight: bold;
            color: #558b2f;
            margin-right: 5px;
            display: block;
        }

        /* Input & Select */
        input, select, button {
            padding: 8px 15px;
            border: 2px solid #c8e6c9; 
            border-radius: 20px; 
            font-size: 12px;
            background: white;
            outline: none;
            color: #555;
            width: 100%; 
            box-sizing: border-box;
        }

        input:focus, select:focus {
            border-color: #66bb6a; 
        }

       
        button[type="submit"] {
            background-color: #66bb6a;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 3px 0 #43a047; 
        }
        button[type="submit"]:active {
            transform: translateY(3px);
            box-shadow: none;
        }

       
        button[type="button"] {
            background-color: #ef5350; 
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        /* Styling Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: white;
            border-radius: 10px;
            overflow: hidden; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        th {
            background-color: #c8e6c9; 
            color: #2e7d32; 
            padding: 12px;
            text-align: left;
            font-size: 13px;
            font-weight: bold;
            border-bottom: 2px solid #a5d6a7;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 12px;
            color: #444;
        }

        tr:hover td {
            background-color: #f1f8e9; /* Highlight baris jadi hijau sangat muda */
        }

        /* Agar form di search-box rapi berjejer */
        .form-group {
            flex: 1;
            min-width: 150px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Pengaduan (Admin)</h2>

  
    <div class="search-box">
        <form method="GET" style="display: flex; gap: 15px; flex-wrap: wrap; width: 100%;">
            
            <div class="form-group">
                <label>Cari NIS:</label>
                <input type="text" name="nis" value="<?= $nis; ?>" placeholder="Masukkan NIS...">
            </div>

            <div class="form-group">
                <label>Kategori:</label>
                <select name="kategori">
                    <option value="">-- Semua --</option>
                    <option value="1" <?= ($kategori=='1')?'selected':''; ?>>Lingkungan</option>
                    <option value="2" <?= ($kategori=='2')?'selected':''; ?>>Fasilitas</option>
                    <option value="3" <?= ($kategori=='3')?'selected':''; ?>>Pelayanan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal:</label>
                <input type="date" name="tanggal" value="<?= $tanggal; ?>">
            </div>

            <div class="form-group" style="flex: 0 0 auto; margin-top: 18px;">
                <button type="submit">Cari</button>
                <a href="datapengaduan.php">
                    <button type="button">Reset</button>
                </a>
            </div>
        </form>
    </div>

 
    <table>
        <tr>
            <th width="5%">No</th>
            <th width="15%">Tanggal</th>
            <th width="10%">Kategori</th>
            <th width="10%">NIS</th>
            <th width="15%">Lokasi</th>
            <th width="25%">Keterangan</th>
            <th width="10%">Status</th>
            <th width="10%">Detail</th>
        </tr>

    <?php
    $no = 1;
    if(mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_assoc($query)){
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
            <td><?= $data['id_kategori']; ?></td>
            <td><?= $data['nis']; ?></td>
            <td><?= $data['lokasi']; ?></td>
            <td><?= $data['keterangan']; ?></td>
            <td><?= $data['status']; ?></td>
            <td>
              
                <a href="detailadmin.php?id=<?= $data['id_pelaporan']; ?>" style="text-decoration: none;">
                    <button type="button" style="width: auto; padding: 5px 15px; font-size: 11px;">Detail</button>
                </a>
            </td>
        </tr>
    <?php }
    } else {
        echo "<tr><td colspan='8' style='text-align:center; padding: 20px; color: #888;'>Data tidak ditemukan.</td></tr>";
    }
    ?>
    </table>

    <div style="text-align: right; margin-top: 20px;">
        <a href="dashboardadmin.php" style="text-decoration: none; color: #666; font-size: 12px;">← Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>