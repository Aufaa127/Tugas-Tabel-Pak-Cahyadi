<?php
session_start(); // Mulai sesi untuk notifikasi
require_once 'CustomerManager.php';

$customerManager = new CustomerManager();

// Tambah Pelanggan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_customer'])) {
    $nama = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $customerManager->tambahCustomer($nama, $alamat, $telepon);
    $_SESSION['message'] = "Pelanggan berhasil ditambahkan!";
    header('Location: datacustomer.php');
    exit;
}

// Hapus Pelanggan
if (isset($_GET['hapus_customer'])) {
    $id = $_GET['hapus_customer'];
    $customerManager->hapusCustomer($id);
    $_SESSION['message'] = "Pelanggan berhasil dihapus!";
    header('Location: datacustomer.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pelanggan</title>
    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        /* Container Styles */
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading Styles */
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Notifikasi */
        .message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* Button Styles */
        a, button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            margin: 5px 0;
        }

        a:hover, button:hover {
            background-color: #0056b3;
        }

        /* Form Styles */
        form {
            margin-bottom: 20px;
        }

        form div {
            margin-bottom: 15px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        form button {
            width: 100%;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #f3f4f6;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Back to Dashboard Link */
        a {
            display: block;
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pencatatan Pelanggan</h1>
        <a href="index.php">Kembali ke Dashboard</a>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div>
                <label for="nama_customer">Nama Pelanggan:</label>
                <input type="text" id="nama_customer" name="nama_customer" required>
            </div>
            <div>
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>
            <div>
                <label for="telepon">Telepon:</label>
                <input type="text" id="telepon" name="telepon" required>
            </div>
            <button type="submit" name="tambah_customer">Tambah Pelanggan</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customerManager->getCustomers() as $customer): ?> 
                    <tr>
                        <td><?= $customer['id'] ?></td>
                        <td><?= $customer['nama'] ?></td>
                        <td><?= $customer['alamat'] ?></td>
                        <td><?= $customer['telepon'] ?></td>
                        <td>
                            <a href="?hapus_customer=<?= $customer['id'] ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
