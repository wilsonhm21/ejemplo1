<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Socio;

class SocioFactory extends Factory
{
    /**
     * The name of the factory's definition.
     *
     * @var string
     */
    protected $name = 'Socio';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'personas_id' => 1, // Adapt ID based on your model relationships
            'codigo' => $this->faker->unique()->randomNumber(),
            'tipo' => 'socio',
            'categoria' => 'regular',
            'es_socio' => 1,
            'comunidad' => $this->faker->word,
            'distrito_id' => 1, // Adapt ID based on your model relationships
            'provincia_id' => 1, // Adapt ID based on your model relationships
            'departamento_id' => 1, // Adapt ID based on your model relationships
            // Add more fields based on your model
        ];
    }
}

