<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataPoli;

class DataPoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataPoli::create([
        'id_dokter' => '2',
        'id_poli' => '1',
    ]);
    DataPoli::create([
        'id_dokter' => '2',
        'id_poli' => '2',
    ]);
    }
}
