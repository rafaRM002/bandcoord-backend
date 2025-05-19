<?php

namespace Database\Factories;

use App\Models\Evento;
use App\Models\TipoInstrumento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MinimoEvento>
 */
class MinimoEventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evento_id' => Evento::inRandomOrder()->value('id'),
            'instrumento_tipo_id' => TipoInstrumento::inRandomOrder()->value('instrumento'),
            'cantidad' => $this->faker->numberBetween(1, 10),
        ];
    }
}
