<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Petugas</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    form {
      width: 50%;
      margin: 50px auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333333;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #555555;
    }

    input[type="text"],
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #cccccc;
      border-radius: 4px;
      background-color: #f7f7f7;
      color: #555555;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>

  <?php
  include 'config.php';

  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM petugas WHERE id_petugas=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      ?>
      <form action="proses_edit_petugas.php" method="post">
        <h2>EDIT PETUGAS</h2>
        <input type="hidden" name="id" value="<?php echo $row['id_petugas']; ?>">
        <label for="nama_petugas">Nama Petugas:</label><br>
        <input type="text" id="nama_petugas" name="nama_petugas" value="<?php echo $row['nama_petugas']; ?>"><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br>
        <label for="level">Level:</label><br>
        <select id="level" name="level">
          <option value="admin" <?php if ($row['level'] == 'admin')
            echo 'selected'; ?>>Admin</option>
          <option value="user" <?php if ($row['level'] == 'user')
            echo 'selected'; ?>>Petugas</option>
        </select><br><br>
        <input type="submit" name="submit" value="Submit">
      </form>
      <?php
    } else {
      echo "Petugas tidak ditemukan.";
    }
  } else {
    echo "Invalid request.";
  }
  mysqli_close($conn);
  ?>

</body>

</html>