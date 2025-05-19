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
        Schema::create('instrumentos', function (Blueprint $table) {
            $table->unsignedBigInteger('numero_serie')->primary();
            $table->enum('estado', ['prestado', 'disponible', 'en reparacion']);
            $table->string('instrumento_tipo_id', 100)
                ->charset('utf8mb4')
                ->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrumentos');
    }
};
