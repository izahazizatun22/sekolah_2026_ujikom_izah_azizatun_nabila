<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengaduan Mutu</title>
   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #020617;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .main-container {
            width: 100%;
            max-width: 420px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px; /* Jarak antara Header dan Box Login */
        }

        .header-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            width: 100%;
            padding: 0 10px;
        }

        .logo-img {
            width: 70px; /* Ukuran Logo */
            height: auto;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
        }

         .mutu-logo {
            text-align: left;
        }

       .mutu-logo h1 {
            color: #ffffff;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.2;
        }

        .mutu-logo span {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #94a3b8;
        }

        /* Garis Pemisah*/
        .divider {
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.5), transparent);
            margin: 5px 0;
        }

        /* Kotak Form */
        .login-box {
            position: relative;
            z-index: 1;
            
            /* Navy Transparan & Efek Kaca */
            background: rgba(30, 41, 59, 0.7); 
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            
            width: 100%;
            padding: 30px 40px;
            border-radius: 20px;
            
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

        h2 {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-weight: 600;
            color: #94a3b8; 
            font-size: 14px;
        }

        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 15px 20px;
            box-sizing: border-box;
            background-color: rgba(15, 23, 42, 0.5); 
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px; 
            
            font-size: 15px;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        /* Efek Saat Input di Klik */
        input:focus {
            border-color: #3b82f6; 
            background-color: rgba(30, 41, 59, 0.8);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        input::placeholder {
            color: #64748b;
        }

        /* Login */
        button[type="submit"] {
            width: 100%;
            padding: 16px;
            background-color: #2563eb; 
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
            transition: all 0.3s ease;
            margin-top: 5px;
        }

        button[type="submit"]:hover {
            background-color: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5);
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

    <div class="main-container">
        
        <!--Logo + Nama Sekolah -->
        <div class="header-info">
            <img src="logo_mutu_png_transparant-removebg-preview-1.png" alt="Logo Sekolah" class="logo-img">
            <div class="mutu-logo">
                <h1>SMK TI Muhammadiyah</h1>
                <span>Cikampek</span>
            </div>
        </div>

        <!-- Garis Pemisah --> 
        <div class="divider"></div>

        <!-- Kotak Login -->
        <div class="login-box">
            <h2>Login</h2>
            <form action="proseslogin.php" method="post">

                <label>Username</label>
                <input type="text" name="username" placeholder="Masukan username" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukan Password" required>

                <button type="submit" name="login">Masuk</button>
            </form>
        </div>

    </div>

</body>
</html>