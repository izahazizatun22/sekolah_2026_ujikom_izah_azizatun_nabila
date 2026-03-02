<?php
 $koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_izah");

// Ambil filter kalau ada
 $kategori    = isset($_GET['kategori']) ? $_GET['kategori'] : '';
 $tanggal     = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
 $nis_cari    = isset($_GET['nis']) ? $_GET['nis'] : ''; // Variabel baru untuk NIS

// Query dasar
 $sql = "SELECT * FROM input_aspirasi WHERE 1=1";

// Filter kategori
if (!empty($kategori)) {
    $sql .= " AND id_kategori = '$kategori'";
}

// Filter tanggal
if (!empty($tanggal)) {
    $sql .= " AND DATE(tanggal) = '$tanggal'";
}

// Filter NIS (Menggunakan LIKE agar bisa mencari sebagian kata)
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
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Tema Biru Pastel Kalem & Lucu */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e1f5fe; /* Biru pastel sangat terang */
            margin: 0;
            padding: 20px;
            color: #444;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #0277bd;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Container Utama (Card) */
        .container-card {
            background: white;
            width: 100%;
            max-width: 1000px;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border: 2px solid #b3e5fc;
            margin-bottom: 20px;
        }

        /* Box Pencarian */
        .search-box {
            background-color: #e3f2fd; /* Biru muda di dalam card */
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end; /* Agar item sejajar bawah */
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .search-box label {
            font-weight: 600;
            color: #0288d1;
            font-size: 13px;
            margin-bottom: 5px;
        }

        /* Styling Input & Select */
        select, 
        input[type="date"], 
        input[type="text"] { /* Ditambah input text untuk NIS */
            padding: 8px 15px;
            border: 2px solid #b3e5fc;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            background-color: white;
            color: #555;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
            min-width: 150px; /* Lebar minimal */
        }

        select:focus, input:focus {
            border-color: #4fc3f7;
        }

        /* Tombol Cari & Reset */
        .btn-cari {
            background-color: #4fc3f7;
            color: white;
            border: none;
            padding: 8px 25px;
            border-radius: 20px; /* Bulat lucu */
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 3px 0 #29b6f6;
            height: fit-content; /* Agar tinggi tombol pas */
        }

        .btn-cari:hover {
            background-color: #29b6f6;
            transform: translateY(-2px);
        }

        .btn-reset {
            background-color: #fff;
            color: #0288d1;
            text-decoration: none;
            border: 2px solid #b3e5fc;
            padding: 8px 25px;
            border-radius: 20px;
            font-weight: bold;
            transition: all 0.3s;
            height: fit-content;
        }
        
        .btn-reset:hover {
            background-color: #e1f5fe;
            border-color: #81d4fa;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            background-color: #b3e5fc; /* Biru pastel header */
            color: #01579b;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #81d4fa;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e1f5fe;
            vertical-align: top;
        }

        tr:hover td {
            background-color: #f1f9ff;
        }

        /* Status Badge (Kapsul Warna) */
        .status-menunggu {
            background-color: #fff9c4; /* Kuning pastel */
            color: #f9a825;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-proses {
            background-color: #e3f2fd; /* Biru pastel */
            color: #1976d2;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-selesai {
            background-color: #e8f5e9; /* Hijau pastel */
            color: #43a047;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        /* Tombol Detail */
        .btn-detail {
            background-color: #81d4fa;
            color: white;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-detail:hover {
            background-color: #4fc3f7;
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .search-box {
                flex-direction: column;
                align-items: stretch;
            }
            .form-group {
                width: 100%;
            }
            select, input[type="date"], input[type="text"] {
                width: 100%;
            }
            .btn-cari, .btn-reset {
                width: 100%;
                text-align: center;
            }
            table {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<h2>Data Pengaduan</h2>

<div class="container-card">
    <!-- 🔎 SEARCH BOX -->
    <div class="search-box">
        <form method="GET" style="display: contents;">
            
            <!-- Input NIS Baru -->
            <div class="form-group">
                <label>NIS:</label>
                <input type="text" name="nis" placeholder="Cari NIS..." value="<?= $nis_cari; ?>">
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

            <button type="submit" class="btn-cari">Cari</button>
            <a href="datapengaduan.php" class="btn-reset">Reset</a>

        </form>
    </div>

    <!-- TABEL DATA -->
    <table>
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

        <?php
        $no = 1;
        // Cek jika tidak ada data
        if (mysqli_num_rows($query_tabel) == 0) {
            echo "<tr><td colspan='8' style='text-align:center; color:#888; padding:20px;'>Tidak ada data ditemukan.</td></tr>";
        } else {
            while ($data = mysqli_fetch_assoc($query_tabel)){
                // Logika warna status
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

    </table>
</div>

</body>
</html>