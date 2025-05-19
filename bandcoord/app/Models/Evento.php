<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha',
        'lugar',
        'hora',
        'estado',
        'tipo',
        'entidad_id',
    ];

    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'evento_usuario');
    }
    public function minimoEventos()
    {
        return $this->hasMany(MinimoEvento::class, 'evento_id');
    }

    public function eventoUsuarios()
    {
        return $this->hasMany(EventoUsuario::class, 'evento_id');
    }
}
