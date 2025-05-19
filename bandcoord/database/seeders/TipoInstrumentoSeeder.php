<?php

namespace Database\Seeders;

use App\Models\TipoInstrumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoInstrumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertamos manualmente los tipos de instrumentos
        TipoInstrumento::create([
            'instrumento' => 'Trompeta',
            'cantidad' => 5,
        ]);

        TipoInstrumento::create([
            'instrumento' => 'Fliscorno',
            'cantidad' => 3,
        ]);

        TipoInstrumento::create([
            'instrumento' => 'Trombón',
            'cantidad' => 4,
        ]);

        TipoInstrumento::create([
            'instrumento' => 'Bombardino',
            'cantidad' => 2,
        ]);

        TipoInstrumento::create([
            'instrumento' => 'Tuba',
            'cantidad' => 6,
        ]);

        TipoInstrumento::create([
            'instrumento' => 'Corneta',
            'cantidad' => 7,
        ]);

        TipoInstrumento::create([
            'instrumento' => 'Caja',
            'cantidad' => 8,
        ]);

        TipoInstrumento::create([
            'instrumento' => 'Tambor',
            'cantidad' => 10,
        ]);
    }
}
