
    <!DOCTYPE html>
    <html>
        <head>
            <title>Daftar Barang</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                    margin: 0;
                    padding: 0;
                    text-align: center;
                }

                h1 {
                    color: #333;
                    margin-top: 20px;
                }

                a {
                    color: #007bff;
                    text-decoration: none;
                }

                a:hover {
                    text-decoration: underline;
                }

                table {
                    width: 80%;
                    margin: 20px auto;
                    border-collapse: collapse;
                    background-color: #fff;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                th, td {
                    padding: 10px;
                    border: 1px solid #ddd;
                }

                th {
                    background-color: #f2f2f2;
                }

                tr:nth-child(even) {
                    background-color: #f9f9f9;
                }

                form {
                    display: inline;
                }

                button {
                    background-color: #dc3545;
                    color: white;
                    border: none;
                    padding: 5px 10px;
                    cursor: pointer;
                    border-radius: 4px;
                }

                button:hover {
                    background-color: #c82333;
                }

                .success-message {
                    background-color: #d4edda;
                    color: #155724;
                    padding: 10px;
                    margin: 20px auto;
                    width: 80%;
                    border-radius: 4px;
                }
            </style>
        </head>
        <body>
            <h1>Daftar Barang</h1>
            <a href="{{ route('barang.create') }}">Tambah Barang</a>

            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->id }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->kategori->nama }}</td>
                        <td>{{ $barang->harga }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $barang->id) }}">Edit</a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </body>
    </html>

