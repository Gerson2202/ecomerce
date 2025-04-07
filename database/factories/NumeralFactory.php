<?php

namespace Database\Factories;

use App\Models\Numeral;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Numeral>
 */
class NumeralFactory extends Factory
{
    protected $model = Numeral::class;

    public function definition()
    {
        return [
            'numero' => $this->faker->unique()->numberBetween(1, 1000),
        ];
    }

    
}
