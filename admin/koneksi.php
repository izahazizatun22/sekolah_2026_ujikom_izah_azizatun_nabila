<?php
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_izah");

if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>