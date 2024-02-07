<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM petugas WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            $_SESSION['id_petugas'] = $row['id_petugas'];
            $_SESSION['nama_petugas'] = $row['nama_petugas'];
            $_SESSION['level'] = $row['level']; // Menyimpan level pengguna dalam sesi
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Username atau Password salah.";
            header("Location: login.php?error=" . urlencode($error));
            exit();
        }
    } else {
        $error = "Username atau Password salah.";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
}
?>