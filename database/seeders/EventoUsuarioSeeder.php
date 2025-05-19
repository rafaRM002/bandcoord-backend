<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\Usuario;

class EventoUsuarioSeeder extends Seeder
{
    public function run()
    {

        // Asegurar que hay usuarios y eventos
        $usuarios = Usuario::all();
        $eventos = Evento::all();

        if ($usuarios->isEmpty() || $eventos->isEmpty()) {
            // Si no hay usuarios o eventos, no podemos continuar
            return;
        }

        // Asegurar no introducir combinaciones duplicadas
        foreach ($eventos as $evento) {
            foreach ($usuarios as $usuario) {
                // Verificar si la combinación ya existe
                if (!DB::table('evento_usuario')
                    ->where('evento_id', $evento->id)
                    ->where('usuario_id', $usuario->id)
                    ->exists()) {
                    DB::table('evento_usuario')->insert([
                        'evento_id' => $evento->id,
                        'usuario_id' => $usuario->id,
                        'confirmacion' => rand(0, 1),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
