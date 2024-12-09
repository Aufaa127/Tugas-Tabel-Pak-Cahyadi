<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            background: linear-gradient(135deg, #007bff, #0056b3);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        .container h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        a {
            display: inline-block;
            margin: 10px 0;
            padding: 12px 20px;
            text-decoration: none;
            color: white;
            background: linear-gradient(90deg, #007bff, #0056b3);
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s;
        }

        a:hover {
            background: linear-gradient(90deg, #0056b3, #003e7e);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <a href="databarang.php">Kelola Barang</a>
        <a href="datacustomer.php">Kelola Pelanggan</a>
    </div>
</body>
</html>
