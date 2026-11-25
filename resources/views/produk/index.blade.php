
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bubble Chart Produk</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            background: #f5f6fa;
            font-family: 'Poppins', sans-serif;
            color: #1f2937;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            color: #312e81;
            margin: 0;
        }

        .subtitle {
            color: #6b7280;
            margin-top: 8px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            font-family: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-add {
            background: #4f46e5;
            color: white;
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }

        .card h2 {
            margin-top: 0;
            color: #312e81;
        }

        .chart-container {
            width: 100%;
            height: 500px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #eef2ff;
            color: #312e81;
        }

        tr:hover {
            background: #f9fafb;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .search-input {
            width: 100%;
            max-width: 400px;
            padding: 12px 16px;
            margin-bottom: 20px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
        }

        .legend {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .green {
            background: #10b981;
        }

        .yellow {
            background: #f59e0b;
        }

        .red {
            background: #ef4444;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .chart-container {
                height: 350px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Bubble Chart Produk</h1>
            <p class="subtitle">
                Visualisasi harga, keuntungan, dan jumlah produk terjual.
            </p>
        </div>

        <a href="{{ route('produk.create') }}" class="btn btn-add">
            + Tambah Produk
        </a>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <h2>Visualisasi Penjualan</h2>

        <div class="legend">
            <div class="legend-item">
                <span class="dot green"></span>
                Keuntungan tinggi (≥ Rp5.000)
            </div>

            <div class="legend-item">
                <span class="dot yellow"></span>
                Keuntungan sedang (Rp2.000–Rp4.999)
            </div>

            <div class="legend-item">
                <span class="dot red"></span>
                Keuntungan rendah (< Rp2.000)
            </div>
        </div>

        <div class="chart-container">
            <canvas id="bubbleChart"></canvas>
        </div>
    </div>

    <div class="card">
        <h2>Data Produk</h2>

        <input
            type="text"
            id="searchProduk"
            class="search-input"
            placeholder="Cari nama produk..."
        >

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Keuntungan</th>
                        <th>Terjual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($produks as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk->nama_produk }}</td>

                            <td>
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </td>

                            <td>
                                Rp {{ number_format($produk->keuntungan, 0, ',', '.') }}
                            </td>

                            <td>{{ $produk->terjual }} pcs</td>

                            <td>
                                <div class="actions">
                                    <a
                                        href="{{ route('produk.edit', $produk->id) }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('produk.destroy', $produk->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    const produk = @json($produks);

    function tentukanWarna(keuntungan) {
        if (keuntungan >= 5000) {
            return 'rgba(16, 185, 129, 0.75)';
        }

        if (keuntungan >= 2000) {
            return 'rgba(245, 158, 11, 0.75)';
        }

        return 'rgba(239, 68, 68, 0.75)';
    }

    const dataBubble = produk.map(item => ({
        x: Number(item.harga),
        y: Number(item.keuntungan),
        r: Math.max(5, Math.sqrt(Number(item.terjual)) * 1.5),
        nama: item.nama_produk,
        terjual: Number(item.terjual),
        warna: tentukanWarna(Number(item.keuntungan))
    }));

    const chart = new Chart(
        document.getElementById('bubbleChart'),
        {
            type: 'bubble',

            data: {
                datasets: [{
                    label: 'Produk Sekolah',
                    data: dataBubble,
                    backgroundColor: dataBubble.map(item => item.warna),
                    borderColor: dataBubble.map(item =>
                        item.warna.replace('0.75', '1')
                    ),
                    borderWidth: 1
                }]
            },

            options: {
                maintainAspectRatio: false,
                responsive: true,

                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const item = context.raw;

                                return [
                                    'Produk: ' + item.nama,
                                    'Harga: Rp ' + item.x.toLocaleString('id-ID'),
                                    'Keuntungan: Rp ' + item.y.toLocaleString('id-ID'),
                                    'Terjual: ' + item.terjual + ' pcs'
                                ];
                            }
                        }
                    }
                },

                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Harga Produk (Rp)'
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + Number(value).toLocaleString('id-ID');
                            }
                        }
                    },

                    y: {
                        title: {
                            display: true,
                            text: 'Keuntungan (Rp)'
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + Number(value).toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        }
    );

    // SEARCH PRODUK
    const searchInput = document.getElementById('searchProduk');

    searchInput.addEventListener('input', function() {
        const keyword = this.value.toLowerCase().trim();

        // Filter tabel
        document.querySelectorAll('tbody tr').forEach(function(row) {
            const nama = row.cells[1]?.textContent.toLowerCase() || '';

            row.style.display = nama.includes(keyword) ? '' : 'none';
        });

        // Filter bubble chart
        const hasilSearch = dataBubble.filter(function(item) {
            return item.nama.toLowerCase().includes(keyword);
        });

        chart.data.datasets[0].data = hasilSearch;

        chart.data.datasets[0].backgroundColor =
            hasilSearch.map(item => item.warna);

        chart.data.datasets[0].borderColor =
            hasilSearch.map(item => item.warna.replace('0.75', '1'));

        chart.update();
    });
</script>

</body>
</html>
