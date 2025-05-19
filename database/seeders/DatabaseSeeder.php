<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamada a los seeders
        $this->call([
            TipoInstrumentoSeeder::class,
            MensajeSeeder::class,
            UsuarioSeeder::class,
            EntidadSeeder::class,
            InstrumentoSeeder::class,
            PrestamosInstrumentosSeeder::class,
            EventoSeeder::class,
            EventoUsuarioSeeder::class,
            ComposicionUsuarioSeeder::class,
            MensajeUsuarioSeeder::class,
            MinimosEventoSeeder::class,
        ]);
    }
}
