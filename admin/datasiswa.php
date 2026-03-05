<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input Data Siswa</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box;}

body{
    background-color:#020617;
    font-family:'Poppins',sans-serif;
    display:flex;
    align-items:center;
    justify-content:center;
    min-height:100vh;
    color:#fff;
    padding:20px;
}

.kotak-form{
    background:rgba(30,41,59,0.7);
    backdrop-filter:blur(10px);
    width:100%;
    max-width: 450px; 
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 25px 50px rgba(0,0,0,0.5);
    border: 1px solid #3b82f6;
}

h2{
    text-align: center; /* Tengah atas */
    margin-bottom: 20px;
    font-size: 18px; 
    font-weight:700;
    text-transform:uppercase;
    color: #fff;
}

.tombol-kembali{
    text-align:center;
    margin-bottom: 20px;
}
.tombol-kembali a{
    color:#94a3b8;
    text-decoration:none;
    font-size:11px;
    transition:0.3s;
}
.tombol-kembali a:hover{
    color:#3b82f6;
}

/* Layout Form Horizontal */
form {
    display: flex;
    flex-direction: column;
    gap: 12px; /* Jarak antar baris */
}

.form-group {
    display: flex; /* Label & Input sejajar */
    align-items: center;
}

label {
    width: 100px; 
    font-weight: 600;
    color: #94a3b8;
    font-size: 10px; 
    text-transform: uppercase;
    padding-right: 10px;
}

input[type="text"],
input[type="password"],
select {
    flex-grow: 1; /* Input ngambil sisa ruang */
    padding: 8px 10px;
    background-color: rgba(15,23,42,0.5);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 4px; 
    font-size: 11px; 
    color: #fff;
    font-family: 'Poppins',sans-serif;
    transition: 0.3s;
}

input:focus, select:focus {
    border-color: #3b82f6;
    background-color: rgba(15,23,42,0.8);
    outline: none;
}

select option {
    background-color: #1e293b;
    color: #fff;
}

/* Bagian Tombol Sejajar dengan Input  */
.form-actions {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding-left: 100px; /* Samain dengan lebar label */
    margin-top: 5px;
}

button[type="submit"]{
    padding: 8px;
    background-color: #2563eb;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

button[type="submit"]:hover {
    background-color: #3b82f6;
}

.tombol-lihat {
    display: inline-block;
    text-decoration: none;
    background-color: transparent;
    color: #64748b;
    border: none;
    font-size: 10px;
    font-weight: 600;
    text-align: center;
    transition: 0.3s;
    cursor: pointer;
}

.tombol-lihat:hover {
    color: #94a3b8;
}
</style>
</head>

<body>

<div class="kotak-form">
    
    <div class="tombol-kembali">
        <a href="dashboardadmin.php">&larr; Kembali ke Dashboard</a>
    </div>


    <h2>Input Data Siswa</h2>

    <form action="koneksidata.php" method="POST">

        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" placeholder="Masukkan NIS" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Buat Username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Buat Password" required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role">
                <option value="siswa">Siswa</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label>Kelas</label>
            <input type="text" name="kelas" placeholder="Contoh: XII RPL 2" required>
        </div>

        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" name="jurusan" placeholder="Jurusan" required>
        </div>

        <!-- Tombol Aksi (Sejajar dengan Input) -->
        <div class="form-actions">
            <button type="submit">SIMPAN DATA</button>
            <a href="tampildata.php" class="tombol-lihat">Lihat Data Siswa</a>
        </div>

    </form>
</div>

</body>
</html>