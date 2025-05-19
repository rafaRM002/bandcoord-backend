<?php

namespace Database\Factories;

use App\Models\Mensaje;
use App\Models\MensajeUsuario;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MensajeUsuario>
 */
class MensajeUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mensaje_id' => Mensaje::all()->random()->id,  // Obtener un mensaje aleatorio
            'usuario_id_receptor' => Usuario::all()->random()->id,  // Obtener un usuario aleatorio
            'estado' => $this->faker->randomElement([0, 1]),  // Asignar un estado aleatorio
        ];
    }
}
