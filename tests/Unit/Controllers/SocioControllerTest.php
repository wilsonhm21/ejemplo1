<?php

namespace Tests\Unit\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Socio;

class SocioControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_index_method_returns_view_with_socios_data()
    {
        $response = $this->get('/socios');

        $response->assertStatus(200);
        $response->assertViewIs('socios.list');
        $response->assertViewHas('socios');
    }

    public function test_create_method_returns_view()
    {
        $response = $this->get('/socios/create');

        $response->assertStatus(200);
        $response->assertViewIs('socios.create');

        // Adapt this assertion if your create view requires additional data
        // For example: $response->assertViewHas('personas');
    }

    public function test_store_method_creates_a_new_socio_with_valid_data()
    {
        $socioData = [
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

        $response = $this->post('/socios', $socioData);

        $this->assertDatabaseHas('socios', $socioData);
        $response->assertRedirect('/socios');
    }

    public function test_store_method_fails_on_validation_errors()
    {
        $response = $this->post('/socios', []); // Empty data

        $response->assertStatus(302); // Redirect on validation error
        $response->assertSessionHasErrors();
    }

    public function test_edit_method_returns_view_with_socio_data()
    {
        $socio = Socio::factory()->create();

        $response = $this->get('/socios/' . $socio->id . '/edit');

        $response->assertStatus(200);
        $response->assertViewIs('socios.edit');
        $response->assertViewHas('socio', $socio);
    }

    public function test_update_method_updates_socio()
    {
        $socio = Socio::factory()->create();

        $updateData = [
            'codigo' => $this->faker->unique()->randomNumber(),
            'comunidad' => $this->faker->word,
            // Update other fields as needed
        ];

        $response = $this->put('/socios/' . $socio->id, $updateData);

        $this->assertDatabaseHas('socios', $updateData);
        $response->assertRedirect('/socios');
    }

    public function test_destroy_method_deletes_socio()
    {
        $socio = Socio::factory()->create();

        $response = $this->delete('/socios/' . $socio->id);

        $this->assertDatabaseMissing('socios', ['id' => $socio->id]);
        $response->assertRedirect('/socios');
    }
}
