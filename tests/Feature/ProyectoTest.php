<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ProyectoTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_and_list_proyecto()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('proyectos.store'), [
            'nombre' => 'Proyecto Test',
            'descripcion' => 'Descripcion de prueba',
            'fecha_inicio' => '2026-01-01',
            'fecha_fin' => '2026-12-31',
            'estado' => 'activo',
        ]);

        $response->assertRedirect(route('proyectos.index'));
        $this->assertDatabaseHas('proyectos', ['nombre' => 'Proyecto Test']);
    }
}
