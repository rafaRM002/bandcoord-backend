<?php

namespace Database\Factories;

use App\Models\TipoInstrumento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instrumento>
 */
class InstrumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener un tipo de instrumento válido de la tabla tipo_instrumentos
        $tipo = TipoInstrumento::inRandomOrder()->first(); // Seleccionamos un tipo de instrumento aleatorio

        return [
            'numero_serie' => $this->faker->unique()->numerify('#####'),
            'estado' => $this->faker->randomElement(['prestado', 'disponible', 'en reparacion']),
            'instrumento_tipo_id' => $tipo->instrumento, // Usamos el valor correcto de instrumento_tipo_id
        ];
    }
}
