<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_izah");

$nis        = $_SESSION['nis']; 
$lokasi     = $_POST['lokasi'];
$kategori   = $_POST['kategori'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi,"INSERT INTO input_aspirasi
(nis, id_kategori, lokasi, keterangan, status, feedback)
VALUES ('$nis','$kategori','$lokasi','$keterangan','proses','-')");

echo "<script>
alert('Pengaduan berhasil terkirim');
window.location='datapengaduan.php';
</script>";
?>