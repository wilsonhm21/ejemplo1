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
            'dni' => $this->faker->unique()->numerify('########'),
            'fe_nacimiento' => $this->faker->date(),
            'es_civil' => $this->faker->randomElement([1, 2, 3, 4]),
            'sexo' => $this->faker->randomElement([1, 2]),
            'telefono' => $this->faker->numerify('#########'),
            'email' => $this->faker->email,
            'direccion' => $this->faker->text(50),
            'es_persona' => $this->faker->boolean,
            'fa_parentesco' => $this->faker->word,
            'parentesco' => $this->faker->name,
        ];
    }
}
