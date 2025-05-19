<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entidad>
 */
class EntidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company(),
            'tipo' => $this->faker->randomElement(['hermandad', 'ayuntamiento', 'otro']),
            'persona_contacto' => $this->faker->name(),
            'telefono' => $this->faker->phoneNumber(),
            'email_contacto' => $this->faker->email(),
        ];
    }
}
