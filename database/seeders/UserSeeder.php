<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; // WAJIB ADA INI

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache permission biar sinkron
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $password = Hash::make('password');

        // --- 2. SEED DOKTER (4 ORANG) ---
        Role::findOrCreate('Dokter', 'web');

        $dokters = [
            ['name' => 'Dr. Welis Dita, Sp.DV', 'email' => 'dokter.welis@jglow.id', 'jk' => 'Perempuan'],
            ['name' => 'Dr. Dian Muthia, Sp.KK', 'email' => 'dokter.dian@jglow.id', 'jk' => 'Perempuan'],
            ['name' => 'Dr. Ahmad Fauzi', 'email' => 'dokter.ahmad@jglow.id', 'jk' => 'Laki-Laki'],
            ['name' => 'Dr. Siska Amelia', 'email' => 'dokter.siska@jglow.id', 'jk' => 'Perempuan'],
        ];

        foreach ($dokters as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
                'address' => 'Klinik Jglow - ' . $data['name'],
                'no_tlp' => '0822' . rand(1000, 9999),
                'jenis_kelamin' => $data['jk'],
            ]);
            $user->assignRole('Dokter');
        }

        // --- 3. SEED PASIEN (5 ORANG) ---
        Role::findOrCreate('Pasien', 'web');

        $pasiens = [
            ['name' => 'Siska Kamal', 'email' => 'siska@gmail.com', 'jk' => 'Perempuan'],
            ['name' => 'Algi Syapura', 'email' => 'algi@gmail.com', 'jk' => 'Laki-Laki'],
            ['name' => 'Budi Santoso', 'email' => 'budi@gmail.com', 'jk' => 'Laki-Laki'],
            ['name' => 'Lestari Putri', 'email' => 'lestari@gmail.com', 'jk' => 'Perempuan'],
            ['name' => 'Dewi Sartika', 'email' => 'dewi@gmail.com', 'jk' => 'Perempuan'],
        ];

        foreach ($pasiens as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
                'address' => 'Jl. Boulevard Raya No. ' . rand(1, 100),
                'no_tlp' => '0895' . rand(1000, 9999),
                'jenis_kelamin' => $data['jk'],
            ]);
            $user->assignRole('Pasien');
        }
    }
}
