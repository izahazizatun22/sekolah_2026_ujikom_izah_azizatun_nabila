<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_izah");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['nis'])) {
    echo "<script>
            alert('Silakan login terlebih dahulu!');
            window.location='login.php';
          </script>";
    exit;
}

if (!isset($_POST['kategori']) || empty($_POST['kategori'])) {
    echo "<script>
            alert('Kategori belum dipilih!');
            history.back();
          </script>";
    exit;
}

$nis        = $_SESSION['nis'];
$lokasi     = $_POST['lokasi'];
$kategori   = $_POST['kategori'];
$keterangan = $_POST['keterangan'];


// CEK KATEGORI ADA ATAU TIDAK
$cek_kategori = mysqli_query($koneksi, 
    "SELECT id_kategori FROM kategori WHERE id_kategori='$kategori'");

if (!$cek_kategori || mysqli_num_rows($cek_kategori) == 0) {
    echo "<script>
            alert('Kategori tidak valid!');
            history.back();
          </script>";
    exit;
}


// INSERT DATA
$query = mysqli_query($koneksi,"INSERT INTO input_aspirasi
(nis, id_kategori, lokasi, keterangan, status, feedback)
VALUES 
('$nis','$kategori','$lokasi','$keterangan','proses','-')");

if ($query) {
    echo "<script>
            alert('Pengaduan berhasil terkirim');
            window.location='datapengaduan.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>