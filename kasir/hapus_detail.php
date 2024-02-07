<?php
session_start();
include 'config.php';
if(isset($_GET["id"])) {
    $produk_id = $_GET["id"];

    $sql = "DELETE FROM detailpenjualan WHERE DetailID = $produk_id";

    if (mysqli_query($conn, $sql)) {
        echo "Data produk berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
} else {
    echo "Detail ID idak ditemukan.";
}
header("Location: detail_penjualan.php");
exit();
?>