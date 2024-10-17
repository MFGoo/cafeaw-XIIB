<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item</title>
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
            width: 300px;
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

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Item</h1>
        <a href="{{ route('item.index') }}">Kembali ke Daftar Item</a>

        <form action="{{ route('item.store') }}" method="POST">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="kategori_id">Kategori:</label>
            <select name="kategori_id" id="kategori_id">
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="harga">Harga:</label>
            <input type="text" name="harga" id="harga" value="{{ old('harga') }}">
            @error('harga')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
