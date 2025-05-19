<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mensaje>
 */
class MensajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'asunto' => $this->faker->sentence(),
            'contenido' => $this->faker->paragraph(),
            'usuario_id_emisor' => Usuario::inRandomOrder()->first()->id,
        ];
    }
}
