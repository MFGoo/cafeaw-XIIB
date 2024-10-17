<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        a {
            display: block;
            margin-bottom: 20px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #c82333;
        }

        .cancel-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #6c757d;
        }

        .cancel-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hapus Item</h1>
        <a href="{{ route('item.index') }}">Kembali ke Daftar Item</a>

        <form action="{{ route('item.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <p>Apakah Anda yakin ingin menghapus item ini?</p>

            <p><strong>ID:</strong> {{ $item->id }}</p>
            <p><strong>Nama:</strong> {{ $item->nama }}</p>
            <p><strong>Kategori:</strong> {{ $item->kategori->nama ?? 'Tidak ada' }}</p>
            <p><strong>Harga:</strong> {{ $item->harga }}</p>
            <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>

            <button type="submit">Hapus</button>
            <a href="{{ route('item.index') }}" class="cancel-link">Batal</a>
        </form>
    </div>
</body>
</html>
