<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition()
    {
        return [
			'persona_id' => $this->faker->name,
			'nombres' => $this->faker->name,
			'apellidos' => $this->faker->name,
			'genero' => $this->faker->name,
			'foto' => $this->faker->name,
			'domicilio' => $this->faker->name,
			'documento_nacional_identidad' => $this->faker->name,
			'orcid' => $this->faker->name,
			'identificador_registro_personas' => $this->faker->name,
			'scopus_author_id' => $this->faker->name,
			'research_id' => $this->faker->name,
			'isni' => $this->faker->name,
        ];
    }
}
