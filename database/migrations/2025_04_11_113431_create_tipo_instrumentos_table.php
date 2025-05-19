<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_instrumentos', function (Blueprint $table) {
            $table->string('instrumento', 100)
                ->primary()
                ->charset('utf8mb4')
                ->collation('utf8mb4_unicode_ci'); // Clave primaria
            $table->integer('cantidad')->default(0); // Número de instrumentos de este tipo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_instrumentos');
    }
};
