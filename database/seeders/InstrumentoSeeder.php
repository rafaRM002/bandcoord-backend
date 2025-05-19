<?php

namespace Database\Seeders;

use App\Models\Instrumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstrumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instrumento::factory()->count(30)->create();
    }
}
