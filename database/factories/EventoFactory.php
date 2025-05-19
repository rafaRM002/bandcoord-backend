<?php

namespace Database\Factories;

use App\Models\Entidad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'fecha' => $this->faker->date(),
            'lugar' => $this->faker->city,
            'hora' => $this->faker->time(),
            'estado' => $this->faker->randomElement(['planificado', 'en progreso', 'finalizado']),
            'tipo' => $this->faker->randomElement(['ensayo', 'procesion', 'concierto', 'pasacalles']),
            'entidad_id' => Entidad::factory(),
        ];
    }
}
