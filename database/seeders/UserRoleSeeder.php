<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            
            [
                'title' => 'Dashboard',
                'link' => 'index',
                'icon' => 'fa-brands fa-delicious',
                'role' => 'admin',
            ],
            
            [
                'title' => 'Riwayat Kesehatan',
                'link' => 'riwayat-kesehatan',
                'icon' => 'fa-solid fa-book-medical',
                'role' => 'admin',
            ],
            
            [
                'title' => 'Dashboard',
                'link' => 'index',
                'icon' => 'fa-solid fa-book-medical',
                'role' => 'pasien',
            ],
            
            [
                'title' => 'Dashboard',
                'link' => 'index',
                'icon' => 'fa-solid fa-book-medical',
                'role' => 'dokter',
            ],
        ];

        foreach ($roles as $role) {
            UserRole::create($role);
        }
    }
}
