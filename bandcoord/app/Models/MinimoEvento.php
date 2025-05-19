<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinimoEvento extends Model
{
    use HasFactory;

    protected $table = 'minimo_eventos';

    public $incrementing = false;

    // Los campos que se pueden llenar
    protected $fillable = ['evento_id', 'instrumento_tipo_id', 'cantidad'];

    // Relación con la tabla Eventos
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    // Relación con la tabla Tipo_Instrumentos
    public function tipoInstrumento()
    {
        return $this->belongsTo(TipoInstrumento::class, 'instrumento_tipo_id', 'instrumento');
    }

}
