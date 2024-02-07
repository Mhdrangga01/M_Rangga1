<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-gn8cHtUGuVJdZ3C8iK6NtHjL5x99NhN28Lv/KyviHZfVklvQDQTXTQpYjgVi/v+71b00NUarDT8F8z1mGBJj3w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4169E1;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include 'config.php';
    if (isset($_GET["id"])) {
        $produk_id = $_GET["id"];
        $sql = "SELECT * FROM produk WHERE ProdukID = $produk_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form action="proses_edit_produk.php" method="POST">
                <h2>EDIT PRODUK</h2>
                <input type="hidden" name="produk_id" value="<?php echo $row['ProdukID']; ?>">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $row['NamaProduk']; ?>"><br>
                <label for="harga">Harga:</label>
                <input type="text" id="harga" name="harga" value="<?php echo $row['Harga']; ?>"><br>
                <label for="stok">Stok:</label>
                <input type="text" id="stok" name="stok" value="<?php echo $row['Stok']; ?>"><br>
                <button type="submit"><i class="fas fa-save"></i> SIMPAN</button>
            </form>
            <?php
        } else {
            echo "Produk tidak ditemukan.";
        }

        mysqli_close($conn);
    } else {
        echo "ID Produk tidak ditemukan.";
    }
    ?>
</body>

</html>