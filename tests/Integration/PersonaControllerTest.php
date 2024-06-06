<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Persona;
use PHPUnit\Framework\Attributes\Test;

class PersonaControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_persona()
    {
        $response = $this->post('/personas', [
            'nombre' => 'John',
            'ape_paterno' => 'Doe',
            'ape_materno' => 'Smith',
            'dni' => '12345678',
            'fe_nacimiento' => '2000-01-01',
            'es_civil' => 1,
            'sexo' => 1,
            'telefono' => '987654321',
            'email' => 'john.doe@example.com',
            'direccion' => '123 Main St',
            'es_persona' => 'si',
            'fa_parentesco' => 'padre',
            'parentesco' => 'ninguno',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('personas', [
            'nombre' => 'John',
            'ape_paterno' => 'Doe',
            'ape_materno' => 'Smith',
        ]);
    }

    #[Test]
    public function it_can_update_a_persona()
    {
        $persona = Persona::factory()->create([
            'nombre' => 'John',
            'ape_paterno' => 'Doe',
            'ape_materno' => 'Smith',
        ]);

        $response = $this->put('/personas/' . $persona->id, [
            'nombre' => 'Jane',
            'ape_paterno' => 'Doe',
            'ape_materno' => 'Smith',
            'dni' => '87654321',
            'fe_nacimiento' => '1999-12-31',
            'es_civil' => 2,
            'sexo' => 2,
            'telefono' => '123456789',
            'email' => 'jane.doe@example.com',
            'direccion' => '456 Elm St',
            'es_persona' => 'no',
            'fa_parentesco' => 'madre',
            'parentesco' => 'ninguno',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('personas', [
            'id' => $persona->id,
            'nombre' => 'Jane',
        ]);
    }

    #[Test]
    public function it_can_delete_a_persona()
    {
        $persona = Persona::factory()->create();

        $response = $this->delete('/personas/' . $persona->id);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('personas', [
            'id' => $persona->id,
        ]);
    }

    #[Test]
    public function it_can_list_personas()
    {
        $personas = Persona::factory()->count(3)->create();

        $response = $this->get('/personas');

        $response->assertStatus(200);
        $response->assertViewHas('personas', function ($viewPersonas) use ($personas) {
            return $viewPersonas->count() === $personas->count();
        });
    }

    #[Test]
    public function it_can_show_the_create_persona_form()
    {
        $response = $this->get('/personas/create');

        $response->assertStatus(200);
        $response->assertViewIs('personas.create');
    }

    #[Test]
    public function it_can_show_the_edit_persona_form()
    {
        $persona = Persona::factory()->create();

        $response = $this->get('/personas/' . $persona->id . '/edit');

        $response->assertStatus(200);
        $response->assertViewIs('personas.edit');
        $response->assertViewHas('personas', $persona);
    }
}
