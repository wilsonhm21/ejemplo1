<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Persona;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class PersonaControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_persona()
    {
        $data = [
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
        ];

        $persona = Persona::create($data);

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

        $data = [
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
        ];

        $persona->update($data);

        $this->assertDatabaseHas('personas', [
            'id' => $persona->id,
            'nombre' => 'Jane',
        ]);
    }

    #[Test]
    public function it_can_delete_a_persona()
    {
        $persona = Persona::factory()->create();

        $persona->delete();

        $this->assertDatabaseMissing('personas', [
            'id' => $persona->id,
        ]);
    }

    #[Test]
    public function it_can_list_personas()
    {
        $personas = Persona::factory()->count(3)->create();

        $this->assertCount(3, Persona::all());
    }
}
