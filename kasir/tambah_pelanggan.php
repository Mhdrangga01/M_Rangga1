<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Pelanggan Baru</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: calc(100% - 20px); /* Mengurangi padding dari lebar input */
        padding: 8px;
        margin-bottom: 20px; /* Mengurangi margin-bottom untuk jarak yang lebih baik */
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button[type="submit"] {
        display: block;
        width: 20%; /* Mengatur lebar tombol */
        margin: 20px auto 10px; /* Mengatur margin untuk pusat secara horizontal */
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
    }

    .dashboard-button {
        display: block;
        width: 20%; /* Mengatur lebar tombol */
        margin: 0 auto; /* Mengatur margin untuk pusat secara horizontal */
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
    }

    .dashboard-button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<form action="proses_tambah_pelanggan.php" method="POST">
<h2>TAMBAH PELANGGAN BARU</h2>
  
  <label for="NamaPelanggan">Nama Pelanggan:</label><br>
  <input type="text" id="NamaPelanggan" name="NamaPelanggan"><br>
  
  <label for="Alamat">Alamat:</label><br>
  <input type="text" id="Alamat" name="Alamat"><br>
  
  <label for="NomorTelepon">Nomor Telepon:</label><br>
  <input type="text" id="NomorTelepon" name="NomorTelepon"><br>
  
  <button type="submit">Konfirmasi</button>
  <a href="pembelian.php" class="dashboard-button">Kembali</a>
</form>

</body>
</html>
