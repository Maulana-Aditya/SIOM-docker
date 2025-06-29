<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ADMIN
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'roles' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // PEMBINA ORMAWA
        DB::table('users')->updateOrInsert(
            ['email' => 'pembina@mail.com'],
            [
                'name' => 'Pembina Ormawa',
                'password' => Hash::make('pembina123'),
                'roles' => 'pembina',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // KEMAHASISWAAN
        DB::table('users')->updateOrInsert(
            ['email' => 'kemahasiswaan@mail.com'],
            [
                'name' => 'Kemahasiswaan',
                'password' => Hash::make('kemahasiswaan123'),
                'roles' => 'kemahasiswaan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // WAKIL REKTOR 3 (WR3)
        DB::table('users')->updateOrInsert(
            ['email' => 'wr3@mail.com'],
            [
                'name' => 'Wakil Rektor 3',
                'password' => Hash::make('wr3123'),
                'roles' => 'wr3',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // KAPRODI
        DB::table('users')->updateOrInsert(
            ['email' => 'kaprodi@mail.com'],
            [
                'name' => 'Kepala Program Studi',
                'password' => Hash::make('kaprodi123'),
                'roles' => 'kaprodi',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'himafis@mail.com'],
            [
                'name' => 'Hima Fisioterapi',
                'password' => Hash::make('himafis123'),
                'roles' => 'siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table('users')->updateOrInsert(
            ['email' => 'pembinafis@mail.com'],
            [
                'name' => 'Pembina Fisioterapi',
                'password' => Hash::make('pembinafis123'),
                'roles' => 'pembina',
                'ormawa' => 'himafis',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table('users')->updateOrInsert(
            ['email' => 'kaprodifis@mail.com'],
            [
                'name' => 'Kaprodi Fisioterapi',
                'password' => Hash::make('kaprodifis123'),
                'roles' => 'pembina',
                'ormawa' => 'himafis',
                'prodi' => 'fisioterapi',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
