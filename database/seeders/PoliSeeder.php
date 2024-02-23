<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat beberapa data poli
        Poli::create(['name' => 'Poli Umum']);
        Poli::create(['name' => 'Poli Gigi']);
        Poli::create(['name' => 'Poli Mata']);
        // Tambahkan data poli lainnya di sini jika diperlukan
    }
}
