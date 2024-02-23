<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PengajuanCheckUp;
use Illuminate\Support\Facades\Hash;

class PengajuanCheckUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PengajuanCheckUp::create([
            'id' => 1,
            'nip' => '00000000',
            'nipdokter' => '11111111',
            'idpoli' => 1,
            'qrcode' => 'QR0001',
            'tglpengajuan' => '2022-11-10',
            'tglpemeriksaan' => '2022-11-15',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',

        ]);

        PengajuanCheckUp::create([
            'id' => 2,
            'nip' => '00000000',
            'nipdokter' => '11111111',
            'idpoli' => 2,
            'qrcode' => 'QR0002',
            'tglpengajuan' => '2022-11-11',
            'tglpemeriksaan' => '2022-11-16',
            'status' => 'pending',
            'catatan_dokter' => 'Istirahat dulu',
            'keluhan' => 'Sakit kepala dan demam',

        ]);

        PengajuanCheckUp::create([
            'id' => 3,
            'nip' => '22222222',
            'nipdokter' => '11111111',
            'idpoli' => 1,
            'qrcode' => 'QR0003',
            'tglpengajuan' => '2022-11-12',
            'tglpemeriksaan' => '2022-11-18',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa kesehatan umum',
            'keluhan' => 'Sakit kepala dan demam',

        ]);

        // Tambahkan data pengajuan check up lainnya sesuai kebutuhan
    }
}
