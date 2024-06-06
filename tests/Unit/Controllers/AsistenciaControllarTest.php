<?php
namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\Persona;
use App\Models\Asistencia;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AsistenciaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexReturnsAsistenciasView()
    {
        Asistencia::factory()->count(3)->create();

        $response = $this->get('/asistencias');

        $response->assertStatus(200);
        $response->assertViewIs('asistencias.list');
        $response->assertViewHas('asistencias');
    }

    public function testCreateReturnsCreateView()
    {
        Persona::factory()->count(3)->create();

        $response = $this->get('/asistencias/create');

        $response->assertStatus(200);
        $response->assertViewIs('asistencias.create');
        $response->assertViewHas('personas');
    }

    public function testStoreCreatesAsistencia()
    {
        $persona = Persona::factory()->create();

        $data = [
            'personas_id' => $persona->id,
            'eventos' => 'Evento de prueba',
            'descripcion' => 'Descripción de prueba',
            'fech_even' => now()->toDateString(),
            'estado' => 'Activo'
        ];

        $response = $this->post('/asistencias', $data);

        $response->assertRedirect('/asistencias');
        $this->assertDatabaseHas('asistencias', $data);
    }
}
