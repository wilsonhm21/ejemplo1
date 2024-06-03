<?php

namespace Database\Factories;

use App\Models\Maquinaria;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaquinariaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Maquinaria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'codigo' => $this->faker->unique()->randomNumber(),
            'modelo' => $this->faker->word,
            'potencia' => $this->faker->randomNumber(),
            'velocidad' => $this->faker->randomNumber(),
            'es_maquinaria' => $this->faker->boolean,
        ];
    }
}

