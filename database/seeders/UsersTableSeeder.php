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
            'divisi' => 'Teknologi Informasi',
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
            'divisi' => 'Teknologi Informasi',
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
            'divisi' => 'Teknologi Informasi',
            'role' => 'admin',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '33333333',
            'name' => 'Rizky',
            'divisi' => 'Teknologi Informasi',
            'role' => 'user',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '44444444',
            'name' => 'Ilham',
            'divisi' => 'Teknologi Informasi',
            'role' => 'user',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '55555555',
            'name' => 'Rizal',
            'divisi' => 'Teknologi Informasi',
            'role' => 'user',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '66666666',
            'name' => 'Ridho',
            'divisi' => 'Teknologi Informasi',
            'role' => 'user',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '77777777',
            'name' => 'Agung',
            'divisi' => 'Teknologi Informasi',
            'role' => 'user',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '88888888',
            'name' => 'Tya',
            'divisi' => 'Teknologi Informasi',
            'role' => 'user',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nip' => '99999999',
            'name' => 'Putri',
            'divisi' => 'Teknologi Informasi',
            'role' => 'user',
            'tanggal_lahir' => '2022-11-10',
            'tinggi_badan' => 175.5,
            'berat_badan' => 63,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);



        // Tambahkan data lainnya sesuai kebutuhan
    }
}
