<?php

namespace Database\Factories;

use App\Models\Instrumento;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrestamoInstrumento>
 */
class PrestamoInstrumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'num_serie' => Instrumento::all()->random()->numero_serie,
            'usuario_id' => Usuario::inRandomOrder()->first()->id,
            'fecha_prestamo' => $this->faker->date(),
            'fecha_devolucion' => $this->faker->optional()->date(),
        ];
    }
}
