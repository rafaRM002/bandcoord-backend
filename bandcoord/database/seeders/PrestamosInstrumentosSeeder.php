<?php

namespace Database\Seeders;

use App\Models\PrestamoInstrumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestamosInstrumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrestamoInstrumento::factory()->count(10)->create();
    }
}
