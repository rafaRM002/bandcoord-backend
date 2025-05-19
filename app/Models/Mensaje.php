<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    // Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'asunto',
        'contenido',
        'usuario_id_emisor',
    ];

    // Relación: un mensaje pertenece a un usuario (el emisor)
    public function emisor()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id_emisor');
    }
}
