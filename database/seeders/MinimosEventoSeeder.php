<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\MinimoEvento;
use App\Models\TipoInstrumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MinimosEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MinimoEvento::truncate(); // Limpia antes de insertar

        $minimoEventos = [];

        for ($i = 0; $i < 100; $i++) {
            $evento = Evento::inRandomOrder()->first();
            $instrumento = TipoInstrumento::inRandomOrder()->first();

            if (!$evento || !$instrumento) continue;

            $evento_id = $evento->id;
            $instrumento_tipo_id = $instrumento->instrumento;

            $key = "$evento_id-$instrumento_tipo_id";

            if (!in_array($key, $minimoEventos)) {
                $minimoEventos[] = $key;

                MinimoEvento::create([
                    'evento_id' => $evento_id,
                    'instrumento_tipo_id' => $instrumento_tipo_id,
                    'cantidad' => rand(1, 10),
                ]);
            }
        }
    }
}
