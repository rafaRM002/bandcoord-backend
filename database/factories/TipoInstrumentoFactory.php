<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoInstrumento>
 */
class TipoInstrumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instrumento' => $this->faker->randomElement(['Trompeta', 'Fliscorno', 'Trombón', 'Bombardino', 'Tuba', 'Corneta', 'Caja', 'Tambor']),
            'cantidad' => $this->faker->numberBetween(1, 15),
        ];
    }
}
