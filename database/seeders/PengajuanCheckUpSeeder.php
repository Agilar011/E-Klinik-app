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
            'tglpengajuan' => '2024-06-20',
            'tglpemeriksaan' => '2024-06-20',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',
            'created_at' => '2024-06-20 00:00:00',
            'updated_at' => '2024-06-20 00:00:00',

        ]);

        PengajuanCheckUp::create([
            'id' => 2,
            'nip' => '22222222',
            'nipdokter' => '11111111',
            'idpoli' => 2,
            'tglpengajuan' => '2024-06-21',
            'tglpemeriksaan' => '2024-06-21',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',
            'created_at' => '2024-06-21 00:00:00',
            'updated_at' => '2024-06-21 00:00:00',
        ]);

        PengajuanCheckUp::create([
            'id' => 3,
            'nip' => '33333333',
            'nipdokter' => '11111111',
            'idpoli' => 3,
            'tglpengajuan' => '2024-06-22',
            'tglpemeriksaan' => '2024-06-22',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',
            'created_at' => '2024-06-22 00:00:00',
            'updated_at' => '2024-06-22 00:00:00',
        ]);

        PengajuanCheckUp::create([
            'id' => 4,
            'nip' => '44444444',
            'nipdokter' => '11111111',
            'idpoli' => 1,
            'tglpengajuan' => '2024-06-23',
            'tglpemeriksaan' => '2024-06-23',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',
            'created_at' => '2024-06-23 00:00:00',
            'updated_at' => '2024-06-23 00:00:00',
        ]);

        PengajuanCheckUp::create([
            'id' => 5,
            'nip' => '55555555',
            'nipdokter' => '11111111',
            'idpoli' => 2,
            'tglpengajuan' => '2024-06-24',
            'tglpemeriksaan' => '2024-06-24',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',
            'created_at' => '2024-06-24 00:00:00',
            'updated_at' => '2024-06-24 00:00:00',
        ]);

        PengajuanCheckUp::create([
            'id' => 6,
            'nip' => '66666666',
            'nipdokter' => '11111111',
            'idpoli' => 3,
            'tglpengajuan' => '2024-06-25',
            'tglpemeriksaan' => '2024-06-25',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',
            'created_at' => '2024-06-25 00:00:00',
            'updated_at' => '2024-06-25 00:00:00',
        ]);

        PengajuanCheckUp::create([
            'id' => 7,
            'nip' => '77777777',
            'nipdokter' => '11111111',
            'idpoli' => 1,
            'tglpengajuan' => '2024-06-26',
            'tglpemeriksaan' => '2024-06-26',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',
            'created_at' => '2024-06-26 00:00:00',
            'updated_at' => '2024-06-26 00:00:00',
        ]);

        PengajuanCheckUp::create([
            'id' => 8,
            'nip' => '88888888',
            'nipdokter' => '11111111',
            'idpoli' => 2,
            'tglpengajuan' => '2024-06-27',
            'tglpemeriksaan' => '2024-06-27',
            'status' => 'pending',
            'catatan_dokter' => 'Periksa lebih lanjut',
            'keluhan' => 'Sakit kepala dan demam',
            'created_at' => '2024-06-27 00:00:00',
            'updated_at' => '2024-06-27 00:00:00',
        ]);
        // Tambahkan data pengajuan check up lainnya sesuai kebutuhan
    }
}
