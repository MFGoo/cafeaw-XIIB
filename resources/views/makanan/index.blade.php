
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Makanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/background.jpg'); /* Ganti dengan URL gambar latar belakang yang diinginkan */
            background-size: cover;
            background-attachment: fixed;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 150%;
            max-width: 1000px;
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        a {
            display: inline-block;
            margin-bottom: 20px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
            text-align: center;
            display: block;
        }
        a:hover {
            text-decoration: underline;
        }
        p {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dee2e6;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Makanan</h1>
        <a href="{{ route('makanan.create') }}">Tambah Makanan Baru</a>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($makanans as $makanan)
                    <tr>
                        <td>{{ $makanan->id }}</td>
                        <td>{{ $makanan->nama }}</td>
                        <td>{{ $makanan->kategori->nama }}</td>
                        <td>{{ $makanan->harga }}</td>
                        <td>
                            <a href="{{ route('makanan.edit', $makanan->id) }}">Edit</a>
                            <form action="{{ route('makanan.destroy', $makanan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
