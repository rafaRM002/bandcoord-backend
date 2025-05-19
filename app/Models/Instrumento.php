<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use HasFactory;

    public $incrementing = false;

    // Numero_serie -> PK
    protected $primaryKey = 'numero_serie';

    protected $table = 'instrumentos';

    // Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'numero_serie',
        'estado',
        'instrumento_tipo_id',
    ];

    // Relación con TipoInstrumento
    public function tipoInstrumento()
    {
        return $this->belongsTo(TipoInstrumento::class, 'instrumento_tipo_id', 'instrumento');
    }
}
