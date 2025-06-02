<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeUsuario extends Model
{
    use HasFactory;

    protected $table = 'mensaje_usuario';
    protected $casts = ['estado' => 'boolean'];
    public $incrementing = false;
    protected $primaryKey = null;
    protected $fillable = [
        'mensaje_id',
        'usuario_id_receptor',
        'estado',
    ];

    // Relación con la tabla Mensajes
    public function mensaje()
    {
        return $this->belongsTo(Mensaje::class, 'mensaje_id');
    }

    // Relación con la tabla Usuarios (receptor del mensaje)
    public function usuarioReceptor()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id_receptor');
    }
}
