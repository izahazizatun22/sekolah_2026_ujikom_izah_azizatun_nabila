<?php
session_start();
include 'koneksi.php';

 $username = $_POST['username'];
 $password = $_POST['password'];


$sql = "SELECT * FROM tbuser WHERE username='$username' AND password='$password'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

if($data) {
   
    $_SESSION['nis'] = $data['nis'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role']; 

    // --- 2. Pemisah Admin & Siswa  ---
    if($data['role'] == 'admin'){
        // Tambahan: Set session ID dan Nama agar Dashboard Admin tahu siapa yang login
        $_SESSION['nis'] = $data['nis']; 
        $_SESSION['username'] = $data['username']; 
        
        header("Location: admin/dashboardadmin.php");
        exit; 
    }
    elseif($data['role'] == 'siswa'){
        
        $_SESSION['nis'] = $data['nis'];
        $_SESSION['username'] = $data['username']; 
        header("Location: dashboardsiswa.php"); 
        exit; 
    } else {
        echo "<script>alert('Password salah!'); window.location='indexlogin.php';</script>";
    }

} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='indexlogin.php';</script>";
}
?>