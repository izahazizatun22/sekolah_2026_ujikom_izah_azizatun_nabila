<?php
session_start();
include 'koneksi.php';

 $user_input = mysqli_real_escape_string($koneksi, $_POST['username']);
 $password   = mysqli_real_escape_string($koneksi, $_POST['password']);

// --- BENERIN QUERY DISINI ---
// Logika: Cari user yang (Username = input) ATAU (NIS = input)
// Jadi dia bisa login pakai username 'admin' ATAU pakai NIS '12345'
 $sql = "SELECT * FROM tbuser WHERE (username='$user_input' OR nis='$user_input') AND password='$password'";
 $query = mysqli_query($koneksi, $sql);
 $data = mysqli_fetch_assoc($query);

// Cek apakah data ketemu
if($data) {
    // Set Session
    $_SESSION['nis'] = $data['nis'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role']; 
    
    // Cek Role buat arahin halaman
    if($data['role'] == 'admin'){
        // Kalau Admin, arahkan ke folder admin (sesuaikan kalau file ada di root, hapus 'admin/')
        // Karena tadi kita buat dashboardadmin.php di root, jadi langsung 'dashboardadmin.php'
        header("Location: admin/dashboardadmin.php"); 
        exit; 
    }
    elseif($data['role'] == 'siswa'){
        // Kalau Siswa, arahkan ke dashboard siswa (index.php atau dashboardsiswa.php)
        // Sesuai yang kita buat tadi, dashboard siswa ada di index.php
        header("Location: dashboardsiswa.php"); 
        exit; 
    } else {
        // Kalau role ga jelas
        echo "<script>alert('Role tidak dikenali!'); window.location='indexlogin.php';</script>";
    }

} else {
    // Kalau Username/NIS atau Password salah
    echo "<script>alert('Username/NIS atau Password Salah!'); window.location='indexlogin.php';</script>";
}
?>