<?php

namespace Database\Factories;

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventoUsuario>
 */
class EventoUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evento_id' => Evento::all()->random()->id,
            'usuario_id' => Usuario::all()->random()->id,
            'confirmacion' => $this->faker->randomElement([0, 1]),
        ];
    }
}
