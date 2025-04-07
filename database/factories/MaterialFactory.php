<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        $materiales = [
        'Acero', 'Aluminio', 'Bronce', 'Cobre', 'Oro', 'Plata', 'Hierro',
        'Plástico ABS', 'PVC', 'Poliestireno', 'Poliuretano', 'Madera de Pino',
        'Roble', 'Cedro', 'Vidrio Templado', 'Fibra de Vidrio', 'Cerámica',
        'Porcelana', 'Gres', 'Mármol', 'Granito', 'Ladrillo', 'Concreto'
    ];
    
    return [
        'nombre' => $this->faker->unique()->randomElement($materiales),
    ];
    
    }
}
