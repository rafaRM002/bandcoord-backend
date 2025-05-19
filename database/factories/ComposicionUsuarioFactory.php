<?php

namespace Database\Factories;

use App\Models\Composicion;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComposicionUsuario>
 */
class ComposicionUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $composicion = Composicion::inRandomOrder()->first();
        $usuario = Usuario::inRandomOrder()->first();

        if ($composicion && $usuario) {
            return [
                'composicion_id' => $composicion->id,
                'usuario_id' => $usuario->id,
            ];
        } else {
            return [
                'composicion_id' => null,
                'usuario_id' => null,
            ];
        }
    }
}
