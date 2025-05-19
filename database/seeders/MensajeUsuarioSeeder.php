<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mensaje;
use App\Models\Usuario;

class MensajeUsuarioSeeder extends Seeder
{
    public function run()
    {
        // Asegurar que hay usuarios y mensajes
        $usuarios = Usuario::all();
        $mensajes = Mensaje::all();

        if ($usuarios->isEmpty() || $mensajes->isEmpty()) {
            // Si no hay usuarios o mensajes, no podemos continuar
            return;
        }

        // Asegurar no introducir combinaciones duplicadas
        foreach ($mensajes as $mensaje) {
            foreach ($usuarios as $usuario) {
                // Verificar si la combinación ya existe
                if (!DB::table('mensaje_usuario')
                    ->where('mensaje_id', $mensaje->id)
                    ->where('usuario_id_receptor', $usuario->id)
                    ->exists()) {
                    DB::table('mensaje_usuario')->insert([
                        'mensaje_id' => $mensaje->id,
                        'usuario_id_receptor' => $usuario->id,
                        'estado' => rand(0, 1), // Valor aleatorio para el estado
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
