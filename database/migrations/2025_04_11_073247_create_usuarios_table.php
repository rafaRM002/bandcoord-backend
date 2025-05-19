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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('password');
            $table->enum('estado', ['activo', 'pendiente', 'suspendido', 'bloqueado'])->default('pendiente');
            $table->date('fecha_nac')->nullable();
            $table->date('fecha_entrada');
            $table->enum('role', ['admin', 'miembro'])->default('miembro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
