<?php

namespace Tests\Unit\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Persona;

class PersonaControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_index_method_returns_view_with_personas_data()
    {
        $response = $this->get('/personas');

        $response->assertStatus(200);
        $response->assertViewIs('personas.list');
        $response->assertViewHas('personas');
    }

    public function test_create_method_returns_view()
    {
        $response = $this->get('/personas/create');

        $response->assertStatus(200);
        $response->assertViewIs('personas.create');
    }

    public function test_store_method_creates_a_new_persona()
    {
        $personaData = [
            'nombre' => $this->faker->name,
            'ape_paterno' => $this->faker->lastName,
            'ape_materno' => $this->faker->lastName,
            'dni' => $this->faker->unique()->randomNumber(8),
            'fe_nacimiento' => $this->faker->date(),
            'es_civil' => $this->faker->randomElement(['Soltero', 'Casado', 'Viudo', 'Divorciado']),
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'direccion' => $this->faker->address,
            'es_persona' => $this->faker->boolean,
            'fa_parentesco' => $this->faker->randomElement(['Padre', 'Madre', 'Hijo', 'Hija']),
            'parentesco' => $this->faker->name,
        ];

        $response = $this->post('/personas', $personaData);

        $this->assertDatabaseHas('personas', $personaData);
        $response->assertRedirect('/personas');
    }

    public function test_edit_method_returns_view_with_persona_data()
    {
        $persona = Persona::factory()->create();

        $response = $this->get('/personas/'.$persona->id.'/edit');

        $response->assertStatus(200);
        $response->assertViewIs('personas.edit');
        $response->assertViewHas('personas', $persona);
    }

    public function test_update_method_updates_persona()
    {
        $persona = Persona::factory()->create();

        $updatedData = [
            'nombre' => $this->faker->name,
            'ape_paterno' => $this->faker->lastName,
            'ape_materno' => $this->faker->lastName,
            'dni' => $this->faker->unique()->randomNumber(8),
            'fe_nacimiento' => $this->faker->date(),
            'es_civil' => $this->faker->randomElement(['Soltero', 'Casado', 'Viudo', 'Divorciado']),
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'direccion' => $this->faker->address,
            'es_persona' => $this->faker->boolean,
            'fa_parentesco' => $this->faker->randomElement(['Padre', 'Madre', 'Hijo', 'Hija']),
            'parentesco' => $this->faker->name,
        ];

        $response = $this->put('/personas/'.$persona->id, $updatedData);

        $this->assertDatabaseHas('personas', $updatedData);
        $response->assertRedirect('/personas');
    }

    public function test_destroy_method_deletes_persona()
    {
        // Creamos una persona para luego eliminarla
        $persona = Persona::factory()->create();

        // Enviamos una solicitud DELETE para eliminar la persona
        $response = $this->delete('/personas/'.$persona->id);

        // Verificamos que la persona ya no exista en la base de datos
        $this->assertNull(Persona::find($persona->id));

        // Verificamos que se redirija a la ruta '/personas' después de eliminar la persona
        $response->assertRedirect('/personas');
    }

}
