<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    protected $table = 'entidades';

    // Definimos los campos que pueden ser asignados en masa (Mass Assignment)
    protected $fillable = [
        'nombre',
        'tipo',
        'persona_contacto',
        'telefono',
        'email_contacto',
    ];
}
