<?php

namespace Tests\Unit\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Maquinaria;

class MaquinariaControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_index_method_returns_view_with_maquinarias_data()
    {
        $response = $this->get('/maquinarias');

        $response->assertStatus(200);
        $response->assertViewIs('maquinarias.list');
        $response->assertViewHas('maquinarias');
    }

    public function test_create_method_returns_view()
    {
        $response = $this->get('/maquinarias/create');

        $response->assertStatus(200);
        $response->assertViewIs('maquinarias.create');
    }

    public function test_store_method_creates_a_new_maquinaria()
    {
        $maquinariaData = [
            'nombre' => $this->faker->word,
            'codigo' => $this->faker->unique()->randomNumber(),
            'modelo' => $this->faker->word,
            'potencia' => $this->faker->randomNumber(),
            'velocidad' => $this->faker->randomNumber(),
            'es_maquinaria' => $this->faker->boolean,
        ];

        $response = $this->post('/maquinarias', $maquinariaData);

        $this->assertDatabaseHas('maquinarias', $maquinariaData);
        $response->assertRedirect('/maquinarias');
    }

    public function test_edit_method_returns_view_with_maquinaria_data()
    {
        $maquinaria = Maquinaria::factory()->create();

        $response = $this->get('/maquinarias/'.$maquinaria->id.'/edit');

        $response->assertStatus(200);
        $response->assertViewIs('maquinarias.edit');
        $response->assertViewHas('maquinarias', $maquinaria);
    }

    public function test_update_method_updates_maquinaria()
    {
        $maquinaria = Maquinaria::factory()->create();

        $updatedData = [
            'nombre' => $this->faker->word,
            'codigo' => $this->faker->unique()->randomNumber(),
            'modelo' => $this->faker->word,
            'potencia' => $this->faker->randomNumber(),
            'velocidad' => $this->faker->randomNumber(),
            'es_maquinaria' => $this->faker->boolean,
        ];

        $response = $this->put('/maquinarias/'.$maquinaria->id, $updatedData);

        $this->assertDatabaseHas('maquinarias', $updatedData);
        $response->assertRedirect('/maquinarias');
    }

    public function test_destroy_method_deletes_maquinaria()
{
    $maquinaria = Maquinaria::factory()->create();

    $response = $this->delete('/maquinarias/'.$maquinaria->id);

    $this->assertDatabaseMissing('maquinarias', ['id' => $maquinaria->id]);
    $response->assertRedirect('/maquinarias');
}

}
