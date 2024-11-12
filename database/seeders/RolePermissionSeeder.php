<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::create(['name'=>'buat-tulisan']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'dokter']);
        Role::firstOrCreate(['name' => 'pasien']);

        // $roleAdmin->givePermissionTo('buat-tulisan');
        $roleAdmin = Role::findByName('admin');
        $roleAdmin = Role::findByName('dokter');
        $roleAdmin = Role::findByName('pasien');
    }
}
