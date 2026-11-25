<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_produk' => 'Pulpen', 'harga' => 5000, 'keuntungan' => 2000, 'terjual' => 65],
            ['nama_produk' => 'Buku Gambar', 'harga' => 12000, 'keuntungan' => 5000, 'terjual' => 210],
            ['nama_produk' => 'Penggaris', 'harga' => 2000, 'keuntungan' => 700, 'terjual' => 95],
            ['nama_produk' => 'Botol Minum', 'harga' => 30000, 'keuntungan' => 5000, 'terjual' => 320],
            ['nama_produk' => 'Tempat Pensil', 'harga' => 16000, 'keuntungan' => 3000, 'terjual' => 140],
            ['nama_produk' => 'BET', 'harga' => 2000, 'keuntungan' => 500, 'terjual' => 48],
            ['nama_produk' => 'Pensil', 'harga' => 4000, 'keuntungan' => 1000, 'terjual' => 260],
            ['nama_produk' => 'Penghapus', 'harga' => 3000, 'keuntungan' => 1000, 'terjual' => 115],
            ['nama_produk' => 'Tas Ransel', 'harga' => 150000, 'keuntungan' => 20000, 'terjual' => 175],
            ['nama_produk' => 'Peruncing', 'harga' => 1000, 'keuntungan' => 200, 'terjual' => 35],
            ['nama_produk' => 'Sepatu', 'harga' => 180000, 'keuntungan' => 25000, 'terjual' => 380],
            ['nama_produk' => 'Dasi', 'harga' => 6000, 'keuntungan' => 1000, 'terjual' => 75],
            ['nama_produk' => 'Gesper', 'harga' => 10000, 'keuntungan' => 3000, 'terjual' => 155],
            ['nama_produk' => 'Topi', 'harga' => 7000, 'keuntungan' => 2000, 'terjual' => 240],
            ['nama_produk' => 'Kaos Kaki', 'harga' => 10000, 'keuntungan' => 2000, 'terjual' => 58],
            ['nama_produk' => 'Buku Tulis', 'harga' => 5000, 'keuntungan' => 1000, 'terjual' => 130],
            ['nama_produk' => 'Seragam', 'harga' => 100000, 'keuntungan' => 5000, 'terjual' => 290],
            ['nama_produk' => 'Gunting', 'harga' => 5000, 'keuntungan' => 1000, 'terjual' => 90],
            ['nama_produk' => 'Sticky Note', 'harga' => 15000, 'keuntungan' => 2000, 'terjual' => 205],
            ['nama_produk' => 'Correction Tape', 'harga' => 8000, 'keuntungan' => 2000, 'terjual' => 42],
            ['nama_produk' => 'Lem', 'harga' => 2000, 'keuntungan' => 300, 'terjual' => 340],
            ['nama_produk' => 'Origami', 'harga' => 10000, 'keuntungan' => 2000, 'terjual' => 105],
            ['nama_produk' => 'Krayon', 'harga' => 50000, 'keuntungan' => 17000, 'terjual' => 185],
            ['nama_produk' => 'Stabilo', 'harga' => 5000, 'keuntungan' => 1000, 'terjual' => 70],
            ['nama_produk' => 'Spidol', 'harga' => 10000, 'keuntungan' => 2000, 'terjual' => 275],
            ['nama_produk' => 'Pensil Warna', 'harga' => 20000, 'keuntungan' => 5000, 'terjual' => 160],
            ['nama_produk' => 'Kacu Pramuka', 'harga' => 20000, 'keuntungan' => 3000, 'terjual' => 30],
            ['nama_produk' => 'Stapler', 'harga' => 10000, 'keuntungan' => 1500, 'terjual' => 230],
            ['nama_produk' => 'Meja Belajar', 'harga' => 50000, 'keuntungan' => 4000, 'terjual' => 100],
            ['nama_produk' => 'Lakban', 'harga' => 10000, 'keuntungan' => 1500, 'terjual' => 400],
        ];

        foreach ($data as $produk) {
            Produk::create($produk);
        }
    }
}