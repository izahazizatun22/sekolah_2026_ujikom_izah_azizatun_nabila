<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_izah");

$nis = $_GET['nis'];
mysqli_query($koneksi, "DELETE FROM tbuser WHERE nis='$nis'");

header("Location: tampildata.php");

