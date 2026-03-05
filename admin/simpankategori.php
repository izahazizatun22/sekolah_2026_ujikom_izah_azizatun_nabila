<?php
 $id_kategori  = $_POST['id_kategori'];
 $ket_kategori = $_POST['ket_kategori'];


 $koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_izah");


 $query = mysqli_query($koneksi, "INSERT INTO `kategori`(`id_kategori`, `ket_kategori`) VALUES ('$id_kategori','$ket_kategori')");

if($query) {
    echo "<script>
            alert('Data Kategori Berhasil Disimpan!');
            window.location.href = 'datakategori.php'; // Arahkan ke halaman data kategori
          </script>";
} else {

    echo "<script>
            alert('Data Kategori Gagal Disimpan! (Mungkin ID sudah ada)');
            history.back();
          </script>";
}
?>