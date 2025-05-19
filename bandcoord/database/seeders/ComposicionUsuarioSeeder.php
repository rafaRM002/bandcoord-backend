<?php

namespace Database\Seeders;

use App\Models\Composicion;
use App\Models\ComposicionUsuario;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComposicionUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurar que hay usuarios
        $usuarios = Usuario::all();
        if ($usuarios->isEmpty()) {
            // Si no hay usuarios, no podemos seguir
            return;
        }

        // Asegurar que hay composiciones
        $composiciones = Composicion::all();
        if ($composiciones->isEmpty()) {
            // Si no hay composiciones, crea algunas para que las relaciones puedan completarse
            Composicion::factory()->count(5)->create();
            $composiciones = Composicion::all(); // Vuelve a cargar las composiciones
        }

        // Luego, crea las relaciones entre usuarios y composiciones
        foreach ($usuarios as $usuario) {
            foreach ($composiciones as $composicion) {
                ComposicionUsuario::create([
                    'composicion_id' => $composicion->id,
                    'usuario_id' => $usuario->id,
                ]);
            }
        }
    }
}
