<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .button i {
            margin-right: 5px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
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

        .fas {
            font-size: 18px;
        }

        .fas.fa-trash-alt:hover {
            color: red;
        }
    </style>
</head>

<body>

    <h2>DETAIL PENJUALAN</h2>
    <a href="dashboard.php" class="button"><i class="fas fa-arrow-left"></i>DASHBOARD</a>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>PenjualanID</th>
                <th>ProdukID</th>
                <th>JUMLAH PRODUK</th>
                <th>TOTAL</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $sql = "SELECT * FROM detailpenjualan";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['DetailID'] . "</td>";
                    echo "<td>" . $row['PenjualanID'] . "</td>";
                    echo "<td>" . $row['ProdukID'] . "</td>";
                    echo "<td>" . $row['JumlahProduk'] . "</td>";
                    echo "<td>" . $row['Subtotal'] . "</td>";
                    echo "<td>";
                    echo "<a href='hapus_detail.php?id=" . $row["DetailID"] . "' title='Hapus'><i class='fas fa-trash-alt'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data detail penjualan.</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

</body>

</html>