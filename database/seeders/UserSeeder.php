<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // 1
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('1'),
            'role' => 'admin'
        ]);
        
        // 2
        $dokter = User::create([
            'name' => 'Dokter',
            'email' => 'dokter@mail.com',
            'password' => bcrypt('1'),
            'role' => 'dokter'
        ]);
        
        // 3
        $dokter = User::create([
            'name' => 'Dr. Alex Wijaya',
            'email' => 'alexwijaya@mail.com',
            'password' => bcrypt('1'),
            'role' => 'dokter'
        ]);
        
        // 4
        $dokter = User::create([
            'name' => 'Dr. Siti Halimah',
            'email' => 'sitihalimah@mail.com',
            'password' => bcrypt('1'),
            'role' => 'dokter'
        ]);
        
        // 5
        $dokter = User::create([
            'name' => 'Dr. Cindy Rahmawati',
            'email' => 'cindyrahmawati@mail.com',
            'password' => bcrypt('1'),
            'role' => 'dokter'
        ]);
        
        // 6
        $pasien = User::create([
            'name' => 'Pasien',
            'email' => 'pasien@mail.com',
            'password' => bcrypt('1'),
            'role' => 'pasien'
        ]);
        
        // 7
        $pasien = User::create([
            'name' => 'Putri',
            'email' => 'putri@mail.com',
            'password' => bcrypt('1'),
            'role' => 'pasien'
        ]);
        
        // 8
        $pasien = User::create([
            'name' => 'Kak Kev',
            'email' => 'kakkev@mail.com',
            'password' => bcrypt('1'),
            'role' => 'pasien'
        ]);
        
        // 9
        $pasien = User::create([
            'name' => 'Ahmad Hidayat',
            'email' => 'ahmadhidayat@mail.com',
            'password' => bcrypt('1'),
            'role' => 'pasien'
        ]);
    }
}
