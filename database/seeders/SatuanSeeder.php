<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuan')->insert([
            [
                'nama_satuan' => 'Unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_satuan' => 'Pcs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data satuan lainnya sesuai kebutuhan
        ]);
    }
}
