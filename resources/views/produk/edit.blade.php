<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        h1 {
            margin-top: 0;
            color: #312e81;
        }

        label {
            display: block;
            margin-top: 18px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-family: inherit;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 8px;
            font-family: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #4338ca;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #4f46e5;
            text-decoration: none;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Produk</h1>
    <p>Ubah informasi produk yang ingin diperbarui.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Produk</label>
        <input
            type="text"
            name="nama_produk"
            value="{{ old('nama_produk', $produk->nama_produk) }}"
            required
        >

        <label>Harga Produk (Rp)</label>
        <input
            type="number"
            name="harga"
            min="0"
            value="{{ old('harga', $produk->harga) }}"
            required
        >

        <label>Keuntungan (Rp)</label>
        <input
            type="number"
            name="keuntungan"
            min="0"
            value="{{ old('keuntungan', $produk->keuntungan) }}"
            required
        >

        <label>Jumlah Terjual</label>
        <input
            type="number"
            name="terjual"
            min="0"
            value="{{ old('terjual', $produk->terjual) }}"
            required
        >

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a class="back" href="{{ route('produk.index') }}">
        ← Kembali ke Bubble Chart
    </a>

</div>

</body>
</html>