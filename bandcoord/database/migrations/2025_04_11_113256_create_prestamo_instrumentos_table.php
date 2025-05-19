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
        Schema::create('prestamo_instrumentos', function (Blueprint $table) {
            $table->unsignedBigInteger('num_serie');
            $table->unsignedBigInteger('usuario_id');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion')->nullable();
            $table->timestamps();

            // Clave primaria combinada
            $table->primary(['num_serie', 'usuario_id']);

            // Relaciones con las tablas
            $table->foreign('num_serie')->references('numero_serie')->on('instrumentos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamo_instrumentos');
    }
};
