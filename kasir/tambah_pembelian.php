<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pembelian</title>
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

        select,
        input[type="date"],
        input[type="number"],
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .barang {
            padding-bottom: 20px;
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .barang:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        button[type="submit"],
        .dashboard-button,
        .hapus-button {
            display: inline-block;
            width: auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            margin: 10px 10px 10px 0;
        }

        button[type="submit"]:hover,
        .dashboard-button:hover,
        .hapus-button:hover {
            background-color: #0056b3;
        }

        .hapus-button {
            background-color: #dc3545;
        }

        .hapus-button:hover {
            background-color: #bd2130;
        }

        .add-customer-link {
            display: block;
            text-align: right;
            margin-bottom: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>

    <form action="proses_tambah_pembelian.php" method="POST" id="formPembelian">
        <h2>FORMULIR PEMBELIAN</h2>


        <div id="barang-container">
            <div class="barang">
                <input type="hidden" name="pelanggan_id" value="<?php echo $pelanggan_id; ?>">

                <label>Tanggal Transaksi:</label>
                <input type="date" name="tanggal_transaksi" required>

                <label>Pilih Nama Produk:</label>
                <select class="produk" name="produk[]">
                    <?php
                    include 'config.php';
                    $sql_produk = "SELECT ProdukID, NamaProduk, Harga,stok FROM produk";
                    $result_produk = mysqli_query($conn, $sql_produk);
                    if (mysqli_num_rows($result_produk) > 0) {
                        while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                            echo "<option value='" . $row_produk['ProdukID'] . "' data-harga='" . $row_produk['Harga'] . "'>" . $row_produk['NamaProduk'] . "</option>";
                        }
                    } else {
                        echo "<option value=''  selected>-- RAMEN --</option>";
                        echo "<option value='' selected>-- COFFE --</option>";
                        echo "<option value=''  selected>-- ICE TEA --</option>";
                        echo "<option value=''  selected>-- French fries --</option>";
                    }
                    ?>
                </select>

                <label for="jumlah">Jumlah:</label>
                <input type="number" class="jumlah" name="jumlah[]" min="1" oninput="hitungTotal()">

                <label for="harga">Harga:</label>
                <input type="number" class="harga" name="harga[]" min="10" required>

                <label for="total">Total Harga:</label>
                <input type="number" class="total" name="total[]" required>

                <button type="submit">SUBMIT</button>
                <button type="button" class="hapus-button" onclick="hapusBarang(this)">HAPUS</button>
            </div>
        </div>

        <a href="pembelian.php" class="dashboard-button">Kembali</a>
        <button type="button" class="dashboard-button" onclick="tambahBarang()">Tambah Barang</button>
    </form>

    <script>
        function tambahBarang() {
            var container = document.getElementById("barang-container");
            var barangBaru = document.createElement("div");
            barangBaru.classList.add("barang");
            barangBaru.innerHTML = `
                    <label>Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_transaksi" required>

                    <label>Pilih Nama Produk:</label>
                    <select class="produk" name="produk[]">
                        <?php
                        mysqli_data_seek($result_produk, 0);
                        while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                            echo "<option value='" . $row_produk['ProdukID'] . "' data-harga='" . $row_produk['Harga'] . "'>" . $row_produk['NamaProduk'] . "</option>";
                        }
                        ?>
                    </select>
  
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" class="jumlah" name="jumlah[]" min="1" oninput="hitungTotal()">

                    <label for="harga">Harga:</label>
                    <input type="text" class="harga" name="harga[]" readonly>

                    <label for="total">Total Harga:</label>
                    <input type="text" class="total" name="total[]" readonly>

                    <button type="submit">SUBMIT</button>
                    <button type="button" class="hapus-button" onclick="hapusBarang(this)">HAPUS</button>
                `;
            container.appendChild(barangBaru);
        }

        function hapusBarang(btn) {
            btn.parentNode.remove();
        }

        function hitungTotal() {
            var barang = document.getElementsByClassName("barang");
            for (var i = 0; i < barang.length; i++) {
                var harga = barang[i].getElementsByClassName("produk")[0].options[barang[i].getElementsByClassName("produk")[0].selectedIndex].getAttribute("data-harga");
                var jumlah = barang[i].getElementsByClassName("jumlah")[0].value;
                var total = parseInt(harga) * parseInt(jumlah);
                barang[i].getElementsByClassName("harga")[0].value = harga;
                barang[i].getElementsByClassName("total")[0].value = total;
            }
        }
    </script>

    <?php
    // Tutup koneksi
    mysqli_close($conn);
    ?>

</body>

</html>