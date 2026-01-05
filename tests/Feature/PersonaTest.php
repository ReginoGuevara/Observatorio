<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class PersonaTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_persona()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('personas.store'), [
            'nombre' => 'Juan Perez',
            'email' => 'juan@example.com',
            'telefono' => '12345678',
            'cargo' => 'Investigador',
        ]);

        $response->assertRedirect(route('personas.index'));
        $this->assertDatabaseHas('persona', ['email' => 'juan@example.com']);
    }
}
