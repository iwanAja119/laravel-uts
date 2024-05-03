<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Laptop',
                'harga_barang' => 5000000,
                'deskripsi_barang' => 'Laptop merk ABC dengan spesifikasi tertentu.',
                'satuan_barang_id' => 1, // Misalkan id satuan barang tertentu
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Printer',
                'harga_barang' => 1000000,
                'deskripsi_barang' => 'Printer merk XYZ dengan fitur cetak berkualitas tinggi.',
                'satuan_barang_id' => 2, // Misalkan id satuan barang tertentu
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data barang lainnya sesuai kebutuhan
        ]);
    }
}
