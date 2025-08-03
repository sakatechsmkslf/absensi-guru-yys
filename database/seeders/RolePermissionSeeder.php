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

        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage instansi']);
        Permission::create(['name' => 'manage presensi']);
        Permission::create(['name' => 'manage kaldik']);
        Permission::create(['name' => 'manage tapel']);
        Permission::create(['name' => 'manage hari_libur']);
        Permission::create(['name' => 'manage jadwal']);
        Permission::create(['name' => 'rekap presensi']);

        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'view jadwal']);
        Permission::create(['name' => 'view riwayat absen']);

        $permission = Permission::all();

        $admin = Role::create(['name' => 'admin_yayasan']);
        $operator = Role::create(['name' => 'operator_instansi']);
        $pendidik = Role::create(['name' => 'tenaga_pendidik']);
        $kependidikan = Role::create(['name' => 'tenaga_kependidikan']);

        $admin->syncPermissions($permission);
        $operator->givePermissionTo(['rekap presensi', 'manage presensi', 'manage jadwal', 'manage hari_libur']);
        $pendidik->givePermissionTo(['view jadwal', 'view riwayat absen']);
        $kependidikan->givePermissionTo(['view riwayat absen']);

    }
}
