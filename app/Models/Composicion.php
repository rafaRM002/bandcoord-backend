<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composicion extends Model
{
    use HasFactory;

    protected $table = 'composiciones';

    // Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'nombre',
        'descripcion',
        'nombre_autor',
        'ruta',
    ];

}
