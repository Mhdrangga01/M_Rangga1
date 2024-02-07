<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      font-size: 16px;
      margin: 0;
      padding: 0;
      background-color: #f1f1f1;
    }

    #login-box {
      width: 350px;
      margin: 50px auto;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333333;
    }

    form {
      text-align: center;
    }

    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      width: calc(100% - 20px);
      padding: 12px;
      margin-bottom: 20px;
      border: 2px solid #cccccc;
      border-radius: 6px;
    }

    .login-button {
      background-color: #00BFFF;
      color: white;
      width: 100%;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .login-button:hover {
      background-color: #00BFFF;
    }

    p.error-message {
      color: #ff0000;
      margin-bottom: 20px;
    }

    p.register-text {
      text-align: center;
      margin-top: 20px;
      color: #666666;
      font-size: 14px;
    }

    p.register-text a {
      color: #007bff;
      text-decoration: none;
    }

    p.register-text a:hover {
      text-decoration: underline;
    }

    /* CSS untuk pesan loading */
    #loading-message {
      display: none;
      text-align: center;
      margin-bottom: 20px;
    }

    /* Animasi putar-putar */
    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .spinner {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(0, 0, 0, 0.3);
      border-radius: 50%;
      border-top-color: #00BFFF;
      animation: spin 1s ease-in-out infinite;
    }
  </style>
</head>

<body>

  <div id="login-box">
    <h2>LOGIN</h2>
    <div id="loading-message">
      <div class="spinner"></div> <!-- Tambahkan animasi putar-putar di sini -->
      <p>Loading...</p>
    </div>
    <?php if (isset($_GET['error'])) { ?>
      <p class="error-message">
        <?php echo $_GET['error']; ?>
      </p>
    <?php } ?>
    <form id="login-form" action="login_process.php" method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="submit" value="MASUK" class="login-button">
    </form>
    <p class="register-text">Udah registrasi? Kalo belum <a href="registrasi.php">registrasi dulu</a></p>
  </div>

  <!-- Script JavaScript untuk menampilkan dan menyembunyikan pesan loading -->
  <script>
    document.getElementById('login-form').addEventListener('submit', function (event) {
      // Menghentikan default behavior dari form submission
      event.preventDefault();

      // Menampilkan pesan loading setelah jeda 1.5 detik
      setTimeout(function () {
        document.getElementById('loading-message').style.display = 'block';
        // Submit form setelah menampilkan pesan loading
        document.getElementById('login-form').submit();
      }, 1500);
    });
  </script>

</body>

</html>