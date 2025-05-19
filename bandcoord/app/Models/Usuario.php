<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios'; // Nombre de la tabla

    // Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'email',
        'telefono',
        'password',
        'estado',
        'fecha_nac',
        'fecha_entrada',
        'role'
    ];

    // Relaciones con otras tablas
    public function composiciones()
    {
        return $this->belongsToMany(Composicion::class, 'composicion_usuario');
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_usuario');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje::class, 'usuario_id_emisor');
    }

    public function prestamos()
    {
        return $this->hasMany(PrestamoInstrumento::class);
    }

    public function mensajeRecibidos()
    {
        return $this->belongsToMany(Mensaje::class, 'mensaje_usuario');
    }

    public function eventoUsuarios()
    {
        return $this->hasMany(EventoUsuario::class, 'usuario_id');
    }
}
