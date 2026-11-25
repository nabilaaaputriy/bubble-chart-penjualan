<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Produk</title>

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

    <h1>Tambah Produk</h1>
    <p>Masukkan informasi produk sekolah.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <label>Nama Produk</label>
        <input
            type="text"
            name="nama_produk"
            value="{{ old('nama_produk') }}"
            placeholder="Contoh: Pulpen"
            required
        >

        <label>Harga Produk (Rp)</label>
        <input
            type="number"
            name="harga"
            value="{{ old('harga') }}"
            min="0"
            required
        >

        <label>Keuntungan (Rp)</label>
        <input
            type="number"
            name="keuntungan"
            value="{{ old('keuntungan') }}"
            min="0"
            required
        >

        <label>Jumlah Terjual</label>
        <input
            type="number"
            name="terjual"
            value="{{ old('terjual') }}"
            min="0"
            required
        >

        <button type="submit">Simpan Produk</button>
    </form>

    <a class="back" href="{{ route('produk.index') }}">
        ← Kembali ke Bubble Chart
    </a>

</div>

</body>
</html>