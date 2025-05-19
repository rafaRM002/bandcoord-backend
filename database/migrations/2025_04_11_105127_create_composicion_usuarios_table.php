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
        Schema::create('composicion_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('composicion_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->primary(['composicion_id', 'usuario_id']);

            // Claves foráneas
            $table->foreign('composicion_id')->references('id')->on('composiciones')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composicion_usuario');
    }
};
