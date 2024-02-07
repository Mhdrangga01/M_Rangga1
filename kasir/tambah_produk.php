<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Produk Baru</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-gn8cHtUGuVJdZ3C8iK6NtHjL5x99NhN28Lv/KyviHZfVklvQDQTXTQpYjgVi/v+71b00NUarDT8F8z1mGBJj3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    button[type="submit"],
    button[type="button"] {
        display: block;
        width: 50%; /* Mengatur lebar tombol */
        margin: 10px auto; /* Mengatur margin untuk pusat secara horizontal */
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
    }

    button[type="submit"] i,
    button[type="button"] i {
        margin-right: 5px;
    }
</style>
</head>
<body>

<form action="proses_tambah_produk.php" method="POST">
<h2>TAMBAH PRODUK BARU</h2>
  <label for="nama_produk">Nama Produk:</label>
  <input type="text" id="nama_produk" name="nama_produk"><br>
  
  <label for="harga">Harga:</label>
  <input type="text" id="harga" name="harga"><br>
  
  <label for="stok">Stok:</label>
  <input type="text" id="stok" name="stok"><br>
  
  <button type="submit"><i class="fas fa-save"></i> SIMPAN</button>
  <button type="button" onclick="location.href='stok_barang.php'"><i class="fas fa-arrow-left"></i> KEMBALI</button>
</form>

</body>
</html>
