<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisis = [
            ['name' => 'Akuntansi'],
            ['name' => 'Desain'],
            ['name' => 'Human Capital Management'],
            ['name' => 'Kapal Niaga'],
            ['name' => 'Kapal Perang'],
            ['name' => 'Kapal Selam'],
            ['name' => 'Kawasan & K3LH'],
            ['name' => 'Legal'],
            ['name' => 'Manajemen Risiko'],
            ['name' => 'Office of The Board'],
            ['name' => 'Pemasaran & Penjualan Kapal'],
            ['name' => 'Pemeliharaan & Perbaikan'],
            ['name' => 'Penjualan Rekayasa Umum'],
            ['name' => 'Perbendaharaan'],
            ['name' => 'Perencanaan Strategis Perusahaan'],
            ['name' => 'Production Management Office'],
            ['name' => 'Rekayasa Umum'],
            ['name' => 'Supply Chain'],
            ['name' => 'Technology & Quality Assurance'],
            ['name' => 'Teknologi Informasi'],
            ['name' => 'Satuan Pengawasan Intern'],
            ['name' => 'Sekretaris Perusahaan'],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        foreach ($divisis as $divisi) {
            Divisi::create($divisi);
        }
    }

}
