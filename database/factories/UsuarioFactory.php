<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido1' => $this->faker->lastName,
            'apellido2' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'password' => Hash::make('password'), // Contraseña por defecto
            'estado' => $this->faker->randomElement(['activo', 'suspendido', 'bloqueado','pendiente']),
            'fecha_nac' => $this->faker->date(),
            'fecha_entrada' => $this->faker->date(),
            'role' => $this->faker->randomElement(['admin', 'miembro']),
        ];
    }
}
