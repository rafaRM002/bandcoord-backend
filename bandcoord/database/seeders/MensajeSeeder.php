<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurarse de que hay al menos un usuario
        $usuario = Usuario::first();

        if (!$usuario) {
            $usuario = Usuario::factory()->create();
        }

        // Crear mensajes para ese usuario
        Mensaje::factory()->count(10)->create([
            'usuario_id_emisor' => $usuario->id,
        ]);
    }
}
