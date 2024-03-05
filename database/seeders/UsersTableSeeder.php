<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nip' => '00000000',
            'name' => 'Agilar',
            'divisi' => 'Divisi IT',
            'role' => 'user',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '11111111',
            'name' => 'Rambimo',
            'divisi' => 'Divisi IT',
            'role' => 'dokter',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '22222222',
            'name' => 'Fergie',
            'divisi' => 'Divisi IT',
            'role' => 'admin',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Tambahkan data lainnya sesuai kebutuhan
    }
}
