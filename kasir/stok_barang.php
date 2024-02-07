<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Barang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn i {
            margin-right: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td:last-child {
            text-align: center;
        }

        .action-icons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .action-icons a {
            margin: 0 5px;
            color: inherit;
            text-decoration: none;
            transition: color 0.3s;
        }

        .action-icons a:hover {
            color: #007bff;
        }

        .edit-icon {
            color: #007bff;
        }

        .delete-icon {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>STOCK PRODUK</h2>
        <a href="dashboard.php" class="btn"><i class="fas fa-arrow-left"></i>Dashboard</a>
        <a href="tambah_produk.php" class="btn"><i class="fas fa-plus"></i>Tambah Produk</a>

        <table border="1">
            <tr>
                <th>NO</th>
                <th>NAMA PRODUK</th>
                <th>HARGA</th>
                <th>STOCK</th>
                <th>AKSI</th>
            </tr>

            <?php
            session_start();
            include 'config.php';
            $sql = "SELECT ProdukID, NamaProduk, Harga, Stok FROM produk";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["ProdukID"] . "</td>";
                    echo "<td>" . $row["NamaProduk"] . "</td>";
                    echo "<td>" . $row["Harga"] . "</td>";
                    echo "<td>" . $row["Stok"] . "</td>";
                    echo "<td class='action-icons'>";
                    echo "<a href='edit_produk.php?id=" . $row["ProdukID"] . "' title='Edit' class='edit-icon'><i class='fas fa-edit'></i></a>";
                    echo "<a href='hapus_produk.php?id=" . $row["ProdukID"] . "' title='Hapus' class='delete-icon'><i class='fas fa-trash-alt'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 hasil</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </table>
    </div>

</body>

</html>