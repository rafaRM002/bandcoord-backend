<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoUsuario extends Model
{
    use HasFactory;

    protected $table = 'evento_usuario';

    protected $fillable = [
        'evento_id',
        'usuario_id',
        'confirmacion'
    ];

    // Relación con la tabla Eventos
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    // Relación con la tabla Usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
