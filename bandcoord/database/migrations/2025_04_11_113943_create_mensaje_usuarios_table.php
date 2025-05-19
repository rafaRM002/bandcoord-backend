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
        Schema::create('mensaje_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('mensaje_id')->constrained('mensajes')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_id_receptor')->constrained('usuarios')->onDelete('cascade');
            $table->boolean('estado')->default(0);
            $table->timestamps();

            $table->primary(['mensaje_id', 'usuario_id_receptor']);

            $table->foreign('mensaje_id')->references('id')->on('mensajes')->onDelete('cascade');
            $table->foreign('usuario_id_receptor')->references('id')->on('usuarios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensaje_usuario');
    }
};
