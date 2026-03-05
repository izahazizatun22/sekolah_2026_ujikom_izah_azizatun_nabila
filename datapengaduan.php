<?php
 $koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_izah");

 $kategori    = isset($_GET['kategori']) ? $_GET['kategori'] : '';
 $tanggal     = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
 $nis_cari    = isset($_GET['nis']) ? $_GET['nis'] : '';

 $sql = "SELECT * FROM input_aspirasi WHERE 1=1";

// filter kategori
if (!empty($kategori)) {
    $sql .= " AND id_kategori = '$kategori'";
}

// filter tanggal
if (!empty($tanggal)) {
    $sql .= " AND DATE(tanggal) = '$tanggal'";
}

// filter NIS
if (!empty($nis_cari)) {
    $sql .= " AND nis LIKE '%$nis_cari%'";
}

 $sql .= " ORDER BY tanggal DESC";

 $query_tabel = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan</title>
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
            margin: 0;
            padding: 20px;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #ffffff;
            margin-bottom: 5px; 
            text-align: center;
            font-size: 20px;
            font-weight: 700;
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

      
        .container-card {
            background: rgba(30, 41, 59, 0.8);  
            width: 100%;
            max-width: 950px;
            padding: 20px;
            border-radius: 8px; 
            border: 1px solid #3b82f6; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            overflow-x: auto; /* Responsive tabel */
        }

        .pencarian-box {
            background-color: rgba(15, 23, 42, 0.5); 
            padding: 15px;
            border-radius: 6px; 
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            gap: 10px;
            border: 1px solid rgba(255,255,255,0.05);
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .pencarian-box label {
            font-weight: 600;
            color: #94a3b8;
            font-size: 11px; 
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        select, 
        input[type="date"], 
        input[type="text"] {
            padding: 8px 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px; 
            font-family: 'Poppins', sans-serif;
            background-color: #0f172a; 
            color: #fff;
            font-size: 12px;
            outline: none;
            transition: 0.3s;
            min-width: 130px;
        }

        select:focus, input:focus {
            border-color: #3b82f6; 
            background-color: #1e293b;
        }
        
        select option {
            background-color: #1e293b;
            color: #fff;
        }


        .btn-cari {
            background-color: #2563eb; 
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 12px;
            height: fit-content;
        }

        .btn-cari:hover {
            background-color: #3b82f6;
            transform: translateY(-1px);
        }

        .btn-reset {
            background-color: transparent;
            color: #94a3b8;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.1);
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 12px;
            height: fit-content;
        }
        
        .btn-reset:hover {
            background-color: rgba(255,255,255,0.05);
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px; 
            min-width: 800px; 
        }

        th {
            background-color: #1e293b; 
            color: #94a3b8;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #3b82f6; 
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            color: #e2e8f0;
            vertical-align: top;
        }

        tr:hover td {
            background-color: rgba(59, 130, 246, 0.05); 
        }
        .status-menunggu {
            background-color: rgba(251, 191, 36, 0.1); 
            color: #fbbf24;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }

        .status-proses {
            background-color: rgba(59, 130, 246, 0.1); 
            color: #60a5fa;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .status-selesai {
            background-color: rgba(34, 197, 94, 0.1); 
            color: #4ade80;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .btn-detail {
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            padding: 5px 12px;
            border-radius: 4px; 
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-detail:hover {
            background-color: #2563eb;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
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

<h2>HISTORI PENGADUAN</h2>
<div class="link-kembali">
    <a href="dashboardsiswa.php">&larr; Kembali ke Dashboard</a>
</div>

<div class="container-card">
    <div class="pencarian-box">
        <form method="GET" style="display: contents;">
            
            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" placeholder="Cari NIS..." value="<?= $nis_cari; ?>">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori">
                    <option value="">-- Semua --</option>
                    <option value="1" <?= ($kategori=='1')?'selected':''; ?>>Lingkungan</option>
                    <option value="2" <?= ($kategori=='2')?'selected':''; ?>>Fasilitas</option>
                    <option value="3" <?= ($kategori=='3')?'selected':''; ?>>Pelayanan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="<?= $tanggal; ?>">
            </div>

            <button type="submit" class="btn-cari">Cari</button>
            <a href="datapengaduan.php" class="btn-reset">Reset</a>

        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>NIS</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (mysqli_num_rows($query_tabel) == 0) {
                echo "<tr><td colspan='8' class='kosong'>Tidak ada data ditemukan.</td></tr>";
            } else {
                while ($data = mysqli_fetch_assoc($query_tabel)){
                    $status_class = '';
                    if ($data['status'] == 'Menunggu') $status_class = 'status-menunggu';
                    elseif ($data['status'] == 'Proses') $status_class = 'status-proses';
                    elseif ($data['status'] == 'Selesai') $status_class = 'status-selesai';
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($data['tanggal'])); ?></td>
                <td><?= $data['id_kategori']; ?></td>
                <td><?= $data['nis']; ?></td>
                <td><?= $data['lokasi']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td><span class="<?= $status_class; ?>"><?= $data['status']; ?></span></td>
                <td>
                    <a href="detailsiswa.php?id=<?= $data['id_pelaporan'] ?>" class="btn-detail">
                        Detail
                    </a>
                </td>
            </tr>
            <?php 
                } 
            } 
            ?>
        </tbody>
    </table>
</div>

</body>
</html>