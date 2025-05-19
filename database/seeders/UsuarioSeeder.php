<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el primer usuario como admin
        Usuario::create([
            'nombre' => 'Admin',
            'apellido1' => 'Admin',
            'apellido2' => 'Admin',
            'email' => 'admin@admin.com',
            'telefono' => '123456789',
            'password' => bcrypt('password'),
            'estado' => 'activo',
            'fecha_nac' => '1990-01-01',
            'fecha_entrada' => now(),
            'role' => 'admin',  // Este será el primer usuario y será admin
        ]);

        // Crear 9 usuarios más como miembros
        Usuario::factory(9)->create();  // 9 usuarios como miembros por defecto
    }
}
