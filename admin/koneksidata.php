<?php
$username   = $_POST['username'];
$password   = $_POST['password'];
$nama       = $_POST['nama'];
$role       = $_POST['role'];
$kelas      = $_POST['kelas'];
$jurusan    = $_POST['jurusan'];

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_izah");

$query = mysqli_query($koneksi, 
"INSERT INTO tbuser (username, password, nama, role, kelas, jurusan) 
VALUES ('$username','$password','$nama','$role','$kelas','$jurusan')");

if($query) {
    echo "<script>
            alert('Data Siswa Berhasil Disimpan!');
            window.location.href = 'datasiswa.php';
          </script>";
} else {
    echo "<script>
            alert('Data Gagal Disimpan!');
            history.back();
          </script>";
}
?>