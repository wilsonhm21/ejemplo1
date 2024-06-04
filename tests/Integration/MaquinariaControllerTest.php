<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Maquinaria;

class MaquinariaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/maquinarias');

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get('/maquinarias/create');

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'nombre' => 'Nombre de prueba',
            'codigo' => 'Código de prueba',
            'modelo' => 'Modelo de prueba',
            'potencia' => 'Potencia de prueba',
            'velocidad' => 'Velocidad de prueba',
            'es_maquinaria' => true,
        ];

        $response = $this->post('/maquinarias', $data);

        $response->assertRedirect('/maquinarias');
        $this->assertDatabaseHas('maquinarias', ['nombre' => 'Nombre de prueba']);
    }

    public function testEdit()
    {
        $maquinaria = Maquinaria::factory()->create();

        $response = $this->get("/maquinarias/{$maquinaria->id}/edit");

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $maquinaria = Maquinaria::factory()->create();

        $data = [
            'nombre' => 'Nombre de prueba modificado',
            'codigo' => 'Código de prueba modificado',
            'modelo' => 'Modelo de prueba modificado',
            'potencia' => 'Potencia de prueba modificado',
            'velocidad' => 'Velocidad de prueba modificado',
            'es_maquinaria' => false,
        ];

        $response = $this->put("/maquinarias/{$maquinaria->id}", $data);

        $response->assertRedirect('/maquinarias');
        $this->assertDatabaseHas('maquinarias', ['nombre' => 'Nombre de prueba modificado']);
    }

    public function testDestroy()
    {
        $maquinaria = Maquinaria::factory()->create();

        $response = $this->delete("/maquinarias/{$maquinaria->id}");

        $response->assertRedirect('/maquinarias');
        $this->assertDatabaseMissing('maquinarias', ['nombre' => $maquinaria->nombre]);
    }
}
