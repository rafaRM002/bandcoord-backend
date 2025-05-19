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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha');
            $table->string('lugar');
            $table->time('hora');
            $table->enum('estado', ['planificado', 'en progreso', 'finalizado']);
            $table->enum('tipo', ['ensayo', 'procesion', 'concierto', 'pasacalles']);
            $table->unsignedBigInteger('entidad_id');
            $table->timestamps();

            $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
