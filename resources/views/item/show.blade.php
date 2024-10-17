<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .detail-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
        }

        strong {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Detail Item</h1>
    <a href="{{ route('item.index') }}">Kembali ke Daftar Item</a>

    <div class="detail-container">
        <p><strong>ID:</strong> {{ $item->id }}</p>
        <p><strong>Nama:</strong> {{ $item->nama }}</p>
        <p><strong>Kategori:</strong> {{ $item->kategori->nama }}</p>
        <p><strong>Harga:</strong> {{ $item->harga }}</p>
        <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>
    </div>
</body>
</html>
