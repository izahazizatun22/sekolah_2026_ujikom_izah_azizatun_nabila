<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111827; 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* cahaya dibelakang kolum judul */
        .glow-effect {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.08) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
            pointer-events: none;
        }

        /* Container Utama */
        .container {
            position: relative;
            z-index: 1;
            background: rgba(15, 23, 42, 0.9); /* Navy Transparan */
            backdrop-filter: blur(12px); 
            -webkit-backdrop-filter: blur(12px);
            
            padding: 50px 60px;
            width: 100%;
            max-width: 700px; 
            border-radius: 20px;
            
            /* Border bawah logo */
            border: 2px solid rgba(59, 130, 246, 0.5);
            box-shadow: 
            0 25px 50px rgba(0, 0, 0, 0.5), 
            0 0 30px rgba(37, 99, 235, 0.15); 
                
            text-align: center;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Logo + Nama Sekolah */
        .header-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
            text-align: left;
        }

        .logo-img {
            width: 70px;
            height: auto;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
        }

        .bilalogo {
            color: #ffffff;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.2;
        }

        .bilalogo span {
            display: block;
            font-size: 15px;
            font-weight: 500;
            color: #94a3b8; 
            margin-top: 2px;
        }

        h2 {
            color: #ffffff;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 35px;
            line-height: 1.4;
            padding-top: 25px;
            /* Garis Pemisah Tebal Biru */
            border-top: 3px solid #3b82f6;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        /* login */
        .btn {
            display: inline-block;
            padding: 16px 60px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            
            background-color: #2563eb; 
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
        }

        .btn:hover {
            background-color: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5);
        }

        .btn:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

 
    <div class="glow-effect"></div>

    <div class="container">
        <div class="header-info">
<img src="logo_mutu_png_transparant-removebg-preview-1.png" alt="Logo Sekolah" class="logo-img">
            <div class="bilalogo">
                SMK TI Muhammadiyah
                <span>Cikampek</span>
            </div>
        </div>

        <h2>SELAMAT DATANG DI WEBSITE PENGADUAN MUTU</h2>
        
        <form action="indexlogin.php" method="POST">
            <button type="submit" class="btn">LOGIN</button>
        </form>
    </div>

</body>
</html> 

