<?php

namespace Database\Seeders;

use App\Models\Composicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComposicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Composicion::factory(10)->create();
    }
}
