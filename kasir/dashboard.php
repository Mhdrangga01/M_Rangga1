<?php
// Mulai sesi
session_start();

include 'config.php';

// Misalnya, Anda menggunakan PDO untuk terhubung ke database
try {
    $dbh = new PDO('mysql:host=localhost;dbname=kasir', 'root', '');
    // Ganti nama_database, username, dan password dengan yang sesuai
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ...
}

// Query untuk mengambil total pelanggan
$total_pelanggan_query = $dbh->prepare("SELECT COUNT(*) as total_pelanggan FROM pelanggan");
$total_pelanggan_query->execute();
$result_pelanggan = $total_pelanggan_query->fetch(PDO::FETCH_ASSOC);

// Query untuk mengambil total petugas
$total_petugas_query = $dbh->prepare("SELECT COUNT(*) as total_petugas FROM petugas");
$total_petugas_query->execute();
$result_petugas = $total_petugas_query->fetch(PDO::FETCH_ASSOC);

// Query untuk mengambil total produk
$total_produk_query = $dbh->prepare("SELECT COUNT(*) as total_produk FROM produk");
$total_produk_query->execute();
$result_produk = $total_produk_query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        #header {
            background-color: #333333;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        #menu-container {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        #menu {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #menu a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 20px;
            background-color: #0056b3;
            transition: background-color 0.3s ease;
        }

        #menu a:hover {
            background-color: #004080;
        }

        .stats-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .stats-item {
            text-align: center;
            margin: 0 20px;
        }

        .stats-item i {
            font-size: 42px;
            color: #007bff;
        }

        .stats-item h3 {
            margin-top: 10px;
            color: #333;
        }

        .stats-item p {
            margin: 5px 0;
            color: #666;
        }

        .logout {
            float: right;
            margin-right: 20px;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border: 2px solid #007bff;
            border-radius: 30px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .logout:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>

<body>

    <div id="header">
        <div id="welcome">
            <h2>Welcome to Our Dashboard</h2>
        </div>
    </div>

    <div id="menu-container">
        <div id="menu">
            <a href="pembelian.php">Purchase</a>
            <a href="stok_barang.php">Product Stock</a>
            <a href="detail_penjualan.php">Sales Details</a>
            <?php
            // Cek jika level pengguna adalah admin, lalu tampilkan tautan untuk data petugas
            if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
                echo '<a href="data_petugas.php">Staff Data</a>';
            }
            ?>
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </div>

    <div class="stats-container">
        <div class="stats-item">
            <i class="fas fa-users"></i>
            <h3>Customer Data</h3>
            <p>Total:
                <?php echo $result_pelanggan['total_pelanggan']; ?>
            </p>
        </div>

        <div class="stats-item">
            <i class="fas fa-user-tie"></i>
            <h3>Staff Data</h3>
            <p>Total:
                <?php echo $result_petugas['total_petugas']; ?>
            </p>
        </div>

        <div class="stats-item">
            <i class="fas fa-box"></i>
            <h3>Product Data</h3>
            <p>Total:
                <?php echo $result_produk['total_produk']; ?>
            </p>
        </div>
    </div>

</body>

</html>