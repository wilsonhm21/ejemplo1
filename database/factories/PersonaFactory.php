<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'ape_paterno' => $this->faker->lastName,
            'ape_materno' => $this->faker->lastName,
            'dni' => $this->faker->unique()->randomNumber(),
            'fe_nacimiento' => $this->faker->date(),
            'es_civil' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado']),
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'direccion' => $this->faker->address,
            'es_persona' => $this->faker->boolean,
            'fa_parentesco' => $this->faker->word,
            'parentesco' => $this->faker->name,
        ];
    }
}
