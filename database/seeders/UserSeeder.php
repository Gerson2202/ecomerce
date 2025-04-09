<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Gerson PSJ',
            'email' => 'gersonpsj@gmail.com',
            'password' => Hash::make('12345678'),  // Encriptamos la contraseña
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'jhon.steven.96@gmail.com',
            'password' => Hash::make('anto0802@'),  // Encriptamos la contraseña
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
