<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        #register-box {
            width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333333;
            font-size: 24px;
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #999999;
            border-radius: 8px;
            background-color: #f7f7f7;
        }

        input[type="submit"] {
            display: block;
            width: 50%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            margin: 0 auto;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #007bff;
        }

        .error-message {
            color: #ff0000;
            margin-bottom: 20px;
        }

        .register-text {
            text-align: center;
            margin-top: 20px;
            color: #666666;
            font-size: 16px;
        }

        .register-text a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .register-text a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>

<body>

    <div id="register-box">
        <h2>REGISTRASI</h2>
        <form action="register_process.php" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="text" name="nama_panjang" placeholder="Nama Panjang" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <label for="level">ROLE:</label>
            <select name="level" id="level">
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select><br>
            <input type="submit" value="DAFTAR">
        </form>
    </div>

</body>

</html>