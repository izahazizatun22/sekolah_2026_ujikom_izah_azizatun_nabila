<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengaduan Mutu</title>
   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f1f8e9; 
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #444;
        }

        .login-box {
            background-color: white;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 2px solid #81d4fa; 

           
            background-image: linear-gradient(#f1f8e9 1px, transparent 1px); 
            background-size: 100% 30px; 
            
            text-align: center;
        }

        label {
            display: block;
            text-align: left;
            margin-left: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #0277bd; 
            font-size: 14px;
        }

        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 15px;
            box-sizing: border-box;
            border: 2px solid #a5d6a7; 
            border-radius: 50px;
            font-size: 16px;
            text-align: center;
            background-color: white; 
            transition: border-color 0.3s;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
        }

        input:focus {
            border-color: #29b6f6; /
            outline: none;
            background-color: #fafafa;
        }

        /* tombol Login */
        button[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #29b6f6; 
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 0 #0288d1; 
            transition: all 0.2s;
        }

        button[type="submit"]:active {
            transform: translateY(4px);
            box-shadow: 0 0 0 #0288d1;
        }

        h2 {
            color: #43a047; 
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2 style="margin-top: 0; margin-bottom: 25px;">LOGIN</h2>
        <form action="proseslogin.php" method="post">

            <label>Username / NIS</label>
            <input type="text" name="username" placeholder="masukan nis" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="masukan password" required>

            <button type="submit" name="login">Masuk</button>
        </form>
    </div>

</body>
</html>