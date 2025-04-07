<?php
namespace Database\Factories;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    protected $model = Articulo::class;

    public function definition()
    {
        $nombres = [
            'San Pedro',
            'San Pablo',
            'San Francisco de Asís',
            'Santa Teresa de Ávila',
            'San Agustín',
            'Santa Rita',
            'San Antonio de Padua',
            'San Juan Bosco',
            'Santa Rosa de Lima',
            'San Martín de Porres',
            'Santa Muerte',
            'Divino Niño',
            'Virgen María',
            'Virgen del Carmen',
            'Inmaculada Concepción',
            'Nuestra Señora de la Asunción',
            'Virgen de la Medalla Milagrosa',
            'Virgen de Guadalupe'
        ];

        return [
            'nombre'       => $this->faker->randomElement($nombres) . ' ' . rand(1, 1000),
            'descripcion'  => $this->faker->sentence(10),
            'categoria_id' => Categoria::inRandomOrder()->first()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Articulo $articulo) {
            for ($i = 1; $i <= 3; $i++) {
                $articulo->fotos()->create(['url' => "articulo/$i.jpg"]);
            }
        });
    }
}