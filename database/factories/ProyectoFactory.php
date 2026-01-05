<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProyectoFactory extends Factory
{
    protected $model = Proyecto::class;

    public function definition()
    {
        return [
			'proyecto_id' => $this->faker->name,
			'codigo' => $this->faker->name,
			'acronimo' => $this->faker->name,
			'fecha_de_inicio' => $this->faker->name,
			'fecha_finalizacion' => $this->faker->name,
			'pagina_web' => $this->faker->name,
			'mandato' => $this->faker->name,
			'uri' => $this->faker->name,
			'tipo_proyecto_cod__tipo_cod' => $this->faker->name,
			'categoria_cod' => $this->faker->name,
			'estado_cod' => $this->faker->name,
        ];
    }
}
