<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SocioControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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

    public function test_store_method_fails_with_invalid_data()
    {
        $invalidData = [
            // Invalid data for 'personas_id'
            'personas_id' => 'string', // Invalid type
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

        $response = $this->post('/socios', $invalidData);

        $this->assertDatabaseMissing('socios', $invalidData);
        $response->assertStatus(422); // Unprocessable Entity
    }
}
