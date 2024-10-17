<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Minuman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        form div {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Minuman</h1>

        <form action="{{ route('minuman.update', $minuman->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="nama">Nama Minuman:</label>
                <input type="text" id="nama" name="nama" value="{{ $minuman->nama }}" required>
            </div>

            <div>
                <label for="kategori_id">Kategori:</label>
                <select id="kategori_id" name="kategori_id" required>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $minuman->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="harga">Harga:</label>
                <input type="number" id="harga" name="harga" value="{{ $minuman->harga }}" required>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
