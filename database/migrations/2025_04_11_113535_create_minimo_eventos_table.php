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
        Schema::create('minimo_eventos', function (Blueprint $table) {
            $table->unsignedBigInteger('evento_id');
            $table->string('instrumento_tipo_id');
            $table->integer('cantidad');

            $table->primary(['evento_id', 'instrumento_tipo_id']); // Clave primaria compuesta

            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('instrumento_tipo_id')->references('instrumento')->on('tipo_instrumentos')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('minimo_eventos');
    }
};
