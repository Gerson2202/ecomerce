<?php

namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Material;
use App\Models\Numeral;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Material::factory()->count(20)->create();
        Categoria::factory()->count(5)->create();
        Numeral::factory()->count(10)->create();
        Articulo::factory()->count(500)->create();
       

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.cñm',
        ]);

        $this->call([
         
            UserSeeder::class,  // Llamamos al seeder de usuarios
           
        ]);
    }
}
