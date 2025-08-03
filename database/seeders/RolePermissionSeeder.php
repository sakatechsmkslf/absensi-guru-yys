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
        //crud
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage instansi']);
        Permission::create(['name' => 'manage presensi']);
        Permission::create(['name' => 'manage kaldik']);
        Permission::create(['name' => 'manage tapel']);
        Permission::create(['name' => 'manage hari_libur']);
        Permission::create(['name' => 'manage jadwal']);

        //hanya view saja. apabila sudah mempunyai permission manage maka tidak usah diberi permission view
        Permission::create(['name' => 'view all users']);
        Permission::create(['name' => 'view all jadwal']);
        Permission::create(['name' => 'view all presensi']);
        Permission::create(['name' => 'view all instansi']);
        Permission::create(['name' => 'view all kaldik']);
        Permission::create(['name' => 'view all tapel']);
        Permission::create(['name' => 'view all hari_libur']);

        //permission view tapi hanya yang dimiliki oleh user. contoh: user 1 hanya bisa melihat jadwalnya dia sendiri dan tidak bisa melihat jadwal user lain
        Permission::create(['name' => 'view self profile']);
        Permission::create(['name' => 'view self riwayat absen']);
        Permission::create(['name' => 'view self jadwal']);


        //lain lain
        Permission::create(['name' => 'rekap presensi']);


        $permission = Permission::all();

        $admin = Role::create(['name' => 'admin_yayasan']);
        $operator = Role::create(['name' => 'operator_instansi']);
        $pendidik = Role::create(['name' => 'tenaga_pendidik']);
        $kependidikan = Role::create(['name' => 'tenaga_kependidikan']);

        $admin->syncPermissions($permission);
        $operator->givePermissionTo(['rekap presensi', 'manage presensi', 'manage jadwal', 'manage hari_libur']);
        $pendidik->givePermissionTo(['view self jadwal', 'view self riwayat absen']);
        $kependidikan->givePermissionTo(['view self riwayat absen']);

    }
}
